@props(['user', 'post', 'headerContent', 'footerContent'])

<style>
    /* ============================================
       THEME 3 BLOG SHOW - IMMERSIVE DESIGN
       ============================================ */
    
    :root {
        --t3-blog-bg: #f8fafc;
        --t3-blog-surface: #ffffff;
        --t3-blog-text: #1a202c;
        --t3-blog-text-muted: #4a5568;
        --t3-blog-accent: #00cc7a;
        --t3-blog-accent-2: #0099cc;
        --t3-blog-border: rgba(0, 204, 122, 0.15);
        --t3-blog-shadow: 0 15px 50px rgba(0, 204, 122, 0.12);
        --t3-blog-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
    }

    [data-theme="dark"] {
        --t3-blog-bg: #0a0a12;
        --t3-blog-surface: #151522;
        --t3-blog-text: #ffffff;
        --t3-blog-text-muted: #b4c6e0;
        --t3-blog-accent: #00ff9d;
        --t3-blog-accent-2: #00d4ff;
        --t3-blog-border: rgba(0, 255, 157, 0.15);
        --t3-blog-shadow: 0 15px 50px rgba(0, 255, 157, 0.25);
        --t3-blog-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
    }

    /* Section */
    .t3-post-section {
        background: var(--t3-blog-bg);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        padding-top: 80px; /* Space for fixed header */
    }

    /* Background Orbs */
    .t3-post-orb {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-blog-gradient);
        filter: blur(120px);
        opacity: 0.08;
        pointer-events: none;
        z-index: 0;
    }

    .t3-post-orb-1 { width: 600px; height: 600px; top: -10%; left: -10%; }
    .t3-post-orb-2 { width: 500px; height: 500px; bottom: 10%; right: -10%; }

    /* Container */
    .t3-post-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 4rem 2rem;
        position: relative;
        z-index: 10;
    }

    /* Breadcrumbs */
    .t3-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 3rem;
        font-size: 0.9375rem;
        color: var(--t3-blog-text-muted);
    }

    .t3-breadcrumb-link {
        color: var(--t3-blog-text);
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .t3-breadcrumb-link:hover {
        color: var(--t3-blog-accent);
    }

    .t3-breadcrumb-separator {
        color: var(--t3-blog-border);
    }

    /* Hero */
    .t3-post-hero {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t3-post-meta {
        display: inline-flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .t3-post-date {
        padding: 0.5rem 1rem;
        background: rgba(0, 204, 122, 0.1);
        border: 1px solid var(--t3-blog-border);
        border-radius: 100px;
        color: var(--t3-blog-accent);
        font-weight: 600;
        font-size: 0.875rem;
    }

    .t3-post-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        line-height: 1.2;
        color: var(--t3-blog-text);
        margin-bottom: 2rem;
        letter-spacing: -0.02em;
    }

    .t3-post-image-wrapper {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--t3-blog-shadow);
        border: 1px solid var(--t3-blog-border);
        margin-bottom: 4rem;
    }

    .t3-post-image {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Content */
    .t3-post-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--t3-blog-text-muted);
    }

    .t3-post-content p { margin-bottom: 1.5rem; }
    .t3-post-content h2 { 
        font-size: 2rem; 
        font-weight: 800; 
        color: var(--t3-blog-text); 
        margin: 3rem 0 1.5rem; 
    }
    .t3-post-content h3 { 
        font-size: 1.5rem; 
        font-weight: 700; 
        color: var(--t3-blog-text); 
        margin: 2.5rem 0 1.25rem; 
    }
    .t3-post-content ul, .t3-post-content ol { 
        margin-bottom: 1.5rem; 
        padding-left: 1.5rem; 
    }
    .t3-post-content li { margin-bottom: 0.5rem; }
    .t3-post-content blockquote {
        border-left: 4px solid var(--t3-blog-accent);
        padding-left: 1.5rem;
        font-style: italic;
        color: var(--t3-blog-text);
        margin: 2rem 0;
    }
    .t3-post-content a {
        color: var(--t3-blog-accent);
        text-decoration: underline;
        text-decoration-thickness: 2px;
        text-underline-offset: 2px;
    }

    /* Comments */
    .t3-comments-section {
        margin-top: 6rem;
        padding-top: 4rem;
        border-top: 1px solid var(--t3-blog-border);
    }

    .t3-comments-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .t3-comments-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--t3-blog-text);
    }

    .t3-comments-count {
        padding: 0.25rem 0.75rem;
        background: var(--t3-blog-gradient);
        color: white;
        border-radius: 100px;
        font-weight: 700;
        font-size: 0.875rem;
    }

    /* Comment Form */
    .t3-comment-form {
        background: var(--t3-blog-surface);
        border: 1px solid var(--t3-blog-border);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 4rem;
        box-shadow: var(--t3-blog-shadow);
    }

    .t3-form-textarea {
        width: 100%;
        background: rgba(0,0,0,0.03);
        border: 1px solid var(--t3-blog-border);
        border-radius: 12px;
        padding: 1rem;
        font-size: 1rem;
        color: var(--t3-blog-text);
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .t3-form-textarea {
        background: rgba(255,255,255,0.05);
    }

    .t3-form-textarea:focus {
        outline: none;
        border-color: var(--t3-blog-accent);
        box-shadow: 0 0 0 3px rgba(0, 204, 122, 0.1);
    }

    .t3-btn-submit {
        padding: 0.75rem 2rem;
        background: var(--t3-blog-gradient);
        color: white;
        font-weight: 700;
        border-radius: 100px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .t3-btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 204, 122, 0.2);
    }

    /* Comment List */
    .t3-comment {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .t3-comment-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--t3-blog-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .t3-comment-body {
        flex: 1;
    }

    .t3-comment-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .t3-comment-author {
        font-weight: 700;
        color: var(--t3-blog-text);
        font-size: 1.125rem;
    }

    .t3-comment-time {
        font-size: 0.875rem;
        color: var(--t3-blog-text-muted);
    }

    .t3-comment-text {
        color: var(--t3-blog-text-muted);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .t3-comment-actions {
        display: flex;
        gap: 1rem;
    }

    .t3-btn-action {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t3-blog-accent);
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
    }

    .t3-btn-action:hover {
        text-decoration: underline;
    }

    .t3-reply-form {
        margin-top: 1.5rem;
        padding-left: 1rem;
        border-left: 2px solid var(--t3-blog-border);
    }

    .t3-replies {
        margin-top: 2rem;
        padding-left: 2rem;
        border-left: 2px solid var(--t3-blog-border);
    }

    /* Login Prompt */
    .t3-login-prompt {
        text-align: center;
        padding: 3rem;
        border: 2px dashed var(--t3-blog-border);
        border-radius: 20px;
        margin-bottom: 4rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .t3-post-title { font-size: 2.5rem; }
        .t3-post-container { padding: 2rem 1.5rem; }
        .t3-comment { gap: 1rem; }
        .t3-comment-avatar { width: 40px; height: 40px; font-size: 1rem; }
    }
</style>

<section class="t3-post-section">
    <!-- Background Orbs -->
    <div class="t3-post-orb t3-post-orb-1"></div>
    <div class="t3-post-orb t3-post-orb-2"></div>

    <div class="t3-post-container">
        <!-- Breadcrumbs -->
        <nav class="t3-breadcrumbs">
            <a href="{{ route('portfolio.show', $user->slug) }}" class="t3-breadcrumb-link">Home</a>
            <span class="t3-breadcrumb-separator">/</span>
            <a href="{{ route('portfolio.show', $user->slug) }}#blog" class="t3-breadcrumb-link">Blog</a>
            <span class="t3-breadcrumb-separator">/</span>
            <span>{{ Str::limit($post->title, 30) }}</span>
        </nav>

        <!-- Hero -->
        <div class="t3-post-hero">
            <div class="t3-post-meta">
                @if($post->published_at)
                    <span class="t3-post-date">{{ $post->published_at->format('F d, Y') }}</span>
                @else
                    <span class="t3-post-date">Draft</span>
                @endif
            </div>
            
            <h1 class="t3-post-title">{{ $post->title }}</h1>
        </div>

        <!-- Hero Image -->
        @if($post->hero_image_path)
            <div class="t3-post-image-wrapper">
                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}" class="t3-post-image">
            </div>
        @endif

        <!-- Content -->
        <article class="t3-post-content">
            {!! $post->content !!}
        </article>

        <!-- Comments -->
        <div class="t3-comments-section">
            <div class="t3-comments-header">
                <h2 class="t3-comments-title">Comments</h2>
                <span class="t3-comments-count">{{ $post->comments->count() }}</span>
            </div>

            @auth
                <form action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="t3-comment-form">
                    @csrf
                    <textarea name="comment" rows="4" class="t3-form-textarea" placeholder="Share your thoughts..." required></textarea>
                    <button type="submit" class="t3-btn-submit">Post Comment</button>
                </form>
            @else
                <div class="t3-login-prompt">
                    <p style="margin-bottom: 1.5rem; color: var(--t3-blog-text-muted);">Please login to leave a comment.</p>
                    <a href="{{ route('filament.admin.auth.login') }}" class="t3-btn-submit">Login to Comment</a>
                </div>
            @endauth

            <div class="t3-comments-list">
                @foreach($post->comments as $comment)
                    <div class="t3-comment">
                        <div class="t3-comment-avatar">
                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                        </div>
                        <div class="t3-comment-body">
                            <div class="t3-comment-meta">
                                <span class="t3-comment-author">{{ $comment->user->name }}</span>
                                <span class="t3-comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="t3-comment-text">{{ $comment->comment }}</p>
                            
                            <div class="t3-comment-actions">
                                @auth
                                    <button onclick="toggleReplyForm('{{ $comment->id }}')" class="t3-btn-action">Reply</button>
                                @endauth
                                
                                @if(auth()->id() === $comment->user_id)
                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <button type="submit" class="t3-btn-action" style="color: #ef4444;">Delete</button>
                                    </form>
                                @endif
                            </div>

                            <!-- Reply Form -->
                            <form id="replyForm{{ $comment->id }}" action="{{ route('portfolio.blog.comment.store', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST" class="t3-reply-form" style="display: none;">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <textarea name="comment" rows="3" class="t3-form-textarea" placeholder="Write a reply..." required></textarea>
                                <div style="display: flex; gap: 1rem;">
                                    <button type="submit" class="t3-btn-submit" style="padding: 0.5rem 1.5rem; font-size: 0.875rem;">Reply</button>
                                    <button type="button" onclick="toggleReplyForm('{{ $comment->id }}')" class="t3-btn-action" style="color: var(--t3-blog-text-muted);">Cancel</button>
                                </div>
                            </form>

                            <!-- Nested Replies -->
                            @if($comment->replies->count() > 0)
                                <div class="t3-replies">
                                    @foreach($comment->replies as $reply)
                                        <div class="t3-comment">
                                            <div class="t3-comment-avatar" style="width: 40px; height: 40px; font-size: 1rem; background: var(--t3-blog-accent-2);">
                                                {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                            </div>
                                            <div class="t3-comment-body">
                                                <div class="t3-comment-meta">
                                                    <span class="t3-comment-author" style="font-size: 1rem;">{{ $reply->user->name }}</span>
                                                    <span class="t3-comment-time">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="t3-comment-text">{{ $reply->comment }}</p>
                                                
                                                @if(auth()->id() === $reply->user_id)
                                                    <form action="{{ route('portfolio.blog.comment.delete', ['user' => $user->slug, 'blog' => $post->slug]) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                                        <button type="submit" class="t3-btn-action" style="color: #ef4444;">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    function toggleReplyForm(id) {
        const form = document.getElementById('replyForm' + id);
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>
