@props(['educations'])

<section id="education" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-education">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="section-title-primary">Education</span>
                <span class="section-title-secondary">Journey</span>
            </h2>
            <div class="section-divider"></div>
            <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6" style="color: var(--text-secondary);">
                Academic excellence and continuous learning path
            </p>
        </div>

        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="empty-title">No Education Added Yet</h3>
                    <p class="empty-description">Educational background will appear here once added through the admin panel.</p>
                </div>
            </div>
        @else
            <!-- Education Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($educations->sortByDesc('year') as $index => $education)
                    <!-- Education Card -->
                    <div class="education-card group">
                        <!-- Year Badge -->
                        <div class="education-year">
                            <div class="year-badge">
                                <i class="fas fa-calendar-alt year-icon"></i>
                                <span class="year-text">{{ $education->year ?: 'Present' }}</span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="education-content">
                            <!-- Institution Icon -->
                            <div class="education-icon">
                                @if($education->icon_url)
                                    <img src="{{ $education->icon_url }}" alt="{{ $education->institution }}" class="institution-icon">
                                @else
                                    <div class="institution-icon-placeholder">
                                        <i class="fas fa-university"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Degree Information -->
                            <div class="education-info">
                                <h3 class="degree-title">{{ $education->degree }}</h3>
                                <p class="institution-name">{{ $education->institution }}</p>
                                
                                @if($education->details)
                                    <div class="education-details">
                                        <p class="details-text">{{ $education->details }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Status Indicator -->
                            <div class="education-status">
                                @if(!$education->year || $education->year == date('Y'))
                                    <div class="status-badge current">
                                        <i class="fas fa-spinner"></i>
                                        <span>Current</span>
                                    </div>
                                @else
                                    <div class="status-badge completed">
                                        <i class="fas fa-check"></i>
                                        <span>Completed</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        
    </div>
</section>

<style>
/* ===================================
   THEME 3 EDUCATION - PROFESSIONAL DESIGN
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

.theme3-education {
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

/* Education Card */
.education-card {
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    display: flex;
    flex-direction: column;
}

.education-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 
        0 20px 40px rgba(0, 255, 157, 0.15),
        0 0 0 1px rgba(0, 255, 157, 0.1);
}

.education-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
    pointer-events: none;
}

.education-card:hover::before {
    opacity: 0.03;
}

/* Education Year */
.education-year {
    padding: 1.5rem 2rem 1rem;
    text-align: center;
}

.year-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    color: var(--accent-primary);
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.education-card:hover .year-badge {
    background: rgba(0, 255, 157, 0.15);
    transform: scale(1.05);
}

.year-icon {
    font-size: 0.875rem;
}

.year-text {
    font-weight: 600;
}

/* Education Content */
.education-content {
    padding: 0 2rem 2rem;
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

/* Education Icon */
.education-icon {
    display: flex;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.institution-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: rgba(0, 255, 157, 0.1);
    border: 1.5px solid var(--border-light);
    padding: 0.75rem;
    transition: all 0.3s ease;
}

.education-card:hover .institution-icon {
    transform: scale(1.1);
    border-color: var(--accent-primary);
}

.institution-icon-placeholder {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--bg-primary);
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.education-card:hover .institution-icon-placeholder {
    transform: scale(1.1);
}

/* Education Info */
.education-info {
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.degree-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1.4;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.institution-name {
    font-size: 1rem;
    font-weight: 600;
    color: var(--accent-secondary);
    margin: 0;
    line-height: 1.4;
}

.education-details {
    margin-top: 0.5rem;
}

.details-text {
    font-size: 0.875rem;
    color: var(--text-secondary);
    line-height: 1.5;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Education Status */
.education-status {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.status-badge.current {
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--accent-primary);
    color: var(--accent-primary);
}

.status-badge.completed {
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid var(--accent-secondary);
    color: var(--accent-secondary);
}

.status-badge i {
    font-size: 0.75rem;
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

/* Additional Info */
.additional-info {
    padding: 2rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    max-width: 500px;
    margin: 0 auto;
}

.info-text {
    font-size: 1.125rem;
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
    text-align: center;
}

.certifications {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.cert-badge {
    padding: 0.5rem 1rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--accent-primary);
    transition: all 0.3s ease;
}

.cert-badge:hover {
    background: rgba(0, 255, 157, 0.15);
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 1280px) {
    .grid {
        gap: 1.5rem;
    }
}

@media (max-width: 1024px) {
    .education-content {
        padding: 0 1.5rem 1.5rem;
    }
    
    .education-year {
        padding: 1.25rem 1.5rem 1rem;
    }
}

@media (max-width: 768px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 3rem;
    }
    
    .education-card {
        margin-bottom: 1rem;
    }
    
    .certifications {
        flex-direction: column;
        align-items: center;
    }
    
    .cert-badge {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 2.5rem;
    }
    
    .education-content {
        padding: 0 1.25rem 1.25rem;
    }
    
    .education-year {
        padding: 1rem 1.25rem 0.75rem;
    }
    
    .degree-title {
        font-size: 1.125rem;
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

    // Education card animations
    const educationCards = document.querySelectorAll('.education-card');
    educationCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>