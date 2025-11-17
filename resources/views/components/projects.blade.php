@props(['projects'])
<!-- resources/views/components/projects.blade.php -->
<section id="projects" class="section-full relative overflow-hidden" style="background: var(--bg-primary);">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-5 normal-theme-only">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>

    <!-- Monochrome particles -->
    <div class="hero-particles"></div>

    <div class="container mx-auto fade-in relative z-10 px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Projects</h2>
            <div class="h-1 w-32 mx-auto rounded-full"
                 style="background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($projects as $project)
                <!-- Dynamic Project Card -->
                <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-2 glass-card"
                     style="background: var(--card-bg); border: 1px solid var(--border-color);">
                    
                    <!-- Glassmorphism overlay on hover (monochrome only) -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                         style="background: var(--glass-bg); backdrop-filter: var(--glass-blur);"></div>
                    
                    <!-- Image / Icon Section -->
                    @if ($project->image)
                        <div class="h-48 overflow-hidden flex items-center justify-center relative"
                             style="background: var(--bg-gradient-start); border-bottom: 1px solid var(--border-color);">
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="object-cover h-full w-full group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="h-48 flex items-center justify-center relative"
                             style="background: var(--bg-gradient-start); border-bottom: 1px solid var(--border-color);">
                            <i class="fas fa-folder-open text-6xl" style="color: var(--accent-blue);"></i>
                        </div>
                    @endif

                    <!-- Project Details -->
                    <div class="p-6 relative z-10">
                        <h3 class="text-2xl font-bold mb-3" style="color: var(--text-primary);">
                            {{ $project->title }}
                        </h3>

                        @if ($project->created_at)
                            <p class="mb-4 text-sm" style="color: var(--text-muted);">
                                {{ $project->created_at->format('M Y') }}
                            </p>
                        @endif

                        <p class="mb-4 leading-relaxed" style="color: var(--text-secondary);">
                            {{ $project->description }}
                        </p>

                        <!-- Tech Stack Tags -->
                        @if (!empty($project->tags))
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach (explode(',', $project->tags) as $tag)
                                    <span class="px-3 py-1 rounded-full text-sm font-medium glass-card"
                                          style="background: var(--glass-bg, #dbeafe); color: var(--accent-blue); border: 1px solid var(--glass-border, #3b82f6);">
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Project Links -->
                        <div class="flex flex-wrap gap-3 items-center">
                            {{-- GitHub/Source Link --}}
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                   class="inline-flex items-center gap-2 font-medium transition-colors hover:opacity-80"
                                   style="color: var(--accent-blue);">
                                    <i class="fab fa-github text-lg"></i> 
                                    <span>View Code</span>
                                </a>
                            @endif

                            {{-- Live Demo Link --}}
                            @if ($project->depurl)
                                <a href="{{ $project->depurl }}" target="_blank"
                                   class="inline-flex items-center gap-2 font-medium transition-colors hover:opacity-80"
                                   style="color: #10b981;">
                                    <i class="fas fa-external-link-alt text-lg"></i>
                                    <span>View Live</span>
                                </a>
                            @endif

                            {{-- View Overview --}}
                            @if ($project->overview)
                                <a href="{{ route('project.overview', $project->id) }}"
                                   class="inline-flex items-center gap-2 font-medium transition-colors hover:opacity-80 ml-auto"
                                   style="color: var(--accent-purple);">
                                    <i class="fas fa-book-open text-lg"></i>
                                    <span>Overview</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-3 text-center py-10">
                    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full mb-4 glass-card"
                         style="background: var(--card-bg); border: 1px solid var(--border-color);">
                        <i class="fas fa-folder-open text-4xl" style="color: var(--text-muted);"></i>
                    </div>
                    <p class="text-lg" style="color: var(--text-muted);">No projects added yet.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>