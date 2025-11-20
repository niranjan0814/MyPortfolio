@props(['aboutContent'])

<section id="about" class="section-full relative overflow-hidden py-24 lg:py-32 theme3-about">
    <!-- Enhanced Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    <div class="grid-lines absolute inset-0 -z-10 pointer-events-none"></div>
    
    <!-- Premium Floating Particles -->
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>

    <!-- Animated Background Orbs -->
    <div class="background-orbs absolute inset-0 -z-10 overflow-hidden">
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>
    </div>

    <div class="container mx-auto max-w-7xl relative z-10 px-6 lg:px-8">
        <!-- Premium Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-5xl md:text-6xl lg:text-7xl font-black mb-8 leading-tight">
                <span class="section-title-primary">About</span>
                <span class="section-title-secondary">Me</span>
            </h2>
            <div class="section-divider mx-auto"></div>
        </div>

        <!-- Enhanced Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-28 items-start">
            
            <!-- Left Column - Introduction & Stats -->
            <div class="space-y-16">
                <!-- Premium Greeting & Description -->
                <div class="space-y-10">
                    <div class="greeting-section">
                        <h3 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8 leading-snug">
                            {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                        </h3>
                        <div class="description-box group">
                            <div class="description-glow"></div>
                            <p class="text-xl md:text-2xl leading-relaxed text-justify">
                                {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering with a passion for creating impactful digital solutions. Combining technical expertise with creative problem-solving to deliver exceptional user experiences.' !!}
                            </p>
                            <div class="description-corner corner-tl"></div>
                            <div class="description-corner corner-tr"></div>
                            <div class="description-corner corner-bl"></div>
                            <div class="description-corner corner-br"></div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Stats with Premium Animations -->
                <div class="stats-section">
                    <div class="stats-label-container">
                        <span class="stats-label">Achievements</span>
                        <div class="label-underline"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
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
                            <div class="stat-card premium-card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                <div class="stat-shine"></div>
                                <div class="stat-border-glow"></div>
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
                                <div class="stat-particle-effect"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column - Skills & CTA -->
            <div class="space-y-16">
                <!-- Premium Soft Skills -->
                @if (!empty($aboutContent['soft_skills']))
                    <div class="skills-section">
                        <div class="skills-label-container">
                            <span class="skills-label">Soft Skills</span>
                            <div class="label-underline"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 inline-flex ">
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
                                <div class="skill-card premium-card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                    <div class="skill-shine"></div>
                                    <div class="skill-icon-wrapper">
                                        @if($iconUrl)
                                            <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="skill-icon">
                                        @else
                                            <div class="skill-icon-fallback">
                                                <i class="{{ $skillIcons[$skill] ?? 'fas fa-star' }}"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="skill-content inline-flex items-center justify-between">
                                        <span class="skill-name">{{ $skill }}</span>
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Tech Highlights -->
                @if (!empty($aboutContent['tech_highlights']))
                    <div class="highlights-section">
                        <div class="highlights-label-container">
                            <span class="highlights-label">Tech Expertise</span>
                            <div class="label-underline"></div>
                        </div>
                        <div class="tech-tags">
                            @foreach ($aboutContent['tech_highlights'] as $tech)
                                <span class="tech-tag premium-card">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Premium CTA Buttons -->
                <div class="cta-section">
                    <div class="flex flex-col sm:flex-row gap-6">
                        <!-- Contact Button -->
                        <a href="#contact" class="cta-btn primary-btn premium-btn group">
                            <span class="btn-shimmer"></span>
                            <span class="btn-glow"></span>
                            <span class="btn-content">
                                <span class="btn-text">{{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}</span>
                                <span class="btn-arrow">→</span>
                            </span>
                        </a>

                        <!-- CV Actions -->
                        @if($aboutContent['user']->hasCv())
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}"
                                    class="cta-btn secondary-btn premium-btn group"
                                    download>
                                    <span class="btn-content">
                                        <span class="btn-text">Download CV</span>
                                        <span class="btn-arrow">↓</span>
                                    </span>
                                </a>

                                <a href="{{ route('cv.public.view', $aboutContent['user']->id) }}"
                                    target="_blank"
                                    class="cta-btn outline-btn premium-btn group">
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
   PREMIUM THEME 3 ABOUT - ENHANCED
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

/* Enhanced Background Pattern */
.background-pattern {
    background-image: 
        radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
    animation: patternPulse 8s ease-in-out infinite;
}

@keyframes patternPulse {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.2; }
}

/* Grid Lines from Hero */
.grid-lines .grid-line {
    position: absolute;
    width: 1px;
    height: 100%;
    background: linear-gradient(to bottom, transparent 0%, var(--accent-primary) 50%, transparent 100%);
    opacity: 0.1;
    animation: gridFlow 8s ease-in-out infinite;
}

@keyframes gridFlow {
    0%, 100% {
        transform: translateY(-100%);
        opacity: 0;
    }
    50% {
        transform: translateY(100%);
        opacity: 0.2;
    }
}

/* Background Orbs */
.background-orbs .floating-orb {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, var(--accent-primary), var(--accent-secondary));
    opacity: 0.1;
    filter: blur(40px);
    animation: floatOrb 15s ease-in-out infinite;
}

.orb-1 {
    width: 300px;
    height: 300px;
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.orb-2 {
    width: 200px;
    height: 200px;
    bottom: 20%;
    right: 15%;
    animation-delay: 5s;
}

.orb-3 {
    width: 150px;
    height: 150px;
    top: 60%;
    left: 20%;
    animation-delay: 10s;
}

@keyframes floatOrb {
    0%, 100% {
        transform: translate(0, 0) scale(1);
        opacity: 0.1;
    }
    33% {
        transform: translate(50px, -30px) scale(1.2);
        opacity: 0.15;
    }
    66% {
        transform: translate(-30px, 40px) scale(0.9);
        opacity: 0.08;
    }
}

/* Enhanced Floating Particles */
.particle-container .floating-particle {
    position: absolute;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--accent-primary);
    box-shadow: 0 0 12px var(--accent-primary);
    animation: particleFloat 20s ease-in-out infinite;
}

@keyframes particleFloat {
    0%, 100% { 
        transform: translate(0, 0) scale(1) rotate(0deg);
        opacity: 0.3;
    }
    25% { 
        transform: translate(100px, -80px) scale(1.3) rotate(90deg);
        opacity: 0.7;
    }
    50% { 
        transform: translate(-60px, 120px) scale(0.8) rotate(180deg);
        opacity: 0.4;
    }
    75% { 
        transform: translate(120px, 60px) scale(1.1) rotate(270deg);
        opacity: 0.6;
    }
}

/* Premium Section Header */
.section-title-primary {
    color: var(--text-primary);
    font-weight: 900;
    letter-spacing: -0.02em;
    text-shadow: 0 0 30px var(--accent-glow);
}

.section-title-secondary {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 900;
    letter-spacing: -0.02em;
    animation: gradientShift 3s ease-in-out infinite;
}

@keyframes gradientShift {
    0%, 100% { filter: hue-rotate(0deg); }
    50% { filter: hue-rotate(10deg); }
}

.section-divider {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 2px;
    position: relative;
    overflow: hidden;
}

.section-divider::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Premium Greeting Section */
.greeting-section h3 {
    color: var(--text-primary);
    font-weight: 700;
    line-height: 1.1;
    animation: slideInLeft 0.8s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.description-box {
    position: relative;
    padding: 2.5rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    overflow: hidden;
    transition: all 0.4s ease;
}

.description-box:hover {
    border-color: var(--accent-primary);
    box-shadow: 0 20px 40px rgba(0, 255, 157, 0.15);
    transform: translateY(-5px);
}

.description-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.description-box:hover .description-glow {
    opacity: 0.05;
}

.description-box p {
    color: var(--text-secondary);
    line-height: 1.7;
    position: relative;
    z-index: 2;
}

.description-corner {
    position: absolute;
    width: 20px;
    height: 20px;
    border: 2px solid var(--accent-primary);
    opacity: 0;
    transition: all 0.4s ease;
}

.corner-tl {
    top: -1px;
    left: -1px;
    border-right: none;
    border-bottom: none;
    border-radius: 10px 0 0 0;
}

.corner-tr {
    top: -1px;
    right: -1px;
    border-left: none;
    border-bottom: none;
    border-radius: 0 10px 0 0;
}

.corner-bl {
    bottom: -1px;
    left: -1px;
    border-right: none;
    border-top: none;
    border-radius: 0 0 0 10px;
}

.corner-br {
    bottom: -1px;
    right: -1px;
    border-left: none;
    border-top: none;
    border-radius: 0 0 10px 0;
}

.description-box:hover .description-corner {
    opacity: 1;
}

/* Premium Card Base Styles */
.premium-card {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.premium-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: inherit;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: -1;
}

.premium-card:hover::before {
    opacity: 0.1;
    animation: borderPulse 2s ease-in-out infinite;
}

@keyframes borderPulse {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.2; }
}

/* Enhanced Stats Section */
.stats-label-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2.5rem;
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
    padding: 2rem 1.5rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 16px;
    backdrop-filter: blur(15px);
}

.stat-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-primary);
    box-shadow: 0 20px 40px rgba(0, 255, 157, 0.2);
}

.stat-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
    transition: left 0.6s ease;
}

.stat-card:hover .stat-shine {
    left: 100%;
}

.stat-border-glow {
    position: absolute;
    inset: -2px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 18px;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: -1;
    filter: blur(8px);
}

.stat-card:hover .stat-border-glow {
    opacity: 0.6;
}

.stat-icon-wrapper {
    width: 60px;
    height: 60px;
    background: rgba(0, 255, 157, 0.1);
    border: 2px solid var(--border-light);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    transition: all 0.4s ease;
    position: relative;
    z-index: 2;
}

.stat-card:hover .stat-icon-wrapper {
    transform: scale(1.15) rotate(5deg);
    border-color: var(--accent-primary);
    background: rgba(0, 255, 157, 0.15);
    box-shadow: 0 8px 25px var(--accent-glow);
}

.stat-icon {
    width: 28px;
    height: 28px;
}

.stat-icon-fallback {
    color: var(--accent-primary);
    font-size: 1.5rem;
}

.stat-content {
    position: relative;
    z-index: 2;
}

.stat-number {
    font-size: 2.25rem;
    font-weight: 800;
    color: var(--accent-primary);
    margin-bottom: 0.5rem;
    line-height: 1;
    text-shadow: 0 0 20px var(--accent-glow);
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-muted);
    font-weight: 500;
    letter-spacing: 0.02em;
}

.stat-particle-effect {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.stat-card:hover .stat-particle-effect {
    opacity: 1;
}

.stat-particle-effect::before,
.stat-particle-effect::after {
    content: '';
    position: absolute;
    width: 4px;
    height: 4px;
    background: var(--accent-primary);
    border-radius: 50%;
    animation: statParticle 1s ease-out forwards;
}

@keyframes statParticle {
    0% {
        transform: translate(0, 0) scale(1);
        opacity: 1;
    }
    100% {
        transform: translate(var(--tx, 20px), var(--ty, -20px)) scale(0);
        opacity: 0;
    }
}

/* Premium Skills Section */
.skills-label-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
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
    gap: 1.25rem;
    padding: 1.5rem;
    background: var(--card-bg);
    border: 1px solid var(--border-light);
    border-radius: 14px;
    backdrop-filter: blur(15px);
}

.skill-card:hover {
    transform: translateY(-5px);
    border-color: var(--accent-primary);
    box-shadow: 0 15px 30px rgba(0, 255, 157, 0.15);
}

.skill-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
    transition: left 0.6s ease;
}

.skill-card:hover .skill-shine {
    left: 100%;
}

.skill-icon-wrapper {
    width: 50px;
    height: 50px;
    background: rgba(0, 255, 157, 0.1);
    border: 2px solid var(--border-light);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s ease;
    flex-shrink: 0;
}

.skill-card:hover .skill-icon-wrapper {
    transform: scale(1.1);
    border-color: var(--accent-primary);
    background: rgba(0, 255, 157, 0.15);
}

.skill-icon {
    width: 24px;
    height: 24px;
}

.skill-icon-fallback {
    color: var(--accent-primary);
    font-size: 1.25rem;
}

.skill-content {
    flex: 1;
    min-width: 0;
}

.skill-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-primary);
    letter-spacing: 0.02em;
    margin-bottom: 0.5rem;
    display: block;
}

.skill-progress {
    width: 100%;
    height: 4px;
    background: rgba(255,255,255,0.1);
    border-radius: 2px;
    overflow: hidden;
}

.skill-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 2px;
    transition: width 1.5s ease-in-out;
    position: relative;
}

.skill-progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: progressShine 2s infinite;
}

@keyframes progressShine {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Enhanced Tech Highlights */
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
    gap: 0.875rem;
}

.tech-tag {
    padding: 0.75rem 1.25rem;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-light);
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--text-secondary);
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.tech-tag:hover {
    background: rgba(0, 255, 157, 0.15);
    color: var(--accent-primary);
    border-color: var(--accent-primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 255, 157, 0.2);
}

/* Premium CTA Section */
.cta-section {
    margin-top: 2.5rem;
}

.premium-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 1.25rem 2.5rem;
    font-weight: 600;
    font-size: 1.125rem;
    border-radius: 14px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    min-width: 160px;
}

.primary-btn {
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    color: var(--bg-primary);
    box-shadow: 0 8px 32px rgba(0, 255, 157, 0.35);
}

.primary-btn:hover {
    transform: translateY(-4px);
    box-shadow: 
        0 16px 48px rgba(0, 255, 157, 0.5),
        0 0 0 1px rgba(255, 255, 255, 0.2) inset;
}

