@extends('layouts.app')

@section('content')
<div class="pt-24 pb-16">
    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <nav class="flex items-center gap-2 text-sm">
            <a href="{{ route('portfolio.index') }}" class="font-medium transition-colors" 
               style="color: var(--accent-blue); hover:color: var(--accent-purple);">
                Home
            </a>
            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('portfolio.index') }}#projects" class="font-medium transition-colors"
               style="color: var(--accent-blue); hover:color: var(--accent-purple);">
                Projects
            </a>
            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium" style="color: var(--text-secondary);">{{ $project->title }}</span>
        </nav>
    </div>

    <main class="relative px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="mb-12 animate-fadeIn">
                <div class="relative">
                    <div class="absolute inset-0 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity"
                         style="background: linear-gradient(to right, var(--accent-blue), var(--accent-purple), var(--accent-pink));"></div>
                    
                    <div class="relative rounded-3xl shadow-2xl p-8 md:p-12 border glass-card">
                        <div class="flex flex-col lg:flex-row items-start justify-between gap-8">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="p-3 rounded-2xl shadow-lg"
                                         style="background: linear-gradient(to bottom right, var(--accent-blue), var(--accent-purple));">
                                        <i class="fas fa-bolt text-white text-2xl"></i>
                                    </div>
                                    <h1 class="text-4xl md:text-5xl font-bold gradient-text">
                                        {{ $project->title }}
                                    </h1>
                                </div>
                                
                                <p class="text-xl leading-relaxed mb-6" style="color: var(--text-secondary);">
                                    {{ $project->description }}
                                </p>

                                <div class="flex flex-wrap gap-3">
                                    @if($project->link)
                                        <a href="{{ $project->link }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-medium hover:shadow-xl transition-all hover:-translate-y-1 glass-button" target="_blank"
                                           style="background: var(--card-bg); color: var(--text-primary); border-color: var(--border-color);">
                                            <i class="fab fa-github"></i>
                                            View Source
                                        </a>
                                    @endif
                                    
                                    @if($project->depurl)
                                        <a href="{{ $project->depurl }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-medium hover:shadow-xl transition-all hover:-translate-y-1 theme-btn" target="_blank">
                                            <i class="fas fa-external-link-alt"></i>
                                            Live Demo
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Stats Cards -->
                            <div class="grid grid-cols-2 gap-4 sm:gap-6">
                                <div class="rounded-2xl p-6 border glass-card hover:shadow-lg transition-shadow">
                                    <div class="text-4xl font-bold mb-1" style="color: var(--accent-blue);">{{ $techStackSkills->count() }}</div>
                                    <div class="text-sm" style="color: var(--text-secondary);">Technologies</div>
                                </div>
                                <div class="rounded-2xl p-6 border glass-card hover:shadow-lg transition-shadow">
                                    <div class="text-4xl font-bold mb-1" style="color: var(--accent-purple);">{{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}</div>
                                    <div class="text-sm" style="color: var(--text-secondary);">Key Features</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="mb-8 animate-fadeIn" style="animation-delay: 200ms">
                <div class="rounded-2xl shadow-lg p-2 inline-flex gap-2 border glass-card flex-wrap">
                    <button onclick="switchTab('overview')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all theme-btn" data-tab="overview">
                        <i class="fas fa-book-open"></i>
                        Overview
                    </button>
                    <button onclick="switchTab('features')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all glass-button" data-tab="features"
                            style="background: var(--card-bg); color: var(--text-primary); border-color: var(--border-color);">
                        <i class="fas fa-sparkles"></i>
                        Features
                    </button>
                    <button onclick="switchTab('tech')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all glass-button" data-tab="tech"
                            style="background: var(--card-bg); color: var(--text-primary); border-color: var(--border-color);">
                        <i class="fas fa-code"></i>
                        Tech Stack
                    </button>
                    @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                        <button onclick="switchTab('gallery')" class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all glass-button" data-tab="gallery"
                                style="background: var(--card-bg); color: var(--text-primary); border-color: var(--border-color);">
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
                    <div class="rounded-3xl shadow-xl p-8 md:p-12 border glass-card">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="p-4 rounded-2xl shadow-lg"
                                 style="background: linear-gradient(to bottom right, var(--accent-blue), var(--accent-purple));">
                                <i class="fas fa-book-open text-white text-3xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold" style="color: var(--text-primary);">Project Overview</h2>
                        </div>
                        
                        <div class="prose prose-lg max-w-none">
                            <div class="leading-relaxed text-lg" style="color: var(--text-secondary);">
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
                                    <div class="absolute inset-0 rounded-3xl blur opacity-20 group-hover:opacity-40 transition-opacity"
                                         style="background: linear-gradient(to right, var(--accent-blue), var(--accent-purple));"></div>
                                    <div class="relative rounded-3xl shadow-xl p-8 border glass-card">
                                        <div class="flex items-start gap-4">
                                            <div class="text-5xl">
                                                @if($loop->index == 0) 💬
                                                @elseif($loop->index == 1) 🔄
                                                @elseif($loop->index == 2) 🔍
                                                @else 🛡️
                                                @endif
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="text-xl font-bold mb-2 flex items-center gap-2"
                                                    style="color: var(--text-primary);">
                                                    {{ $featureKey }}
                                                    <i class="fas fa-check-circle" style="color: var(--accent-green);"></i>
                                                </h3>
                                                <p class="leading-relaxed" style="color: var(--text-secondary);">
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
                    <div class="rounded-3xl shadow-xl p-8 md:p-12 border glass-card">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="p-4 rounded-2xl shadow-lg"
                                 style="background: linear-gradient(to bottom right, var(--accent-orange), var(--accent-red));">
                                <i class="fas fa-code text-white text-3xl"></i>
                            </div>
                            <h2 class="text-3xl font-bold" style="color: var(--text-primary);">Technology Stack</h2>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($techStackSkills as $skill)
                                <div class="group relative hover:transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="absolute inset-0 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity"
                                         style="background: linear-gradient(to right, var(--accent-blue), var(--accent-cyan));"></div>
                                    <div class="relative rounded-2xl shadow-lg p-6 border glass-card text-center">
                                        @if($skill->url)
                                            <img src="{{ $skill->url }}" alt="{{ $skill->name }}" 
                                                 class="w-16 h-16 mx-auto mb-3 object-contain group-hover:scale-110 transition-transform">
                                        @else
                                            <div class="text-6xl mb-3">💻</div>
                                        @endif
                                        <div class="font-bold" style="color: var(--text-primary);">{{ $skill->name }}</div>
                                        @if($skill->level)
                                            <div class="text-sm mt-1" style="color: var(--text-muted);">{{ $skill->level }}</div>
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
                        <div class="rounded-3xl shadow-xl p-8 md:p-12 border glass-card">
                            <div class="flex items-center gap-4 mb-8">
                                <div class="p-4 rounded-2xl shadow-lg"
                                     style="background: linear-gradient(to bottom right, var(--accent-pink), var(--accent-purple));">
                                    <i class="fas fa-images text-white text-3xl"></i>
                                </div>
                                <h2 class="text-3xl font-bold" style="color: var(--text-primary);">Project Gallery</h2>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                @foreach($overview->gallery_images as $image)
                                    <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all glass-card">
                                        <img src="{{ $image }}" alt="Project Screenshot {{ $loop->iteration }}" 
                                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute bottom-0 left-0 right-0 p-4"
                                             style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
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
            button.classList.remove('theme-btn');
            button.classList.add('glass-button');
            button.style.background = 'var(--card-bg)';
            button.style.color = 'var(--text-primary)';
            button.style.borderColor = 'var(--border-color)';
        });
        
        const activeButton = document.querySelector(`[data-tab="${tabName}"]`);
        activeButton.classList.add('theme-btn');
        activeButton.classList.remove('glass-button');
        activeButton.style.background = '';
        activeButton.style.color = '';
        activeButton.style.borderColor = '';
    }

    // Add theme-specific styles
    document.addEventListener('DOMContentLoaded', function() {
        const style = document.createElement('style');
        style.textContent = `
            .glass-card {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.15);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            [data-theme="monochrome"] .glass-card {
                background: rgba(30, 30, 30, 0.3);
                border-color: rgba(255, 255, 255, 0.1);
            }
            
            .theme-btn {
                background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));
                color: white;
                border: none;
            }
            
            .glass-button {
                background: var(--card-bg);
                color: var(--text-primary);
                border: 1px solid var(--border-color);
            }
            
            .gradient-text {
                background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent !important;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .animate-fadeIn {
                animation: fadeIn 0.8s ease-in;
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection