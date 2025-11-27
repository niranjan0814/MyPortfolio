@props(['posts', 'user'])

@if($user && $user->isPremium() && $posts->isNotEmpty())
    <section id="blog" class="py-24 bg-neutral-900 text-white border-t border-neutral-800">
        <div class="container mx-auto px-6">

            <!-- Section Header -->
            <div class="mb-20 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h2 class="text-5xl md:text-7xl font-bold tracking-tighter mb-4">
                        Blog<span class="text-lime-400">.</span>
                    </h2>
                    <p class="text-neutral-500 font-mono uppercase tracking-widest">Latest insights</p>
                </div>

                <!-- View All Link -->
                <a href="{{ route('portfolio.blog.index', $user->slug) }}"
                    class="text-lime-400 font-mono text-sm hover:underline hidden md:block">
                    View All →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts->take(6) as $post)
                    <a href="{{ route('portfolio.blog.show', [$user, $post]) }}"
                        class="group relative bg-neutral-950 border border-neutral-800 overflow-hidden hover:border-lime-400 transition-all duration-500 block">

                        <!-- Blog Image -->
                        @if($post->hero_image_path)
                            <div class="aspect-video overflow-hidden bg-neutral-900 border-b border-neutral-800">
                                <img src="{{ asset('storage/' . $post->hero_image_path) }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
                            </div>
                        @else
                            <div class="aspect-video bg-neutral-900 border-b border-neutral-800 flex items-center justify-center">
                                <i class="fas fa-newspaper text-4xl text-neutral-700"></i>
                            </div>
                        @endif

                        <!-- Content -->
                        <div class="p-6 space-y-4">

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-white group-hover:text-lime-400 transition-colors">
                                {{ $post->title }}
                            </h3>

                            <!-- Published Date -->
                            @if($post->published_at)
                                <p class="text-neutral-500 font-mono text-xs">
                                    {{ $post->published_at->format('M j, Y') }}
                                </p>
                            @endif

                            <!-- Excerpt -->
                            @if($post->excerpt)
                                <p class="text-neutral-400 text-sm leading-relaxed line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <!-- Read More -->
                            <div class="flex items-center gap-2 pt-4 border-t border-neutral-800">
                                <span class="text-sm font-mono text-neutral-400 group-hover:text-lime-400 transition-colors">
                                    Read More
                                </span>
                                <svg class="w-4 h-4 text-neutral-400 group-hover:text-lime-400 transition-colors" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!-- Hover accent line -->
                        <div
                            class="absolute bottom-0 left-0 w-full h-1 bg-lime-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500">
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- View All Blog Posts Link (if more than 6) -->
            @if($posts->count() > 6)
                <div class="text-center mt-12">
                    <a href="{{ route('portfolio.blog.index', $user->slug) }}"
                        class="inline-flex items-center gap-2 text-lime-400 font-mono text-sm hover:underline border border-lime-400 px-6 py-3 hover:bg-lime-400 hover:text-neutral-900 transition-all duration-300">
                        <span>View All Blog Posts</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif