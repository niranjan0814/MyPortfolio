@props(['aboutContent'])

<section id="about" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-about">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    
    <!-- Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
        <!-- Section Header with Perfect Spacing -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="section-title-primary">About</span>
                <span class="section-title-secondary">Me</span>
            </h2>
            <div class="section-divider"></div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-start">
            
            <!-- Left Column - Introduction & Stats -->
            <div class="space-y-12">
                <!-- Greeting & Description -->
                <div class="space-y-8">
                    <div class="greeting-section">
                        <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-snug">
                            {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                        </h3>
                        <div class="description-box">
                            <p class="text-lg md:text-xl leading-relaxed text-justify">
                                {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering with a passion for creating impactful digital solutions. Combining technical expertise with creative problem-solving to deliver exceptional user experiences.' !!}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats with Professional Spacing -->
                <div class="stats-section">
                    <div class="stats-label-container">
                        <span class="stats-label">Achievements</span>
                        <div class="label-underline"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        @php
                            $stats = [
                                'projects' => [
                                    'count' => $aboutContent['stat_projects_count'] ?? '50+',
                                    'label' => $aboutContent['stat_projects_label'] ?? 'Projects',
                                    'icon' => $aboutContent['stats_icon_urls']['projects'] ?? null
                                ],
                                'technologies' => [
                                    'count' => $aboutContent['stat_technologies_count'] ?? '20+', 
                                    'label' => $aboutContent['stat_technologies_label'] ?? 'Technologies',
                                    'icon' => $aboutContent['stats_icon_urls']['technologies'] ?? null
                                ],
                                'team' => [
                                    'count' => $aboutContent['stat_team_count'] ?? '10+',
                                    'label' => $aboutContent['stat_team_label'] ?? 'Team Projects',
                                    'icon' => $aboutContent['stats_icon_urls']['team'] ?? null
                                ],
                                'problem' => [
                                    'count' => $aboutContent['stat_problem_count'] ?? '100+',
                                    'label' => $aboutContent['stat_problem_label'] ?? 'Problems Solved',
                                    'icon' => $aboutContent['stats_icon_urls']['problem'] ?? null
                                ]
                            ];
                        @endphp

                        @foreach($stats as $key => $stat)
                            <div class="stat-card group">
                                <div class="stat-icon-wrapper">
                                    @if($stat['icon'])
                                        <img src="{{ $stat['icon'] }}" alt="{{ $stat['label'] }}" class="stat-icon">
                                    @else
                                        <div class="stat-icon-fallback">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">{{ $stat['count'] }}</div>
                                    <div class="stat-label">{{ $stat['label'] }}</div>
                                </div>
                                <div class="stat-glow"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column - Skills & CTA -->
            <div class="space-y-12">
                <!-- Soft Skills -->
                @if (!empty($aboutContent['soft_skills']))
                    <div class="skills-section">
                        <div class="skills-label-container">
                            <span class="skills-label">Core Competencies</span>
                            <div class="label-underline"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @php
                                $skillIcons = [
                                    'Communication' => 'fas fa-comments',
                                    'Teamwork' => 'fas fa-users',
                                    'Problem Solving' => 'fas fa-lightbulb',
                                    'Leadership' => 'fas fa-flag',
                                    'Creativity' => 'fas fa-palette',
                                    'Adaptability' => 'fas fa-sync-alt'
                                ];
                            @endphp

                            @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                <div class="skill-card group">
                                    <div class="skill-icon-wrapper">
                                        @if($iconUrl)
                                            <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="skill-icon">
                                        @else
                                            <div class="skill-icon-fallback">
                                                <i class="{{ $skillIcons[$skill] ?? 'fas fa-star' }}"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="skill-content">
                                        <span class="skill-name">{{ $skill }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                

                <!-- CTA Buttons with Professional Spacing -->
                <div class="cta-section">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <!-- Contact Button -->
                        <a href="#contact" class="cta-btn primary-btn group">
                            <span class="btn-glow-effect"></span>
                            <span class="btn-content">
                                <span class="btn-text">{{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}</span>
                                <span class="btn-arrow">→</span>
                            </span>
                        </a>

                        <!-- CV Actions -->
                        @if($aboutContent['user']->hasCv())
                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}"
                                    class="cta-btn secondary-btn group"
                                    download>
                                    <span class="btn-content">
                                        <span class="btn-text">Download CV</span>
                                        <span class="btn-arrow">↓</span>
                                    </span>
                                </a>

                                <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}"
                                    target="_blank"
                                    class="cta-btn outline-btn group">
                                    <span class="btn-content">
                                        <span class="btn-text">View CV</span>
                                        <span class="btn-arrow">↗</span>
                                    </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ===================================
   THEME 3 ABOUT - PROFESSIONAL DESIGN
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

.theme3-about {
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

/* Greeting Section */
.greeting-section h3 {
    color: var(--text-primary);
    font-weight: 700;
    line-height: 1.1;
}

.description-box {
    padding: 2rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    backdrop-filter: blur(10px);
}

.description-box p {
    color: var(--text-secondary);
    line-height: 1.7;
}

/* Stats Section */
.stats-label-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.stats-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    white-space: nowrap;
}

.label-underline {
    flex: 1;
    height: 1px;
    background: linear-gradient(90deg, var(--border-light), transparent);
}

.stat-card {
    position: relative;
    padding: 1.5rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 12px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-4px);
    border-color: var(--accent-primary);
    box-shadow: 0 8px 30px rgba(0, 255, 157, 0.15);
}

.stat-icon-wrapper {
    width: 48px;
    height: 48px;
    background: rgba(0, 255, 157, 0.1);
    border: 1.5px solid var(--border-light);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-icon-wrapper {
    transform: scale(1.1);
    border-color: var(--accent-primary);
    background: rgba(0, 255, 157, 0.15);
}

.stat-icon {
    width: 24px;
    height: 24px;
}

.stat-icon-fallback {
    color: var(--accent-primary);
    font-size: 1.25rem;
}

.stat-content {
    position: relative;
    z-index: 2;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--accent-primary);
    margin-bottom: 0.25rem;
    line-height: 1;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 500;
    letter-spacing: 0.02em;
}

.stat-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover .stat-glow {
    opacity: 0.05;
}

/* Skills Section */
.skills-label-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.skills-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    white-space: nowrap;
}

