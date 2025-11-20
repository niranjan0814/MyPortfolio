@props(['projects'])

<section id="projects" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-projects">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="section-title-primary">My</span>
                <span class="section-title-secondary">Projects</span>
            </h2>
            <div class="section-divider"></div>
            <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6" style="color: var(--text-secondary);">
                A collection of my latest work and creative solutions
            </p>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @forelse ($projects as $project)
                <!-- Project Card -->
                <div class="project-card group">
                    <!-- Project Image -->
                    <div class="project-image-container">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="project-image">
                        @else
                            <div class="project-image-placeholder">
                                <i class="fas fa-code project-placeholder-icon"></i>
                            </div>
                        @endif
                        <div class="project-overlay">
                            <div class="project-links">
                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="project-link">
                                        <i class="fab fa-github"></i>
                                    </a>
                                @endif
                                @if ($project->depurl)
                                    <a href="{{ $project->depurl }}" target="_blank" class="project-link">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Project Content -->
                    <div class="project-content">
                        <!-- Project Header -->
                        <div class="project-header">
                            <h3 class="project-title">{{ $project->title }}</h3>
                            @if ($project->created_at)
                                <span class="project-date">{{ $project->created_at->format('M Y') }}</span>
                            @endif
                        </div>

                        <!-- Project Description -->
                        <p class="project-description">
                            {{ $project->description }}
                        </p>

                        <!-- Tech Stack -->
                        @if (!empty($project->tags))
                            <div class="project-tech-stack">
                                @foreach (array_slice(explode(',', $project->tags), 0, 4) as $tag)
                                    <span class="tech-tag">{{ trim($tag) }}</span>
                                @endforeach
                                @if (count(explode(',', $project->tags)) > 4)
                                    <span class="tech-tag-more">+{{ count(explode(',', $project->tags)) - 4 }} more</span>
                                @endif
                            </div>
                        @endif

                        <!-- Project Actions -->
                        <div class="project-actions">
                            <!-- Primary Action Button -->
                            @if ($project->overview)
                                <a href="{{ route('project.overview', $project->id) }}" class="primary-action-btn">
                                    <span>View Details</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            @else
                                <div class="primary-action-btn disabled">
                                    <span>No Details</span>
                                    <i class="fas fa-ban"></i>
                                </div>
                            @endif
                            
                            <!-- Secondary Action Links -->
                            <div class="secondary-actions">
                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="secondary-action" title="Source Code">
                                        <i class="fab fa-github"></i>
                                    </a>
                                @endif
                                @if ($project->depurl)
                                    <a href="{{ $project->depurl }}" target="_blank" class="secondary-action" title="Live Demo">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-20">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h3 class="empty-title">No Projects Yet</h3>
                        <p class="empty-description">Projects will be displayed here once they are added to the portfolio.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- View More Section -->
        <div class="text-center mt-16">
            <div class="view-more-section">
                <p class="view-more-text">Interested in seeing more of my work?</p>
                <a href="#contact" class="view-more-btn">
                    <span>Get In Touch</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* ===================================
   THEME 3 PROJECTS - UPDATED DESIGN
   =================================== */

:root {
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
}

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
    --card-bg: rgba(0, 0, 0, 0.03);
}

.theme3-projects {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
    position: relative;
    overflow: hidden;
}

/* Background Pattern */
.background-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
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

/* Section Header */
.section-title-primary {
    color: var(--text-primary);
    font-weight: 900;
    letter-spacing: -0.02em;
}

.section-title-secondary {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 900;
    letter-spacing: -0.02em;
}

.section-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 2px;
    margin: 0 auto;
}

/* Project Card */
.project-card {
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    display: flex;
    flex-direction: column;
    height: fit-content;
}

.project-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 
        0 20px 40px rgba(0, 255, 157, 0.15),
        0 0 0 1px rgba(0, 255, 157, 0.1);
}

/* Project Image */
.project-image-container {
    position: relative;
    height: 240px;
    overflow: hidden;
    background: var(--bg-secondary);
    flex-shrink: 0;
}

.project-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.project-card:hover .project-image {
    transform: scale(1.05);
}

.project-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
}

.project-placeholder-icon {
    font-size: 3rem;
    color: var(--bg-primary);
    opacity: 0.8;
}

.project-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        transparent 0%,
        rgba(0, 0, 0, 0.1) 50%,
        rgba(0, 0, 0, 0.3) 100%
    );
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    padding: 1.5rem;
}

.project-card:hover .project-overlay {
    opacity: 1;
}

.project-links {
    display: flex;
    gap: 0.75rem;
}

.project-link {
    width: 44px;
    height: 44px;
    background: var(--bg-primary);
    border: 1px solid var(--border-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-primary);
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.project-link:hover {
    background: var(--accent-primary);
    color: var(--bg-primary);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 255, 157, 0.3);
}

/* Project Content */
.project-content {
    padding: 2rem;
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    min-height: 280px;
}

.project-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
    gap: 1rem;
}

.project-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1.3;
    flex: 1;
}

.project-date {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 500;
    white-space: nowrap;
    padding: 0.25rem 0.75rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    flex-shrink: 0;
}

.project-description {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

/* Tech Stack */
.project-tech-stack {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-bottom: 2rem;
}

.tech-tag {
    padding: 0.375rem 0.75rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--accent-primary);
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.tech-tag:hover {
    background: rgba(0, 255, 157, 0.15);
    transform: translateY(-1px);
}

.tech-tag-more {
    padding: 0.375rem 0.75rem;
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid rgba(0, 212, 255, 0.3);
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--accent-secondary);
    flex-shrink: 0;
}

/* Project Actions */
.project-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    margin-top: auto;
    width: 100%;
}

/* Primary Action Button */
.primary-action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 0.875rem 1.5rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 10px;
    color: var(--accent-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    min-width: 140px;
    max-width: 200px;
    flex: 1;
    white-space: nowrap;
}

.primary-action-btn:hover {
    background: rgba(0, 255, 157, 0.15);
    border-color: var(--accent-primary);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 255, 157, 0.15);
}

.primary-action-btn.disabled {
    background: rgba(0, 255, 157, 0.05);
    border-color: var(--border-light);
    color: var(--text-muted);
    cursor: not-allowed;
    opacity: 0.6;
}

.primary-action-btn.disabled:hover {
    transform: none;
    box-shadow: none;
    background: rgba(0, 255, 157, 0.05);
}

.primary-action-btn i {
    transition: transform 0.3s ease;
    font-size: 0.875rem;
}

.primary-action-btn:hover i {
    transform: translateX(3px);
}

/* Secondary Actions */
.secondary-actions {
    display: flex;
    gap: 0.5rem;
    flex-shrink: 0;
}

.secondary-action {
    position: relative;
    width: 44px;
    height: 44px;
    background: rgba(0, 255, 157, 0.05);
    border: 1px solid var(--border-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-secondary);
    text-decoration: none;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.secondary-action:hover {
    background: rgba(0, 255, 157, 0.1);
    color: var(--accent-primary);
    border-color: var(--accent-primary);
    transform: translateY(-2px);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    width: 80px;
    height: 80px;
    background: var(--card-bg);
    border: 2px solid var(--border-light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    color: var(--text-muted);
    font-size: 2rem;
}

.empty-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.empty-description {
    color: var(--text-secondary);
    max-width: 400px;
    margin: 0 auto;
    line-height: 1.6;
}

/* View More Section */
.view-more-section {
    padding: 3rem 2rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    max-width: 500px;
    margin: 0 auto;
}

.view-more-text {
    font-size: 1.125rem;
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
}

.view-more-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border: none;
    border-radius: 10px;
    color: var(--bg-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    min-width: 160px;
}

.view-more-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 255, 157, 0.3);
}

.view-more-btn i {
    transition: transform 0.3s ease;
}

.view-more-btn:hover i {
    transform: translateX(3px);
}

/* Responsive Design */
@media (max-width: 1280px) {
    .grid {
        gap: 1.5rem;
    }
    
    .primary-action-btn {
        min-width: 130px;
        padding: 0.75rem 1.25rem;
    }
}

@media (max-width: 1024px) {
    .project-content {
        padding: 1.5rem;
        min-height: 260px;
    }
    
    .project-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 0.75rem;
    }
    
    .primary-action-btn {
        min-width: auto;
        max-width: none;
        width: 100%;
    }
    
    .secondary-actions {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 3rem;
    }
    
    .project-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .project-date {
        align-self: flex-start;
    }
    
    .project-image-container {
        height: 200px;
    }
    
    .project-content {
        min-height: 240px;
    }
}

@media (max-width: 480px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 2.5rem;
    }
    
    .project-content {
        padding: 1.25rem;
        min-height: 220px;
    }
    
    .primary-action-btn {
        padding: 0.75rem 1rem;
        font-size: 0.8rem;
    }
    
    .secondary-action {
        width: 40px;
        height: 40px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Floating Particles
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        const particleCount = 8;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 10}s`;
            particleContainer.appendChild(particle);
        }
    }

    // Project card animations
    const projectCards = document.querySelectorAll('.project-card');
    projectCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>