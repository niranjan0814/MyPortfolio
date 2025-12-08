@props(['user', 'post', 'headerContent', 'footerContent'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Blog Show Component
       ========================================== */

    :root {
        /* DARK THEME (Cosmic Neon) - Default */
        --t1-bg-primary: #0B0F1A;
        --t1-bg-secondary: #0F0A21;
        --t1-surface-card: rgba(26, 16, 51, 0.6);
        --t1-text-primary: #FFFFFF;
        --t1-text-secondary: #C7C7D2;
        --t1-text-muted: #9A9AB3;
        --t1-accent-primary: #A56BFF;
        --t1-accent-glow: #C68BFF;
        --t1-accent-secondary: #F0B54A;
        --t1-accent-secondary-glow: #F7CA57;
        --t1-glow-color: rgba(145, 80, 255, 0.35);
        --t1-icon-glow: rgba(168, 100, 255, 0.6);
        --t1-btn-glow: rgba(130, 70, 255, 0.4);
        --t1-card-shadow: 0 8px 32px 0 rgba(120, 60, 255, 0.25);
        --t1-gradient-primary: linear-gradient(135deg, #A56BFF 0%, #5E3AE8 100%);
        --t1-gradient-secondary: linear-gradient(135deg, #FBD16B 0%, #E8A93C 100%);
        --t1-border-color: rgba(165, 107, 255, 0.2);
    }

    [data-theme="light"] {
        /* LIGHT THEME (Aurora Soft Light) */
        --t1-bg-primary: #F8F9FC;
        --t1-bg-secondary: #FAFBFF;
        --t1-surface-card: rgba(255, 255, 255, 0.7);
        --t1-text-primary: #1A1D23;
        --t1-text-secondary: #6B7280;
        --t1-text-muted: #9CA3AF;
        --t1-accent-primary: #7A5AF8;
        --t1-accent-glow: #8F6BFF;
        --t1-accent-secondary: #E89B0C;
        --t1-accent-secondary-glow: #F7B52C;
        --t1-glow-color: rgba(122, 90, 248, 0.12);
        --t1-icon-glow: rgba(122, 90, 248, 0.2);
        --t1-btn-glow: rgba(122, 90, 248, 0.15);
        --t1-card-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.06);
        --t1-gradient-primary: linear-gradient(135deg, #8B5CFF 0%, #5E3AE8 100%);
        --t1-gradient-secondary: linear-gradient(135deg, #F7C95A 0%, #E8A93C 100%);
        --t1-border-color: rgba(122, 90, 248, 0.15);
    }

    /* Page Layout */
    .t1-blog-show-page {
        padding: 8rem 0 4rem;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-primary);
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
    }

    .t1-blog-show-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Breadcrumbs */
    .t1-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
        font-size: 0.9rem;
        color: var(--t1-text-muted);
    }

    .t1-breadcrumb-link {
        color: var(--t1-text-muted);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .t1-breadcrumb-link:hover {
        color: var(--t1-accent-primary);
    }

    .t1-breadcrumb-separator {
        width: 16px;
        height: 16px;
        opacity: 0.5;
    }

    .t1-breadcrumb-current {
        color: var(--t1-text-primary);
        font-weight: 600;
    }

    /* Header Section */
    .t1-blog-header {
        text-align: center;
        margin-bottom: 3rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .t1-post-date {
        display: inline-block;
        padding: 0.25rem 1rem;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        border-radius: 99px;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t1-accent-primary);
        margin-bottom: 1.5rem;
        backdrop-filter: blur(10px);
    }

    .t1-post-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
    }

    /* Hero Image */
    .t1-hero-image {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto 4rem;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: var(--t1-card-shadow);
        border: 1px solid var(--t1-border-color);
        position: relative;
    }

    .t1-hero-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Content Styling */
    .t1-blog-content {
        max-width: 800px;
        margin: 0 auto;
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--t1-text-secondary);
    }

    .t1-blog-content h1, .t1-blog-content h2, .t1-blog-content h3, .t1-blog-content h4, .t1-blog-content h5, .t1-blog-content h6 {
        color: var(--t1-text-primary);
        font-weight: 700;
        margin-top: 2.5rem;
        margin-bottom: 1rem;
    }

    .t1-blog-content h2 { font-size: 2rem; }
    .t1-blog-content h3 { font-size: 1.5rem; }
    .t1-blog-content h4 { font-size: 1.25rem; }

    .t1-blog-content p {
        margin-bottom: 1.5rem;
    }

    .t1-blog-content a {
        color: var(--t1-accent-primary);
        text-decoration: none;
        border-bottom: 1px solid transparent;
        transition: border-color 0.3s ease;
    }

    .t1-blog-content a:hover {
        border-color: var(--t1-accent-primary);
    }

    .t1-blog-content img {
        border-radius: 1rem;
        margin: 2rem 0;
        width: 100%;
        border: 1px solid var(--t1-border-color);
    }

    .t1-blog-content blockquote {
        border-left: 4px solid var(--t1-accent-primary);
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: var(--t1-text-muted);
        background: rgba(255, 255, 255, 0.03);
        padding: 1.5rem;
        border-radius: 0 1rem 1rem 0;
    }

    .t1-blog-content code {
        background: rgba(255, 255, 255, 0.05);
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        color: var(--t1-accent-secondary);
    }

    [data-theme="light"] .t1-blog-content code {
        background: rgba(0, 0, 0, 0.05);
    }

    .t1-blog-content pre {
        background: #0B0F1A;
        padding: 1.5rem;
        border-radius: 1rem;
        overflow-x: auto;
        margin: 2rem 0;
        border: 1px solid var(--t1-border-color);
    }

    [data-theme="light"] .t1-blog-content pre {
        background: rgba(0, 0, 0, 0.05);
    }

    .t1-blog-content pre code {
        background: transparent;
        padding: 0;
        color: #C7C7D2;
    }

    /* Comments Section */
    .t1-comments-section {
        max-width: 800px;
        margin: 6rem auto 4rem;
        padding-top: 3rem;
        border-top: 1px solid var(--t1-border-color);
    }

    .t1-comments-header {
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .t1-comments-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t1-text-primary);
    }

    /* Comment Form */
    .t1-comment-form {
        margin-bottom: 3rem;
    }

    .t1-form-textarea {
        width: 100%;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        border-radius: 0.75rem;
        color: var(--t1-text-primary);
        font-family: inherit;
        font-size: 1rem;
        resize: vertical;
        min-height: 120px;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-form-textarea {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-form-textarea::placeholder {
        color: var(--t1-text-muted);
    }

    .t1-form-textarea:focus {
        outline: none;
        border-color: var(--t1-accent-primary);
        box-shadow: 0 0 0 3px var(--t1-glow-color);
    }

    .t1-submit-btn {
        padding: 0.75rem 2rem;
        background: var(--t1-gradient-primary);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px var(--t1-btn-glow);
        margin-top: 1rem;
    }

    .t1-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px var(--t1-btn-glow);
    }

    /* Comment List */
    .t1-comment-list {
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .t1-comment-item {
        display: flex;
        gap: 1rem;
    }

    .t1-comment-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--t1-accent-primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .t1-comment-body {
        flex-grow: 1;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--t1-border-color);
        border-radius: 0.75rem;
        padding: 1.5rem;
    }

    [data-theme="light"] .t1-comment-body {
        background: rgba(255, 255, 255, 0.4);
    }

    .t1-comment-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
    }

    .t1-comment-author {
        font-weight: 600;
        color: var(--t1-text-primary);
    }

    .t1-comment-time {
        font-size: 0.875rem;
        color: var(--t1-text-muted);
    }

    .t1-comment-text {
        color: var(--t1-text-secondary);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .t1-comment-actions {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .t1-action-link {
        color: var(--t1-accent-primary);
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        transition: opacity 0.3s ease;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
    }

    .t1-action-link:hover {
        opacity: 0.7;
    }

    .t1-delete-link {
        color: #ef4444;
    }

    .t1-reply-form {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid var(--t1-border-color);
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.2;
        z-index: 0;
        animation: t1-blob-float 15s infinite alternate;
    }

    .t1-blob-1 { top: 10%; right: 10%; width: 500px; height: 500px; background: var(--t1-accent-glow); }
    .t1-blob-2 { bottom: 10%; left: 10%; width: 400px; height: 400px; background: var(--t1-accent-secondary); animation-delay: -7s; }

    @keyframes t1-blob-float {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(40px, -40px) scale(1.1); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .t1-post-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 640px) {
        .t1-blog-show-page {
            padding: 5rem 0 2rem;
        }

        .t1-blog-show-container {
            padding: 0 1rem;
        }

        .t1-blog-header {
            margin-bottom: 2rem;
        }

        .t1-post-title {
            font-size: 1.75rem;
        }

        .t1-blog-content {
            font-size: 1rem;
        }

        .t1-hero-image {
            margin-bottom: 2rem;
        }

        .t1-comments-section {
            margin-top: 3rem;
        }

        .t1-comment-item {
            gap: 0.75rem;
        }

        .t1-comment-avatar {
            width: 36px;
            height: 36px;
            font-size: 0.9rem;
        }

        .t1-comment-body {
            padding: 1rem;
        }
    }
</style>

<div class="t1-blog-show-page">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-blog-show-container">
        <!-- Breadcrumbs -->
        <nav class="t1-breadcrumbs">
            <a href="{{ route('portfolio.show', $user->slug) }}" class="t1-breadcrumb-link">Home</a>
            <svg class="t1-breadcrumb-separator" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('portfolio.show', $user->slug) }}#blog" class="t1-breadcrumb-link">Blog</a>
            <svg class="t1-breadcrumb-separator" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="t1-breadcrumb-current">{{ $post->title }}</span>
        </nav>

        <!-- Header -->
        <div class="t1-blog-header">
            <div class="t1-post-date">
                {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Draft' }}
            </div>
            <h1 class="t1-post-title">{{ $post->title }}</h1>
        </div>

        <!-- Hero Image -->
        @if($post->hero_image_path)
            <div class="t1-hero-image">
                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}">
            </div>
        @endif

        <!-- Content -->
        <div class="t1-blog-content">
            {!! $post->content !!}
        </div>

        <!-- Comments Section -->
        <div class="t1-comments-section">
            <div class="t1-comments-header">
                <h2 class="t1-comments-title">Comments ({{ $post->comments->count() }})</h2>
            </div>

            <!-- Comment Form -->
            @auth
                <form action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="t1-comment-form">
                    @csrf
                    <textarea name="comment" class="t1-form-textarea" placeholder="Share your thoughts..." required></textarea>
                    <button type="submit" class="t1-submit-btn">Post Comment</button>
                </form>
            @else
                <div style="text-align: center; padding: 2rem; background: var(--t1-surface-card); border-radius: 1rem; border: 1px solid var(--t1-border-color);">
                    <p style="color: var(--t1-text-secondary); margin-bottom: 1rem;">Please login to join the discussion.</p>
                    <a href="{{ route('filament.admin.auth.login') }}" class="t1-submit-btn" style="text-decoration: none; display: inline-block;">Login</a>
                </div>
            @endauth

            <!-- Comments List -->
            <div class="t1-comment-list">
                @forelse($post->comments->whereNull('parent_id') as $comment)
                    <div class="t1-comment-item">
                        <div class="t1-comment-avatar">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                        <div class="t1-comment-body">
                            <div class="t1-comment-meta">
                                <span class="t1-comment-author">{{ $comment->user->name }}</span>
                                <span class="t1-comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="t1-comment-text">{{ $comment->comment }}</div>
                            
                            <div class="t1-comment-actions">
                                @auth
                                    <button onclick="toggleReplyForm('{{ $comment->id }}')" class="t1-action-link">Reply</button>
                                @endauth
                                
                                @if(auth()->id() === $comment->user_id)
                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug, 'comment' => $comment->id]) }}" method="POST" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="t1-action-link t1-delete-link" onclick="return confirm('Delete this comment?')">Delete</button>
                                    </form>
                                @endif
                            </div>

                            <!-- Reply Form -->
                            <form id="replyForm{{ $comment->id }}" 
                                  action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" 
                                  method="POST" 
                                  class="t1-reply-form hidden"
                                  style="display: none;">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <div style="margin-bottom: 1rem;">
                                    <textarea name="comment" class="t1-form-textarea" placeholder="Write a reply..." required style="min-height: 80px;"></textarea>
                                </div>
                                <div style="display: flex; gap: 1rem;">
                                    <button type="submit" class="t1-submit-btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Reply</button>
                                    <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')"
                                            style="padding: 0.5rem 1rem; background: transparent; border: 1px solid var(--t1-border-color); color: var(--t1-text-muted); border-radius: 0.75rem; cursor: pointer;">
                                        Cancel
                                    </button>
                                </div>
                            </form>

                            <!-- Replies -->
                            @if($comment->replies->count() > 0)
                                <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
                                    @foreach($comment->replies as $reply)
                                        <div class="t1-comment-item">
                                            <div class="t1-comment-avatar" style="width: 36px; height: 36px; font-size: 0.9rem;">
                                                {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                            </div>
                                            <div class="t1-comment-body">
                                                <div class="t1-comment-meta">
                                                    <span class="t1-comment-author" style="font-size: 0.95rem;">{{ $reply->user->name }}</span>
                                                    <span class="t1-comment-time" style="font-size: 0.8rem;">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="t1-comment-text" style="font-size: 0.95rem;">{{ $reply->comment }}</div>
                                                
                                                @if(auth()->id() === $reply->user_id)
                                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug, 'comment' => $reply->id]) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="t1-action-link t1-delete-link" style="font-size: 0.8rem;" onclick="return confirm('Delete this reply?')">Delete</button>
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
                    <div style="text-align: center; padding: 2rem; border: 1px dashed var(--t1-border-color); border-radius: 1rem;">
                        <p style="color: var(--t1-text-muted);">No comments yet. Be the first to share your thoughts!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

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
