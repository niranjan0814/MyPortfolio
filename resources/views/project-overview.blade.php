@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Project Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .animate-fadeIn { animation: fadeIn 0.6s ease-out forwards; }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        .float { animation: float 3s ease-in-out infinite; }

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); }

        .tab-button { position: relative; overflow: hidden; }
        .tab-button::before {
            content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        .tab-button:hover::before { left: 100%; }

        .image-container { position: relative; overflow: hidden; }
        .image-container img { transition: transform 0.5s ease; }
        .image-container:hover img { transform: scale(1.1); }

        .glow-effect { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
        .glow-effect:hover { box-shadow: 0 0 40px rgba(59, 130, 246, 0.5); }
    </style>
</head>
<body class="min-h-screen">
    <!-- Animated Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Header -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
        </div>
    </header>

    <main class="relative pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="mb-12 animate-fadeIn">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity"></div>
                    
                    <div class="relative bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                        <div class="flex flex-col lg:flex-row items-start justify-between gap-8">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="p-3 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg float">
                                        <i class="fas fa-bolt text-white text-2xl"></i>
                                    </div>
                                    <h1 class="text-4xl md:text-5xl font-bold gradient-text">
                                        {{ $project->title }}
                                    </h1>
                                </div>
                                
                                <p class="text-xl text-gray-600 leading-relaxed mb-6">
                                    {{ $project->description }}
                                </p>

                                <div class="flex flex-wrap gap-3">
                                    @if($project->link)
                                        <a href="{{ $project->link }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-gray-800 to-gray-900 text-white rounded-xl font-medium hover:shadow-xl transition-all hover:-translate-y-1 glow-effect" target="_blank">
                                            <i class="fab fa-github"></i>
                                            View Source
                                        </a>
                                    @endif
                                    
                                    @if($project->depurl)
                                        <a href="{{ $project->depurl }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-xl transition-all hover:-translate-y-1 glow-effect" target="_blank">
                                            <i class="fas fa-external-link-alt"></i>
                                            Live Demo
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Stats Cards -->
                            <div class="grid grid-cols-2 gap-4 sm:gap-6">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200 card-hover">
                                    <div class="text-4xl font-bold text-blue-600 mb-1">{{ $techStackSkills->count() }}</div>
                                    <div class="text-sm text-gray-600">Technologies</div>
                                </div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200 card-hover">
                                    <div class="text-4xl font-bold text-purple-600 mb-1">{{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}</div>
                                    <div class="text-sm text-gray-600">Key Features</div>
                                </div>
                            </div>
                        </div>

                        <!-- Scroll Indicator -->
                        <div class="flex justify-center mt-8">
                            <div class="animate-bounce">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="mb-8 animate-fadeIn" style="animation-delay: 200ms">
                <div class="bg-white rounded-2xl shadow-lg p-2 inline-flex gap-2 border border-gray-100 flex-wrap">
                    <button onclick="switchTab('overview')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg" data-tab="overview">
                        <i class="fas fa-book-open"></i>
                        Overview
                    </button>
                    <button onclick="switchTab('features')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all text-gray-600 hover:bg-gray-50" data-tab="features">
                        <i class="fas fa-sparkles"></i>
                        Features
                    </button>
                    <button onclick="switchTab('tech')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all text-gray-600 hover:bg-gray-50" data-tab="tech">
                        <i class="fas fa-code"></i>
                        Tech Stack
                    </button>
                    @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                        <button onclick="switchTab('gallery')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all text-gray-600 hover:bg-gray-50" data-tab="gallery">
                            <i class="fas fa-images"></i>
                            Gallery
                        </button>
                    @endif
                </div>
            </div>

            <!-- Content Sections -->
            <div id="content-container">
                <!-- Overview Tab -->
                <div id="overview-content" class="content-section animate-fadeIn">
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="p-4 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg">
                                <i class="fas fa-book-open text-white text-3xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800">Project Overview</h2>
                        </div>
                        
                        <div class="prose prose-lg max-w-none">
                            <div class="text-gray-600 leading-relaxed text-lg mb-6">
                                {!! $overview->overview_description !!}
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

                <!-- Features Tab -->
                <div id="features-content" class="content-section hidden">
                    <div class="grid md:grid-cols-2 gap-6">
                        @if(is_array($overview->key_features))
                            @foreach($overview->key_features as $featureKey => $featureValue)
                                <div class="group relative card-hover" style="animation-delay: {{ $loop->index * 100 }}ms">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-3xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                    <div class="relative bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                                        <div class="flex items-start gap-4 mb-4">
                                            <div class="text-5xl">
                                                @if($loop->index == 0) 💬
                                                @elseif($loop->index == 1) 🔄
                                                @elseif($loop->index == 2) 🔍
                                                @else 🛡️
                                                @endif
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                                                    {{ $featureKey }}
                                                    <i class="fas fa-check-circle text-green-500"></i>
                                                </h3>
                                                <p class="text-gray-600 leading-relaxed">
                                                    {{ $featureValue }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Tech Stack Tab -->
                <div id="tech-content" class="content-section hidden">
                    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="p-4 rounded-2xl bg-gradient-to-br from-orange-500 to-red-600 shadow-lg">
                                <i class="fas fa-code text-white text-3xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800">Technology Stack</h2>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach($techStackSkills as $skill)
                                <div class="group relative card-hover" style="animation-delay: {{ $loop->index * 100 }}ms">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                    <div class="relative bg-white rounded-2xl shadow-lg p-6 border border-gray-100 text-center">
                                        @if($skill->url)
                                            <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="w-16 h-16 mx-auto mb-3 object-contain">
                                        @else
                                            <div class="text-6xl mb-3">💻</div>
                                        @endif
                                        <div class="font-bold text-gray-800">{{ $skill->name }}</div>
                                        @if($skill->level)
                                            <div class="text-sm text-gray-500 mt-1">{{ $skill->level }}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Gallery Tab -->
                @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                    <div id="gallery-content" class="content-section hidden">
                        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                            <div class="flex items-center gap-4 mb-8">
                                <div class="p-4 rounded-2xl bg-gradient-to-br from-pink-500 to-purple-600 shadow-lg">
                                    <i class="fas fa-images text-white text-3xl"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-800">Project Gallery</h2>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                @foreach($overview->gallery_images as $image)
                                    <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all image-container" style="animation-delay: {{ $loop->index * 100 }}ms">
                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 opacity-0 group-hover:opacity-20 transition-opacity"></div>
                                        <img src="{{ $image }}" alt="Project Screenshot {{ $loop->iteration }}" class="w-full h-64 object-cover">
                                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                                            <p class="text-white font-medium">Screenshot {{ $loop->iteration }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Back to Top Button -->
    <button onclick="scrollToTop()" id="backToTop" class="fixed bottom-8 right-8 p-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 opacity-0 pointer-events-none z-50">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        function switchTab(tabName) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('animate-fadeIn');
            });
            
            const selectedContent = document.getElementById(tabName + '-content');
            selectedContent.classList.remove('hidden');
            setTimeout(() => selectedContent.classList.add('animate-fadeIn'), 10);
            
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white', 'shadow-lg');
                button.classList.add('text-gray-600', 'hover:bg-gray-50');
            });
            
            const activeButton = document.querySelector(`[data-tab="${tabName}"]`);
            activeButton.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white', 'shadow-lg');
            activeButton.classList.remove('text-gray-600', 'hover:bg-gray-50');
        }

        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            const backToTop = document.getElementById('backToTop');
            
            if (window.scrollY > 50) {
                header.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-lg');
                header.classList.remove('bg-transparent');
            } else {
                header.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-lg');
                header.classList.add('bg-transparent');
            }
            
            if (window.scrollY > 300) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>
@endsection