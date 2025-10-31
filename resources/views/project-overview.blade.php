<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Project Overview</title>
    <meta name="description" content="{{ strip_tags($overview->overview_description) }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .overview-content h2 {
            @apply text-2xl font-bold text-gray-800 mb-4 mt-6;
        }

        .overview-content h3 {
            @apply text-xl font-semibold text-gray-700 mb-3 mt-4;
        }

        .overview-content p {
            @apply text-gray-600 leading-relaxed mb-4;
        }

        .overview-content ul {
            @apply list-disc list-inside text-gray-600 space-y-2 ml-4 mb-4;
        }

        .overview-content ol {
            @apply list-decimal list-inside text-gray-600 space-y-2 ml-4 mb-4;
        }

        .overview-content a {
            @apply text-blue-600 hover:text-blue-700 underline;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <!-- Header with Back Button -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="/#projects" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium">Back to Projects</span>
                </a>
                <h1 class="text-xl font-bold text-gray-800">{{ $project->title }}</h1>
            </div>
        </nav>
    </header>

    <main class="pt-24 pb-16 px-4">
        <div class="container mx-auto max-w-6xl fade-in">
            
            <!-- Project Header -->
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8 border border-gray-200">
                <div class="flex flex-col md:flex-row items-start gap-8">
                    @if($project->image)
                        <div class="flex-shrink-0 w-full md:w-64">
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="w-full h-48 object-cover rounded-xl shadow-md">
                        </div>
                    @endif
                    
                    <div class="flex-1">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ $project->title }}
                        </h1>
                        <p class="text-gray-600 text-lg mb-6">{{ $project->description }}</p>
                        
                        <div class="flex flex-wrap gap-3">
                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                   class="inline-flex items-center gap-2 bg-gray-800 text-white px-5 py-2 rounded-lg font-medium hover:bg-gray-900 transition-all">
                                    <i class="fab fa-github"></i> View Code
                                </a>
                            @endif
                            
                            @if($project->depurl)
                                <a href="{{ $project->depurl }}" target="_blank"
                                   class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-5 py-2 rounded-lg font-medium hover:from-green-600 hover:to-emerald-600 transition-all">
                                    <i class="fas fa-external-link-alt"></i> View Live Demo
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Overview Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8 border border-gray-200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Overview</h2>
                </div>
                
                <div class="overview-content prose max-w-none">
                    {!! $overview->overview_description !!}
                </div>
            </div>

            <!-- Key Features Section -->
            @if(!empty($overview->key_features) && count($overview->key_features) > 0)
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8 border border-gray-200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Key Features</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($overview->key_features as $feature => $description)
                        <div class="bg-gradient-to-br from-green-50 to-teal-50 p-6 rounded-xl border-2 border-green-200 hover:border-green-400 transition-all">
                            <h3 class="text-xl font-bold text-green-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-check-circle"></i>
                                {{ $feature }}
                            </h3>
                            <p class="text-gray-700 leading-relaxed">{{ $description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Tech Stack Section -->
            @if($techStackSkills->isNotEmpty())
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8 border border-gray-200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-code text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Technology Stack</h2>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @foreach($techStackSkills as $skill)
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                            <div class="relative flex flex-col items-center justify-center p-6 bg-white rounded-2xl border-2 border-gray-100 hover:border-transparent transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                @if($skill->url)
                                    <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="w-12 h-12 mb-2 group-hover:scale-110 transition-transform" />
                                @else
                                    <div class="w-12 h-12 mb-2 flex items-center justify-center bg-gradient-to-br from-orange-400 to-red-500 rounded-xl">
                                        <i class="fas fa-code text-white text-xl"></i>
                                    </div>
                                @endif
                                <span class="font-semibold text-gray-700 text-center text-sm">{{ $skill->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Project Gallery Section -->
            @if(!empty($overview->gallery_images) && count($overview->gallery_images) > 0)
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border border-gray-200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-images text-white text-xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Project Gallery</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($overview->gallery_images as $image)
                        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                            <img src="{{ $image }}" 
                                 alt="Gallery Image" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <p class="text-white font-medium">Click to view full size</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} All Rights Reserved</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-8 right-8 bg-gradient-to-r from-blue-600 to-purple-600 text-white p-4 rounded-full shadow-lg opacity-0 pointer-events-none transition-all duration-300 hover:scale-110 z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.pointerEvents = 'auto';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.pointerEvents = 'none';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>