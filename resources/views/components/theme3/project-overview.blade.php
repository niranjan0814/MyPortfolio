@props(['user', 'project', 'overview', 'techStackSkills', 'headerContent', 'footerContent'])

<section id="project-overview" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-project-overview">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <div class="mb-12">
            <nav class="flex items-center gap-3 text-sm">
                <a href="{{ route('portfolio.show', $user->slug) }}" 
                   class="font-medium transition-colors hover:opacity-80 text-accent-primary">
                    Home
                </a>
                <svg class="w-4 h-4 text-text-muted" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('portfolio.show', $user->slug) }}#projects" 
                   class="font-medium transition-colors hover:opacity-80 text-accent-primary">
                    Projects
                </a>
                <svg class="w-4 h-4 text-text-muted" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium text-text-secondary">{{ $project->title }}</span>
            </nav>
        </div>

        <!-- Hero Section -->
        <div class="mb-16 animate-fadeIn">
            <div class="relative group">
                <!-- Glow effect -->
                <div class="absolute inset-0 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 scale-110 bg-gradient-accent"></div>
                
                <div class="relative rounded-3xl p-8 md:p-12 glass-card border-card">
                    <div class="flex flex-col lg:flex-row items-start justify-between gap-8">
                        <div class="flex-1">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg bg-gradient-accent">
                                    <i class="fas fa-bolt text-white text-2xl"></i>
                                </div>
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-text-primary">
                                    {{ $project->title }}
                                </h1>
                            </div>
                            
                            <p class="text-lg md:text-xl leading-relaxed mb-8 text-text-secondary">
                                {{ $project->description }}
                            </p>

                            <div class="flex flex-wrap gap-4">
                                @if($project->link)
                                    <a href="{{ $project->link }}" 
                                       class="cta-btn primary-btn group"
                                       target="_blank">
                                        <span class="btn-content">
                                            <i class="fab fa-github"></i>
                                            <span class="btn-text">View Source</span>
                                        </span>
                                    </a>
                                @endif
                                
                                @if($project->depurl)
                                    <a href="{{ $project->depurl }}" 
                                       class="cta-btn secondary-btn group"
                                       target="_blank">
                                        <span class="btn-content">
                                            <i class="fas fa-external-link-alt"></i>
                                            <span class="btn-text">Live Demo</span>
                                        </span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="stat-card">
                                <div class="stat-number">{{ $techStackSkills->count() }}</div>
                                <div class="stat-label">Technologies</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">{{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}</div>
                                <div class="stat-label">Key Features</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="mb-12">
            <div class="inline-flex gap-2 p-2 rounded-2xl glass-card border-card flex-wrap">
                <button onclick="switchTab('overview')" 
                        class="tab-btn active flex items-center gap-3 px-6 py-3 rounded-xl font-semibold transition-all"
                        data-tab="overview">
                    <i class="fas fa-book-open"></i>
                    <span>Overview</span>
                </button>
                <button onclick="switchTab('features')" 
                        class="tab-btn flex items-center gap-3 px-6 py-3 rounded-xl font-semibold transition-all"
                        data-tab="features">
                    <i class="fas fa-sparkles"></i>
                    <span>Features</span>
                </button>
                <button onclick="switchTab('tech')" 
                        class="tab-btn flex items-center gap-3 px-6 py-3 rounded-xl font-semibold transition-all"
                        data-tab="tech">
                    <i class="fas fa-code"></i>
                    <span>Tech Stack</span>
                </button>
                @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                    <button onclick="switchTab('gallery')" 
                            class="tab-btn flex items-center gap-3 px-6 py-3 rounded-xl font-semibold transition-all"
                            data-tab="gallery">
                        <i class="fas fa-images"></i>
                        <span>Gallery</span>
                    </button>
                @endif
            </div>
        </div>

        <!-- Content Sections -->
        <div id="content-container">
            <!-- Overview Tab -->
            <div id="overview-content" class="content-section active animate-fadeIn">
                <div class="rounded-3xl p-8 md:p-12 glass-card border-card">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg bg-gradient-accent">
                            <i class="fas fa-book-open text-white text-3xl"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-black text-text-primary">Project Overview</h2>
                    </div>
                    
                    <div class="prose prose-lg max-w-none">
                        <div class="leading-relaxed text-base md:text-lg text-text-secondary">
                            {!! $overview->overview_description !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Tab -->
            <div id="features-content" class="content-section">
                <div class="grid md:grid-cols-2 gap-6">
                    @if(is_array($overview->key_features))
                        @foreach($overview->key_features as $featureKey => $featureValue)
                            <div class="feature-card group">
                                <div class="feature-glow"></div>
                                <div class="feature-content">
                                    <div class="flex items-start gap-4">
                                        <div class="text-4xl flex-shrink-0">
                                            @if($loop->index == 0) 💬
                                            @elseif($loop->index == 1) 🔄
                                            @elseif($loop->index == 2) 🔍
                                            @else 🛡️
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl font-bold mb-3 flex items-center gap-3 text-text-primary">
                                                <span class="break-words">{{ $featureKey }}</span>
                                                <i class="fas fa-check-circle flex-shrink-0 text-accent-primary"></i>
                                            </h3>
                                            <p class="leading-relaxed text-base text-text-secondary">
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
            <div id="tech-content" class="content-section">
                <div class="rounded-3xl p-8 md:p-12 glass-card border-card">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg bg-gradient-accent">
                            <i class="fas fa-code text-white text-3xl"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-black text-text-primary">Technology Stack</h2>
                    </div>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                        @foreach($techStackSkills as $skill)
                            <div class="skill-tech-card group">
                                <div class="skill-tech-glow"></div>
                                <div class="skill-tech-content">
                                    @if($skill->url)
                                        <img src="{{ $skill->url }}" 
                                             alt="{{ $skill->name }}" 
                                             class="skill-tech-icon"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    @endif
                                    <div class="{{ $skill->url ? 'hidden' : 'flex' }} skill-tech-fallback">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="skill-tech-name text-text-primary">
                                        {{ $skill->name }}
                                    </div>
                                    @if($skill->level)
                                        <div class="skill-tech-level text-text-muted">
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
                <div id="gallery-content" class="content-section">
                    <div class="rounded-3xl p-8 md:p-12 glass-card border-card">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg bg-gradient-accent">
                                <i class="fas fa-images text-white text-3xl"></i>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black text-text-primary">Project Gallery</h2>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            @foreach($overview->gallery_images as $image)
                                <div class="gallery-item group">
                                    <img src="{{ $image }}" 
                                         alt="Project Screenshot {{ $loop->iteration }}" 
                                         class="gallery-image">
                                    <div class="gallery-overlay">
                                        <p class="gallery-text">Screenshot {{ $loop->iteration }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
/* ===================================
   THEME 3 PROJECT OVERVIEW - DUAL THEME
   =================================== */

/* Light Theme */
[data-theme="light"] {
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --text-primary: #1a202c;
    --text-secondary: #4a5568;
    --text-muted: #718096;
    --accent-primary: #00cc7a;
    --accent-secondary: #0099cc;
    --accent-glow: rgba(0, 204, 122, 0.2);
    --border-light: rgba(0, 204, 122, 0.3);
    --card-bg: rgba(255, 255, 255, 0.8);
    --card-border: rgba(0, 0, 0, 0.1);
    --glass-bg: rgba(255, 255, 255, 0.9);
}

/* Dark Theme */
[data-theme="dark"] {
    --bg-primary: #0a0a12;
    --bg-secondary: #151522;
    --text-primary: #ffffff;
    --text-secondary: #b4c6e0;
    --text-muted: #8fa3c7;
    --accent-primary: #00ff9d;
    --accent-secondary: #00d4ff;
    --accent-glow: rgba(0, 255, 157, 0.3);
    --border-light: rgba(0, 255, 157, 0.2);
    --card-bg: rgba(255, 255, 255, 0.05);
    --card-border: rgba(255, 255, 255, 0.1);
    --glass-bg: rgba(255, 255, 255, 0.1);
}

.theme3-project-overview {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

/* Background Pattern */
.background-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
    transition: all 0.3s ease;
}

/* Floating Particles */
.particle-container .floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--accent-primary);
    box-shadow: 0 0 12px var(--accent-primary);
    animation: particleFloat 25s ease-in-out infinite;
    transition: all 0.3s ease;
}

