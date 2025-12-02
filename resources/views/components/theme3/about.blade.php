@props(['aboutContent'])

<style>
    /* ============================================
       THEME 3 ABOUT - ENHANCED MODERN DESIGN
       Matching Hero Section Aesthetic
       ============================================ */
    
    :root {
        /* Light Theme */
        --t3-about-bg: #f8fafc;
        --t3-about-surface: #ffffff;
        --t3-about-text: #1a202c;
        --t3-about-text-muted: #4a5568;
        --t3-about-accent: #00cc7a;
        --t3-about-accent-secondary: #0099cc;
        --t3-about-border: rgba(0, 204, 122, 0.3);
        --t3-about-shadow: 0 10px 40px rgba(0, 204, 122, 0.15);
        --t3-about-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
        --t3-about-glow: rgba(0, 204, 122, 0.15);
    }

    [data-theme="dark"] {
        /* Dark Theme */
        --t3-about-bg: #0a0a12;
        --t3-about-surface: #151522;
        --t3-about-text: #ffffff;
        --t3-about-text-muted: #b4c6e0;
        --t3-about-accent: #00ff9d;
        --t3-about-accent-secondary: #00d4ff;
        --t3-about-border: rgba(0, 255, 157, 0.2);
        --t3-about-shadow: 0 10px 40px rgba(0, 255, 157, 0.3);
        --t3-about-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
        --t3-about-glow: rgba(0, 255, 157, 0.3);
    }

    /* Section */
    .t3-about-section {
        background: var(--t3-about-bg);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        transition: background 0.3s ease;
    }

    /* Background Elements */
    .t3-about-bg-shapes {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
        opacity: 0.05;
    }

    .t3-about-shape {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-about-gradient);
        filter: blur(100px);
    }

    .t3-about-shape-1 {
        top: 10%;
        left: 5%;
        width: 400px;
        height: 400px;
    }

    .t3-about-shape-2 {
        bottom: 10%;
        right: 5%;
        width: 350px;
        height: 350px;
    }

    /* Container */
    .t3-about-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Header */
    .t3-about-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t3-about-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        color: var(--t3-about-text);
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .t3-about-title-accent {
        background: var(--t3-about-gradient);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .t3-about-subtitle {
        font-size: 1.125rem;
        color: var(--t3-about-text-muted);
        max-width: 600px;
        margin: 0 auto;
    }

    /* Grid Layout */
    .t3-about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 4rem;
    }

    /* Bio Card */
    .t3-bio-card {
        background: var(--t3-about-surface);
        border: 1px solid var(--t3-about-border);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: var(--t3-about-shadow);
        transition: all 0.3s ease;
    }

    .t3-bio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px var(--t3-about-glow);
    }

    .t3-bio-greeting {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--t3-about-text);
        margin-bottom: 1.5rem;
    }

    .t3-bio-description {
        font-size: 1.0625rem;
        line-height: 1.8;
        color: var(--t3-about-text-muted);
        margin: 0;
    }

    /* Stats Grid */
    .t3-stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .t3-stat-card {
        background: var(--t3-about-surface);
        border: 1px solid var(--t3-about-border);
        border-radius: 16px;
        padding: 1.75rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        transition: all 0.3s ease;
    }

    .t3-stat-card:hover {
        transform: translateY(-3px);
        border-color: var(--t3-about-accent);
        box-shadow: 0 8px 25px var(--t3-about-glow);
    }

    .t3-stat-icon {
        width: 60px;
        height: 60px;
        background: var(--t3-about-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        flex-shrink: 0;
    }

    .t3-stat-icon img {
        width: 32px;
        height: 32px;
        object-fit: contain;
    }

    .t3-stat-info {
        flex: 1;
    }

    .t3-stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--t3-about-accent);
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .t3-stat-label {
        font-size: 0.9375rem;
        color: var(--t3-about-text-muted);
        font-weight: 500;
    }

    /* Skills Section */
    .t3-skills-section {
        background: var(--t3-about-surface);
        border: 1px solid var(--t3-about-border);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: var(--t3-about-shadow);
    }

    .t3-skills-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 2rem;
    }

    .t3-skills-icon {
        width: 40px;
        height: 40px;
        background: var(--t3-about-gradient);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.125rem;
    }

    .t3-skills-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t3-about-text);
        margin: 0;
    }

    .t3-skills-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .t3-skill-badge {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        padding: 1rem 1.25rem;
        background: rgba(0, 255, 157, 0.05);
        border: 1px solid var(--t3-about-border);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t3-skill-badge {
        background: rgba(0, 204, 122, 0.05);
    }

    .t3-skill-badge:hover {
        background: rgba(0, 255, 157, 0.1);
        border-color: var(--t3-about-accent);
        transform: translateX(5px);
    }

    [data-theme="light"] .t3-skill-badge:hover {
        background: rgba(0, 204, 122, 0.1);
    }

    .t3-skill-icon {
        width: 36px;
        height: 36px;
        background: var(--t3-about-gradient);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .t3-skill-icon img {
        width: 20px;
        height: 20px;
        object-fit: contain;
    }

    .t3-skill-name {
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--t3-about-text);
    }

    /* Tech Highlights */
    .t3-tech-cloud {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .t3-tech-tag {
        padding: 0.625rem 1.25rem;
        background: rgba(0, 255, 157, 0.08);
        border: 1px solid var(--t3-about-border);
        border-radius: 100px;
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--t3-about-text);
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t3-tech-tag {
        background: rgba(0, 204, 122, 0.08);
    }

    .t3-tech-tag:hover {
        background: var(--t3-about-accent);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px var(--t3-about-glow);
    }

    /* CTA Buttons */
    .t3-about-cta {
        display: flex;
        gap: 1.25rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .t3-cta-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }

    .t3-cta-primary {
        background: var(--t3-about-gradient);
        color: white;
        border: none;
        box-shadow: 0 4px 20px var(--t3-about-glow);
    }

    .t3-cta-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px var(--t3-about-glow);
    }

    .t3-cta-secondary {
        background: transparent;
        color: var(--t3-about-text);
        border: 2px solid var(--t3-about-border);
    }

    .t3-cta-secondary:hover {
        background: var(--t3-about-surface);
        border-color: var(--t3-about-accent);
        color: var(--t3-about-accent);
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .t3-about-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .t3-stats-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .t3-about-section {
            padding: 4rem 0;
        }

        .t3-about-header {
            margin-bottom: 3rem;
        }

        .t3-bio-card,
        .t3-skills-section {
            padding: 2rem;
        }

        .t3-skills-grid {
            grid-template-columns: 1fr;
        }

        .t3-about-cta {
            flex-direction: column;
        }

        .t3-cta-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<section id="about" class="t3-about-section">
    <!-- Background Shapes -->
    <div class="t3-about-bg-shapes">
        <div class="t3-about-shape t3-about-shape-1"></div>
        <div class="t3-about-shape t3-about-shape-2"></div>
    </div>

    <div class="t3-about-container">
        <!-- Header -->
        <div class="t3-about-header">
            <h2 class="t3-about-title">
                About <span class="t3-about-title-accent">Me</span>
            </h2>
        </div>

        <!-- Main Grid -->
        <div class="t3-about-grid">
            <!-- Left Column -->
            <div>
                <!-- Bio Card -->
                <div class="t3-bio-card">
                    <h3 class="t3-bio-greeting">
                        {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
                    </h3>
                    <div class="t3-bio-description">
                        {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering with a passion for creating impactful digital solutions. Combining technical expertise with creative problem-solving to deliver exceptional user experiences.' !!}
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="t3-stats-grid" style="margin-top: 2rem;">
                    @php
                        $statFallbackIcons = [
                            'projects' => 'fas fa-project-diagram',
                            'technologies' => 'fas fa-code',
                            'team' => 'fas fa-users',
                            'problem' => 'fas fa-lightbulb',
                        ];

                        $stats = [
                            'projects' => ['count' => $aboutContent['stat_projects_count'] ?? '50+', 'label' => $aboutContent['stat_projects_label'] ?? 'Projects'],
                            'technologies' => ['count' => $aboutContent['stat_technologies_count'] ?? '20+', 'label' => $aboutContent['stat_technologies_label'] ?? 'Technologies'],
                            'team' => ['count' => $aboutContent['stat_team_count'] ?? '10+', 'label' => $aboutContent['stat_team_label'] ?? 'Team Projects'],
                            'problem' => ['count' => $aboutContent['stat_problem_count'] ?? '100+', 'label' => $aboutContent['stat_problem_label'] ?? 'Problems Solved'],
                        ];
                    @endphp

                    @foreach($stats as $key => $stat)
                    <div class="t3-stat-card">
                        <div class="t3-stat-icon">
                            @php
                                $statIconUrl = $aboutContent['stats_icon_urls'][$key] ?? null;
                                $isValidStatIcon = !empty($statIconUrl) && filter_var($statIconUrl, FILTER_VALIDATE_URL);
                            @endphp
                            @if($isValidStatIcon)
                                <img src="{{ $statIconUrl }}" alt="{{ $stat['label'] }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <i class="{{ $statFallbackIcons[$key] }}" style="display:none;"></i>
                            @else
                                <i class="{{ $statFallbackIcons[$key] }}"></i>
                            @endif
                        </div>
                        <div class="t3-stat-info">
                            <div class="t3-stat-number">{{ $stat['count'] }}</div>
                            <div class="t3-stat-label">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Column -->
            <div>
                <!-- Soft Skills -->
                @if(!empty($aboutContent['soft_skills']))
                <div class="t3-skills-section">
                    <div class="t3-skills-header">
                        <div class="t3-skills-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="t3-skills-title">Soft Skills</h3>
                    </div>
                    <div class="t3-skills-grid">
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
                            ];
                        @endphp
                        @foreach($aboutContent['soft_skills'] as $skill => $iconUrl)
                        <div class="t3-skill-badge">
                            <div class="t3-skill-icon">
                                @php
                                    $isValidSkillIcon = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                @endphp
                                @if($isValidSkillIcon)
                                    <img src="{{ $iconUrl }}" alt="{{ $skill }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <i class="{{ $fallbackIcons[$skill] ?? 'fas fa-star' }}" style="display:none;"></i>
                                @else
                                    <i class="{{ $fallbackIcons[$skill] ?? 'fas fa-star' }}"></i>
                                @endif
                            </div>
                            <span class="t3-skill-name">{{ $skill }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Tech Highlights -->
                @if(!empty($aboutContent['tech_highlights']))
                <div class="t3-skills-section" style="margin-top: 2rem;">
                    <div class="t3-skills-header">
                        <div class="t3-skills-icon">
                            <i class="fas fa-microchip"></i>
                        </div>
                        <h3 class="t3-skills-title">Tech Stack</h3>
                    </div>
                    <div class="t3-tech-cloud">
                        @foreach($aboutContent['tech_highlights'] as $tech)
                        <span class="t3-tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- CTA Buttons -->
                <div class="t3-about-cta">
                    <a href="#contact" class="t3-cta-btn t3-cta-primary">
                        <i class="fas fa-envelope"></i>
                        <span>Let's Work Together</span>
                    </a>
                    @if($aboutContent['user']->hasCv())
                    <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" class="t3-cta-btn t3-cta-secondary" download>
                        <i class="fas fa-download"></i>
                        <span>Download CV</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>