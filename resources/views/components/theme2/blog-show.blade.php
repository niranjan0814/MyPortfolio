{{-- resources/views/components/theme2/blog-show.blade.php --}}

@props(['user', 'post', 'headerContent'])

<style>
    /* Reuse Theme 2 Variables */
    :root {
        --t2-bg: #F8F9FA;
        --t2-text-main: #2C2E3E;
        --t2-text-sub: #6B7280;
        --t2-accent: #E89B0C;
        --t2-accent-hover: #D97706;
        --t2-surface: #FFFFFF;
        --t2-border: rgba(44, 46, 62, 0.08);
        --t2-card-bg: #FFFFFF;
        --t2-glass-border: rgba(44, 46, 62, 0.05);
        --t2-shadow: 0 20px 60px rgba(233, 155, 12, 0.12);
        --t2-gradient: linear-gradient(135deg, #E89B0C 0%, #D97706 100%);
    }

    [data-theme="dark"] {
        --t2-bg: #2C2E3E;
        --t2-text-main: #FFFFFF;
        --t2-text-sub: #E5E7EB;
        --t2-accent: #F5A623;
        --t2-accent-hover: #E09612;
        --t2-surface: rgba(255, 255, 255, 0.05);
        --t2-border: rgba(255, 255, 255, 0.1);
        --t2-card-bg: rgba(255, 255, 255, 0.03);
        --t2-glass-border: rgba(255, 255, 255, 0.1);
        --t2-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        --t2-gradient: linear-gradient(135deg, #F5A623 0%, #D97706 100%);
    }

    .t2-blog-show {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        min-height: 100vh;
        padding: 6rem 0 12rem;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: var(--t2-text-sub);
        margin-bottom: 3rem;
    }

    .t2-breadcrumbs a {
        color: var(--t2-text-sub);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .t2-breadcrumbs a:hover {
        color: var(--t2-accent);
    }

    .t2-breadcrumbs span {
        opacity: 0.5;
    }

    .t2-blog-header {
        margin-bottom: 3rem;
        text-align: center;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .t2-blog-date {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        border-radius: 100px;
        color: var(--t2-accent);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .t2-blog-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        color: var(--t2-text-main);
        margin-bottom: 1.5rem;
    }

    .t2-blog-hero-image {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto 4rem;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--t2-shadow);
        border: 1px solid var(--t2-glass-border);
    }

    .t2-blog-hero-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .t2-blog-content {
        max-width: 800px;
        margin: 0 auto;
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--t2-text-sub);
    }

    .t2-blog-content h2, .t2-blog-content h3 {
        color: var(--t2-text-main);
        font-weight: 700;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
    }

    .t2-blog-content p {
        margin-bottom: 1.5rem;
    }

    .t2-blog-content a {
        color: var(--t2-accent);
        text-decoration: none;
        border-bottom: 1px solid transparent;
        transition: border-color 0.3s ease;
    }

    .t2-blog-content a:hover {
        border-color: var(--t2-accent);
    }

    /* Comments */
    .t2-comments-section {
        max-width: 800px;
        margin: 6rem auto 4rem;
        padding-top: 3rem;
        border-top: 1px solid var(--t2-border);
    }

    .t2-comments-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .t2-comments-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t2-text-main);
    }

    .t2-comment-form textarea {
        width: 100%;
        padding: 1rem;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        border-radius: 12px;
        color: var(--t2-text-main);
        font-family: inherit;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .t2-comment-form textarea:focus {
        outline: none;
        border-color: var(--t2-accent);
        box-shadow: 0 0 0 3px rgba(233, 155, 12, 0.1);
    }

    .t2-comment-btn {
        padding: 0.75rem 1.5rem;
        background: var(--t2-gradient);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .t2-comment-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(233, 155, 12, 0.3);
    }

    .t2-comment-list {
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .t2-comment-item {
        display: flex;
        gap: 1rem;
    }

    .t2-comment-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: var(--t2-accent);
        flex-shrink: 0;
    }

    .t2-comment-body {
        flex: 1;
    }

    .t2-comment-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .t2-comment-author {
        font-weight: 700;
        color: var(--t2-text-main);
    }

    .t2-comment-time {
        font-size: 0.85rem;
        color: var(--t2-text-sub);
    }

    .t2-comment-text {
        color: var(--t2-text-sub);
        line-height: 1.6;
        margin-bottom: 0.5rem;
    }

    .t2-comment-actions {
        display: flex;
        gap: 1rem;
    }

    .t2-action-link {
        font-size: 0.85rem;
        color: var(--t2-text-sub);
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .t2-action-link:hover {
        color: var(--t2-accent);
    }

    .t2-reply-form {
        margin-top: 1rem;
        padding-left: 1rem;
        border-left: 2px solid var(--t2-border);
    }
</style>

<section class="t2-blog-show">
    <div class="t2-container">
        <!-- Breadcrumbs -->
        <div class="t2-breadcrumbs">
            <a href="{{ route('portfolio.show', $user->slug) }}">Home</a>
            <span>/</span>
            <a href="{{ route('portfolio.show', $user->slug) }}#blog">Blog</a>
            <span>/</span>
            <span style="color: var(--t2-text-main);">{{ $post->title }}</span>
        </div>

        <!-- Header -->
        <div class="t2-blog-header">
            <div class="t2-blog-date">
                {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Draft' }}
            </div>
            <h1 class="t2-blog-title">{{ $post->title }}</h1>
        </div>

        <!-- Hero Image -->
        @if($post->hero_image_path)
            <div class="t2-blog-hero-image">
                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <!-- Content -->
        <div class="t2-blog-content">
            {!! $post->content !!}
        </div>

        <!-- Comments -->
        <div class="t2-comments-section">
            <div class="t2-comments-header">
                <h2 class="t2-comments-title">Comments ({{ $post->comments->count() }})</h2>
            </div>

            @auth
                <form action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="t2-comment-form">
                    @csrf
                    <textarea name="comment" rows="4" required placeholder="Share your thoughts..."></textarea>
                    <button type="submit" class="t2-comment-btn">Post Comment</button>
                </form>
            @else
                <div style="text-align: center; padding: 2rem; background: var(--t2-surface); border-radius: 12px; border: 1px solid var(--t2-glass-border);">
                    <p style="color: var(--t2-text-sub); margin-bottom: 1rem;">Please login to join the discussion.</p>
                    <a href="{{ route('filament.admin.auth.login') }}" class="t2-comment-btn" style="text-decoration: none; display: inline-block;">Login</a>
                </div>
            @endauth

            <div class="t2-comment-list">
                @forelse($post->comments as $comment)
                    <div class="t2-comment-item">
                        <div class="t2-comment-avatar">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                        <div class="t2-comment-body">
                            <div class="t2-comment-meta">
                                <span class="t2-comment-author">{{ $comment->user->name }}</span>
                                <span class="t2-comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="t2-comment-text">{{ $comment->comment }}</div>
                            
                            <div class="t2-comment-actions">
                                @auth
                                    <button onclick="toggleReplyForm('{{ $comment->id }}')" class="t2-action-link">Reply</button>
                                @endauth
                                
                                @if(auth()->id() === $comment->user_id)
                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <button type="submit" class="t2-action-link" style="color: #ef4444;">Delete</button>
                                    </form>
                                @endif
                            </div>

                            <!-- Reply Form -->
                            <form id="replyForm{{ $comment->id }}" 
                                  action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" 
                                  method="POST" 
                                  class="t2-reply-form hidden">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <div style="margin-bottom: 1rem;">
                                    <textarea name="comment" rows="3" required 
                                              style="width: 100%; padding: 0.75rem; background: var(--t2-surface); border: 1px solid var(--t2-glass-border); border-radius: 8px; color: var(--t2-text-main);"
                                              placeholder="Write a reply..."></textarea>
                                </div>
                                <div style="display: flex; gap: 1rem;">
                                    <button type="submit" class="t2-comment-btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Reply</button>
                                    <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')"
                                            style="padding: 0.5rem 1rem; background: transparent; border: 1px solid var(--t2-border); color: var(--t2-text-sub); border-radius: 8px; cursor: pointer;">
                                        Cancel
                                    </button>
                                </div>
                            </form>

                            <!-- Replies -->
                            @if($comment->replies->count() > 0)
                                <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
                                    @foreach($comment->replies as $reply)
                                        <div class="t2-comment-item">
                                            <div class="t2-comment-avatar" style="width: 36px; height: 36px; font-size: 0.8rem;">
                                                {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                            </div>
                                            <div class="t2-comment-body">
                                                <div class="t2-comment-meta">
                                                    <span class="t2-comment-author" style="font-size: 0.95rem;">{{ $reply->user->name }}</span>
                                                    <span class="t2-comment-time" style="font-size: 0.8rem;">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="t2-comment-text" style="font-size: 0.95rem;">{{ $reply->comment }}</div>
                                                
                                                @if(auth()->id() === $reply->user_id)
                                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                                        <button type="submit" class="t2-action-link" style="color: #ef4444; font-size: 0.8rem;">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div style="text-align: center; padding: 2rem; border: 1px dashed var(--t2-border); border-radius: 12px;">
                        <p style="color: var(--t2-text-sub);">No comments yet. Be the first to share your thoughts!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
    function toggleReplyForm(id) {
        const form = document.getElementById('replyForm' + id);
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
            form.style.display = 'block';
        } else {
            form.classList.add('hidden');
            form.style.display = 'none';
        }
    }
</script>
