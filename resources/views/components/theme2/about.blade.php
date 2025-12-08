@props(['aboutContent'])

<style>
    /* Reuse Theme 2 Variables */
    :root {
        --t2-bg: #F8F9FA;
        --t2-text-main: #2C2E3E;
        --t2-text-sub: #6B7280;
        --t2-accent: #E89B0C;
        --t2-accent-hover: #D97706;
        --t2-surface: #FFFFFF;
        --t2-border: rgba(44, 46, 62, 0.08);
        --t2-card-bg: #FFFFFF;
        --t2-glass-border: rgba(44, 46, 62, 0.05);
        --t2-shadow: 0 20px 60px rgba(233, 155, 12, 0.12);
        --t2-gradient: linear-gradient(135deg, #E89B0C 0%, #D97706 100%);
    }

    [data-theme="dark"] {
        --t2-bg: #2C2E3E;
        --t2-text-main: #FFFFFF;
        --t2-text-sub: #E5E7EB;
        --t2-accent: #F5A623;
        --t2-accent-hover: #E09612;
        --t2-surface: rgba(255, 255, 255, 0.05);
        --t2-border: rgba(255, 255, 255, 0.1);
        --t2-card-bg: rgba(255, 255, 255, 0.03);
        --t2-glass-border: rgba(255, 255, 255, 0.1);
        --t2-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        --t2-gradient: linear-gradient(135deg, #F5A623 0%, #D97706 100%);
    }

    .t2-about-section {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Hero-style Title */
    .t2-about-hero {
        text-align: center;
        margin-bottom: 5rem;
        position: relative;
    }

    .t2-about-title {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        background: var(--t2-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t2-about-greeting {
        font-size: 2rem;
        font-weight: 700;
        color: var(--t2-accent);
        margin-bottom: 1rem;
        display: inline-block;
        position: relative;
    }

    .t2-about-greeting::before {
        content: '👋';
        position: absolute;
        left: -3rem;
        animation: wave 2s infinite;
    }

    @keyframes wave {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(20deg);
        }

        75% {
            transform: rotate(-20deg);
        }
    }

    .t2-about-subtitle {
        font-size: 1.25rem;
        color: var(--t2-text-sub);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Bento Grid Layout */
    .t2-bento-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .t2-bento-item {
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: var(--t2-shadow);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .t2-bento-item:hover {
        transform: translateY(-5px);
        border-color: var(--t2-accent);
    }

    /* Description Card - Large */
    .t2-bento-description {
        grid-column: span 8;
        grid-row: span 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .t2-bento-description-text {
        font-size: 1.25rem;
        line-height: 1.8;
        color: var(--t2-text-sub);
        margin-bottom: 2rem;
    }

    /* Stats Cards - Compact */
    .t2-bento-stat {
        grid-column: span 3;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        background: var(--t2-surface);
    }

    .t2-stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--t2-accent);
        line-height: 1;
    }

    .t2-stat-label {
        font-size: 0.9rem;
        color: var(--t2-text-sub);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Skills Card - Full Width (redesigned like Theme 1) */
    .t2-bento-skills {
        grid-column: span 12;
    }

    .t2-skills-header {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t2-text-main);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .t2-skills-header::before {
        content: '';
        width: 4px;
        height: 28px;
        background: var(--t2-gradient);
        border-radius: 2px;
    }

    .t2-skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }

    .t2-skill-card {
        background: var(--t2-card-bg);
        border: 1px solid var(--t2-glass-border);
        border-radius: 20px;
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        min-height: 140px;
        box-shadow: var(--t2-shadow);
        transition: all 0.3s ease;
    }

    .t2-skill-card:hover {
        transform: translateY(-5px);
        border-color: var(--t2-accent);
        background: var(--t2-surface);
    }

    .t2-skill-icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--t2-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(233, 155, 12, 0.25);
    }

    .t2-skill-icon {
        width: 28px;
        height: 28px;
        object-fit: contain;
    }

    .t2-skill-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--t2-text-main);
        text-align: center;
    }


    /* CTA Section */
    .t2-cta-section {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 4rem;
        flex-wrap: wrap;
    }

    .t2-btn {
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .t2-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .t2-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .t2-btn-primary {
        background: var(--t2-gradient);
        color: white;
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.25);
        border: none;
    }

    .t2-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(233, 155, 12, 0.4);
    }

    .t2-btn-outline {
        background: transparent;
        border: 2px solid var(--t2-border);
        color: var(--t2-text-main);
    }

    .t2-btn-outline:hover {
        border-color: var(--t2-accent);
        color: var(--t2-accent);
        background: var(--t2-surface);
        transform: translateY(-3px);
    }

    .t2-btn span {
        position: relative;
        z-index: 1;
    }

    /* Decorative Elements */
    .t2-decoration-circle {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: var(--t2-gradient);
        opacity: 0.05;
        filter: blur(60px);
        pointer-events: none;
    }

    .t2-decoration-1 {
        top: -100px;
        right: -100px;
    }

    .t2-decoration-2 {
        bottom: -100px;
        left: -100px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .t2-bento-description {
            grid-column: span 12;
        }

        .t2-bento-stat {
            grid-column: span 6;
        }

        .t2-about-title {
            font-size: 3rem;
        }
    }

    @media (max-width: 640px) {
        .t2-about-section {
            padding: 4rem 0;
        }

        .t2-container {
            padding: 0 1rem;
        }

        .t2-about-title {
            font-size: 2.5rem;
        }

        .t2-about-greeting {
            font-size: 1.5rem;
        }

        .t2-about-greeting::before {
            left: -2rem;
        }

        .t2-about-hero {
            margin-bottom: 3rem;
        }

        .t2-bento-grid {
            gap: 1rem;
        }

        /* Make stats more compact - 2 per row */
        .t2-bento-stat {
            grid-column: span 6;
            padding: 1rem;
        }

        .t2-stat-number {
            font-size: 1.75rem;
        }

        .t2-stat-label {
            font-size: 0.7rem;
            line-height: 1.2;
        }

        .t2-bento-description {
            padding: 1.5rem;
        }

        .t2-bento-description-text {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .t2-skills-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .t2-skill-card {
            padding: 1rem;
            min-height: 120px;
        }

        .t2-skill-icon-wrapper {
            width: 48px;
            height: 48px;
        }

        .t2-skill-icon {
            width: 24px;
            height: 24px;
        }

        .t2-skill-name {
            font-size: 0.9rem;
        }

        .t2-cta-section {
            flex-direction: column;
        }

        .t2-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 2rem;
            font-size: 0.95rem;
        }
    }

    @media (max-width: 480px) {
        .t2-skills-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section id="about" class="t2-about-section">
    <!-- Decorative Elements -->
    <div class="t2-decoration-circle t2-decoration-1"></div>
    <div class="t2-decoration-circle t2-decoration-2"></div>

    <div class="t2-container">
        <!-- Hero Title Section -->
        <div class="t2-about-hero">

            <h2 class="t2-about-title">About Me</h2>
            <br>
            <div class="t2-about-greeting">
                {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
            </div>
        </div>

        <!-- Bento Grid Layout -->
        <div class="t2-bento-grid">
            <!-- Description Card (Large) -->
            <div class="t2-bento-item t2-bento-description">
                <div class="t2-bento-description-text">
                    {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering.' !!}
                </div>

                <!-- CTA Buttons Inside Description -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="#contact" class="t2-btn t2-btn-primary">
                        <span>{{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>

                    @if($aboutContent['user']->hasCv())
                        <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" class="t2-btn t2-btn-outline"
                            download>
                            <span>Download CV</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Stats Cards (Compact) -->
            @php
                $stats = [
                    ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label']],
                    ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label']],
                    ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label']],
                    ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label']],
                ];
            @endphp

            @foreach($stats as $stat)
                @if($stat['count'])
                    <div class="t2-bento-item t2-bento-stat">
                        <div class="t2-stat-number">{{ $stat['count'] }}</div>
                        <div class="t2-stat-label">{{ $stat['label'] }}</div>
                    </div>
                @endif
            @endforeach

            <!-- Soft Skills Card (Full Width, redesigned) -->
            @if (!empty($aboutContent['soft_skills']))
                <div class="t2-bento-item t2-bento-skills">
                    <h3 class="t2-skills-header">Core Competencies</h3>
                    <div class="t2-skills-grid">
                        @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                            <div class="t2-skill-card">
                                @if($iconUrl)
                                    <div class="t2-skill-icon-wrapper">
                                        <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="t2-skill-icon">
                                    </div>
                                @endif
                                <div class="t2-skill-name">{{ $skill }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>