@keyframes particleFloat {
    0%, 100% { 
        transform: translate(0, 0) scale(1);
        opacity: 0.3;
    }
    25% { 
        transform: translate(100px, -80px) scale(1.3);
        opacity: 0.7;
    }
    50% { 
        transform: translate(-60px, 120px) scale(0.8);
        opacity: 0.4;
    }
    75% { 
        transform: translate(120px, 60px) scale(1.1);
        opacity: 0.6;
    }
}

/* Utility Classes for Colors */
.text-accent-primary { color: var(--accent-primary); }
.text-text-primary { color: var(--text-primary); }
.text-text-secondary { color: var(--text-secondary); }
.text-text-muted { color: var(--text-muted); }

.bg-gradient-accent {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
}

.border-card {
    border: 2px solid var(--border-light);
    background: var(--card-bg);
}

/* Glass Card */
.glass-card {
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

/* CTA Buttons */
.cta-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1rem 2rem;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    gap: 0.75rem;
}

.primary-btn {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--bg-primary);
    box-shadow: 0 4px 20px var(--accent-glow);
}

.primary-btn:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 8px 40px var(--accent-glow),
        0 0 0 1px var(--border-light);
}

.secondary-btn {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--border-light);
}

.secondary-btn:hover {
    background: var(--accent-glow);
    border-color: var(--accent-primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 30px var(--accent-glow);
}

.btn-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    position: relative;
    z-index: 2;
}

