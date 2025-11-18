@props(['aboutContent'])
<!-- resources/views/components/about.blade.php -->
<section id="about"
    class="section-full relative overflow-hidden pt-12 pb-16"
    style="background: linear-gradient(135deg, var(--bg-primary), var(--bg-gradient-start), var(--bg-gradient-end));">
    
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden normal-theme-only">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Monochrome floating particles -->
    <div class="hero-particles"></div>

    <div class="container mx-auto max-w-6xl fade-in relative z-10 px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 gradient-text" style="line-height: 1.2;">
                About Me
            </h2>
            <div class="h-1 w-32 mx-auto rounded-full"
                 style="background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));"></div>
        </div>

        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">
            <!-- Left Side - Profile Image (UPDATED: moved up) -->
            <div class="flex-shrink-0 -mt-20 lg:-mt-16">
                <div class="relative group">
                    <div class="absolute inset-0 rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110"
                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));"></div>
                    <div class="absolute inset-0 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-700 scale-105 animate-pulse"
                         style="background: linear-gradient(135deg, var(--accent-purple), var(--accent-pink));"></div>

                    <div class="relative">
                        <div class="absolute inset-0 rounded-full animate-spin-slow p-1"
                             style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));">
                            <div class="w-full h-full rounded-full"
                                 style="background: var(--bg-primary);"></div>
                        </div>

                        <div class="relative w-64 h-64 md:w-72 md:h-72 rounded-full overflow-hidden shadow-2xl group hover:scale-105 transition-transform duration-500 mx-auto glass-card"
                             style="border: 10px solid var(--card-bg);">
                            <div class="absolute inset-0"
                                 style="background: linear-gradient(135deg, #f97316, #ec4899, #ef4444);"></div>
                            <img src="{{ $aboutContent['user']->profile_image ?? '/images/profile.png' }}"
                                alt="{{ $aboutContent['profile_name'] ?? 'Profile' }}"
                                class="absolute inset-0 w-full h-full object-cover object-center mix-blend-normal" />

                            <div class="absolute -top-4 right-0 px-4 py-1 rounded-full shadow-md rotate-12 glass-button"
                                 style="background: var(--glass-bg, var(--accent-blue)); color: var(--text-primary); border: 1px solid var(--glass-border, var(--border-color));">
                                <span class="text-sm font-semibold">{{ $aboutContent['profile_gpa_badge'] ?? 'GPA 3.79' }}</span>
                            </div>
                        </div>

                        <div class="absolute -top-2 -right-2 md:-top-4 md:-right-4 px-4 py-2 md:px-6 md:py-3 rounded-full shadow-lg transform rotate-12 hover:rotate-0 transition-transform duration-300 glass-button"
                             style="background: var(--glass-bg, linear-gradient(135deg, #10b981, #3b82f6)); color: var(--text-primary); border: 1px solid var(--glass-border, var(--border-color));">
                            <span class="font-bold text-sm md:text-lg">{{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - About Content -->
            <div class="flex-1 max-w-2xl">
                <div class="space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 mb-4">
                            
                            <h3 class="text-2xl md:text-3xl font-bold" style="color: var(--text-primary);">
                                {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                            </h3>
                        </div>

                        <p class="text-base md:text-lg leading-relaxed" style="color: var(--text-secondary);">
                            {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering.' !!}
                        </p>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 gap-4 pt-6">
                        @php
                            $stats = [
                                'projects' => ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label'], 'gradient' => 'from-blue-400 to-blue-600'],
                                'technologies' => ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label'], 'gradient' => 'from-purple-400 to-purple-600'],
                                'team' => ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label'], 'gradient' => 'from-pink-400 to-pink-600'],
                                'problem' => ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label'], 'gradient' => 'from-green-400 to-green-600'],
                            ];
                        @endphp

                        @foreach($stats as $key => $stat)
                            @if($stat['count'] && $stat['label'])
                                <div class="glass-card p-4 md:p-6 rounded-2xl hover:shadow-lg group transition-all duration-300 hover:-translate-y-1"
                                     style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform glass-card"
                                             style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                            <img src="{{ $aboutContent['stats_icon_urls'][$key] ?? 'https://img.icons8.com/?size=100&id=000000&format=png&color=000000' }}"
                                                alt="{{ $stat['label'] }} Icon" class="w-6 h-6" />
                                        </div>
                                    </div>
                                    <h4 class="text-xl md:text-2xl font-bold mb-1 gradient-text">{{ $stat['count'] }}</h4>
                                    <p class="font-medium text-sm md:text-base" style="color: var(--text-secondary);">{{ $stat['label'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Soft Skills -->
                    @if (!empty($aboutContent['soft_skills']))
                        <div class="pt-6">
                            <h4 class="text-xl md:text-2xl font-bold mb-4" style="color: var(--text-primary);">Soft Skills</h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                @php
                                    $skillColors = [
                                        'Communication' => 'from-blue-400 to-blue-600',
                                        'Teamwork' => 'from-purple-400 to-purple-600',
                                        'Problem Solving' => 'from-pink-400 to-pink-600',
                                        'Leadership' => 'from-green-400 to-green-600',
                                    ];
                                @endphp

                                @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                    @php
                                        $gradient = $skillColors[$skill] ?? 'from-gray-400 to-gray-600';
                                    @endphp

                                    <div class="glass-card p-4 md:p-5 rounded-2xl hover:shadow-lg group transition-all duration-300 hover:-translate-y-1"
                                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform glass-card"
                                                 style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                                <img src="{{ $iconUrl }}" alt="{{ $skill }} Icon" class="w-6 h-6" />
                                            </div>
                                        </div>
                                        <h5 class="text-lg md:text-xl font-bold mb-1 gradient-text">{{ $skill }}</h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- CTA Buttons with CV Download -->
                    <div class="pt-6 flex flex-wrap gap-4">
                        <!-- Contact Button -->
                        <a href="#contact"
                            class="inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group theme-btn glass-button">
                            <span class="relative z-10 drop-shadow-md">{{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}</span>
                            <img src="{{ $aboutContent['stats_icon_urls']['cta'] ?? 'https://img.icons8.com/?size=100&id=62vgtZLAw1gl&format=png&color=FFFFFF' }}"
                                class="w-5 h-5 group-hover:translate-x-2 transition-transform filter brightness-0 invert" />
                        </a>

                        <!-- CV Download Button -->
                        @if($aboutContent['user']->hasCv())
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}"
                                class="inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group glass-button"
                                style="background: var(--glass-bg, linear-gradient(135deg, #10b981, #14b8a6)); color: var(--text-primary); border: 2px solid var(--glass-border, #10b981);"
                                download>
                                <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform drop-shadow-md" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                <span class="drop-shadow-md">Download CV</span>
                            </a>

                            <!-- View CV Button -->
                            <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 rounded-full font-bold text-base md:text-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 group glass-card"
                                style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" style="color: var(--accent-blue);" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span style="color: var(--text-primary);">View CV</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    .animate-spin-slow { animation: spin-slow 8s linear infinite; }

    /* Hide normal theme blobs in monochrome mode */
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }
</style>
