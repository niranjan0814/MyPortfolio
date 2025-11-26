@props(['skills'])

<section id="skills" class="py-24 bg-neutral-950 text-white border-t border-neutral-900 relative overflow-hidden">
    
    <!-- Background accent -->
    <div class="absolute top-1/2 right-0 w-96 h-96 bg-lime-500/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10">
        
        <!-- Section Header -->
        <div class="mb-20">
            <h2 class="text-5xl md:text-7xl font-bold tracking-tighter mb-4">
                Skills<span class="text-lime-400">.</span>
            </h2>
            <div class="w-full h-[1px] bg-neutral-800"></div>
        </div>

        @if($skills->isEmpty())
            <div class="p-12 border border-dashed border-neutral-800 text-center">
                <p class="text-neutral-500 font-mono">No skills data available.</p>
            </div>
        @else
            @php
                $categories = [
                    'frontend' => 'Frontend Development',
                    'backend' => 'Backend Development',
                    'database' => 'Database & Storage',
                    'tools' => 'Tools & Technologies',
                ];
                
                $groupedSkills = $skills->groupBy('category');
            @endphp

            <div class="space-y-16">
                @foreach($categories as $categoryKey => $categoryTitle)
                    @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                        <div class="group">
                            <!-- Category Header -->
                            <div class="flex items-center gap-4 mb-8">
                                <h3 class="text-2xl md:text-3xl font-bold text-white group-hover:text-lime-400 transition-colors">
                                    {{ $categoryTitle }}
                                </h3>
                                <div class="flex-1 h-[1px] bg-neutral-800 group-hover:bg-lime-400/30 transition-colors"></div>
                                <span class="text-sm font-mono text-neutral-600">
                                    {{ $groupedSkills[$categoryKey]->count() }} {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                </span>
                            </div>

                            <!-- Skills Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                @foreach($groupedSkills[$categoryKey] as $skill)
                                    <div class="group/skill relative bg-neutral-900 border border-neutral-800 p-6 hover:border-lime-400 hover:bg-neutral-950 transition-all duration-300 cursor-default">
                                        
                                        <!-- Skill Icon -->
                                        @php
                                            $iconUrl = $skill->url;
                                            $hasValidUrl = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                        @endphp

                                        @if($hasValidUrl)
                                            <div class="flex justify-center mb-4">
                                                <img src="{{ $iconUrl }}" 
                                                     alt="{{ $skill->name }}" 
                                                     class="w-12 h-12 object-contain opacity-80 group-hover/skill:opacity-100 group-hover/skill:scale-110 transition-all duration-300"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            </div>
                                        @endif

                                        <!-- Fallback Icon -->
                                        <div class="{{ $hasValidUrl ? 'hidden' : '' }} flex justify-center mb-4">
                                            <div class="w-12 h-12 flex items-center justify-center bg-neutral-800 border border-neutral-700 group-hover/skill:border-lime-400 transition-colors">
                                                <svg class="w-6 h-6 text-neutral-600 group-hover/skill:text-lime-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13 7H7v6h6V7z"/>
                                                    <path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Skill Name -->
                                        <h4 class="text-center text-sm font-mono text-neutral-400 group-hover/skill:text-white transition-colors">
                                            {{ $skill->name }}
                                        </h4>

                                        <!-- Level (if available) -->
                                        @if($skill->level)
                                            <p class="text-center text-xs text-neutral-600 mt-1 font-mono">
                                                {{ $skill->level }}
                                            </p>
                                        @endif

                                        <!-- Corner accent -->
                                        <div class="absolute top-0 right-0 w-0 h-0 border-t-[8px] border-r-[8px] border-t-transparent border-r-neutral-800 group-hover/skill:border-r-lime-400 transition-colors"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>