.btn-shimmer {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.primary-btn:hover .btn-shimmer {
    transform: translateX(100%);
}

.btn-glow {
    position: absolute;
    inset: -4px;
    background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
    border-radius: 14px;
    z-index: -1;
    filter: blur(20px);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.primary-btn:hover .btn-glow {
    opacity: 0.6;
    animation: glowPulse 2s ease-in-out infinite;
}

@keyframes glowPulse {
    0%, 100% { opacity: 0.6; }
    50% { opacity: 0.9; }
}

.secondary-btn {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--border-light);
    backdrop-filter: blur(10px);
}

.secondary-btn:hover {
    background: var(--accent-glow);
    border-color: var(--accent-primary);
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0, 255, 157, 0.25);
}

.outline-btn {
    background: transparent;
    color: var(--text-primary);
    border: 2px solid var(--border-light);
    backdrop-filter: blur(10px);
}

.outline-btn:hover {
    background: rgba(0, 255, 157, 0.05);
    border-color: var(--accent-primary);
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0, 255, 157, 0.2);
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
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.premium-btn:hover .btn-arrow {
    transform: translateX(4px);
}

/* Enhanced Responsive Design */
@media (max-width: 1280px) {
    .container {
        max-width: 90%;
    }
    
    .greeting-section h3 {
        font-size: 3.5rem;
    }
}

@media (max-width: 1024px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 4rem;
    }
    
    .greeting-section h3 {
        font-size: 3rem;
    }
    
    .stats-section .grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .stat-card {
        padding: 1.75rem;
    }
}

@media (max-width: 768px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 3rem;
    }
    
    .greeting-section h3 {
        font-size: 2.5rem;
    }
    
    .description-box {
        padding: 2rem;
    }
    
    .stat-card {
        padding: 1.5rem;
    }
    
    .skill-card {
        padding: 1.25rem;
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .skill-content {
        width: 100%;
    }
    
    .cta-section .flex {
        flex-direction: column;
    }
    
    .premium-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .section-title-primary,
    .section-title-secondary {
        font-size: 2.5rem;
    }
    
    .greeting-section h3 {
        font-size: 2rem;
    }
    
    .skills-section .grid {
        grid-template-columns: 1fr;
    }
    
    .tech-tags {
        justify-content: center;
    }
    
    .description-box p {
        font-size: 1.125rem;
    }
}

/* Performance Optimization */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* Dark/Light Theme Transitions */
* {
    transition: background-color 0.3s ease,
                color 0.3s ease,
                border-color 0.3s ease;
}

/* Hover States for Touch Devices */
@media (hover: none) {
    .premium-card:hover,
    .cta-btn:hover,
    .tech-tag:hover {
        transform: none;
    }
    
    .premium-card:active,
    .cta-btn:active {
        transform: scale(0.98);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Floating Particles
    const particleContainer = document.querySelector('.particle-container');
    if (particleContainer) {
        const particleCount = 12;
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'floating-particle';
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.animationDelay = `${Math.random() * 15}s`;
            particle.style.animationDuration = `${15 + Math.random() * 10}s`;
            particleContainer.appendChild(particle);
        }
    }

    // Grid Lines from Hero
    const gridLines = document.querySelector('.grid-lines');
    if (gridLines) {
        for (let i = 0; i < 5; i++) {
            const line = document.createElement('div');
            line.className = 'grid-line';
            line.style.left = `${20 * i}%`;
            line.style.animationDelay = `${i * 0.2}s`;
            gridLines.appendChild(line);
        }
    }

    // Animate stats on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('[data-aos]').forEach(el => {
        observer.observe(el);
    });

    // Particle effects for stats
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            const effect = this.querySelector('.stat-particle-effect');
            if (effect) {
                // Create multiple particles
                for (let i = 0; i < 6; i++) {
                    const particle = document.createElement('div');
                    particle.style.cssText = `
                        --tx: ${(Math.random() - 0.5) * 40}px;
                        --ty: ${(Math.random() - 0.5) * 40}px;
                        position: absolute;
                        width: 4px;
                        height: 4px;
                        background: var(--accent-primary);
                        border-radius: 50%;
                        animation: statParticle 1s ease-out forwards;
                        left: 50%;
                        top: 50%;
                    `;
                    effect.appendChild(particle);
                    
                    // Remove particle after animation
                    setTimeout(() => {
                        if (particle.parentNode === effect) {
                            effect.removeChild(particle);
                        }
                    }, 1000);
                }
            }
        });
    });

    // Initialize skill progress animations
    document.querySelectorAll('.skill-progress-bar').forEach(bar => {
        // Animate progress bars when they come into view
        const progressObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 300);
                }
            });
        }, { threshold: 0.5 });

        progressObserver.observe(bar);
    });
});
</script>