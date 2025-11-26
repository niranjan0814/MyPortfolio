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
        // Load theme with comments and users
        $theme->load(['approvedComments.user', 'creator']);

        // Get user's access status
        $hasAccess = false;
        $canComment = false;

        if (Auth::check()) {
            $user = Auth::user();
            $hasAccess = $user->canAccessTheme($theme->slug);
            $canComment = true; // All logged-in users can comment
        }

        // Check if user already commented
        $userComment = null;
        if (Auth::check()) {
            $userComment = ThemeComment::where('theme_id', $theme->id)
                ->where('user_id', Auth::id())
                ->first();
        }

        return view('theme-overview', [
            'theme' => $theme,
            'hasAccess' => $hasAccess,
            'canComment' => $canComment,
            'userComment' => $userComment,
            'averageRating' => $theme->average_rating,
            'commentsCount' => $theme->comments_count,
        ]);
    }

    /**
     * Store a new comment
     */
    public function storeComment(Request $request, Theme $theme)
    {
        if (!Auth::check()) {
            return redirect()->route('filament.admin.auth.login')
                ->with('error', 'Please login to leave a comment');
        }

        $request->validate([
            'comment' => 'required|string|min:10|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        // Check if user already commented
        $existingComment = ThemeComment::where('theme_id', $theme->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingComment) {
            // Update existing comment
            $existingComment->update([
                'comment' => $request->comment,
                'rating' => $request->rating,
            ]);

            return redirect()->back()->with('success', 'Your comment has been updated!');
        }

        // Create new comment
        ThemeComment::create([
            'theme_id' => $theme->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
            'is_approved' => true, // Auto-approve (can be changed for moderation)
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    /**
     * Delete user's own comment
     */
    public function deleteComment(Theme $theme)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $comment = ThemeComment::where('theme_id', $theme->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($comment) {
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