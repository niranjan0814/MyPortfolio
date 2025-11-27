@props(['posts', 'user'])

@if($user && $user->isPremium() && $posts->isNotEmpty())
    <section id="blog" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-blog">
        <!-- Background Elements -->
        <div class="background-pattern absolute inset-0 -z-10"></div>

        <!-- Floating Particles -->
        <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

        <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                    <span class="section-title-primary">My</span>
                    <span class="section-title-secondary">Blog</span>
                </h2>
                <div class="section-divider mx-auto mb-6"></div>
                <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6 text-gray-600 dark:text-gray-300">
                    Insights, stories, and case studies from my work
                </p>
            </div>

            <!-- Blog Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($posts->take(6) as $post)
                    <a href="{{ route('portfolio.blog.show', [$user, $post]) }}"
                        class="blog-card group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col h-full">

                        <!-- Blog Image Section -->
                        <div class="blog-image-container relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700">
                            @if ($post->hero_image_path)
                                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}"
                                    class="blog-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div
                                    class="blog-image-placeholder w-full h-full flex items-center justify-center bg-gradient-to-br from-orange-400 to-pink-500">
                                    <i class="fas fa-newspaper text-white text-4xl opacity-80"></i>
                                </div>
                            @endif

                            <!-- Overlay with Read More -->
                            <div
                                class="blog-overlay absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div
                                    class="blog-link w-16 h-16 bg-white/90 hover:bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-orange-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
                                    <i class="fas fa-arrow-right text-xl"></i>
                                </div>
                            </div>

                            <!-- Published Badge -->
                            @if($post->published_at)
                                <div class="absolute top-4 left-4 z-10">
                                    <span
                                        class="status-badge px-3 py-1 bg-orange-500 text-white text-xs font-bold rounded-full uppercase tracking-wide">
                                        {{ $post->published_at->format('M Y') }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Blog Content Section -->
                        <div class="blog-content p-6 flex flex-col flex-grow">
                            <!-- Header with Title -->
                            <div class="blog-header mb-4">
                                <h3
                                    class="blog-title text-xl font-bold text-gray-900 dark:text-white line-clamp-2 flex-1 min-h-[3rem] group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors">
                                    {{ $post->title }}
                                </h3>
                            </div>

                            <!-- Excerpt - FIXED HEIGHT -->
                            @if($post->excerpt)
                                <p class="blog-excerpt text-gray-600 dark:text-gray-300 line-clamp-3 mb-4 flex-grow min-h-[4.5rem]">
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <!-- Read More Link -->
                            <div class="blog-footer mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-sm font-semibold text-orange-600 dark:text-orange-400 group-hover:underline">
                                        Read More
                                    </span>
                                    <i
                                        class="fas fa-arrow-right text-sm text-gray-400 group-hover:text-orange-600 dark:group-hover:text-orange-400 transform group-hover:translate-x-1 transition-all"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- View All Blog Posts Link -->
            @if($posts->count() > 6)
                <div class="text-center mt-12">
                    <a href="{{ route('portfolio.blog.index', $user->slug) }}"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-orange-500 to-pink-500 text-white font-bold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        <span>View All Blog Posts</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif