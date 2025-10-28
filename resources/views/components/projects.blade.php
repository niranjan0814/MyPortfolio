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

                        <!-- Optional date or custom field -->
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

                        <!-- Project Link -->
                        @if ($project->link)
                            <a href="{{ $project->link }}" target="_blank"
                               class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors">
                                <i class="fab fa-github mr-2"></i> View on GitHub
                            </a>
                        @endif
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

