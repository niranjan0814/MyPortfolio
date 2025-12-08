@props(['aboutContent'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON - PROFESSIONAL ABOUT
       Modern Bento Grid Layout
       ========================================== */

    :root {
        /* DARK THEME (Cosmic Neon) - Default */
        --t1-bg-primary: #0B0F1A;
        --t1-bg-secondary: #0F0A21;
        --t1-surface-card: rgba(26, 16, 51, 0.6);
        --t1-text-primary: #FFFFFF;
        --t1-text-secondary: #C7C7D2;
        --t1-text-muted: #9A9AB3;
        --t1-accent-primary: #A56BFF;
        --t1-accent-glow: #C68BFF;
        --t1-accent-secondary: #F0B54A;
        --t1-accent-secondary-glow: #F7CA57;
        --t1-glow-color: rgba(145, 80, 255, 0.35);
        --t1-icon-glow: rgba(168, 100, 255, 0.6);
        --t1-btn-glow: rgba(130, 70, 255, 0.4);
        --t1-card-shadow: 0 8px 32px 0 rgba(120, 60, 255, 0.25);
        --t1-gradient-primary: linear-gradient(135deg, #A56BFF 0%, #5E3AE8 100%);
        --t1-gradient-secondary: linear-gradient(135deg, #FBD16B 0%, #E8A93C 100%);
        --t1-border-color: rgba(165, 107, 255, 0.2);
    }

    [data-theme="light"] {
        /* LIGHT THEME (Aurora Soft Light) */
        --t1-bg-primary: #F8F9FC;
        --t1-bg-secondary: #FAFBFF;
        --t1-surface-card: rgba(255, 255, 255, 0.7);
        --t1-text-primary: #1A1D23;
        --t1-text-secondary: #6B7280;
        --t1-text-muted: #9CA3AF;
        --t1-accent-primary: #7A5AF8;
        --t1-accent-glow: #8F6BFF;
        --t1-accent-secondary: #E89B0C;
        --t1-accent-secondary-glow: #F7B52C;
        --t1-glow-color: rgba(122, 90, 248, 0.12);
        --t1-icon-glow: rgba(122, 90, 248, 0.2);
        --t1-btn-glow: rgba(122, 90, 248, 0.15);
        --t1-card-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.06);
        --t1-gradient-primary: linear-gradient(135deg, #8B5CFF 0%, #5E3AE8 100%);
        --t1-gradient-secondary: linear-gradient(135deg, #F7C95A 0%, #E8A93C 100%);
        --t1-border-color: rgba(122, 90, 248, 0.15);
    }

    /* Section Layout */
    .t1-about-section {
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-secondary);
        font-family: 'Inter', sans-serif;
    }

    .t1-about-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Hero Title Section */
    .t1-about-hero {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .t1-section-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1rem;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t1-greeting {
        font-size: 2rem;
        font-weight: 700;
        color: var(--t1-accent-primary);
        margin-bottom: 1rem;
        display: inline-block;
        position: relative;
    }

    .t1-greeting::before {
        content: '👋';
        position: absolute;
        left: -3rem;
        animation: t1-wave 2s infinite;
    }

    @keyframes t1-wave {

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

    /* Bento Grid Layout */
    .t1-bento-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    .t1-bento-item {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 24px;
        padding: 1.5rem;
        box-shadow: var(--t1-card-shadow);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .t1-bento-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--t1-gradient-primary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .t1-bento-item:hover {
        transform: translateY(-5px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 20px 60px rgba(165, 107, 255, 0.3);
    }

    .t1-bento-item:hover::before {
        opacity: 1;
    }

    /* Profile Image Card */
    .t1-bento-profile {
        grid-column: span 4;
        grid-row: span 2;
        padding: 0;
        position: relative;
    }

    .t1-profile-image-wrapper {
        width: 100%;
        height: 100%;
        min-height: 320px;
        position: relative;
        overflow: hidden;
        border-radius: 24px;
    }

    .t1-profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .t1-bento-profile:hover .t1-profile-image {
        transform: scale(1.05);
    }

    /* Floating Badges on Profile */
    .t1-float-badge {
        position: absolute;
        padding: 0.5rem 1rem;
        background: var(--t1-surface-card);
        backdrop-filter: blur(12px);
        border: 1px solid var(--t1-border-color);
        border-radius: 12px;
        box-shadow: var(--t1-card-shadow);
        font-weight: 700;
        color: var(--t1-text-primary);
        z-index: 20;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }

    .t1-float-badge:hover {
        transform: scale(1.05);
        border-color: var(--t1-accent-primary);
    }

    /* Degree Badge - Bottom Left with Cap Effect */
    .t1-badge-degree {
        bottom: 1.5rem;
        left: 1.5rem;
        padding-left: 3rem;
        /* Space for the cap */
        background: var(--t1-surface-card);
        border-color: var(--t1-accent-primary);
    }

    .t1-cap-icon {
        position: absolute;
        left: -15px;
        bottom: -5px;
        width: 50px;
        height: 50px;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.2));
        transform: rotate(-15deg);
        z-index: 22;
    }

    /* Description Card - Large */
    .t1-bento-description {
        grid-column: span 8;
        grid-row: span 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 1.5rem;
    }

    .t1-description-text {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--t1-text-secondary);
    }

    /* Stats Cards - Compact */
    .t1-bento-stat {
        grid-column: span 3;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 0.75rem;
        min-height: 130px;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
    }

    .t1-stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--t1-gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        box-shadow: 0 4px 15px var(--t1-glow-color);
    }

    .t1-stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--t1-accent-primary);
        line-height: 1;
    }

    .t1-stat-label {
        font-size: 0.875rem;
        color: var(--t1-text-muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Skills Card - Full Width */
    .t1-bento-skills {
        grid-column: span 12;
    }

    .t1-skills-header {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .t1-skills-header::before {
        content: '';
        width: 4px;
        height: 28px;
        background: var(--t1-gradient-primary);
        border-radius: 2px;
    }

    .t1-skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.25rem;
    }

    .t1-skill-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--t1-border-color);
        border-radius: 16px;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        min-height: 120px;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-skill-card {
        background: rgba(255, 255, 255, 0.5);
    }

    .t1-skill-card:hover {
        transform: translateY(-5px);
        border-color: var(--t1-accent-primary);
        background: var(--t1-surface-card);
        box-shadow: 0 10px 30px var(--t1-glow-color);
    }

    .t1-skill-icon-wrapper {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--t1-gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px var(--t1-glow-color);
    }

    .t1-skill-icon {
        width: 24px;
        height: 24px;
        object-fit: contain;
    }

    .t1-skill-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--t1-text-primary);
        text-align: center;
    }

    /* CTA Section */
    .t1-cta-section {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-top: 3rem;
        flex-wrap: wrap;
    }

    .t1-btn {
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .t1-btn::before {
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

    .t1-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .t1-btn-primary {
        background: var(--t1-gradient-primary);
        color: #FFFFFF;
        box-shadow: 0 8px 24px var(--t1-btn-glow);
        border: none;
    }

    .t1-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px var(--t1-btn-glow);
    }

    .t1-btn-outline {
        background: transparent;
        border: 2px solid var(--t1-border-color);
        color: var(--t1-text-primary);
    }

    .t1-btn-outline:hover {
        border-color: var(--t1-accent-primary);
        color: var(--t1-accent-primary);
        background: var(--t1-surface-card);
        transform: translateY(-3px);
    }

    .t1-btn span {
        position: relative;
        z-index: 1;
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.25;
        z-index: 0;
        animation: t1-blob-float 12s infinite alternate;
    }

    .t1-blob-1 {
        top: -10%;
        right: -5%;
        width: 600px;
        height: 600px;
        background: var(--t1-accent-glow);
    }

    .t1-blob-2 {
        bottom: -10%;
        left: -5%;
        width: 500px;
        height: 500px;
        background: var(--t1-accent-secondary);
    }

    @keyframes t1-blob-float {
        0% {
            transform: translate(0, 0) scale(1);
        }

        100% {
            transform: translate(40px, -40px) scale(1.1);
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .t1-bento-profile {
            grid-column: span 12;
            grid-row: span 1;
        }

        .t1-profile-image-wrapper {
            min-height: 350px;
        }

        .t1-bento-description {
            grid-column: span 12;
        }

        .t1-bento-stat {
            grid-column: span 6;
        }

        .t1-section-title {
            font-size: 3rem;
        }

        .t1-greeting {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 640px) {
        .t1-about-section {
            padding: 4rem 0 3rem;
        }

        .t1-about-container {
            padding: 0 1rem;
            width: 100%;
            box-sizing: border-box;
        }

        .t1-about-hero {
            margin-bottom: 2rem;
        }

        .t1-section-title {
            font-size: clamp(2rem, 8vw, 2.5rem);
            margin-bottom: 0.75rem;
        }

        .t1-greeting {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .t1-greeting::before {
            left: -2rem;
        }

        .t1-bento-grid {
            gap: 1.5rem;
        }

        /* Stats Cards - Compact (2 per row) */
        .t1-bento-stat {
            grid-column: span 6;
            padding: 1rem;
            min-height: 110px;
            gap: 0.5rem;
        }

        .t1-stat-icon {
            width: 36px;
            height: 36px;
            font-size: 1rem;
        }

        .t1-stat-value {
            font-size: 1.5rem;
        }

        .t1-stat-label {
            font-size: 0.75rem;
        }

        .t1-bento-item {
            padding: 1.5rem;
        }

        .t1-skills-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .t1-skill-card {
            padding: 1rem;
            min-height: 100px;
        }

        .t1-cta-section {
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .t1-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }

        .t1-profile-image-wrapper {
            min-height: 300px;
        }
    }

    @media (max-width: 480px) {
        .t1-skills-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section id="about" class="t1-about-section">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-about-container">
        <!-- Hero Title Section -->
        <div class="t1-about-hero">
            <h2 class="t1-section-title">About Me</h2>
            <br>
            <div class="t1-greeting">
                {{ $aboutContent['about_greeting'] ?? "Hi, I'm Niranjan!" }}
            </div>
        </div>

        <!-- Bento Grid Layout -->
        <div class="t1-bento-grid">
            <!-- Profile Image Card -->
            <div class="t1-bento-item t1-bento-profile">
                <div class="t1-profile-image-wrapper">
                    <img src="{{ $aboutContent['user']->profile_image ?? '/images/profile.png' }}"
                        alt="{{ $aboutContent['profile_name'] ?? 'Profile' }}" class="t1-profile-image" />

                    <!-- Degree Badge with Cap -->
                    <div class="t1-float-badge t1-badge-degree">
                        <img src="https://cdn-icons-png.flaticon.com/512/4729/4729356.png" class="t1-cap-icon"
                            alt="Graduation Cap">
                        <span>{{ $aboutContent['profile_degree_badge'] ?? 'BSc(Hons)SE' }}</span>
                    </div>
                </div>
            </div>

            <!-- Description Card (Large) -->
            <div class="t1-bento-item t1-bento-description">
                <div class="t1-description-text">
                    {!! $aboutContent['about_description'] ?? 'Driven and innovative undergraduate specializing in Software Engineering.' !!}
                </div>

                <!-- CTA Buttons Inside Description -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="#contact" class="t1-btn t1-btn-primary">
                        <span>{{ $aboutContent['cta_button_text'] ?? "Let's Work Together" }}</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>

                    @if($aboutContent['user']->hasCv())
                        <a href="{{ route('cv.public.download', $aboutContent['user']->id) }}" class="t1-btn t1-btn-outline"
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
                    ['count' => $aboutContent['stat_projects_count'], 'label' => $aboutContent['stat_projects_label'], 'icon' => '🚀'],
                    ['count' => $aboutContent['stat_technologies_count'], 'label' => $aboutContent['stat_technologies_label'], 'icon' => '⚡'],
                    ['count' => $aboutContent['stat_team_count'], 'label' => $aboutContent['stat_team_label'], 'icon' => '👥'],
                    ['count' => $aboutContent['stat_problem_count'], 'label' => $aboutContent['stat_problem_label'], 'icon' => '💡'],
                ];
            @endphp

            @foreach($stats as $stat)
                @if($stat['count'])
                    <div class="t1-bento-item t1-bento-stat">
                        <div class="t1-stat-icon">{{ $stat['icon'] }}</div>
                        <div class="t1-stat-value">{{ $stat['count'] }}</div>
                        <div class="t1-stat-label">{{ $stat['label'] }}</div>
                    </div>
                @endif
            @endforeach

            <!-- Soft Skills Card (Full Width) -->
            @if (!empty($aboutContent['soft_skills']))
                <div class="t1-bento-item t1-bento-skills">
                    <h3 class="t1-skills-header">Core Competencies</h3>
                    <div class="t1-skills-grid">
                        @foreach ($aboutContent['soft_skills'] as $skill => $iconUrl)
                            <div class="t1-skill-card">
                                @if($iconUrl)
                                    <div class="t1-skill-icon-wrapper">
                                        <img src="{{ $iconUrl }}" alt="{{ $skill }}" class="t1-skill-icon">
                                    </div>
                                @endif
                                <div class="t1-skill-name">{{ $skill }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>