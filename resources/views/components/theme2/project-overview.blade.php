@props(['user', 'project', 'overview', 'techStackSkills', 'headerContent', 'footerContent'])

<section id="project-overview" class="section-full relative overflow-hidden theme2-project-overview">
    <!-- Cyber Grid Background -->
    <div class="cyber-grid absolute inset-0 -z-10"></div>
    
    <!-- Floating Orbs -->
    <div class="orb-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6 py-20">
        
        <!-- Cyber Breadcrumbs -->
        <div class="mb-12 animate-slide-in">
            <nav class="flex items-center gap-3">
                <a href="{{ route('portfolio.show', $user->slug) }}" 
                   class="breadcrumb-link group">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    <span>Home</span>
                </a>
                
                <div class="breadcrumb-separator"></div>
                
                <a href="{{ route('portfolio.show', $user->slug) }}#projects" 
                   class="breadcrumb-link group">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    <span>Projects</span>
                </a>
                
                <div class="breadcrumb-separator"></div>
                
                <span class="breadcrumb-current">{{ $project->title }}</span>
            </nav>
        </div>

        <!-- Hero Card -->
        <div class="mb-16 animate-fade-in">
            <div class="cyber-card p-8 md:p-12 relative overflow-hidden group">
                <div class="cyber-corner"></div>
                <div class="cyber-shine"></div>
                
                <div class="grid lg:grid-cols-12 gap-8 items-start">
                    <!-- Left Content -->
                    <div class="lg:col-span-8 relative z-10">
                        <!-- Title Section -->
                        <div class="flex items-start gap-6 mb-6">
                            <div class="cyber-icon-box-large">
                                <svg class="w-8 h-8 project-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-4 neon-text leading-tight">
                                    {{ $project->title }}
                                </h1>
                                <div class="cyber-divider mb-6"></div>
                                <p class="text-lg md:text-xl leading-relaxed project-description">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap gap-4 mt-8">
                            @if($project->link)
                                <a href="{{ $project->link }}" 
                                   class="cyber-btn-primary group"
                                   target="_blank">
                                    <span class="relative z-10 flex items-center gap-3">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        View Source
                                    </span>
                                    <div class="cyber-btn-glow"></div>
                                </a>
                            @endif
                            
                            @if($project->depurl)
                                <a href="{{ $project->depurl }}" 
                                   class="cyber-btn-secondary group"
                                   target="_blank">
                                    <span class="relative z-10 flex items-center gap-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                        Live Demo
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Right Stats -->
                    <div class="lg:col-span-4 relative z-10">
                        <div class="grid grid-cols-2 lg:grid-cols-1 gap-4">
                            <div class="cyber-stat-card group">
                                <div class="stat-icon-box">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="stat-number neon-text">{{ $techStackSkills->count() }}</div>
                                <div class="stat-label">Technologies</div>
                            </div>
                            
                            <div class="cyber-stat-card group">
                                <div class="stat-icon-box">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <div class="stat-number neon-text">{{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}</div>
                                <div class="stat-label">Key Features</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cyber Navigation Tabs -->
        <div class="mb-12 animate-slide-in">
            <div class="cyber-tabs-container">
                <button onclick="switchTab('overview')" 
                        class="cyber-tab-btn active"
                        data-tab="overview">
                    <span class="tab-icon">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                        </svg>
                    </span>
                    <span class="tab-text">Overview</span>
                    <div class="tab-glow"></div>
                </button>
                
                <button onclick="switchTab('features')" 
                        class="cyber-tab-btn"
                        data-tab="features">
                    <span class="tab-icon">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"/>
                        </svg>
                    </span>
                    <span class="tab-text">Features</span>
                    <div class="tab-glow"></div>
                </button>
                
                <button onclick="switchTab('tech')" 
                        class="cyber-tab-btn"
                        data-tab="tech">
                    <span class="tab-icon">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                    <span class="tab-text">Tech Stack</span>
                    <div class="tab-glow"></div>
                </button>
                
                @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                    <button onclick="switchTab('gallery')" 
                            class="cyber-tab-btn"
                            data-tab="gallery">
                        <span class="tab-icon">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                        <span class="tab-text">Gallery</span>
                        <div class="tab-glow"></div>
                    </button>
                @endif
            </div>
        </div>

        <!-- Content Sections -->
        <div id="content-container">
            
            <!-- Overview Tab -->
            <div id="overview-content" class="content-section active">
                <div class="cyber-card p-8 md:p-12 relative overflow-hidden group">
                    <div class="cyber-corner"></div>
                    <div class="cyber-shine"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="cyber-icon-box-large">
                                <svg class="w-8 h-8 project-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black section-title">Project Overview</h2>
                        </div>
                        
                        <div class="cyber-divider mb-8"></div>
                        
                        <div class="prose prose-lg max-w-none">
                            <div class="overview-content">
                                {!! $overview->overview_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Tab -->
            <div id="features-content" class="content-section">
                <div class="grid md:grid-cols-2 gap-6">
                    @if(is_array($overview->key_features))
                        @foreach($overview->key_features as $featureKey => $featureValue)
                            <div class="feature-cyber-card" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <div class="feature-glow"></div>
                                <div class="feature-content">
                                    <div class="feature-header">
                                        <div class="feature-icon-box">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <h3 class="feature-title">{{ $featureKey }}</h3>
                                    </div>
                                    <div class="cyber-divider-small"></div>
                                    <p class="feature-description">{{ $featureValue }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Tech Stack Tab -->
            <div id="tech-content" class="content-section">
                <div class="cyber-card p-8 md:p-12 relative overflow-hidden group">
                    <div class="cyber-corner"></div>
                    <div class="cyber-shine"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="cyber-icon-box-large">
                                <svg class="w-8 h-8 project-icon" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black section-title">Technology Stack</h2>
                        </div>
                        
                        <div class="cyber-divider mb-8"></div>
                        
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6">
                            @foreach($techStackSkills as $skill)
                                <div class="tech-cyber-card" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                    <div class="tech-glow"></div>
                                    <div class="tech-content">
                                        <div class="tech-icon-container">
                                            @if($skill->url)
                                                <img src="{{ $skill->url }}" 
                                                     alt="{{ $skill->name }}" 
                                                     class="tech-icon-image"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            @endif
                                            <div class="{{ $skill->url ? 'hidden' : 'flex' }} tech-icon-fallback">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="tech-name">{{ $skill->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Tab -->
            @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                <div id="gallery-content" class="content-section">
                    <div class="cyber-card p-8 md:p-12 relative overflow-hidden group">
                        <div class="cyber-corner"></div>
                        <div class="cyber-shine"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center gap-6 mb-8">
                                <div class="cyber-icon-box-large">
                                    <svg class="w-8 h-8 project-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h2 class="text-3xl md:text-4xl font-black section-title">Project Gallery</h2>
                            </div>
                            
                            <div class="cyber-divider mb-8"></div>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                @foreach($overview->gallery_images as $image)
                                    <div class="gallery-cyber-card" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                        <div class="gallery-glow"></div>
                                        <img src="{{ $image }}" 
                                             alt="Screenshot {{ $loop->iteration }}" 
                                             class="gallery-image">
                                        <div class="gallery-overlay">
                                            <div class="gallery-label">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>Screenshot {{ $loop->iteration }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
/* ===================================
   THEME 2 PROJECT OVERVIEW - CYBER STYLE
   =================================== */

:root {
    /* Dark Theme (Default) */
    --overview-bg-start: #0a0e27;
    --overview-bg-mid: #1a1f3a;
    --overview-bg-end: #0f1729;
    --overview-text-primary: #ffffff;
    --overview-text-secondary: #cbd5e1;
    --overview-text-muted: #94a3b8;
    --overview-neon-primary: #00d9ff;
    --overview-neon-secondary: #b537ff;
    --overview-neon-accent: #ff006e;
    --overview-grid-color: rgba(0, 217, 255, 0.05);
    --overview-orb-color: rgba(0, 217, 255, 0.15);
    --overview-card-bg: rgba(26, 31, 58, 0.6);
    --overview-card-border: rgba(0, 217, 255, 0.2);
    --overview-icon-bg: rgba(0, 217, 255, 0.15);
    --overview-icon-color: #00d9ff;
}

/* Light Theme Override */
[data-theme="light"] {
    --overview-bg-start: #f8fafc;
    --overview-bg-mid: #e2e8f0;
    --overview-bg-end: #cbd5e1;
    --overview-text-primary: #1e293b;
    --overview-text-secondary: #475569;
    --overview-text-muted: #64748b;
    --overview-neon-primary: #0ea5e9;
    --overview-neon-secondary: #8b5cf6;
    --overview-neon-accent: #ec4899;
    --overview-grid-color: rgba(14, 165, 233, 0.08);
    --overview-orb-color: rgba(14, 165, 233, 0.12);
    --overview-card-bg: rgba(255, 255, 255, 0.8);
    --overview-card-border: rgba(14, 165, 233, 0.3);
    --overview-icon-bg: rgba(14, 165, 233, 0.15);
    --overview-icon-color: #0ea5e9;
}

.theme2-project-overview {
    background: linear-gradient(135deg, var(--overview-bg-start) 0%, var(--overview-bg-mid) 50%, var(--overview-bg-end) 100%);
    min-height: 100vh;
}

/* Cyber Grid */
.cyber-grid {
    background-image:
        linear-gradient(var(--overview-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--overview-grid-color) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: gridMove 20s linear infinite;
}

@keyframes gridMove {
    0% { background-position: 0 0; }
    100% { background-position: 50px 50px; }
}

/* Floating Orbs */
.floating-orb {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--overview-orb-color) 0%, transparent 70%);
    filter: blur(40px);
    animation: floatOrb 20s ease-in-out infinite;
    pointer-events: none;
}

@keyframes floatOrb {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(100px, -100px) scale(1.2); }
    50% { transform: translate(-50px, 100px) scale(0.8); }
    75% { transform: translate(150px, 50px) scale(1.1); }
}

/* Breadcrumbs */
.breadcrumb-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--overview-text-secondary);
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 8px;
}

.breadcrumb-link:hover {
    color: var(--overview-neon-primary);
    background: var(--overview-icon-bg);
}

.breadcrumb-separator {
    width: 6px;
    height: 6px;
    background: var(--overview-neon-primary);
    transform: rotate(45deg);
    box-shadow: 0 0 8px var(--overview-neon-primary);
}

.breadcrumb-current {
    color: var(--overview-text-primary);
    font-weight: 600;
    font-size: 0.875rem;
}

/* Neon Text */
.neon-text {
    background: linear-gradient(90deg, var(--overview-neon-primary), var(--overview-neon-secondary), var(--overview-neon-accent));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: neonGlow 3s ease-in-out infinite;
}

@keyframes neonGlow {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.3); }
}

/* Cyber Cards */
.cyber-card {
    background: var(--overview-card-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 24px;
    backdrop-filter: blur(20px);
    position: relative;
    transition: all 0.4s ease;
}

.cyber-card:hover {
    border-color: var(--overview-neon-primary);
    box-shadow: 0 0 40px var(--overview-orb-color);
}

.cyber-corner {
    position: absolute;
    top: 0;
    right: 0;
    width: 150px;
    height: 150px;
    background: linear-gradient(135deg, var(--overview-neon-primary), transparent);
    opacity: 0.1;
    transition: opacity 0.3s ease;
}

.cyber-card:hover .cyber-corner {
    opacity: 0.2;
}

.cyber-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
}

.cyber-card:hover .cyber-shine {
    left: 100%;
}

/* Icon Boxes */
.cyber-icon-box-large {
    width: 80px;
    height: 80px;
    background: var(--overview-icon-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.cyber-icon-box-large:hover {
    border-color: var(--overview-neon-primary);
    box-shadow: 0 0 20px var(--overview-orb-color);
    transform: scale(1.1);
}

.project-icon {
    color: var(--overview-icon-color);
}

/* Dividers */
.cyber-divider {
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--overview-neon-primary), transparent);
    margin: 1.5rem 0;
}

.cyber-divider-small {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--overview-card-border), transparent);
    margin: 1rem 0;
}

