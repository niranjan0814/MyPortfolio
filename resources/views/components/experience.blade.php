@props(['experiences'])
<!-- resources/views/components/experience.blade.php -->
<section id="experience" class="section-full relative overflow-hidden" style="background: var(--bg-primary);">
    <!-- Background decoration -->
    <div class="absolute top-0 left-0 w-full h-full opacity-5 normal-theme-only">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>

    <!-- Monochrome particles -->
    <div class="hero-particles"></div>

    <div class="container mx-auto max-w-6xl fade-in relative z-10 px-4">
        <div class="text-center mb-20">
            <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight gradient-text" style="line-height: 1.2;">
                My Journey
            </h2>
            <p class="mb-6 text-lg" style="color: var(--text-secondary);">Professional experience & career milestones</p>
        </div>

        @if($experiences->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full mb-4 glass-card"
                     style="background: var(--card-bg); border: 1px solid var(--border-color);">
                    <svg class="w-10 h-10" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 15H4V8h16v11z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2" style="color: var(--text-primary);">No Experience Added Yet</h3>
                <p style="color: var(--text-muted);">Work experience will appear here once added through the admin panel.</p>
            </div>
        @else
            <!-- Roadmap Timeline -->
            <div class="relative">
                <!-- Central vertical line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1"
                     style="background: linear-gradient(180deg, var(--accent-blue), var(--accent-purple), #10b981);"></div>

                @foreach($experiences as $index => $experience)
                    @php
                        $isEven = $index % 2 === 0;
                        $colors = [
                            ['gradient' => 'from-blue-500 to-cyan-500'],
                            ['gradient' => 'from-green-500 to-teal-500'],
                            ['gradient' => 'from-purple-500 to-pink-500'],
                            ['gradient' => 'from-orange-500 to-red-500'],
                        ];
                        $colorSet = $colors[$index % count($colors)];
                    @endphp

                    <div class="relative mb-16 md:mb-24">
                        <div class="flex flex-col md:flex-row items-center">
                            @if($isEven)
                                <!-- Left side content (even indexes) -->
                                <div class="md:w-1/2 md:pr-12 mb-8 md:mb-0">
                                    <div class="p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 glass-card text-left"
                                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                        @if($index === 0)
                                            <div class="flex items-center gap-4 mb-4">
                                                <div class="px-4 py-2 rounded-full text-sm font-bold animate-pulse glass-button"
                                                     style="background: var(--glass-bg, #10b981); color: var(--text-primary); border: 1px solid var(--glass-border, #10b981);">
                                                    CURRENT
                                                </div>
                                            </div>
                                        @endif

                                        @if($experience->duration)
                                            <div class="flex items-center gap-4 mb-4">
                                                <span class="font-medium" style="color: var(--text-secondary);">{{ $experience->duration }}</span>
                                            </div>
                                        @endif

                                        <h3 class="text-3xl font-bold mb-3 flex items-center gap-3 gradient-text">
                                            
                                            {{ $experience->role }}
                                        </h3>
                                        <p class="text-xl font-semibold mb-4 text-left" style="color: var(--text-secondary);">{{ $experience->company }}</p>

                                        @if($experience->details)
                                            <p class="leading-relaxed text-left" style="color: var(--text-secondary);">{{ $experience->details }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Center node -->
                                <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 rounded-full items-center justify-center shadow-lg z-10 glass-card"
                                     style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-cyan))); border: 4px solid var(--card-bg);">
                                    <svg class="w-8 h-8" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7 14l5-5 5 5z" />
                                    </svg>
                                </div>

                                <!-- Right side (empty for alignment) -->
                                <div class="md:w-1/2"></div>
                            @else
                                <!-- Left side (empty for alignment) -->
                                <div class="md:w-1/2"></div>

                                <!-- Center node -->
                                <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 rounded-full items-center justify-center shadow-lg z-10 glass-card"
                                     style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-green), var(--accent-teal))); border: 4px solid var(--card-bg);">
                                    <svg class="w-8 h-8" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7 14l5-5 5 5z" />
                                    </svg>
                                </div>

                                <!-- Right side content (odd indexes) -->
                                <div class="md:w-1/2 md:pl-12">
                                    <div class="p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 glass-card text-left"
                                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                        @if($experience->duration)
                                            <div class="flex items-center gap-4 mb-4">
                                                <span class="font-medium" style="color: var(--text-secondary);">{{ $experience->duration }}</span>
                                            </div>
                                        @endif

                                        <h3 class="text-3xl font-bold mb-3 flex items-center gap-3 gradient-text">
                                            
                                            {{ $experience->role }}
                                        </h3>
                                        <p class="text-xl font-semibold mb-4 text-left" style="color: var(--text-secondary);">{{ $experience->company }}</p>

                                        @if($experience->details)
                                            <p class="leading-relaxed text-left" style="color: var(--text-secondary);">{{ $experience->details }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Starting point -->
                <div class="hidden md:flex absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-12 rounded-full items-center justify-center shadow-lg z-10 mt-16 glass-card"
                     style="background: var(--glass-bg, linear-gradient(135deg, #9ca3af, #6b7280)); border: 4px solid var(--card-bg);">
                    <svg class="w-6 h-6" style="color: var(--text-primary);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 14l5-5 5 5z" />
                    </svg>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    /* Hide normal theme blobs in monochrome mode */
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }
</style>