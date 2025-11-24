@props(['skills'])
<!-- resources/views/components/skills.blade.php -->
<section id="skills" class="section-full relative overflow-hidden"
         style="background: linear-gradient(135deg, var(--bg-secondary), var(--bg-primary), var(--bg-gradient-start));">
    
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob normal-theme-only"
         style="background: #93c5fd;"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000 normal-theme-only"
         style="background: #c4b5fd;"></div>
    
    <!-- Monochrome particles -->
    <div class="hero-particles"></div>
    
    <div class="container mx-auto fade-in relative z-10 px-4">
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold mb-4 gradient-text">Technical Arsenal</h2>
            <p class="text-lg" style="color: var(--text-secondary);">Technologies I work with to bring ideas to life</p>
            <div class="h-1 w-32 mx-auto rounded-full mt-4"
                 style="background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));"></div>
        </div>
        
        <div class="max-w-7xl mx-auto">
            @if($skills->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full mb-4 glass-card"
                         style="background: var(--card-bg); border: 1px solid var(--border-color);">
                        <i class="fa-solid fa-lightbulb text-4xl" style="color: var(--text-muted);"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2" style="color: var(--text-primary);">No Skills Added Yet</h3>
                    <p style="color: var(--text-muted);">Skills will appear here once added through the admin panel.</p>
                </div>
            @else
                @php
                    $categories = [
                        'frontend' => [
                            'title' => 'Frontend Development',
                            'icon' => 'https://img.icons8.com/?size=100&id=wRWcFHf3CbWQ&format=png&color=000000',
                            'is_image' => true,
                        ],
                        'backend' => [
                            'title' => 'Backend Development',
                            'icon' => 'https://img.icons8.com/?size=100&id=eD9kxQH6h53e&format=png&color=000000',
                            'is_image' => true,
                        ],
                        'database' => [
                            'title' => 'Database & Storage',
                            'icon' => 'https://logo.svgcdn.com/devicon-plain/sqldeveloper-plain.png',
                            'is_image' => true,
                        ],
                        'tools' => [
                            'title' => 'Tools & Technologies',
                            'icon' => 'https://img.icons8.com/?size=100&id=46959&format=png&color=000000',
                            'is_image' => true,
                        ],
                    ];
                    
                    $groupedSkills = $skills->groupBy('category');
                @endphp

                <div class="space-y-16">
                    @foreach($categories as $categoryKey => $categoryData)
                        @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                            <div class="group">
                                <!-- Category Header -->
                                <div class="flex items-center gap-4 mb-8">
                                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg transition-transform duration-300 glass-card"
                                         style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, var(--border-color));">
                                        @if($categoryData['is_image'])
                                            <img src="{{ $categoryData['icon'] }}" alt="{{ $categoryData['title'] }}" 
                                                 class="w-10 h-10 object-contain filter drop-shadow-md group-hover:scale-110 transition-transform duration-300" />
                                        @else
                                            <i class="{{ $categoryData['icon'] }} text-3xl" style="color: var(--text-primary);"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-3xl font-bold gradient-text">
                                            {{ $categoryData['title'] }}
                                        </h3>
                                        <p style="color: var(--text-secondary);">
                                            {{ $groupedSkills[$categoryKey]->count() }} 
                                            {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Skills Grid -->
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                                    @foreach($groupedSkills[$categoryKey] as $skill)
                                        <div class="group/skill relative">
                                            <div class="absolute inset-0 rounded-2xl blur opacity-25 group-hover/skill:opacity-75 transition duration-300"
                                                 style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));"></div>
                                            <div class="relative flex flex-col items-center justify-center p-8 rounded-2xl hover:shadow-xl hover:-translate-y-2 transition-all duration-300 glass-card"
                                                 style="background: var(--card-bg); border: 2px solid var(--border-color);">

                                                @php
                                                    $iconUrl = $skill->url;
                                                    $hasValidUrl = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                                @endphp

                                                @if($hasValidUrl)
                                                    <img 
                                                        src="{{ $iconUrl }}" 
                                                        alt="{{ $skill->name }}" 
                                                        class="w-16 h-16 mb-3 group-hover/skill:scale-110 transition-transform duration-300"
                                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                    />
                                                @endif

                                                <!-- Fallback Icon -->
                                                <div class="{{ $hasValidUrl ? 'hidden' : '' }} w-16 h-16 mb-3 flex items-center justify-center rounded-xl group-hover/skill:scale-110 transition-transform duration-300 glass-card"
                                                     style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                                    <i class="fa-solid fa-code text-3xl" style="color: var(--text-primary);"></i>
                                                </div>

                                                <span class="font-semibold text-center text-sm" style="color: var(--text-primary);">{{ $skill->name }}</span>
                                                
                                                @if($skill->level)
                                                    <span class="text-xs mt-1" style="color: var(--text-muted);">{{ $skill->level }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    /* Hide normal theme blobs in monochrome mode */
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }
</style>