/* Text Styles */
.section-title {
    color: var(--overview-text-primary);
}

.project-description {
    color: var(--overview-text-secondary);
}

.overview-content {
    color: var(--overview-text-secondary);
    line-height: 1.8;
    font-size: 1.125rem;
}

.overview-content p {
    margin-bottom: 1rem;
}

/* Buttons */
.cyber-btn-primary {
    position: relative;
    padding: 1rem 2.5rem;
    font-weight: 700;
    font-size: 1rem;
    color: var(--overview-bg-start);
    background: var(--overview-neon-primary);
    border: none;
    clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
    transition: all 0.3s ease;
    overflow: hidden;
    text-decoration: none;
    display: inline-block;
}

.cyber-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 40px var(--overview-orb-color);
}

.cyber-btn-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s;
}

.cyber-btn-primary:hover .cyber-btn-glow {
    transform: translateX(100%);
}

.cyber-btn-secondary {
    padding: 1rem 2.5rem;
    font-weight: 700;
    font-size: 1rem;
    color: var(--overview-neon-primary);
    background: transparent;
    border: 2px solid var(--overview-card-border);
    clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.cyber-btn-secondary:hover {
    background: var(--overview-icon-bg);
    border-color: var(--overview-neon-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--overview-orb-color);
}

/* Stat Cards */
.cyber-stat-card {
    background: var(--overview-card-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 16px;
    padding: 1.5rem;
    backdrop-filter: blur(20px);
    text-align: center;
    transition: all 0.3s ease;
}

.cyber-stat-card:hover {
    border-color: var(--overview-neon-primary);
    box-shadow: 0 10px 30px var(--overview-orb-color);
    transform: translateY(-4px);
}

.stat-icon-box {
    width: 48px;
    height: 48px;
    background: var(--overview-icon-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--overview-icon-color);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-label {
    color: var(--overview-text-secondary);
    font-size: 0.875rem;
    font-weight: 600;
}

/* Tabs */
.cyber-tabs-container {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: var(--overview-card-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    flex-wrap: wrap;
}

.cyber-tab-btn {
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
    background: transparent;
    border: 2px solid transparent;
    border-radius: 12px;
    color: var(--overview-text-secondary);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: hidden;
}

.cyber-tab-btn:hover {
    background: var(--overview-icon-bg);
    border-color: var(--overview-card-border);
    color: var(--overview-text-primary);
}

.cyber-tab-btn.active {
    background: linear-gradient(135deg, var(--overview-neon-primary), var(--overview-neon-secondary));
    border-color: var(--overview-neon-primary);
    color: var(--overview-bg-start);
    box-shadow: 0 4px 20px var(--overview-orb-color);
}

.tab-icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

.tab-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s;
}

.cyber-tab-btn:hover .tab-glow {
    transform: translateX(100%);
}

/* Content Sections */
.content-section {
    display: none;
    animation: fadeInUp 0.6s ease-out;
}

.content-section.active {
    display: block;
}

/* Feature Cards */
.feature-cyber-card {
    background: var(--overview-card-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 20px;
    padding: 2rem;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(20px);
    transition: all 0.3s ease;
    animation: fadeInScale 0.6s ease-out forwards;
    opacity: 0;
}

.feature-cyber-card:hover {
    border-color: var(--overview-neon-primary);
    box-shadow: 0 20px 40px var(--overview-orb-color);
    transform: translateY(-8px);
}

.feature-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--overview-neon-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.feature-cyber-card:hover .feature-glow {
    opacity: 0.05;
}

.feature-content {
    position: relative;
    z-index: 2;
}

.feature-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.feature-icon-box {
    width: 48px;
    height: 48px;
    background: var(--overview-icon-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--overview-icon-color);
    flex-shrink: 0;
}

.feature-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--overview-text-primary);
}

.feature-description {
    color: var(--overview-text-secondary);
    line-height: 1.7;
    font-size: 1rem;
}

/* Tech Stack Cards */
.tech-cyber-card {
    background: var(--overview-card-bg);
    border: 2px solid var(--overview-card-border);
    border-radius: 16px;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(20px);
    text-align: center;
    transition: all 0.3s ease;
    animation: fadeInScale 0.6s ease-out forwards;
    opacity: 0;
}

.tech-cyber-card:hover {
    border-color: var(--overview-neon-primary);
    box-shadow: 0 20px 40px var(--overview-orb-color);
    transform: translateY(-8px);
}

.tech-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--overview-neon-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.tech-cyber-card:hover .tech-glow {
    opacity: 0.05;
}

.tech-content {
    position: relative;
    z-index: 2;
}

.tech-icon-container {
    width: 64px;
    height: 64px;
    margin: 0 auto 1rem;
    position: relative;
}

.tech-icon-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.tech-cyber-card:hover .tech-icon-image {
    transform: scale(1.15) rotate(5deg);
}

.tech-icon-fallback {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--overview-neon-primary), var(--overview-neon-secondary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.tech-name {
    color: var(--overview-text-primary);
    font-weight: 600;
    font-size: 1rem;
}

/* Gallery */
.gallery-cyber-card {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    background: var(--overview-card-bg);
    border: 2px solid var(--overview-card-border);
    backdrop-filter: blur(20px);
    transition: all 0.3s ease;
    animation: fadeInScale 0.6s ease-out forwards;
    opacity: 0;
}

.gallery-cyber-card:hover {
    border-color: var(--overview-neon-primary);
    box-shadow: 0 20px 40px var(--overview-orb-color);
    transform: translateY(-8px);
}

.gallery-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--overview-neon-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.gallery-cyber-card:hover .gallery-glow {
    opacity: 0.05;
}

.gallery-image {
    width: 100%;
    height: 320px;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
}

.gallery-cyber-card:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(10, 14, 39, 0.95), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 2;
}

.gallery-cyber-card:hover .gallery-overlay {
    opacity: 1;
}

.gallery-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--overview-neon-primary);
    font-weight: 600;
    font-size: 1rem;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-fade-in {
    animation: fadeInUp 0.8s ease-out;
}

.animate-slide-in {
    animation: fadeInUp 0.6s ease-out;
}

/* Responsive */
@media (max-width: 1024px) {
    .cyber-icon-box-large {
        width: 64px;
        height: 64px;
    }
    
    .cyber-icon-box-large svg {
        width: 1.5rem;
        height: 1.5rem;
    }
}

@media (max-width: 768px) {
    .cyber-card {
        padding: 1.5rem !important;
    }
    
    .cyber-btn-primary,
    .cyber-btn-secondary {
        padding: 0.875rem 1.5rem;
        font-size: 0.875rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .feature-cyber-card {
        padding: 1.5rem;
    }
    
    .tech-cyber-card {
        padding: 1.25rem;
    }
    
    .tech-icon-container {
        width: 48px;
        height: 48px;
    }
    
    .gallery-image {
        height: 240px;
    }
    
    .tab-text {
        display: none;
    }
    
    .cyber-tab-btn {
        padding: 0.875rem 1rem;
    }
}

@media (max-width: 480px) {
    .breadcrumb-link span {
        display: none;
    }
    
    .breadcrumb-link svg {
        margin: 0;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create floating orbs
    const orbContainer = document.querySelector('.orb-container');
    if (orbContainer) {
        const orbCount = 6;
        for (let i = 0; i < orbCount; i++) {
            const orb = document.createElement('div');
            orb.className = 'floating-orb';
            orb.style.left = `${Math.random() * 100}%`;
            orb.style.top = `${Math.random() * 100}%`;
            orb.style.animationDelay = `${Math.random() * 5}s`;
            orb.style.animationDuration = `${15 + Math.random() * 10}s`;
            orbContainer.appendChild(orb);
        }
    }
    
    // Initialize first tab
    switchTab('overview');
});

function switchTab(tabName) {
    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Show selected content
    const selectedContent = document.getElementById(tabName + '-content');
    if (selectedContent) {
        selectedContent.classList.add('active');
    }
    
    // Update tab buttons
    document.querySelectorAll('.cyber-tab-btn').forEach(button => {
        button.classList.remove('active');
    });
    
    const activeButton = document.querySelector(`[data-tab="${tabName}"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
}
</script>