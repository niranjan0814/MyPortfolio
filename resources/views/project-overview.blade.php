@extends('layouts.app')

@section('content')
<div class="pt-24 pb-16">
    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <nav class="flex items-center gap-2 text-sm">
            <a href="{{ route('portfolio.index') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                Home
            </a>
            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('portfolio.index') }}#projects" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                Projects
            </a>
            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-600 font-medium">{{ $project->title }}</span>
        </nav>
    </div>

    <main class="relative px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="mb-12 animate-fadeIn">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity"></div>
                    
                    <div class="relative bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                        <div class="flex flex-col lg:flex-row items-start justify-between gap-8">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="p-3 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg">
                                        <i class="fas fa-bolt text-white text-2xl"></i>
                                    </div>
                                    <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                        {{ $project->title }}
                                    </h1>
                                </div>
                                
                                <p class="text-xl text-gray-600 leading-relaxed mb-6">
                                    {{ $project->description }}
                                </p>

                                <div class="flex flex-wrap gap-3">
                                    @if($project->link)
                                        <a href="{{ $project->link }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-gray-800 to-gray-900 text-white rounded-xl font-medium hover:shadow-xl transition-all hover:-translate-y-1" target="_blank">
                                            <i class="fab fa-github"></i>
                                            View Source
                                        </a>
                                    @endif
                                    
                                    @if($project->depurl)
                                        <a href="{{ $project->depurl }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium hover:shadow-xl transition-all hover:-translate-y-1" target="_blank">
                                            <i class="fas fa-external-link-alt"></i>
                                            Live Demo
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Stats Cards -->
                            <div class="grid grid-cols-2 gap-4 sm:gap-6">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200 hover:shadow-lg transition-shadow">
                                    <div class="text-4xl font-bold text-blue-600 mb-1">{{ $techStackSkills->count() }}</div>
                                    <div class="text-sm text-gray-600">Technologies</div>
                                </div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200 hover:shadow-lg transition-shadow">
                                    <div class="text-4xl font-bold text-purple-600 mb-1">{{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}</div>
                                    <div class="text-sm text-gray-600">Key Features</div>
                                </div>
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
                            <div class="text-gray-600 leading-relaxed text-lg">
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
                                <div class="group relative hover:transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-3xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                    <div class="relative bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                                        <div class="flex items-start gap-4">
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
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($techStackSkills as $skill)
                                <div class="group relative hover:transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                    <div class="relative bg-white rounded-2xl shadow-lg p-6 border border-gray-100 text-center">
                                        @if($skill->url)
                                            <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="w-16 h-16 mx-auto mb-3 object-contain group-hover:scale-110 transition-transform">
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
                                    <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all">
                                        <img src="{{ $image }}" alt="Project Screenshot {{ $loop->iteration }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
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
</div>

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
</script>
@endsection