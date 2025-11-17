@extends('layouts.app')

@section('content')
<div class="pt-24 pb-16 relative overflow-hidden"
     style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));">
    
    <!-- Background decoration (Normal theme only) -->
    <div class="absolute inset-0 opacity-5 normal-theme-only pointer-events-none">
        <div class="absolute top-20 left-10 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
    </div>

    <!-- Monochrome particles -->
    <div class="hero-particles absolute inset-0 pointer-events-none"></div>

    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 relative z-10">
        <nav class="flex items-center gap-2 text-sm flex-wrap">
            <a href="{{ route('portfolio.index') }}" 
               class="font-medium transition-colors hover:opacity-80"
               style="color: var(--accent-blue);">
                Home
            </a>
            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('portfolio.index') }}#projects" 
               class="font-medium transition-colors hover:opacity-80"
               style="color: var(--accent-blue);">
                Projects
            </a>
            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium" style="color: var(--text-secondary);">{{ $project->title }}</span>
        </nav>
    </div>

    <main class="relative px-4 sm:px-6 lg:px-8 z-10">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Section -->
            <div class="mb-12 animate-fadeIn">
                <div class="relative group">
                    <!-- Glow effect -->
                    <div class="absolute inset-0 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110"
                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));"></div>
                    
                    <div class="relative rounded-3xl shadow-2xl p-8 md:p-12 glass-card glass-noise"
                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                        <div class="flex flex-col lg:flex-row items-start justify-between gap-8">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-4 flex-wrap">
                                    <div class="p-3 rounded-2xl shadow-lg glass-card"
                                         style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                        <i class="fas fa-bolt text-white text-2xl"></i>
                                    </div>
                                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold gradient-text">
                                        {{ $project->title }}
                                    </h1>
                                </div>
                                
                                <p class="text-lg md:text-xl leading-relaxed mb-6" style="color: var(--text-secondary);">
                                    {{ $project->description }}
                                </p>

                                <div class="flex flex-wrap gap-3">
                                    @if($project->link)
                                        <a href="{{ $project->link }}" 
                                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all hover:-translate-y-1 glass-button"
                                           style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);"
                                           target="_blank">
                                            <i class="fab fa-github"></i>
                                            View Source
                                        </a>
                                    @endif
                                    
                                    @if($project->depurl)
                                        <a href="{{ $project->depurl }}" 
                                           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all hover:-translate-y-1 theme-btn"
                                           target="_blank">
                                            <i class="fas fa-external-link-alt"></i>
                                            Live Demo
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Stats Cards -->
                            <div class="grid grid-cols-2 gap-4 sm:gap-6">
                                <div class="rounded-2xl p-6 glass-card transition-all hover:shadow-lg hover:-translate-y-1"
                                     style="background: var(--card-bg); border: 1px solid var(--border-color);">
                                    <div class="text-3xl md:text-4xl font-bold mb-1" style="color: var(--accent-blue);">
                                        {{ $techStackSkills->count() }}
                                    </div>
                                    <div class="text-sm" style="color: var(--text-secondary);">Technologies</div>
                                </div>
                                <div class="rounded-2xl p-6 glass-card transition-all hover:shadow-lg hover:-translate-y-1"
                                     style="background: var(--card-bg); border: 1px solid var(--border-color);">
                                    <div class="text-3xl md:text-4xl font-bold mb-1" style="color: var(--accent-purple);">
                                        {{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}
                                    </div>
                                    <div class="text-sm" style="color: var(--text-secondary);">Key Features</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="mb-8 animate-fadeIn" style="animation-delay: 200ms">
                <div class="rounded-2xl shadow-lg p-2 inline-flex gap-2 glass-card flex-wrap"
                     style="background: var(--card-bg); border: 1px solid var(--border-color);">
                    <button onclick="switchTab('overview')" 
                            class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all theme-btn" 
                            data-tab="overview">
                        <i class="fas fa-book-open"></i>
                        <span class="hidden sm:inline">Overview</span>
                    </button>
                    <button onclick="switchTab('features')" 
                            class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all glass-button" 
                            data-tab="features"
                            style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                        <i class="fas fa-sparkles"></i>
                        <span class="hidden sm:inline">Features</span>
                    </button>
                    <button onclick="switchTab('tech')" 
                            class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all glass-button" 
                            data-tab="tech"
                            style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                        <i class="fas fa-code"></i>
                        <span class="hidden sm:inline">Tech Stack</span>
                    </button>
                    @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                        <button onclick="switchTab('gallery')" 
                                class="tab-button flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all glass-button" 
                                data-tab="gallery"
                                style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                            <i class="fas fa-images"></i>
                            <span class="hidden sm:inline">Gallery</span>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Content Sections -->
            <div id="content-container">
                <!-- Overview Tab -->
                <div id="overview-content" class="content-section animate-fadeIn">
                    <div class="rounded-3xl shadow-xl p-8 md:p-12 glass-card glass-noise"
                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                        <div class="flex items-center gap-4 mb-8 flex-wrap">
                            <div class="p-4 rounded-2xl shadow-lg glass-card"
                                 style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                <i class="fas fa-book-open text-white text-2xl md:text-3xl"></i>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold" style="color: var(--text-primary);">Project Overview</h2>
                        </div>
                        
                        <div class="prose prose-lg max-w-none">
                            <div class="leading-relaxed text-base md:text-lg" style="color: var(--text-secondary);">
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
                                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));"></div>
                                    <div class="relative rounded-3xl shadow-xl p-6 md:p-8 glass-card glass-noise"
                                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                                        <div class="flex items-start gap-4">
                                            <div class="text-4xl md:text-5xl flex-shrink-0">
                                                @if($loop->index == 0) 💬
                                                @elseif($loop->index == 1) 🔄
                                                @elseif($loop->index == 2) 🔍
                                                @else 🛡️
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h3 class="text-lg md:text-xl font-bold mb-2 flex items-center gap-2 flex-wrap"
                                                    style="color: var(--text-primary);">
                                                    <span class="break-words">{{ $featureKey }}</span>
                                                    <i class="fas fa-check-circle flex-shrink-0" style="color: var(--accent-green);"></i>
                                                </h3>
                                                <p class="leading-relaxed text-sm md:text-base" style="color: var(--text-secondary);">
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
                    <div class="rounded-3xl shadow-xl p-8 md:p-12 glass-card glass-noise"
                         style="background: var(--card-bg); border: 2px solid var(--border-color);">
                        <div class="flex items-center gap-4 mb-8 flex-wrap">
                            <div class="p-4 rounded-2xl shadow-lg glass-card"
                                 style="background: var(--glass-bg, linear-gradient(135deg, #f97316, #ef4444)); border: 1px solid var(--glass-border, transparent);">
                                <i class="fas fa-code text-white text-2xl md:text-3xl"></i>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold" style="color: var(--text-primary);">Technology Stack</h2>
                        </div>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                            @foreach($techStackSkills as $skill)
                                <div class="group relative hover:transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="absolute inset-0 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity"
                                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));"></div>
                                    <div class="relative rounded-2xl shadow-lg p-4 md:p-6 glass-card text-center"
                                         style="background: var(--card-bg); border: 1px solid var(--border-color);">
                                        @if($skill->url)
                                            <img src="{{ $skill->url }}" 
                                                 alt="{{ $skill->name }}" 
                                                 class="w-12 h-12 md:w-16 md:h-16 mx-auto mb-3 object-contain group-hover:scale-110 transition-transform"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        @endif
                                        <div class="{{ $skill->url ? 'hidden' : 'flex' }} w-12 h-12 md:w-16 md:h-16 mx-auto mb-3 items-center justify-center rounded-xl glass-card"
                                             style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); border: 1px solid var(--glass-border, transparent);">
                                            <i class="fas fa-code text-2xl md:text-3xl" style="color: var(--text-primary);"></i>
                                        </div>
                                        <div class="font-bold text-sm md:text-base break-words" style="color: var(--text-primary);">
                                            {{ $skill->name }}
                                        </div>
                                        @if($skill->level)
                                            <div class="text-xs md:text-sm mt-1" style="color: var(--text-muted);">
                                                {{ $skill->level }}
                                            </div>
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
                        <div class="rounded-3xl shadow-xl p-8 md:p-12 glass-card glass-noise"
                             style="background: var(--card-bg); border: 2px solid var(--border-color);">
                            <div class="flex items-center gap-4 mb-8 flex-wrap">
                                <div class="p-4 rounded-2xl shadow-lg glass-card"
                                     style="background: var(--glass-bg, linear-gradient(135deg, #ec4899, #8b5cf6)); border: 1px solid var(--glass-border, transparent);">
                                    <i class="fas fa-images text-white text-2xl md:text-3xl"></i>
                                </div>
                                <h2 class="text-2xl md:text-3xl font-bold" style="color: var(--text-primary);">Project Gallery</h2>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-4 md:gap-6">
                                @foreach($overview->gallery_images as $image)
                                    <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all glass-card"
                                         style="background: var(--card-bg); border: 1px solid var(--border-color);">
                                        <img src="{{ $image }}" 
                                             alt="Project Screenshot {{ $loop->iteration }}" 
                                             class="w-full h-48 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute bottom-0 left-0 right-0 p-4"
                                             style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                            <p class="text-white font-medium text-sm md:text-base">Screenshot {{ $loop->iteration }}</p>
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
        // Hide all content sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.add('hidden');
            section.classList.remove('animate-fadeIn');
        });
        
        // Show selected content with animation
        const selectedContent = document.getElementById(tabName + '-content');
        selectedContent.classList.remove('hidden');
        setTimeout(() => selectedContent.classList.add('animate-fadeIn'), 10);
        
        // Reset all buttons to inactive state
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('theme-btn');
            button.classList.add('glass-button');
            button.style.background = 'var(--card-bg)';
            button.style.color = 'var(--text-primary)';
            button.style.border = '1px solid var(--border-color)';
        });
        
        // Set active button
        const activeButton = document.querySelector(`[data-tab="${tabName}"]`);
        activeButton.classList.add('theme-btn');
        activeButton.classList.remove('glass-button');
        activeButton.style.background = '';
        activeButton.style.color = '';
        activeButton.style.border = '';
    }
</script>

<style>
    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    
    .animate-fadeIn { animation: fadeIn 0.8s ease-in; }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    
    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
    }
    
    /* Theme Buttons - GlassUI.dev style */
    .theme-btn {
        background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple)) !important;
        color: white !important;
        border: none !important;
    }
    
    [data-theme="normal"] .theme-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(59, 130, 246, 0.3);
    }
    
    [data-theme="monochrome"] .theme-btn {
        background: rgba(255, 255, 255, 0.12) !important;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
    }
    
    [data-theme="monochrome"] .theme-btn:hover {
        background: rgba(255, 255, 255, 0.18) !important;
        box-shadow: 0 12px 48px rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }
    
    /* Glass Buttons */
    .glass-button {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    [data-theme="normal"] .glass-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        border-color: var(--accent-blue);
    }
    
    [data-theme="monochrome"] .glass-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 48px rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.3);
    }
    
    /* Hide normal theme elements in dark mode */
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }
    
    /* Ensure proper contrast for prose content */
    .prose p, .prose ul, .prose ol {
        color: var(--text-secondary) !important;
    }
    
    .prose strong {
        color: var(--text-primary) !important;
    }
    
    .prose a {
        color: var(--accent-blue) !important;
    }
    
    .prose a:hover {
        color: var(--accent-purple) !important;
    }
</style>
@endsection