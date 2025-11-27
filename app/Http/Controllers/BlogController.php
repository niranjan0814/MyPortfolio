<?php

namespace App\Http\Controllers;

use App\Helpers\ThemeHelper;
use App\Models\Blog;
use App\Models\PageContent;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Public blog list for a user's portfolio.
     * URL: /portfolio/{user}/blog
     */
    public function index(User $user)
    {
        // Only premium users expose a blog section
        if (!$user->isPremium()) {
            abort(404);
        }

        $previewTheme = request('preview') ? request('theme') : null;
        $activeTheme = ThemeHelper::getActiveTheme($user, $previewTheme);

        $posts = Blog::published()
            ->where('user_id', $user->id)
            ->orderByDesc('published_at')
            ->paginate(6);

        // Fetch recent posts for the header menu check
        $blogPosts = collect();
        if ($user->isPremium()) {
            $blogPosts = Blog::published()
                ->where('user_id', $user->id)
                ->orderByDesc('published_at')
                ->take(6)
                ->get();
        }

        return view('blog.index', [
            'user'           => $user,
            'theme'          => $activeTheme,
            'posts'          => $posts,
            'blogPosts'      => $blogPosts, // Passed for header
            'headerContent'  => PageContent::getSection('header', $user->id),
            'footerContent'  => PageContent::getSection('footer', $user->id),
        ]);
    }

    /**
     * Public blog detail page.
     * URL: /portfolio/{user}/blog/{blog}
     */
    public function show(User $user, Blog $blog)
    {
        // Ensure the post belongs to this user and is published
        if ($blog->user_id !== $user->id || !$blog->is_published) {
            abort(404);
        }

        if (!$user->isPremium()) {
            abort(404);
        }

        $previewTheme = request('preview') ? request('theme') : null;
        $activeTheme = ThemeHelper::getActiveTheme($user, $previewTheme);

        // Fetch recent posts for the header menu check
        $blogPosts = collect();
        if ($user->isPremium()) {
            $blogPosts = Blog::published()
                ->where('user_id', $user->id)
                ->orderByDesc('published_at')
                ->take(6)
                ->get();
        }

        // Load comments
        $blog->load(['comments.user', 'comments.replies.user']);

        return view('blog.show', [
            'user'           => $user,
            'theme'          => $activeTheme,
            'post'           => $blog,
            'blogPosts'      => $blogPosts, // Passed for header
            'headerContent'  => PageContent::getSection('header', $user->id),
            'footerContent'  => PageContent::getSection('footer', $user->id),
        ]);
    }

    public function storeComment(\Illuminate\Http\Request $request, User $user, Blog $blog)
    {
        $validated = $request->validate([
            'comment'   => 'required|string|min:3|max:1000',
            'parent_id' => 'nullable|exists:theme_comments,id',
        ]);

        auth()->user()->themeComments()->create([
            'blog_id'     => $blog->id,
            'comment'     => $validated['comment'],
            'parent_id'   => $validated['parent_id'] ?? null,
            'category'    => 'blog',
            'is_approved' => true,
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }

    public function deleteComment(\Illuminate\Http\Request $request, User $user, Blog $blog)
    {
        $commentId = $request->input('comment_id');
        
        $comment = \App\Models\ThemeComment::where('id', $commentId)
            ->where('blog_id', $blog->id)
            ->where('user_id', auth()->id())
            ->where('category', 'blog')
            ->first();

        if ($comment) {
            $comment->delete();
            return back()->with('success', 'Comment deleted successfully');
        }

        return back()->with('error', 'Comment not found or unauthorized');
    }
}


