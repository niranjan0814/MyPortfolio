@props(['aboutContent'])
<!-- resources/views/components/about.blade.php -->
<section id="about"
    class="section-full relative overflow-hidden pt-12 pb-16"
    style="background: var(--bg-primary); border-bottom: 4px solid var(--accent-olive);">
    
    <!-- Neo brutalist background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2" style="background: var(--accent-olive);"></div>
        <div class="absolute top-4 left-4 w-20 h-20 border-4" style="border-color: var(--accent-olive);"></div>
        <div class="absolute bottom-4 right-4 w-16 h-16" style="background: var(--accent-olive);"></div>
        <div class="absolute top-1/2 right-8 w-8 h-8 border-4" style="border-color: var(--accent-olive); transform: rotate(45deg);"></div>
    </div>

    <div class="container mx-auto max-w-6xl relative z-10 px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4" style="color: var(--text-primary); line-height: 1.2; text-shadow: 4px 4px 0 var(--accent-olive);">
                ABOUT ME
            </h2>
            <div class="h-2 w-48 mx-auto" style="background: var(--accent-olive);"></div>
        </div>

        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-12">
            <!-- Left Side - Profile Image -->
            <div class="flex-shrink-0 -mt-20 lg:-mt-16">
                <div class="relative group">
                    <div class="absolute -inset-4 border-4" style="border-color: var(--accent-olive); transform: rotate(3deg);"></div>
                    
                    <div class="relative w-64 h-64 md:w-72 md:h-72 border-4 overflow-hidden shadow-neo mx-auto"
                         style="background: var(--card-bg); border-color: var(--accent-olive);">
                        <img src="{{ $aboutContent['user']->profile_image ?? '/images/profile.png' }}"
                            alt="{{ $aboutContent['profile_name'] ?? 'Profile' }}"
                            class="w-full h-full object-cover object-center" />

                        <!-- GPA Badge -->
                        <div class="absolute -top-3 -right-3 px-4 py-2 border-2 font-bold rotate-6"
                             style="background: var(--accent-olive); color: var(--bg-primary); border-color: var(--text-primary);">
                            <span class="text-sm">{{ $aboutContent['profile_gpa_badge'] ?? 'GPA 3.79' }}</span>
                        </div>

                        <!-- Degree Badge -->
                        <div class="absolute -bottom-3 -left-3 px-4 py-2 border-2 font-bold -rotate-6"
                             style="background: var(--bg-primary); color: var(--accent-olive); border-color: var(--accent-olive);">
                            <span class="text-sm">{{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - About Content -->
            <div class="flex-1 max-w-2xl">
                <div class="space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 mb-4">
                            <h3 class="text-2xl md:text-3xl font-bold border-b-4 pb-2" 
                                style="color: var(--text-primary); border-color: var(--accent-olive);">
                                {{ $aboutContent['about_greeting'] ?? "HI, I'M NIRANJAN!" }}
                            </h3>
                        </div>

                        <div class="p-4 border-4" style="background: var(--card-bg); border-color: var(--accent-olive);">
                            <p class="text-base md:text-lg leading-relaxed" style="color: var(--text-secondary);">
                                {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering.' !!}
                            </p>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 gap-4 pt-6">
                        @php
                            $stats = [
                                'projects' => ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label']],
                                'technologies' => ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label']],
                                'team' => ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label']],
                                'problem' => ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label']],
                            ];
                        @endphp

                        @foreach($stats as $key => $stat)
                            @if($stat['count'] && $stat['label'])
                                <div class="p-4 border-4 hover:translate-x-1 hover:-translate-y-1 transition-transform"
                                     style="background: var(--card-bg); border-color: var(--accent-olive);">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 md:w-12 md:h-12 border-4 flex items-center justify-center"
                                             style="border-color: var(--accent-olive);">
                                            <img src="{{ $aboutContent['stats_icon_urls'][$key] ?? 'https://img.icons8.com/?size=100&id=000000&format=png&color=000000' }}"
                                                alt="{{ $stat['label'] }} Icon" class="w-6 h-6" />
                                        </div>
                                    </div>
                                    <h4 class="text-xl md:text-2xl font-bold mb-1" style="color: var(--accent-olive);">{{ $stat['count'] }}</h4>
                                    <p class="font-medium text-sm md:text-base" style="color: var(--text-secondary);">{{ $stat['label'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Soft Skills -->
                    @if (!empty($aboutContent['soft_skills']))
                        <div class="pt-6">
                            <h4 class="text-xl md:text-2xl font-bold mb-4 border-b-4 pb-2" 
                                style="color: var(--text-primary); border-color: var(--accent-olive);">SOFT SKILLS</h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                    <div class="p-3 border-4 text-center hover:translate-x-1 hover:-translate-y-1 transition-transform"
                                         style="background: var(--card-bg); border-color: var(--accent-olive);">
                                        <div class="w-10 h-10 md:w-12 md:h-12 border-4 flex items-center justify-center mx-auto mb-2"
                                             style="border-color: var(--accent-olive);">
                                            <img src="{{ $iconUrl }}" alt="{{ $skill }} Icon" class="w-6 h-6" />
                                        </div>
                                        <h5 class="text-lg md:text-xl font-bold" style="color: var(--text-primary);">{{ $skill }}</h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- CTA Buttons with CV Download -->
                    <div class="pt-6 flex flex-wrap gap-4">
                        <!-- Contact Button -->
                        <a href="#contact"
                            class="inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 border-4 font-bold text-base md:text-lg hover:translate-x-1 hover:-translate-y-1 transition-transform"
                            style="background: var(--accent-olive); color: var(--bg-primary); border-color: var(--text-primary);">
                            <span>{{ $aboutContent['cta_button_text'] ?? "LET'S WORK TOGETHER" }}</span>
                            <img src="{{ $aboutContent['stats_icon_urls']['cta'] ?? 'https://img.icons8.com/?size=100&id=62vgtZLAw1gl&format=png&color=FFFFFF' }}"
                                class="w-5 h-5" />
                        </a>

                        <!-- CV Download Button -->
                        @if($aboutContent['user']->hasCv())
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}"
                                class="inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 border-4 font-bold text-base md:text-lg hover:translate-x-1 hover:-translate-y-1 transition-transform"
                                style="background: var(--bg-primary); color: var(--accent-olive); border-color: var(--accent-olive);"
                                download>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" style="color: var(--accent-olive);">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                                <span>DOWNLOAD CV</span>
                            </a>

                            <!-- View CV Button -->
                            <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-6 py-3 md:px-8 md:py-4 border-4 font-bold text-base md:text-lg hover:translate-x-1 hover:-translate-y-1 transition-transform"
                                style="background: var(--card-bg); color: var(--text-primary); border-color: var(--accent-olive);">
                                <svg class="w-5 h-5" style="color: var(--accent-olive);" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>VIEW CV</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .shadow-neo {
        box-shadow: 6px 6px 0 var(--accent-olive);
    }
    
    .hover\:shadow-neo:hover {
        box-shadow: 8px 8px 0 var(--accent-olive);
    }
</style>