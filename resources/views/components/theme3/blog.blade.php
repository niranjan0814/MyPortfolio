@props(['posts', 'user'])

@if($user && $user->isPremium() && $posts->isNotEmpty())
    <style>
        /* ============================================
           THEME 3 BLOG - MODERN CARD DESIGN
           Matching Theme 3 Aesthetic
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
        .t3-blog-section {
            background: var(--t3-blog-bg);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        /* Background Orbs */
        .t3-blog-orb {
            position: absolute;
            border-radius: 50%;
            background: var(--t3-blog-gradient);
            filter: blur(100px);
            opacity: 0.06;
            pointer-events: none;
        }

        .t3-blog-orb-1 {
            width: 500px;
            height: 500px;
            top: -10%;
            left: -10%;
        }

        .t3-blog-orb-2 {
            width: 400px;
            height: 400px;
            bottom: -10%;
            right: -10%;
        }

        /* Container */
        .t3-blog-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        /* Header */
        .t3-blog-header {
            text-align: center;
            margin-bottom: 5rem;
        }

        .t3-blog-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            margin-bottom: 1.25rem;
            color: var(--t3-blog-text);
            letter-spacing: -0.03em;
        }

        .t3-blog-title-accent {
            background: var(--t3-blog-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .t3-blog-subtitle {
            font-size: 1.125rem;
            color: var(--t3-blog-text-muted);
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Grid */
        .t3-blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        /* Blog Card */
        .t3-blog-card {
            background: var(--t3-blog-surface);
            border: 1px solid var(--t3-blog-border);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .t3-blog-card:hover {
            transform: translateY(-10px);
            border-color: var(--t3-blog-accent);
            box-shadow: var(--t3-blog-shadow);
        }

        /* Image Container */
        .t3-blog-image-wrapper {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .t3-blog-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .t3-blog-card:hover .t3-blog-image {
            transform: scale(1.1);
        }

        .t3-blog-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .t3-blog-card:hover .t3-blog-overlay {
            opacity: 0.4;
        }

        /* Date Badge */
        .t3-blog-date {
            position: absolute;
            bottom: 1.5rem;
            right: 1.5rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1rem;
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 700;
            color: #1a202c;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            z-index: 2;
        }

        /* Content */
        .t3-blog-content {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .t3-blog-card-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--t3-blog-text);
            margin-bottom: 1rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }

        .t3-blog-card:hover .t3-blog-card-title {
            color: var(--t3-blog-accent);
        }

        .t3-blog-excerpt {
            font-size: 1rem;
            color: var(--t3-blog-text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        /* Footer */
        .t3-blog-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--t3-blog-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .t3-read-more {
            font-weight: 700;
            color: var(--t3-blog-accent);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .t3-blog-card:hover .t3-read-more {
            gap: 0.75rem;
        }

        /* View All Button */
        .t3-view-all {
            margin-top: 4rem;
            text-align: center;
        }

        .t3-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2.5rem;
            background: var(--t3-blog-gradient);
            color: white;
            font-weight: 700;
            border-radius: 100px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 204, 122, 0.3);
        }

        .t3-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 204, 122, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .t3-blog-section {
                padding: 4rem 0;
            }

            .t3-blog-grid {
                grid-template-columns: 1fr;
            }

            .t3-blog-image-wrapper {
                height: 200px;
            }
        }
    </style>

    <section id="blog" class="t3-blog-section">
        <!-- Background Orbs -->
        <div class="t3-blog-orb t3-blog-orb-1"></div>
        <div class="t3-blog-orb t3-blog-orb-2"></div>

        <div class="t3-blog-container">
            <!-- Header -->
            <div class="t3-blog-header">
                <h2 class="t3-blog-title">
                    Latest <span class="t3-blog-title-accent">Insights</span>
                </h2>
                <p class="t3-blog-subtitle">
                    Thoughts, tutorials, and updates from my journey
                </p>
            </div>

            <!-- Grid -->
            <div class="t3-blog-grid">
                @foreach($posts->take(3) as $post)
                    <a href="{{ route('portfolio.blog.show', [$user, $post]) }}" class="t3-blog-card">
                        <!-- Image -->
                        <div class="t3-blog-image-wrapper">
                            @if($post->hero_image_path)
                                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}" class="t3-blog-image">
                            @else
                                <div class="t3-blog-image" style="background: var(--t3-blog-gradient); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-newspaper" style="font-size: 3rem; color: white; opacity: 0.8;"></i>
                                </div>
                            @endif
                            <div class="t3-blog-overlay"></div>
                            
                            @if($post->published_at)
                                <div class="t3-blog-date">
                                    {{ $post->published_at->format('M d, Y') }}
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="t3-blog-content">
                            <h3 class="t3-blog-card-title">{{ $post->title }}</h3>
                            <p class="t3-blog-excerpt">{{ $post->excerpt }}</p>
                            
                            <div class="t3-blog-footer">
                                <span class="t3-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- View All -->
            @if($posts->count() > 3)
                <div class="t3-view-all">
                    <a href="{{ route('portfolio.blog.index', $user->slug) }}" class="t3-btn-primary">
                        View All Posts <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif