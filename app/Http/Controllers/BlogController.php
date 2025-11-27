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

        return view('blog.index', [
            'user'           => $user,
            'theme'          => $activeTheme,
            'posts'          => $posts,
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

        return view('blog.show', [
            'user'           => $user,
            'theme'          => $activeTheme,
            'post'           => $blog,
            'headerContent'  => PageContent::getSection('header', $user->id),
            'footerContent'  => PageContent::getSection('footer', $user->id),
        ]);
    }
}


