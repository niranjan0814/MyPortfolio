@props(['posts', 'user'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Blog Component
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

    /* Section Layout */
    .t1-blog-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-secondary);
        font-family: 'Inter', sans-serif;
    }

    .t1-blog-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Title */
    .t1-title-wrapper {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t1-section-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 0.5rem;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }

    .t1-section-subtitle {
        font-size: 1.125rem;
        color: var(--t1-text-secondary);
        margin-bottom: 1rem;
    }

    .t1-title-underline {
        width: 80px;
        height: 4px;
        background: var(--t1-gradient-primary);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Blog Grid */
    .t1-blog-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .t1-blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t1-blog-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Blog Card */
    .t1-blog-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: var(--t1-card-shadow);
        text-decoration: none;
    }

    .t1-blog-card:hover {
        transform: translateY(-8px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 30px var(--t1-glow-color);
    }

    /* Blog Image */
    .t1-blog-image-wrapper {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(135deg, var(--t1-bg-secondary), var(--t1-bg-primary));
        border-bottom: 1px solid var(--t1-border-color);
    }

    .t1-blog-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .t1-blog-card:hover .t1-blog-image {
        transform: scale(1.1);
    }

    .t1-blog-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: var(--t1-accent-primary);
        opacity: 0.3;
    }

    /* Blog Content */
    .t1-blog-content {
        padding: 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .t1-blog-date {
        font-size: 0.875rem;
        color: var(--t1-accent-primary);
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .t1-blog-title {
        font-size: 1.5rem;
        font-weight: 700;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .t1-blog-excerpt {
        color: var(--t1-text-secondary);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .t1-blog-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--t1-text-primary);
        transition: all 0.3s ease;
    }

    .t1-blog-card:hover .t1-blog-link {
        color: var(--t1-accent-primary);
        gap: 0.75rem;
    }

    .t1-blog-link svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .t1-blog-card:hover .t1-blog-link svg {
        transform: translateX(4px);
    }

    /* View All Button */
    .t1-view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 2rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        border-radius: 9999px;
        color: var(--t1-text-primary);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-view-all-btn {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-view-all-btn:hover {
        background: var(--t1-accent-primary);
        border-color: var(--t1-accent-primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--t1-btn-glow);
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.3;
        z-index: 0;
        animation: t1-blob-float 15s infinite alternate;
    }

    .t1-blob-1 { top: 10%; right: 10%; width: 500px; height: 500px; background: var(--t1-accent-glow); }
    .t1-blob-2 { bottom: 10%; left: 10%; width: 400px; height: 400px; background: var(--t1-accent-secondary); animation-delay: -7s; }

    @keyframes t1-blob-float {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(40px, -40px) scale(1.1); }
    }
</style>

@if($user && $user->isPremium() && $posts->isNotEmpty())
    <section id="blog" class="t1-blog-section">
        <!-- Background Elements -->
        <div class="t1-blob t1-blob-1"></div>
        <div class="t1-blob t1-blob-2"></div>

        <div class="t1-blog-container">
            <!-- Title -->
            <div class="t1-title-wrapper">
                <h2 class="t1-section-title">Latest Insights</h2>
                <p class="t1-section-subtitle">Thoughts, tutorials, and updates on my journey</p>
                <div class="t1-title-underline"></div>
            </div>

            <!-- Blog Grid -->
            <div class="t1-blog-grid">
                @foreach($posts->take(6) as $post)
                    <a href="{{ route('portfolio.blog.show', [$user, $post]) }}" class="t1-blog-card">
                        <div class="t1-blog-image-wrapper">
                            @if($post->hero_image_path)
                                <img src="{{ asset('storage/' . $post->hero_image_path) }}" 
                                     alt="{{ $post->title }}" 
                                     class="t1-blog-image">
                            @else
                                <div class="t1-blog-placeholder">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            @endif
                        </div>

                        <div class="t1-blog-content">
                            @if($post->published_at)
                                <div class="t1-blog-date">{{ $post->published_at->format('M j, Y') }}</div>
                            @endif
                            
                            <h3 class="t1-blog-title">{{ $post->title }}</h3>
                            
                            @if($post->excerpt)
                                <p class="t1-blog-excerpt">{{ $post->excerpt }}</p>
                            @endif

                            <div class="t1-blog-link">
                                Read Article
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <line x1="5" y1="12" x2="19" y2="12" stroke-width="2" stroke-linecap="round"/>
                                    <polyline points="12 5 19 12 12 19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- View All Button -->
            @if($posts->count() > 6)
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('portfolio.blog.index', $user->slug) }}" class="t1-view-all-btn">
                        View All Posts
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                            <line x1="5" y1="12" x2="19" y2="12" stroke-width="2" stroke-linecap="round"/>
                            <polyline points="12 5 19 12 12 19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif