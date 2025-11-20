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
            <div class="section-divider mx-auto mb-6"></div>
            <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6 text-gray-600 dark:text-gray-300">
                A collection of my latest work and creative solutions
            </p>
        </div>

        <!-- Projects Grid - Fixed Structure -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @forelse ($projects as $project)
                <!-- Project Card - Fixed Layout -->
                <div class="project-card group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col h-full">
                    
                    <!-- Project Image Section -->
                    <div class="project-image-container relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->title }}" 
                                 class="project-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                            <div class="project-image-placeholder w-full h-full flex items-center justify-center bg-gradient-to-br from-green-400 to-blue-500">
                                <i class="fas fa-code text-white text-4xl opacity-80"></i>
                            </div>
                        @endif
                        
                        <!-- Overlay with Links - COMPLETELY FIXED -->
                        <div class="project-overlay absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="project-links flex gap-4">
                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="project-link w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-green-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
                                        <i class="fab fa-github text-lg"></i>
                                    </a>
                                @endif
                                @if ($project->depurl)
                                    <a href="{{ $project->depurl }}" target="_blank" class="project-link w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-blue-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
                                        <i class="fas fa-external-link-alt text-lg"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="absolute top-4 left-4 z-10">
                            <span class="status-badge px-3 py-1 bg-green-500 text-white text-xs font-bold rounded-full uppercase tracking-wide">
                                NEW
                            </span>
                        </div>
                    </div>

                    <!-- Project Content Section - FIXED SIZING -->
                    <div class="project-content p-6 flex flex-col flex-grow">
                        <!-- Header with Title and Date -->
                        <div class="project-header mb-4">
                            <div class="flex justify-between items-start gap-4">
                                <h3 class="project-title text-xl font-bold text-gray-900 dark:text-white line-clamp-2 flex-1 min-h-[3rem]">
                                    {{ $project->title }}
                                </h3>
                                @if ($project->created_at)
                                    <span class="project-date text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap flex-shrink-0 mt-1">
                                        {{ $project->created_at->format('M Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Description - FIXED HEIGHT -->
                        <p class="project-description text-gray-600 dark:text-gray-300 line-clamp-3 mb-4 flex-grow min-h-[4.5rem]">
                            {{ $project->description }}
                        </p>

                        <!-- Tech Stack - FIXED HEIGHT -->
                        @if (!empty($project->tags))
                            <div class="project-tech-stack mb-6 min-h-[2rem]">
                                <div class="flex flex-wrap gap-2">
                                    @foreach (array_slice(explode(',', $project->tags), 0, 4) as $tag)
                                        <span class="tech-tag px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm rounded-full border border-gray-200 dark:border-gray-600">
                                            {{ trim($tag) }}
                                        </span>
                                    @endforeach
                                    @if (count(explode(',', $project->tags)) > 4)
                                        <span class="tech-tag-more px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 text-sm rounded-full border border-blue-200 dark:border-blue-700">
                                            +{{ count(explode(',', $project->tags)) - 4 }} more
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="project-tech-stack mb-6 min-h-[2rem]"></div>
                        @endif

                        <!-- Actions - COMPLETELY FIXED VISIBILITY & SIZING -->
                        <div class="project-actions mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex justify-between items-center gap-3">
                                <!-- Primary Action -->
                                @if ($project->overview)
                                    <a href="{{ route('project.overview', $project->id) }}" class="primary-action-btn flex items-center gap-2 px-4 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-all duration-300 text-sm font-medium flex-1 justify-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        <span>View Details</span>
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                @else
                                    <div class="primary-action-btn flex items-center gap-2 px-4 py-3 bg-gray-400 text-white rounded-lg text-sm font-medium flex-1 justify-center cursor-not-allowed opacity-70">
                                        <span>No Details</span>
                                        <i class="fas fa-ban text-xs"></i>
                                    </div>
                                @endif
                                
                                <!-- Secondary Actions - FIXED VISIBILITY -->
                                <div class="secondary-actions flex gap-2 flex-shrink-0">
                                    @if ($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="secondary-action w-10 h-10 border border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center text-gray-600 dark:text-gray-400 hover:border-green-500 hover:text-green-500 hover:bg-green-50 dark:hover:bg-green-900/20 transition-all duration-300 shadow-sm bg-white dark:bg-gray-700">
                                            <i class="fab fa-github text-sm"></i>
                                        </a>
                                    @endif
                                    @if ($project->depurl)
                                        <a href="{{ $project->depurl }}" target="_blank" class="secondary-action w-10 h-10 border border-gray-300 dark:border-gray-600 rounded-lg flex items-center justify-center text-gray-600 dark:text-gray-400 hover:border-blue-500 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-300 shadow-sm bg-white dark:bg-gray-700">
                                            <i class="fas fa-external-link-alt text-sm"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-20">
                    <div class="empty-state max-w-md mx-auto">
                        <div class="empty-icon w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-folder-open text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="empty-title text-2xl font-bold text-gray-900 dark:text-white mb-3">
                            No Projects Yet
                        </h3>
                        <p class="empty-description text-gray-600 dark:text-gray-300">
                            Projects will be displayed here once they are added to the portfolio.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- View More Section -->
        <div class="text-center mt-16">
            <div class="view-more-section inline-block bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 px-8 py-6">
                <p class="view-more-text text-gray-600 dark:text-gray-300 mb-4">
                    Interested in seeing more of my work?
                </p>
                <a href="#contact" class="view-more-btn inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-lg hover:shadow-lg transition-all duration-300 font-medium shadow-md hover:-translate-y-0.5">
                    <span>Get In Touch</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Fixed CSS with proper spacing and structure */
.theme3-projects {
    background: linear-gradient(135deg, #0a0a12 0%, #151522 50%, #0a0a12 100%);
}

[data-theme="light"] .theme3-projects {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #ffffff 100%);
}

/* Ensure proper card spacing */
.project-card {
    min-height: 520px;
    display: flex;
    flex-direction: column;
}

.project-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.project-actions {
    margin-top: auto;
}

/* Text truncation utilities */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* FIXED: Overlay positioning and visibility */
.project-overlay {
    pointer-events: none;
    transition: all 0.3s ease;
}

.project-links {
    pointer-events: auto;
}

.project-link {
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease 0.1s;
}

.project-card:hover .project-link {
    opacity: 1;
    transform: translateY(0);
}

/* FIXED: Consistent image sizing */
.project-image-container {
    flex-shrink: 0;
    position: relative;
}

/* FIXED: Button visibility and styling - FORCE VISIBLE */
.primary-action-btn,
.secondary-action {
    opacity: 1 !important;
    visibility: visible !important;
    z-index: 20;
    position: relative;
}

.primary-action-btn {
    background: linear-gradient(135deg, #10b981, #059669) !important;
    border: none !important;
}

.primary-action-btn:hover {
    background: linear-gradient(135deg, #059669, #047857) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3) !important;
}

.secondary-action {
    background: white !important;
    border: 1px solid #d1d5db !important;
}

.dark .secondary-action {
    background: #374151 !important;
    border-color: #4b5563 !important;
}

.secondary-action:hover {
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
}

/* FIXED: Consistent card heights */
.project-title {
    min-height: 3rem;
    display: flex;
    align-items: center;
}

.project-description {
    min-height: 4.5rem;
}

.project-tech-stack {
    min-height: 2rem;
}

/* Proper grid gaps */
.grid {
    gap: 2rem;
}

@media (max-width: 768px) {
    .grid {
        gap: 1.5rem;
    }
    
    .project-card {
        min-height: 480px;
    }
    
    /* FIXED: Mobile overlay visibility */
    .project-overlay {
        opacity: 1 !important;
        background: rgba(0, 0, 0, 0.6) !important;
    }
    
    .project-link {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    .project-title {
        min-height: 2.5rem;
        font-size: 1.125rem;
    }
    
    .project-description {
        min-height: 4rem;
    }
}

/* Background pattern */
.background-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(0, 255, 157, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.05) 0%, transparent 50%);
    opacity: 0.1;
}

/* Floating particles */
.particle-container .floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: #00ff9d;
    box-shadow: 0 0 12px #00ff9d;
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

/* Section header styles */
.section-title-primary {
    color: #ffffff;
    font-weight: 900;
    letter-spacing: -0.02em;
}

[data-theme="light"] .section-title-primary {
    color: #1a202c;
}

.section-title-secondary {
    background: linear-gradient(135deg, #00ff9d, #00d4ff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 900;
    letter-spacing: -0.02em;
}

.section-divider {
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #00ff9d, #00d4ff);
    border-radius: 2px;
}

/* FIXED: Ensure all buttons are properly visible */
.project-actions .flex {
    opacity: 1 !important;
    visibility: visible !important;
}

/* FIXED: Force button backgrounds */
.primary-action-btn {
    background: linear-gradient(135deg, #10b981, #059669) !important;
}

.secondary-action {
    background: white !important;
}

.dark .secondary-action {
    background: #374151 !important;
}

/* FIXED: Add clear visual hierarchy */
.tech-tag {
    font-size: 0.75rem;
    padding: 0.25rem 0.75rem;
}

.status-badge {
    font-size: 0.7rem;
    padding: 0.25rem 0.75rem;
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

    // Add smooth entrance animations
    const projectCards = document.querySelectorAll('.project-card');
    projectCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // FIXED: Force button visibility on load
    setTimeout(() => {
        const buttons = document.querySelectorAll('.primary-action-btn, .secondary-action');
        buttons.forEach(button => {
            button.style.opacity = '1';
            button.style.visibility = 'visible';
            button.style.transform = 'translateY(0)';
        });
    }, 500);
});
</script>