/* Stat Cards */
.stat-card {
    padding: 1.5rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    text-align: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.stat-card:hover {
    transform: translateY(-4px);
    border-color: var(--accent-primary);
    box-shadow: 0 8px 30px var(--accent-glow);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--accent-primary);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
    font-weight: 500;
}

/* Tab Buttons */
.tab-btn {
    background: transparent;
    color: var(--text-secondary);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tab-btn:hover {
    color: var(--text-primary);
    background: var(--accent-glow);
}

.tab-btn.active {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--bg-primary);
    box-shadow: 0 4px 20px var(--accent-glow);
}

/* Content Sections */
.content-section {
    display: none;
}

.content-section.active {
    display: block;
}

/* Feature Cards */
.feature-card {
    position: relative;
    padding: 2rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    transition: all 0.3s ease;
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.feature-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 0 20px 40px var(--accent-glow);
}

.feature-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.feature-card:hover .feature-glow {
    opacity: 0.05;
}

.feature-content {
    position: relative;
    z-index: 2;
}

/* Tech Stack Cards */
.skill-tech-card {
    position: relative;
    padding: 1.5rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    text-align: center;
    transition: all 0.3s ease;
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.skill-tech-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 0 20px 40px var(--accent-glow);
}

.skill-tech-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.skill-tech-card:hover .skill-tech-glow {
    opacity: 0.05;
}

.skill-tech-content {
    position: relative;
    z-index: 2;
}

.skill-tech-icon {
    width: 48px;
    height: 48px;
    object-fit: contain;
    margin: 0 auto 1rem;
    transition: transform 0.3s ease;
    filter: none !important;
}

.skill-tech-card:hover .skill-tech-icon {
    transform: scale(1.2) rotate(5deg);
}

.skill-tech-fallback {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.25rem;
    transition: all 0.3s ease;
}

.skill-tech-card:hover .skill-tech-fallback {
    transform: scale(1.1);
}

.skill-tech-name {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.skill-tech-level {
    font-size: 0.75rem;
    color: var(--text-muted);
    font-weight: 500;
}

/* Gallery */
.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 16px;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 0 20px 40px var(--accent-glow);
}

.gallery-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-text {
    color: white;
    font-weight: 600;
    font-size: 1rem;
}

/* Animations */
@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

.animate-fadeIn {
    animation: fadeIn 0.8s ease-out;
}

/* Responsive Design */
@media (max-width: 768px) {
    .cta-btn {
        padding: 0.875rem 1.5rem;
        font-size: 0.875rem;
    }
    
    .stat-card {
        padding: 1.25rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .feature-card {
        padding: 1.5rem;
    }
    
    .skill-tech-card {
        padding: 1.25rem;
    }
    
    .gallery-image {
        height: 250px;
    }
}

@media (max-width: 480px) {
    .grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    .tab-btn {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
    }
    
    .tab-btn span {
        display: none;
    }
    
    .tab-btn i {
        margin-right: 0;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Floating Particles
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        const particleCount = 6;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 10}s`;
            particleContainer.appendChild(particle);
        }
    }

    // Initialize first tab as active
    switchTab('overview');

    // Watch for theme changes
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'data-theme') {
                // Re-initialize particles on theme change
                initializeParticles();
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-theme']
    });

    function initializeParticles() {
        // Particles will automatically update due to CSS variables
    }
});

function switchTab(tabName) {
    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
        section.classList.remove('animate-fadeIn');
    });
    
    // Show selected content
    const selectedContent = document.getElementById(tabName + '-content');
    selectedContent.classList.add('active');
    setTimeout(() => selectedContent.classList.add('animate-fadeIn'), 10);
    
    // Update tab buttons
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.classList.remove('active');
    });
    
    const activeButton = document.querySelector(`[data-tab="${tabName}"]`);
    activeButton.classList.add('active');
}
</script>