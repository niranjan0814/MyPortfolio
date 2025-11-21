@props(['aboutContent'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<section id="about" class="about-section">
    <div class="about-container">
        <!-- Background Elements -->
        <div class="about-bg"></div>
        <div class="about-particles"></div>

        <!-- Main Content -->
        <div class="about-content">
            <!-- Header -->
            <div class="about-header">
                <h2 class="about-title">About Me</h2>
                <div class="title-line"></div>
            </div>

            <!-- Two Column Layout -->
            <div class="about-grid">
                <!-- Left Column - Bio -->
                <div class="about-column left-column">
                    <div class="bio-card">
                        <h3 class="bio-title">{{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}</h3>
                        <p class="bio-text">
                            {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering with a passion for creating impactful digital solutions. Combining technical expertise with creative problem-solving to deliver exceptional user experiences.' !!}
                        </p>
                    </div>

                    <!-- Stats Section -->
                    <div class="stats-container">
                        {{-- Fallback icons map for stats --}}
                        @php
                            $statFallbackIcons = [
                                'projects' => 'fas fa-project-diagram',
                                'technologies' => 'fas fa-code',
                                'team' => 'fas fa-users',
                                'problem' => 'fas fa-lightbulb',
                            ];
                        @endphp

                        {{-- Stats Array --}}
                        @php
                            $stats = [
                                'projects' => ['count' => $aboutContent['stat_projects_count'] ?? '50+', 'label' => $aboutContent['stat_projects_label'] ?? 'Projects'],
                                'technologies' => ['count' => $aboutContent['stat_technologies_count'] ?? '20+', 'label' => $aboutContent['stat_technologies_label'] ?? 'Technologies'],
                                'team' => ['count' => $aboutContent['stat_team_count'] ?? '10+', 'label' => $aboutContent['stat_team_label'] ?? 'Team Projects'],
                                'problem' => ['count' => $aboutContent['stat_problem_count'] ?? '100+', 'label' => $aboutContent['stat_problem_label'] ?? 'Problems Solved'],
                            ];
                        @endphp

                        @foreach($stats as $key => $stat)
                            <div class="stat-item">
                                <div class="stat-icon-box">
                                    {{-- Validate stat icon URL from DB --}}
                                    @php
                                        $statIconUrl = $aboutContent['stats_icon_urls'][$key] ?? null;
                                        $isValidStatIcon = !empty($statIconUrl) && filter_var($statIconUrl, FILTER_VALIDATE_URL);
                                    @endphp
                                    @if($isValidStatIcon)
                                        <img src="{{ $statIconUrl }}"
                                            alt="{{ $stat['label'] }} icon"
                                            class="stat-icon-img"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                        <i class="{{ $statFallbackIcons[$key] }}" style="display:none;"></i>
                                    @else
                                        <i class="{{ $statFallbackIcons[$key] }}"></i>
                                    @endif
                                </div>
                                <div class="stat-info">
                                    <div class="stat-num">{{ $stat['count'] }}</div>
                                    <div class="stat-text">{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Column - Skills -->
                <div class="about-column right-column">
                    <!-- Soft Skills Section -->
                    @if (!empty($aboutContent['soft_skills']))
                        <div class="skills-box">
                            <h3 class="skills-title">
                                <i class="fas fa-star"></i>
                                Soft Skills
                            </h3>
                            <div class="skills-grid">
                                {{-- Fallback icons map for exception handling --}}
                                @php
                                    $fallbackIcons = [
                                        'Communication' => 'fas fa-comments',
                                        'Teamwork' => 'fas fa-users',
                                        'Problem Solving' => 'fas fa-lightbulb',
                                        'Leadership' => 'fas fa-flag',
                                        'Creativity' => 'fas fa-palette',
                                        'Adaptability' => 'fas fa-sync-alt',
                                        'Time Management' => 'fas fa-clock',
                                        'Critical Thinking' => 'fas fa-brain',
                                        'Collaboration' => 'fas fa-handshake',
                                        'Attention to Detail' => 'fas fa-magnifying-glass',
                                        'Presentation' => 'fas fa-presentation',
                                        'Analysis' => 'fas fa-chart-line',
                                        'Organization' => 'fas fa-list-check',
                                        'Decision Making' => 'fas fa-gavel',
                                        'Flexibility' => 'fas fa-arrows',
                                    ];
                                @endphp
                                @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                                    {{-- Validate icon URL from DB --}}
                                    @php
                                        $isValidSkillIcon = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                    @endphp
                                    <div class="skill-badge">
                                        <div class="skill-badge-icon">
                                            {{-- Use DB image if valid, otherwise use fallback icon --}}
                                            @if($isValidSkillIcon)
                                                <img src="{{ $iconUrl }}" 
                                                     alt="{{ $skill }} icon" 
                                                     class="skill-badge-img"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                                <i class="{{ $fallbackIcons[$skill] ?? 'fas fa-star' }}" style="display:none; align-items: center; justify-content: center;"></i>
                                            @else
                                                {{-- Use fallback icon if no URL or invalid URL from DB --}}
                                                <i class="{{ $fallbackIcons[$skill] ?? 'fas fa-star' }}"></i>
                                            @endif
                                        </div>
                                        <span class="skill-badge-text">{{ $skill }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Tech Stack Section -->
                    @if (!empty($aboutContent['tech_highlights']))
                        <div class="skills-box">
                            <h3 class="skills-title">
                                <i class="fas fa-microchip"></i>
                                Tech Stack
                            </h3>
                            <div class="tech-cloud">
                                @foreach ($aboutContent['tech_highlights'] as $tech)
                                    <span class="tech-cloud-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- CTA Buttons -->
                    <div class="cta-buttons">
                        <a href="#contact" class="btn btn-primary">
                            {{-- Validate CTA button icon from DB --}}
                            @php
                                $ctaIconUrl = $aboutContent['stats_icon_urls']['cta'] ?? null;
                                $isValidCtaIcon = !empty($ctaIconUrl) && filter_var($ctaIconUrl, FILTER_VALIDATE_URL);
                            @endphp
                            @if($isValidCtaIcon)
                                <img src="{{ $ctaIconUrl }}"
                                    alt="Contact icon"
                                    class="btn-icon-img"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';" />
                                <i class="fas fa-envelope" style="display:none;"></i>
                            @else
                                <i class="fas fa-envelope"></i>
                            @endif
                            <span>Let's Work Together</span>
                        </a>

                        @if($aboutContent['user']->hasCv())
                            <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" class="btn btn-secondary" download>
                                <i class="fas fa-download"></i>
                                <span>Download CV</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary: #00ff9d;
    --secondary: #00d4ff;
    --dark-bg: #0a0a12;
    --dark-card: #151522;
    --text-light: #ffffff;
    --text-muted: #b4c6e0;
    --border-color: rgba(0, 255, 157, 0.2);
    --glow: rgba(0, 255, 157, 0.3);
}

[data-theme="light"] {
    --primary: #00cc7a;
    --secondary: #0099cc;
    --dark-bg: #f8fafc;
    --dark-card: #ffffff;
    --text-light: #1a202c;
    --text-muted: #4a5568;
    --border-color: rgba(0, 204, 122, 0.3);
    --glow: rgba(0, 204, 122, 0.15);
}

.about-section {
    position: relative;
    width: 100%;
    padding: 80px 20px;
    background: linear-gradient(135deg, var(--dark-bg) 0%, #151522 50%, var(--dark-bg) 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

[data-theme="light"] .about-section {
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 50%, #f8fafc 100%);
}

.about-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 80%, var(--glow) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%);
    opacity: 0.1;
    z-index: 0;
}

.about-particles {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
    overflow: hidden;
}

.about-container {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 1400px;
}

.about-content {
    position: relative;
}

.about-header {
    text-align: center;
    margin-bottom: 80px;
}

.about-title {
    font-size: clamp(3rem, 8vw, 5rem);
    font-weight: 900;
    color: var(--text-light);
    margin: 0 0 20px 0;
    letter-spacing: -2px;
}

.title-line {
    width: 80px;
    height: 5px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    border-radius: 10px;
    margin: 0 auto;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
}

.about-column {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

/* Bio Card */
.bio-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1.5px solid var(--border-color);
    border-radius: 24px;
    padding: 40px;
    backdrop-filter: blur(20px);
    transition: all 0.4s ease;
}

.bio-card:hover {
    border-color: var(--primary);
    box-shadow: 0 20px 60px var(--glow);
    transform: translateY(-5px);
}

[data-theme="light"] .bio-card {
    background: rgba(0, 204, 122, 0.03);
    border: 1.5px solid var(--border-color);
}

.bio-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-light);
    margin: 0 0 20px 0;
    line-height: 1.2;
}

.bio-text {
    font-size: 1.05rem;
    line-height: 1.8;
    margin: 0;
    color: var(--text-muted);
    word-wrap: break-word;
    overflow-wrap: break-word;
}

[data-theme="light"] .bio-text {
    color: #4a5568;
}

[data-theme="light"] .bio-title {
    color: #1a202c;
}

[data-theme="light"] .about-title {
    color: #1a202c;
}

[data-theme="light"] .skills-title {
    color: #1a202c;
}

[data-theme="light"] .stat-num {
    color: #00cc7a;
}

[data-theme="light"] .stat-text {
    color: #4a5568;
}

[data-theme="light"] .skill-badge-text {
    color: #1a202c;
}

[data-theme="light"] .btn-primary {
    background: linear-gradient(135deg, #00cc7a, #0099cc);
    color: #ffffff;
}

/* Stats Container */
.stats-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 20px;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.stat-item:hover {
    background: rgba(0, 255, 157, 0.08);
    border-color: var(--primary);
    transform: translateY(-5px);
}

[data-theme="light"] .stat-item {
    background: rgba(0, 204, 122, 0.02);
}

[data-theme="light"] .stat-item:hover {
    background: rgba(0, 204, 122, 0.12);
}

.stat-icon-box {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: var(--dark-bg);
    flex-shrink: 0;
    overflow: hidden;
}

.stat-icon-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 4px;
}

.stat-info {
    flex: 1;
}

.stat-num {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
    margin-bottom: 5px;
}

.stat-text {
    font-size: 0.95rem;
    color: var(--text-muted);
    font-weight: 500;
}

/* Skills Box */
.skills-box {
    background: rgba(255, 255, 255, 0.05);
    border: 1.5px solid var(--border-color);
    border-radius: 24px;
    padding: 40px;
    backdrop-filter: blur(20px);
}

[data-theme="light"] .skills-box {
    background: rgba(0, 204, 122, 0.03);
    border: 1.5px solid var(--border-color);
}

.skills-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--text-light);
    margin: 0 0 25px 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.skills-title i {
    color: var(--primary);
    font-size: 1.3rem;
}

/* Skills Grid */
.skills-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.skill-badge {
    display: flex;
    align-items: center;
    gap: 12px;
    background: rgba(0, 255, 157, 0.08);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 16px;
    transition: all 0.3s ease;
}

.skill-badge:hover {
    background: rgba(0, 255, 157, 0.15);
    border-color: var(--primary);
    transform: translateX(5px);
}

.skill-badge-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--dark-bg);
    font-size: 1.2rem;
    flex-shrink: 0;
    overflow: hidden;
}

