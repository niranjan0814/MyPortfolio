@props(['posts', 'user'])

@if($user && $user->isPremium() && $posts->isNotEmpty())
    {{-- ✅ CRITICAL: This id="blog" is what the nav link targets --}}
    <section id="blog" class="section-full relative overflow-hidden" style="background: var(--bg-primary);">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-5 normal-theme-only">
            <div class="absolute top-20 left-10 w-72 h-72 bg-orange-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
        </div>

        <!-- Monochrome particles -->
        <div class="hero-particles"></div>

        <div class="container mx-auto fade-in relative z-10 px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Blog</h2>
                <div class="h-1 w-32 mx-auto rounded-full"
                    style="background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));"></div>
                <p class="mt-4 text-lg" style="color: var(--text-secondary);">
                    Insights, stories, and case studies
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($posts->take(6) as $post)
                    <a href="{{ route('portfolio.blog.show', [$user, $post]) }}"
                        class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-2 glass-card flex flex-col"
                        style="background: var(--card-bg); border: 1px solid var(--border-color);">

                        <!-- Glassmorphism overlay on hover -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                            style="background: var(--glass-bg); backdrop-filter: var(--glass-blur);"></div>

                        <!-- Hero Image / Icon Section -->
                        @if ($post->hero_image_path)
                            <div class="h-48 overflow-hidden flex items-center justify-center relative"
                                style="background: var(--bg-gradient-start); border-bottom: 1px solid var(--border-color);">
                                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}"
                                    class="object-cover h-full w-full group-hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <div class="h-48 flex items-center justify-center relative"
                                style="background: var(--bg-gradient-start); border-bottom: 1px solid var(--border-color);">
                                <i class="fas fa-newspaper text-6xl" style="color: var(--accent-blue);"></i>
                            </div>
                        @endif

                        <!-- Blog Post Details -->
                        <div class="p-6 relative z-10 flex flex-col flex-grow">
                            <h3 class="text-2xl font-bold mb-3" style="color: var(--text-primary);">
                                {{ $post->title }}
                            </h3>

                            @if ($post->published_at)
                                <p class="mb-4 text-sm" style="color: var(--text-muted);">
                                    {{ $post->published_at->format('M j, Y') }}
                                </p>
                            @endif

                            @if ($post->excerpt)
                                <p class="mb-4 leading-relaxed flex-grow line-clamp-3" style="color: var(--text-secondary);">
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <!-- Read More Link -->
                            <div class="flex items-center gap-2 mt-auto pt-4 font-medium transition-colors group-hover:opacity-80"
                                style="color: var(--accent-blue);">
                                <span>Read More</span>
                                <i
                                    class="fas fa-arrow-right text-sm transform group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- View All Blog Posts Link -->
            @if($posts->count() > 6)
                <div class="text-center mt-8">
                    <a href="{{ route('portfolio.blog.index', $user->slug) }}"
                        class="inline-flex items-center gap-2 font-medium transition-colors hover:opacity-80 px-6 py-3 rounded-lg glass-card"
                        style="background: var(--card-bg); border: 1px solid var(--border-color); color: var(--accent-purple);">
                        <span>View All Blog Posts</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif

<style>
    /* Gradient text effect */
    .gradient-text {
        background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
        display: inline-block;
        padding: 0 4px;
    }

    /* Line clamp for excerpt */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Glass card effects */
    .glass-card {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    [data-theme="light"] .glass-card {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(229, 231, 235, 0.8);
    }

    [data-theme="dark"] .glass-card {
        background: rgba(30, 30, 30, 0.3);
        border-color: rgba(255, 255, 255, 0.1);
    }

    /* Theme-specific visibility */
    [data-theme="dark"] .normal-theme-only {
        display: none !important;
    }

    [data-theme="light"] .hero-particles {
        display: none !important;
    }

    /* Fade in animation */
    .fade-in {
        animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>