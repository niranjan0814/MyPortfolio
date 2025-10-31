@props(['projects'])
<!-- resources/views/components/projects.blade.php -->
<section id="projects" class="section-full bg-white">
    <div class="container mx-auto fade-in">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center text-gray-800">Projects</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($projects as $project)
                <!-- Dynamic Project Card -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 card-hover hover:shadow-lg transition-shadow">
                    
                    <!-- Image / Icon Section -->
                    @if ($project->image)
                        <div class="h-48 overflow-hidden border-b border-gray-200 flex items-center justify-center bg-gradient-to-r from-blue-50 to-blue-100">
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="object-cover h-full w-full hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 h-48 flex items-center justify-center border-b border-gray-200">
                            <i class="fas fa-folder-open text-6xl text-blue-600"></i>
                        </div>
                    @endif

                    <!-- Project Details -->
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-3 text-gray-800">
                            {{ $project->title }}
                        </h3>

                        @if ($project->created_at)
                            <p class="text-gray-500 mb-4">
                                {{ $project->created_at->format('M Y') }}
                            </p>
                        @endif

                        <p class="text-gray-600 mb-4 leading-relaxed">
                            {{ $project->description }}
                        </p>

                        <!-- Tech Stack Tags -->
                        @if (!empty($project->tags))
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach (explode(',', $project->tags) as $tag)
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Project Links -->
                        <div class="flex flex-wrap gap-3">
                            {{-- View Overview (if overview exists) --}}
                            @if ($project->overview)
                                <a href="{{ route('project.overview', $project->id) }}"
                                   class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-4 py-2 rounded-lg font-medium hover:from-purple-600 hover:to-indigo-600 transition-all duration-300 shadow-md hover:shadow-lg">
                                    <i class="fas fa-book-open"></i>
                                    View Overview
                                </a>
                            @endif

                            {{-- GitHub/Source Link --}}
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                   class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                                    <i class="fab fa-github mr-2"></i> View Code
                                </a>
                            @endif

                            {{-- Live Demo Link (Only if deployed) --}}
                            @if ($project->depurl)
                                <a href="{{ $project->depurl }}" target="_blank"
                                   class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-4 py-2 rounded-lg font-medium hover:from-green-600 hover:to-emerald-600 transition-all duration-300 shadow-md hover:shadow-lg">
                                    <i class="fas fa-external-link-alt"></i>
                                    View Live
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">No projects added yet.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>