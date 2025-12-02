@props(['skills'])

<style>
    /* ============================================
       THEME 3 SKILLS - ENHANCED MODERN DESIGN
       Matching Hero & About Aesthetic
       ============================================ */
    
    :root {
        --t3-skills-bg: #f8fafc;
        --t3-skills-surface: #ffffff;
        --t3-skills-text: #1a202c;
        --t3-skills-text-muted: #4a5568;
        --t3-skills-accent: #00cc7a;
        --t3-skills-accent-2: #0099cc;
        --t3-skills-border: rgba(0, 204, 122, 0.15);
        --t3-skills-shadow: 0 15px 50px rgba(0, 204, 122, 0.12);
        --t3-skills-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
        --t3-skills-glow: rgba(0, 204, 122, 0.2);
    }

    [data-theme="dark"] {
        --t3-skills-bg: #0a0a12;
        --t3-skills-surface: #151522;
        --t3-skills-text: #ffffff;
        --t3-skills-text-muted: #b4c6e0;
        --t3-skills-accent: #00ff9d;
        --t3-skills-accent-2: #00d4ff;
        --t3-skills-border: rgba(0, 255, 157, 0.15);
        --t3-skills-shadow: 0 15px 50px rgba(0, 255, 157, 0.25);
        --t3-skills-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
        --t3-skills-glow: rgba(0, 255, 157, 0.25);
    }

    
    /* Section */
    .t3-skills-section {
        background: var(--t3-skills-bg);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }
    .t3-skills-section {
    border-radius: 0 !important;
}


    /* Background Orbs */
    .t3-skills-orbs {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .t3-skills-orb {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-skills-gradient);
        filter: blur(100px);
        opacity: 0.06;
        animation: t3SkillsFloat 25s ease-in-out infinite;
    }

    .t3-skills-orb-1 {
        width: 450px;
        height: 450px;
        top: -15%;
        left: -10%;
        animation-delay: 0s;
    }

    .t3-skills-orb-2 {
        width: 400px;
        height: 400px;
        bottom: -15%;
        right: -10%;
        animation-delay: 8s;
    }

    @keyframes t3SkillsFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(60px, -60px) scale(1.15); }
        66% { transform: translate(-60px, 60px) scale(0.85); }
    }

    /* Container */
    .t3-skills-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Header */
    .t3-skills-header {
        text-align: center;
        margin-bottom: 5rem;
        position: relative;
    }

    .t3-skills-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 1.25rem;
        color: var(--t3-skills-text);
        letter-spacing: -0.03em;
    }

    .t3-skills-title-accent {
        background: var(--t3-skills-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-skills-subtitle {
        font-size: 1.125rem;
        color: var(--t3-skills-text-muted);
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Categories */
    .t3-category-section {
        margin-bottom: 4rem;
    }

    .t3-category-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .t3-category-icon-wrapper {
        width: 70px;
        height: 70px;
        background: var(--t3-skills-gradient);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 25px var(--t3-skills-glow);
        flex-shrink: 0;
    }

    .t3-category-icon {
        width: 40px;
        height: 40px;
        object-fit: contain;
        filter: brightness(0) invert(1);
    }

    .t3-category-info h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--t3-skills-text);
        margin-bottom: 0.25rem;
    }

    .t3-category-count {
        font-size: 0.9375rem;
        color: var(--t3-skills-text-muted);
        font-weight: 500;
    }

    /* Skills Grid */
    .t3-skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 1.5rem;
    }

    .t3-skill-card {
        background: var(--t3-skills-surface);
        border: 1px solid var(--t3-skills-border);
        border-radius: 20px;
        padding: 1.75rem 1.25rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .t3-skill-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--t3-skills-gradient);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .t3-skill-card:hover {
        transform: translateY(-10px);
        border-color: var(--t3-skills-accent);
        box-shadow: var(--t3-skills-shadow);
    }

    .t3-skill-card:hover::before {
        opacity: 1;
    }

    .t3-skill-icon {
        width: 56px;
        height: 56px;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    .t3-skill-card:hover .t3-skill-icon {
        transform: scale(1.15) rotate(5deg);
    }

    .t3-skill-fallback {
        width: 56px;
        height: 56px;
        background: var(--t3-skills-gradient);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        transition: transform 0.4s ease;
    }

    .t3-skill-card:hover .t3-skill-fallback {
        transform: scale(1.15) rotate(5deg);
    }

    .t3-skill-name {
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--t3-skills-text);
        text-align: center;
        line-height: 1.3;
    }

    /* Stats Section */
    .t3-skills-stats {
        margin-top: 5rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .t3-stat-card {
        background: var(--t3-skills-surface);
        border: 1px solid var(--t3-skills-border);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: all 0.3s ease;
    }

    .t3-stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--t3-skills-accent);
        box-shadow: var(--t3-skills-shadow);
    }

    .t3-stat-icon {
        width: 70px;
        height: 70px;
        background: var(--t3-skills-gradient);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.75rem;
        flex-shrink: 0;
    }

    .t3-stat-info {
        flex: 1;
    }

    .t3-stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--t3-skills-accent);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .t3-stat-label {
        font-size: 1rem;
        color: var(--t3-skills-text-muted);
        font-weight: 500;
    }

    /* Empty State */
    .t3-empty-state {
        text-align: center;
        padding: 6rem 2rem;
    }

    .t3-empty-icon {
        width: 100px;
        height: 100px;
        background: var(--t3-skills-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        color: white;
        font-size: 2.5rem;
    }

    .t3-empty-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--t3-skills-text);
        margin-bottom: 1rem;
    }

    .t3-empty-text {
        font-size: 1.0625rem;
        color: var(--t3-skills-text-muted);
        max-width: 500px;
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .t3-skills-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .t3-skills-section {
            padding: 4rem 0;
        }

        .t3-skills-header {
            margin-bottom: 3rem;
        }

        .t3-category-section {
            margin-bottom: 3rem;
        }

        .t3-category-header {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .t3-skills-grid {
            grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
            gap: 1rem;
        }

        .t3-skills-stats {
            grid-template-columns: 1fr;
            margin-top: 3rem;
        }
    }

    @media (max-width: 480px) {
        .t3-skills-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .t3-skill-card {
            padding: 1.5rem 1rem;
        }

        .t3-skill-icon,
        .t3-skill-fallback {
            width: 48px;
            height: 48px;
        }
    }
</style>

<section id="skills" class="t3-skills-section">
    <!-- Background Orbs -->
    <div class="t3-skills-orbs">
        <div class="t3-skills-orb t3-skills-orb-1"></div>
        <div class="t3-skills-orb t3-skills-orb-2"></div>
    </div>

    <div class="t3-skills-container">
        <!-- Header -->
        <div class="t3-skills-header">
            <h2 class="t3-skills-title">
                Technical <span class="t3-skills-title-accent">Skills</span>
            </h2>
            
        </div>

        @if($skills->isEmpty())
            <!-- Empty State -->
            <div class="t3-empty-state">
                <div class="t3-empty-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3 class="t3-empty-title">No Skills Added Yet</h3>
                <p class="t3-empty-text">
                    Skills will appear here once added through the admin panel.
                </p>
            </div>
        @else
            @php
                $categories = [
                    'frontend' => [
                        'title' => 'Frontend Development',
                        'icon' => 'https://img.icons8.com/?size=100&id=wRWcFHf3CbWQ&format=png&color=000000',
                    ],
                    'backend' => [
                        'title' => 'Backend Development',
                        'icon' => 'https://img.icons8.com/?size=100&id=eD9kxQH6h53e&format=png&color=000000',
                    ],
                    'database' => [
                        'title' => 'Database & Storage',
                        'icon' => 'https://logo.svgcdn.com/devicon-plain/sqldeveloper-plain.png',
                    ],
                    'tools' => [
                        'title' => 'Tools & Technologies',
                        'icon' => 'https://img.icons8.com/?size=100&id=46959&format=png&color=000000',
                    ],
                ];

                $groupedSkills = $skills->groupBy('category');
            @endphp

            <!-- Categories -->
            @foreach($categories as $categoryKey => $categoryData)
                @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                    <div class="t3-category-section">
                        <!-- Category Header -->
                        <div class="t3-category-header">
                            <div class="t3-category-icon-wrapper">
                                <img src="{{ $categoryData['icon'] }}" alt="{{ $categoryData['title'] }}" class="t3-category-icon">
                            </div>
                            <div class="t3-category-info">
                                <h3>{{ $categoryData['title'] }}</h3>
                                <p class="t3-category-count">
                                    {{ $groupedSkills[$categoryKey]->count() }} {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                </p>
                            </div>
                        </div>

                        <!-- Skills Grid -->
                        <div class="t3-skills-grid">
                            @foreach($groupedSkills[$categoryKey] as $skill)
                                <div class="t3-skill-card">
                                    @php
                                        $iconUrl = $skill->url;
                                        $hasValidUrl = !empty($iconUrl) && filter_var($iconUrl, FILTER_VALIDATE_URL);
                                    @endphp

                                    @if($hasValidUrl)
                                        <img src="{{ $iconUrl }}" alt="{{ $skill->name }}" class="t3-skill-icon"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    @endif

                                    <div class="t3-skill-fallback" style="display: {{ $hasValidUrl ? 'none' : 'flex' }};">
                                        <i class="fas fa-code"></i>
                                    </div>

                                    <span class="t3-skill-name">{{ $skill->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- Stats -->
            <div class="t3-skills-stats">
                <div class="t3-stat-card">
                    <div class="t3-stat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                    <div class="t3-stat-info">
                        <div class="t3-stat-value">{{ $skills->count() }}+</div>
                        <div class="t3-stat-label">Technologies</div>
                    </div>
                </div>

                <div class="t3-stat-card">
                    <div class="t3-stat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M12 15v4"></path><path d="M12 5v4"></path><path d="M5 12h4"></path><path d="M15 12h4"></path></svg>
                    </div>
                    <div class="t3-stat-info">
                        <div class="t3-stat-value">{{ $groupedSkills->count() }}</div>
                        <div class="t3-stat-label">Expertise Areas</div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>