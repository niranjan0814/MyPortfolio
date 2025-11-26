<?php
// app/Http/Controllers/ThemeOverviewController.php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\ThemeComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeOverviewController extends Controller
{
    /**
     * Show theme overview page
     */
    public function show(Theme $theme)
    {
        // ✅ Load approved TOP-LEVEL comments with their replies
        $theme->load([
            'approvedComments' => function($query) {
                $query->topLevel()->with(['user', 'replies.user']);
            },
            'creator'
        ]);

        // Get user's access status
        $hasAccess = false;
        $canComment = false;

        if (Auth::check()) {
            $user = Auth::user();
            $hasAccess = $user->canAccessTheme($theme->slug);
            $canComment = true;
        }

        // ✅ Get ALL of the current user's comments (both top-level and replies)
        $userComments = collect();
        if (Auth::check()) {
            $userComments = ThemeComment::where('theme_id', $theme->id)
                ->where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('theme-overview', [
            'theme' => $theme,
            'hasAccess' => $hasAccess,
            'canComment' => $canComment,
            'userComments' => $userComments,
            'averageRating' => $theme->average_rating,
            'commentsCount' => $theme->comments_count,
        ]);
    }

    /**
     * Store a new comment OR reply
     */
public function storeComment(Request $request, Theme $theme)
{
    if (!Auth::check()) {
        return redirect()->route('filament.admin.auth.login')
            ->with('error', 'Please login to leave a comment');
    }

    $validated = $request->validate([
        'comment'   => 'required|string|min:10|max:1000',
        'rating'    => 'nullable|integer|min:1|max:5',
        'parent_id' => 'nullable|integer|exists:theme_comments,id',
    ]);

    // Use the relationship – this fixes the "Undefined array key parent_id" error
    Auth::user()->themeComments()->create([
        'theme_id'    => $theme->id,
        'comment'     => $validated['comment'],
        'rating'      => $request->filled('parent_id') ? null : ($validated['rating'] ?? null),
        'parent_id'   => $request->filled('parent_id') ? $validated['parent_id'] : null,
        'category'    => 'theme',
        'is_approved' => true,
    ]);

    $message = $request->filled('parent_id') ? 'Reply posted!' : 'Review posted!';

    return back()->with('success', $message);
}

    /**
     * Delete user's own comment (and all its replies)
     */
    public function deleteComment(Request $request, Theme $theme)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        // ✅ FIXED: Delete specific comment by ID
        $commentId = $request->input('comment_id');
        
        $comment = ThemeComment::where('id', $commentId)
            ->where('theme_id', $theme->id)
            ->where('user_id', Auth::id())
            ->where('category', 'theme')
            ->first();

        if ($comment) {
            // ✅ Cascade delete will automatically remove all replies
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        }

        return redirect()->back()->with('error', 'Comment not found');
    }

    /**
     * Preview theme in iframe
     */
    public function preview(Theme $theme)
    {
        // For premium themes, check access
        if ($theme->is_premium && !Auth::user()?->canAccessTheme($theme->slug)) {
            abort(403, 'You need premium access to preview this theme');
        }

        // Get demo user for preview
        $demoUser = \App\Models\User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['free_user', 'premium_user']);
        })->first();

        if (!$demoUser) {
            abort(404, 'No demo user available for preview');
        }

        // Redirect to portfolio with preview mode
        return redirect()->route('portfolio.show', [
            'user' => $demoUser->slug,
            'preview' => true,
            'theme' => $theme->slug,
        ]);
    }

    /**
     * Activate theme
     */
    public function activate(Request $request, Theme $theme)
    {
        // Must be logged in
        if (!Auth::check()) {
            return redirect()->route('filament.admin.auth.login')
                ->with('error', 'Please log in to activate a theme.');
        }

        $user = Auth::user();

        // If theme is "coming soon"
        if (!$theme->is_active) {
            return back()->with('error', 'This theme is not available yet.');
        }

        // Premium theme access check
        if ($theme->is_premium && !$user->canAccessTheme($theme->slug)) {
            return back()->with('error', 'You need premium access to activate this theme.');
        }

        // If already active
        if ($user->active_theme === $theme->slug) {
            return back()->with('success', 'This theme is already active.');
        }

        // Activate theme
        $user->active_theme = $theme->slug;
        $user->save();

        return back()->with('success', '"' . $theme->name . '" has been successfully activated!');
    }
}