.skill-badge-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 4px;
}

.skill-badge-text {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-light);
}

/* Tech Cloud */
.tech-cloud {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.tech-cloud-tag {
    display: inline-block;
    background: rgba(0, 255, 157, 0.1);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 10px 18px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-muted);
    transition: all 0.3s ease;
}

.tech-cloud-tag:hover {
    background: rgba(0, 255, 157, 0.15);
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-3px);
}

/* CTA Buttons */
.cta-buttons {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 16px 32px;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.4s ease;
    width: 100%;
}

.btn i {
    font-size: 1.2rem;
}

.btn-icon-img {
    width: 1.2rem;
    height: 1.2rem;
    object-fit: contain;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: var(--dark-bg);
    box-shadow: 0 10px 35px var(--glow);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 50px var(--glow);
}

.btn-secondary {
    background: transparent;
    color: var(--text-light);
    border: 2px solid var(--border-color);
    backdrop-filter: blur(10px);
}

.btn-secondary:hover {
    background: rgba(0, 255, 157, 0.1);
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 1024px) {
    .about-section {
        padding: 60px 20px;
    }

    .about-header {
        margin-bottom: 60px;
    }

    .about-title {
        font-size: clamp(2.5rem, 6vw, 3.5rem);
    }

    .about-grid {
        gap: 40px;
    }

    .bio-card,
    .skills-box {
        padding: 32px;
    }

    .bio-title {
        font-size: 2rem;
    }

    .stats-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .about-section {
        padding: 40px 16px;
    }

    .about-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .about-title {
        font-size: 2.5rem;
    }

    .bio-card,
    .skills-box {
        padding: 24px;
    }

    .bio-title {
        font-size: 1.75rem;
    }

    .skills-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .stat-item {
        padding: 20px;
    }

    .stat-icon-box {
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
    }

    .stat-num {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .about-section {
        padding: 30px 12px;
        min-height: auto;
    }

    .about-header {
        margin-bottom: 40px;
    }

    .about-title {
        font-size: 2rem;
    }

    .bio-card,
    .skills-box {
        padding: 20px;
    }

    .bio-title {
        font-size: 1.5rem;
    }

    .bio-text {
        font-size: 1rem;
    }

    .skills-grid {
        grid-template-columns: 1fr;
    }

    .tech-cloud {
        gap: 8px;
    }

    .tech-cloud-tag {
        padding: 8px 14px;
        font-size: 0.85rem;
    }

    .stat-item {
        padding: 16px;
        gap: 12px;
    }

    .stat-icon-box {
        width: 45px;
        height: 45px;
    }

    .stat-num {
        font-size: 1.35rem;
    }

    .btn {
        padding: 14px 24px;
        font-size: 0.95rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    const particleContainer = document.querySelector('.about-particles');
    if (particleContainer) {
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 4px;
                height: 4px;
                background: #00ff9d;
                border-radius: 50%;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                opacity: ${Math.random() * 0.5 + 0.2};
                box-shadow: 0 0 12px #00ff9d;
                animation: float ${15 + Math.random() * 10}s ease-in-out infinite;
                animation-delay: ${Math.random() * 5}s;
            `;
            particleContainer.appendChild(particle);
        }
    }

    // Add animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.2; }
            25% { transform: translate(100px, -100px) scale(1.3); opacity: 0.8; }
            50% { transform: translate(-60px, 120px) scale(0.8); opacity: 0.4; }
            75% { transform: translate(120px, 60px) scale(1.1); opacity: 0.6; }
        }
    `;
    document.head.appendChild(style);
});
</script>