@props(['posts', 'user'])

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

    .t2-blog-section {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-blog-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .t2-blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t2-blog-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .t2-blog-card {
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: var(--t2-shadow);
        text-decoration: none;
    }

    .t2-blog-card:hover {
        transform: translateY(-10px);
        border-color: var(--t2-accent);
    }

    .t2-blog-image {
        width: 100%;
        aspect-ratio: 16/9;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .t2-blog-card:hover .t2-blog-image {
        transform: scale(1.05);
    }

    .t2-blog-content {
        padding: 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .t2-blog-date {
        font-size: 0.85rem;
        color: var(--t2-accent);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .t2-blog-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t2-text-main);
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .t2-blog-excerpt {
        color: var(--t2-text-sub);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .t2-blog-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--t2-text-main);
        transition: color 0.3s ease;
    }

    .t2-blog-card:hover .t2-blog-link {
        color: var(--t2-accent);
    }
</style>

@if($user && $user->isPremium() && $posts->isNotEmpty())
    <section id="blog" class="t2-blog-section">
        <div class="t2-container">
            <div class="t2-title-wrapper">
                <h2 class="t2-title">Latest Insights</h2>
                <div class="t2-subtitle">Thoughts, tutorials, and updates on my journey and technology.</div>
            </div>

            <div class="t2-blog-grid">
                @foreach($posts->take(6) as $post)
                    <a href="{{ route('portfolio.blog.show', [$user, $post]) }}" class="t2-blog-card group">
                        <div class="overflow-hidden">
                            @if($post->hero_image_path)
                                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}" class="t2-blog-image">
                            @else
                                <div class="t2-blog-image bg-[var(--t2-surface)] flex items-center justify-center">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--t2-text-sub);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                </div>
                            @endif
                        </div>

                        <div class="t2-blog-content">
                            @if($post->published_at)
                                <div class="t2-blog-date">{{ $post->published_at->format('M j, Y') }}</div>
                            @endif
                            
                            <h3 class="t2-blog-title">{{ $post->title }}</h3>
                            
                            @if($post->excerpt)
                                <p class="t2-blog-excerpt">{{ $post->excerpt }}</p>
                            @endif

                            <div class="t2-blog-link">
                                Read Article
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($posts->count() > 6)
                <div class="text-center mt-12">
                    <a href="{{ route('portfolio.blog.index', $user->slug) }}" class="t2-btn t2-btn-outline" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 2rem; border-radius: 100px; border: 1px solid var(--t2-border); color: var(--t2-text-main); text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                        View All Posts
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif