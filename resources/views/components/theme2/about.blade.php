@props(['aboutContent'])

<section id="about" class="py-24 bg-neutral-950 text-white relative overflow-hidden">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5" 
         style="background-image: linear-gradient(#404040 1px, transparent 1px), linear-gradient(to right, #404040 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    <div class="container mx-auto px-6 relative z-10">
        
        <!-- Section Header -->
        <div class="mb-16">
            <h2 class="text-5xl md:text-7xl font-bold tracking-tighter mb-4">
                About<span class="text-lime-400">.</span>
            </h2>
            <div class="w-full h-[1px] bg-neutral-800"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Profile Image & Quick Info -->
            <div class="lg:col-span-4 space-y-8">
                <div class="relative group">
                    <div class="absolute inset-0 bg-lime-400 translate-x-2 translate-y-2 transition-transform group-hover:translate-x-4 group-hover:translate-y-4"></div>
                    <div class="relative aspect-[3/4] overflow-hidden bg-neutral-900 border border-neutral-800">
                        <img src="{{ $aboutContent['user']->profile_image ?? '/images/profile.png' }}" 
                             alt="{{ $aboutContent['profile_name'] ?? 'Profile' }}" 
                             class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                        
                        <!-- Badges -->
                        <div class="absolute bottom-4 left-4 flex flex-col gap-2">
                            @if(!empty($aboutContent['profile_gpa_badge']))
                                <span class="bg-black/80 backdrop-blur text-white text-xs font-mono px-3 py-1 border border-neutral-700">
                                    GPA: {{ $aboutContent['profile_gpa_badge'] }}
                                </span>
                            @endif
                            @if(!empty($aboutContent['profile_degree_badge']))
                                <span class="bg-lime-400 text-black text-xs font-bold px-3 py-1">
                                    {{ $aboutContent['profile_degree_badge'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-8 space-y-12">
                
                <!-- Description -->
                <div class="space-y-6">
                    <h3 class="text-3xl font-bold text-neutral-200">
                        {{ $aboutContent['about_greeting'] ?? "Hello." }}
                    </h3>
                    <div class="text-lg text-neutral-400 leading-relaxed font-light border-l-2 border-lime-400 pl-6">
                        {!! $aboutContent['about_description'] ?? 'Passionate developer.' !!}
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @php
                        $stats = [
                            ['count' => $aboutContent['stat_projects_count'], 'label' => 'Projects'],
                            ['count' => $aboutContent['stat_technologies_count'], 'label' => 'Tech Stack'],
                            ['count' => $aboutContent['stat_team_count'], 'label' => 'Teams'],
                            ['count' => $aboutContent['stat_problem_count'], 'label' => 'Solved'],
                        ];
                    @endphp

                    @foreach($stats as $stat)
                        @if($stat['count'])
                            <div class="bg-neutral-900/50 p-6 border border-neutral-800 hover:border-lime-400 transition-colors group">
                                <h4 class="text-3xl font-bold text-white group-hover:text-lime-400 transition-colors">{{ $stat['count'] }}</h4>
                                <p class="text-xs font-mono text-neutral-500 uppercase tracking-widest mt-2">{{ $stat['label'] }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Soft Skills -->
                @if (!empty($aboutContent['soft_skills']))
                    <div>
                        <h4 class="text-sm font-mono text-neutral-500 uppercase tracking-widest mb-6">Soft Skills</h4>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                <div class="flex items-center gap-2 px-4 py-2 bg-neutral-900 border border-neutral-800 rounded-full hover:border-lime-400 transition-colors cursor-default">
                                    <span class="w-2 h-2 rounded-full bg-lime-400"></span>
                                    <span class="text-sm text-neutral-300">{{ $skill }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Actions -->
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#contact" class="px-8 py-3 bg-white text-black font-bold hover:bg-lime-400 transition-colors">
                        {{ $aboutContent['cta_button_text'] ?? "Let's Talk" }}
                    </a>
                    
                    @if($aboutContent['user']->hasCv())
                        <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" class="px-8 py-3 border border-neutral-700 text-white font-bold hover:border-lime-400 hover:text-lime-400 transition-colors">
                            Download CV
                        </a>
                        <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}" target="_blank" class="px-8 py-3 border border-neutral-700 text-white font-bold hover:border-lime-400 hover:text-lime-400 transition-colors">
                            View CV
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
