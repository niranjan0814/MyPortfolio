@props(['project'])

<section class="py-24 bg-neutral-950 text-white min-h-screen">
    <div class="container mx-auto px-6">
        
        <!-- Back Button -->
        <a href="#projects" class="inline-flex items-center gap-2 text-neutral-400 hover:text-lime-400 transition-colors mb-12 font-mono text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Projects
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Left: Project Image -->
            <div class="space-y-6">
                @if($project->image_url)
                    <div class="relative border border-neutral-800 bg-neutral-900 overflow-hidden group">
                        <div class="absolute inset-0 bg-lime-400 translate-x-2 translate-y-2 -z-10 group-hover:translate-x-4 group-hover:translate-y-4 transition-transform"></div>
                        <img src="{{ $project->image_url }}" 
                             alt="{{ $project->title }}" 
                             class="w-full aspect-video object-cover">
                    </div>
                @endif

                <!-- Additional Images (if available) -->
                @if($project->gallery ?? false)
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($project->gallery as $image)
                            <div class="aspect-square border border-neutral-800 overflow-hidden hover:border-lime-400 transition-colors cursor-pointer">
                                <img src="{{ $image }}" alt="Gallery" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right: Project Details -->
            <div class="space-y-8">
                
                <!-- Title -->
                <div>
                    <h1 class="text-5xl md:text-6xl font-bold tracking-tighter mb-4">
                        {{ $project->title }}<span class="text-lime-400">.</span>
                    </h1>
                    <div class="w-full h-[1px] bg-neutral-800"></div>
                </div>

                <!-- Description -->
                <div class="text-neutral-400 leading-relaxed space-y-4">
                    <p>{{ $project->description }}</p>
                    @if($project->long_description ?? false)
                        <p>{{ $project->long_description }}</p>
                    @endif
                </div>

                <!-- Technologies -->
                @if($project->technologies)
                    <div>
                        <h3 class="text-sm font-mono text-neutral-500 uppercase tracking-widest mb-4">Tech Stack</h3>
                        <div class="flex flex-wrap gap-3">
                            @foreach(explode(',', $project->technologies) as $tech)
                                <span class="px-4 py-2 bg-neutral-900 border border-neutral-800 text-neutral-300 font-mono text-sm hover:border-lime-400 hover:text-lime-400 transition-colors">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Project Links -->
                <div class="flex flex-wrap gap-4 pt-6">
                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" 
                           target="_blank" 
                           class="px-8 py-3 bg-white text-black font-bold hover:bg-lime-400 transition-colors flex items-center gap-2">
                            View Live Demo
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    @endif
                    
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" 
                           target="_blank" 
                           class="px-8 py-3 border border-neutral-700 text-white font-bold hover:border-lime-400 hover:text-lime-400 transition-colors flex items-center gap-2">
                            View Code
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    @endif
                </div>

                <!-- Project Meta -->
                <div class="grid grid-cols-2 gap-6 pt-8 border-t border-neutral-800">
                    @if($project->year ?? false)
                        <div>
                            <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-2">Year</h4>
                            <p class="text-white font-bold">{{ $project->year }}</p>
                        </div>
                    @endif
                    
                    @if($project->role ?? false)
                        <div>
                            <h4 class="text-xs font-mono text-neutral-500 uppercase tracking-widest mb-2">Role</h4>
                            <p class="text-white font-bold">{{ $project->role }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>