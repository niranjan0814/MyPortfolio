@props(['projects'])

<section id="projects" class="section-full relative overflow-hidden theme2-projects-v2">
    
    <!-- Animated Background -->
    <div class="absolute inset-0 -z-10">
        <div class="grid-bg"></div>
        <div class="gradient-mesh"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-4 md:px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-in">
            
            
            <h2 class="text-5xl md:text-6xl font-black mb-6 section-title">
                Featured Projects
            </h2>
            
           
            
            <div class="flex items-center justify-center gap-4">
                <div class="h-px flex-1 max-w-20 divider-line"></div>
                <div class="w-2 h-2 rotate-45 divider-square"></div>
                <div class="h-px flex-1 max-w-20 divider-line"></div>
            </div>
        </div>

        @if($projects->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20 animate-fade-in">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl mb-6 empty-icon-box">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl md:text-3xl font-bold mb-3 empty-title">No Projects Yet</h3>
                <p class="text-lg empty-text">Projects will appear here once added through the admin panel.</p>
            </div>
        @else
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-stagger">
                @foreach ($projects as $index => $project)
                    <article class="project-card group" style="animation-delay: {{ $index * 0.1 }}s">
                        
                        <!-- Card Inner -->
                        <div class="project-card-inner">
                            
                            <!-- Shine Effect -->
                            <div class="shine-effect"></div>
                            
                            <!-- Image Container -->
                            <div class="project-image-container">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" 
                                         alt="{{ $project->title }}" 
                                         class="project-image">
                                @else
                                    <div class="project-image-placeholder">
                                        <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                
                                <!-- Overlay -->
                                <div class="project-overlay">
                                    <div class="flex items-center justify-center gap-3">
                                        @if ($project->link)
                                            <a href="{{ $project->link }}" target="_blank" 
                                               class="overlay-button" title="View Source">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                                </svg>
                                            </a>
                                        @endif
                                        
                                        @if ($project->depurl)
                                            <a href="{{ $project->depurl }}" target="_blank" 
                                               class="overlay-button" title="Live Demo">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                            </a>
                                        @endif
                                        
                                        @if ($project->overview)
                                            <a href="{{ route('project.overview', $project->id) }}" 
                                               class="overlay-button" title="View Details">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="project-content">
                                
                                <!-- Date Badge -->
                                @if ($project->created_at)
                                    <div class="flex items-center gap-2 mb-3">
                                        <svg class="w-4 h-4 date-icon" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm font-medium date-text">
                                            {{ $project->created_at->format('M Y') }}
                                        </span>
                                    </div>
                                @endif
                                
                                <!-- Title -->
                                <h3 class="project-title mb-3">
                                    {{ $project->title }}
                                </h3>
                                
                                <!-- Description -->
                                <p class="project-description mb-4 line-clamp-3">
                                    {{ $project->description }}
                                </p>
                                
                                <!-- Tech Tags -->
                                @if (!empty($project->tags))
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach (array_slice(explode(',', $project->tags), 0, 3) as $tag)
                                            <span class="tech-tag">
                                                {{ trim($tag) }}
                                            </span>
                                        @endforeach
                                        @if (count(explode(',', $project->tags)) > 3)
                                            <span class="tech-tag-more">
                                                +{{ count(explode(',', $project->tags)) - 3 }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                                
                                <!-- Action Links -->
                                <div class="flex items-center gap-4 pt-4 border-t project-footer">
                                    @if ($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="action-link">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Code</span>
                                        </a>
                                    @endif
                                    
                                    @if ($project->depurl)
                                        <a href="{{ $project->depurl }}" target="_blank" class="action-link">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                            <span>Live</span>
                                        </a>
                                    @endif
                                    
                                    @if ($project->overview)
                                        <a href="{{ route('project.overview', $project->id) }}" class="action-link ml-auto">
                                            <span>Details</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
/* ============================================
   THEME 2 PROJECTS - DUAL THEME SUPPORT
   ============================================ */

/* Light Theme Variables */
[data-theme="light"] {
    --projects-bg: #f8fafc;
    --projects-text-primary: #0f172a;
    --projects-text-secondary: #475569;
    --projects-text-muted: #64748b;
    --projects-card-bg: #ffffff;
    --projects-card-border: #e2e8f0;
    --projects-accent: #3b82f6;
    --projects-accent-hover: #2563eb;
    --projects-tag-bg: #dbeafe;
    --projects-tag-text: #1e40af;
    --projects-overlay-bg: rgba(59, 130, 246, 0.95);
    --projects-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --projects-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    --projects-grid-color: rgba(59, 130, 246, 0.05);
}

/* Dark Theme Variables */
[data-theme="dark"] {
    --projects-bg: #0f172a;
    --projects-text-primary: #f1f5f9;
    --projects-text-secondary: #cbd5e1;
    --projects-text-muted: #94a3b8;
    --projects-card-bg: #1e293b;
    --projects-card-border: #334155;
    --projects-accent: #60a5fa;
    --projects-accent-hover: #3b82f6;
    --projects-tag-bg: #1e3a8a;
    --projects-tag-text: #93c5fd;
    --projects-overlay-bg: rgba(30, 41, 59, 0.95);
    --projects-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
    --projects-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
    --projects-grid-color: rgba(96, 165, 250, 0.05);
}

.theme2-projects-v2 {
    background: var(--projects-bg);
    padding: 6rem 0;
    position: relative;
}

/* Background Elements */
.grid-bg {
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(var(--projects-grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--projects-grid-color) 1px, transparent 1px);
    background-size: 60px 60px;
    animation: gridMove 30s linear infinite;
}

.gradient-mesh {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(circle at 20% 50%, var(--projects-accent) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, var(--projects-accent) 0%, transparent 50%);
    opacity: 0.03;
    filter: blur(60px);
}

@keyframes gridMove {
    0% { background-position: 0 0; }
    100% { background-position: 60px 60px; }
}

/* Section Header */
.section-badge {
    background: var(--projects-card-bg);
    border: 2px solid var(--projects-card-border);
    color: var(--projects-accent);
    backdrop-filter: blur(10px);
}

.section-title {
    color: var(--projects-text-primary);
    line-height: 1.1;
}

.section-description {
    color: var(--projects-text-secondary);
}

.divider-line {
    background: linear-gradient(90deg, transparent, var(--projects-accent), transparent);
    height: 2px;
}

.divider-square {
    background: var(--projects-accent);
}

/* Empty State */
.empty-icon-box {
    background: var(--projects-card-bg);
    border: 2px solid var(--projects-card-border);
    color: var(--projects-text-muted);
}

.empty-title {
    color: var(--projects-text-primary);
}

.empty-text {
    color: var(--projects-text-muted);
}

/* Project Card */
.project-card {
    position: relative;
    height: 100%;
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.project-card-inner {
    height: 100%;
    background: var(--projects-card-bg);
    border: 2px solid var(--projects-card-border);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    display: flex;
    flex-direction: column;
}

.project-card:hover .project-card-inner {
    transform: translateY(-8px);
    box-shadow: var(--projects-shadow-hover);
    border-color: var(--projects-accent);
}

/* Shine Effect */
.shine-effect {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
    z-index: 1;
}

.project-card:hover .shine-effect {
    left: 100%;
}

/* Image Container */
.project-image-container {
    position: relative;
    height: 240px;
    overflow: hidden;
    background: linear-gradient(135deg, var(--projects-accent), var(--projects-accent-hover));
}

.project-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.project-card:hover .project-image {
    transform: scale(1.1);
}

.project-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    opacity: 0.6;
}

/* Overlay */
.project-overlay {
    position: absolute;
    inset: 0;
    background: var(--projects-overlay-bg);
    backdrop-filter: blur(10px);
    opacity: 0;
    transition: opacity 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.overlay-button {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    color: var(--projects-accent);
    border-radius: 50%;
    transition: all 0.3s;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.overlay-button:hover {
    transform: scale(1.15) rotate(5deg);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

/* Content */
.project-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.date-icon {
    color: var(--projects-accent);
}

.date-text {
    color: var(--projects-text-muted);
}

.project-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--projects-text-primary);
    line-height: 1.3;
}

.project-description {
    color: var(--projects-text-secondary);
    line-height: 1.6;
    flex: 1;
}

/* Tech Tags */
.tech-tag {
    display: inline-flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    background: var(--projects-tag-bg);
    color: var(--projects-tag-text);
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 9999px;
    transition: all 0.2s;
}

.tech-tag:hover {
    transform: translateY(-2px);
}

.tech-tag-more {
    display: inline-flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    background: var(--projects-card-border);
    color: var(--projects-text-muted);
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 9999px;
}

/* Footer */
.project-footer {
    border-color: var(--projects-card-border);
}

.action-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--projects-accent);
    font-size: 0.875rem;
    font-weight: 600;
    transition: all 0.2s;
}

.action-link:hover {
    color: var(--projects-accent-hover);
    gap: 0.75rem;
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

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.animate-stagger > * {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .theme2-projects-v2 {
        padding: 4rem 0;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .project-image-container {
        height: 200px;
    }
}
</style>