.skill-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 10px;
    transition: all 0.3s ease;
}

.skill-card:hover {
    transform: translateY(-2px);
    border-color: var(--accent-primary);
    box-shadow: 0 6px 20px rgba(0, 255, 157, 0.1);
}

.skill-icon-wrapper {
    width: 40px;
    height: 40px;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.skill-card:hover .skill-icon-wrapper {
    transform: scale(1.1);
    border-color: var(--accent-primary);
}

.skill-icon {
    width: 20px;
    height: 20px;
}

.skill-icon-fallback {
    color: var(--accent-primary);
    font-size: 1rem;
}

.skill-name {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-primary);
    letter-spacing: 0.02em;
}

/* Tech Highlights */
.highlights-label-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.highlights-label {
    font-size: 0.875rem;
    color: var(--text-muted);
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    white-space: nowrap;
}

.tech-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.tech-tag {
    padding: 0.5rem 1rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-secondary);
    transition: all 0.3s ease;
}

.tech-tag:hover {
    background: rgba(0, 255, 157, 0.15);
    color: var(--accent-primary);
    border-color: var(--accent-primary);
    transform: translateY(-1px);
}

/* CTA Section */
.cta-section {
    margin-top: 2rem;
}

.cta-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1.125rem 2rem;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    min-width: 140px;
}

.primary-btn {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--bg-primary);
    box-shadow: 0 4px 20px rgba(0, 255, 157, 0.3);
}

.primary-btn:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 8px 40px rgba(0, 255, 157, 0.4),
        0 0 0 1px rgba(0, 255, 157, 0.2);
}

.secondary-btn {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--border-light);
}

.secondary-btn:hover {
    background: rgba(0, 255, 157, 0.1);
    border-color: var(--accent-primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 255, 157, 0.2);
}

.outline-btn {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--border-light);
}

.outline-btn:hover {
    background: rgba(0, 255, 157, 0.05);
    border-color: var(--accent-primary);
    transform: translateY(-3px);
}

.btn-glow-effect {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.primary-btn:hover .btn-glow-effect {
    transform: translateX(100%);
}

.btn-content {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    position: relative;
    z-index: 2;
}

.btn-text {
    font-weight: 600;
    letter-spacing: 0.02em;
}

.btn-arrow {
    font-size: 1.125em;
    transition: transform 0.3s ease;
}

.cta-btn:hover .btn-arrow {
    transform: translateX(3px);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .container {
        max-width: 90%;
    }
    
    .stats-section .grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 3rem;
    }
    
    .greeting-section h3 {
        font-size: 2rem;
    }
    
    .description-box {
        padding: 1.5rem;
    }
    
    .stat-card {
        padding: 1.25rem;
    }
    
    .skill-card {
        padding: 1rem;
    }
    
    .cta-section .flex {
        flex-direction: column;
    }
    
    .cta-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 2.5rem;
    }
    
    .skills-section .grid {
        grid-template-columns: 1fr;
    }
    
    .tech-tags {
        justify-content: center;
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
});
</script>