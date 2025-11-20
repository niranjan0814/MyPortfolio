@props(['experiences'])

<section id="experience" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-experience">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-6xl relative z-10 px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="section-title-primary">Career</span>
                <span class="section-title-secondary">Journey</span>
            </h2>
            <div class="section-divider"></div>
            <p class="text-lg md:text-xl text-center max-w-2xl mx-auto mt-6" style="color: var(--text-secondary);">
                My professional growth and career milestones
            </p>
        </div>

        @if($experiences->isEmpty())
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="empty-title">No Experience Added</h3>
                <p class="empty-description">Professional experience will be displayed here once added to the portfolio.</p>
            </div>
        @else
            <!-- Timeline Container -->
            <div class="timeline-container">
                <!-- Central Timeline Line -->
                <div class="timeline-line"></div>

                @foreach($experiences as $index => $experience)
                    @php
                        $isEven = $index % 2 === 0;
                        $isFirst = $index === 0;
                        $isLast = $index === $experiences->count() - 1;
                    @endphp

                    <!-- Timeline Item -->
                    <div class="timeline-item {{ $isEven ? 'timeline-item-left' : 'timeline-item-right' }}">
                        <!-- Timeline Node -->
                        <div class="timeline-node {{ $isFirst ? 'timeline-node-first' : '' }} {{ $isLast ? 'timeline-node-last' : '' }}">
                            <div class="node-core">
                                @if($isFirst)
                                    <i class="fas fa-rocket"></i>
                                @elseif($isLast)
                                    <i class="fas fa-flag-checkered"></i>
                                @else
                                    <i class="fas fa-circle"></i>
                                @endif
                            </div>
                            <div class="node-glow"></div>
                        </div>

                        <!-- Experience Card -->
                        <div class="experience-card group">
                            <!-- Current Role Badge -->
                            @if($isFirst)
                                <div class="current-badge">
                                    <i class="fas fa-bolt"></i>
                                    <span>Current Role</span>
                                </div>
                            @endif

                            <!-- Duration -->
                            @if($experience->duration)
                                <div class="experience-duration">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $experience->duration }}</span>
                                </div>
                            @endif

                            <!-- Role & Company -->
                            <div class="experience-header">
                                <h3 class="experience-role">{{ $experience->role }}</h3>
                                <p class="experience-company">{{ $experience->company }}</p>
                            </div>

                            <!-- Details -->
                            @if($experience->details)
                                <div class="experience-details">
                                    <p>{{ $experience->details }}</p>
                                </div>
                            @endif

                            <!-- Skills/Tech Used -->
                            <div class="experience-skills">
                                <div class="skills-label">
                                    <i class="fas fa-tools"></i>
                                    <span>Key Contributions</span>
                                </div>
                                <div class="skills-tags">
                                    <span class="skill-tag">Full Stack</span>
                                    <span class="skill-tag">Team Leadership</span>
                                    <span class="skill-tag">Project Management</span>
                                </div>
                            </div>

                            <!-- Card Glow Effect -->
                            <div class="card-glow"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
/* ===================================
   THEME 3 EXPERIENCE - PROFESSIONAL DESIGN
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

.theme3-experience {
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

/* Empty State */
.empty-state {
    text-align: center;
    padding: 6rem 2rem;
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

/* Timeline Container */
.timeline-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 0;
}

/* Timeline Line */
.timeline-line {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    height: 100%;
    background: linear-gradient(
        180deg,
        var(--accent-primary) 0%,
        var(--accent-secondary) 50%,
        var(--accent-primary) 100%
    );
    border-radius: 2px;
}

/* Timeline Item */
.timeline-item {
    display: flex;
    align-items: center;
    margin-bottom: 4rem;
    position: relative;
    width: 100%;
}

.timeline-item-left {
    justify-content: flex-start;
    padding-right: 50%;
}

.timeline-item-right {
    justify-content: flex-end;
    padding-left: 50%;
}

/* Timeline Node */
.timeline-node {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.node-core {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--bg-primary);
    font-size: 1rem;
    position: relative;
    z-index: 2;
    border: 3px solid var(--bg-primary);
}

.node-glow {
    position: absolute;
    inset: -10px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 50%;
    filter: blur(12px);
    opacity: 0.4;
    z-index: 1;
    animation: nodePulse 2s ease-in-out infinite;
}

.timeline-node-first .node-core {
    background: linear-gradient(135deg, #ff6b6b, #ffa726);
}

.timeline-node-last .node-core {
    background: linear-gradient(135deg, #4ecdc4, #556270);
}

@keyframes nodePulse {
    0%, 100% { opacity: 0.4; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.1); }
}

/* Experience Card */
.experience-card {
    position: relative;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    padding: 2rem;
    width: 90%;
    max-width: 500px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

.experience-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 
        0 20px 40px rgba(0, 255, 157, 0.15),
        0 0 0 1px rgba(0, 255, 157, 0.1);
}

.card-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 16px;
    pointer-events: none;
}

.experience-card:hover .card-glow {
    opacity: 0.05;
}

/* Current Badge */
.current-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, #ff6b6b, #ffa726);
    border-radius: 20px;
    color: var(--bg-primary);
    font-size: 0.75rem;
    font-weight: 600;
    margin-bottom: 1rem;
    animation: currentPulse 2s ease-in-out infinite;
}

@keyframes currentPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* Experience Duration */
.experience-duration {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--accent-primary);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.experience-duration i {
    font-size: 0.75rem;
}

/* Experience Header */
.experience-header {
    margin-bottom: 1.5rem;
}

.experience-role {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1.3;
    margin-bottom: 0.5rem;
}

.experience-company {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--accent-secondary);
    line-height: 1.4;
}

/* Experience Details */
.experience-details {
    margin-bottom: 1.5rem;
}

.experience-details p {
    color: var(--text-secondary);
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Experience Skills */
.experience-skills {
    margin-top: 1.5rem;
}

.skills-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-muted);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.skills-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.skill-tag {
    padding: 0.375rem 0.75rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--accent-primary);
    transition: all 0.3s ease;
}

.skill-tag:hover {
    background: rgba(0, 255, 157, 0.15);
    transform: translateY(-1px);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .timeline-item-left,
    .timeline-item-right {
        padding: 0;
        justify-content: center;
    }
    
    .timeline-node {
        display: none;
    }
    
    .experience-card {
        width: 100%;
        max-width: 600px;
    }
}

@media (max-width: 768px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 3rem;
    }
    
    .experience-card {
        padding: 1.5rem;
    }
    
    .experience-role {
        font-size: 1.25rem;
    }
    
    .experience-company {
        font-size: 1rem;
    }
    
    .timeline-line {
        left: 30px;
    }
    
    .timeline-node {
        left: 30px;
        display: flex;
    }
    
    .timeline-item-left,
    .timeline-item-right {
        padding-left: 80px;
        justify-content: flex-start;
    }
}

@media (max-width: 480px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 2.5rem;
    }
    
    .experience-card {
        padding: 1.25rem;
    }
    
    .timeline-item {
        margin-bottom: 3rem;
    }
    
    .timeline-node {
        width: 50px;
        height: 50px;
        left: 25px;
    }
    
    .node-core {
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
    }
    
    .timeline-item-left,
    .timeline-item-right {
        padding-left: 60px;
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

    // Animate timeline items on scroll
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    timelineItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.6s ease ${index * 0.2}s`;
        observer.observe(item);
    });
});
</script>