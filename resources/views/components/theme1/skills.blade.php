@props(['skills'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON - SKILLS
       Refined & Compact Professional Design
       ========================================== */

    :root {
        /* Reuse Theme 1 Variables */
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
    .t1-skills-section {
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-secondary);
        font-family: 'Inter', sans-serif;
    }

    .t1-skills-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Title */
    .t1-title-wrapper {
        text-align: center;
        margin-bottom: 3rem;
    }

    .t1-section-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 0.5rem;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t1-section-subtitle {
        font-size: 1.1rem;
        color: var(--t1-text-secondary);
        margin-bottom: 1rem;
    }

    .t1-title-underline {
        width: 60px;
        height: 4px;
        background: var(--t1-gradient-primary);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Categories Container */
    .t1-categories-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3rem;
    }

    /* Category Section */
    .t1-category-section {
        position: relative;
    }

    .t1-category-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .t1-category-icon {
        width: 80px;
        height: 80px;
        /* Removed background and border for minimal look */
        background: transparent;
        border: none;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .t1-category-icon img {
        width: 64px;
        height: 64px;
        object-fit: contain;
    }

    .t1-category-section:hover .t1-category-icon {
        transform: scale(1.1);
        /* Removed hover glow/border for minimal look */
    }

    .t1-category-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
    }

    .t1-category-count {
        font-size: 0.875rem;
        color: var(--t1-text-muted);
        font-weight: 500;
    }

    /* Skills Grid */
    .t1-skills-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    @media (min-width: 640px) {
        .t1-skills-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 768px) {
        .t1-skills-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t1-skills-grid {
            grid-template-columns: repeat(5, 1fr);
        }
    }

    /* Skill Card */
    .t1-skill-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 16px;
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: var(--t1-card-shadow);
        min-height: 120px;
    }

    .t1-skill-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--t1-gradient-primary);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 0;
    }

    .t1-skill-card:hover::before {
        opacity: 0.05;
    }

    .t1-skill-card:hover {
        transform: translateY(-5px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), 0 0 20px var(--t1-glow-color);
    }

    .t1-skill-icon-wrapper {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
        transition: transform 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 8px;
        padding: 6px;
    }

    [data-theme="light"] .t1-skill-icon-wrapper {
        background: transparent;
        padding: 0;
    }

    .t1-skill-card:hover .t1-skill-icon-wrapper {
        transform: scale(1.1);
    }

    .t1-skill-icon {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .t1-skill-fallback {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--t1-gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .t1-skill-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--t1-text-primary);
        position: relative;
        z-index: 1;
    }

    .t1-skill-level {
        font-size: 0.75rem;
        color: var(--t1-text-muted);
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.05);
        padding: 0.2rem 0.6rem;
        border-radius: 99px;
        border: 1px solid var(--t1-border-color);
    }

    /* Empty State */
    .t1-empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .t1-empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: var(--t1-text-muted);
    }

    .t1-empty-text {
        font-size: 1.125rem;
        color: var(--t1-text-muted);
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.3;
        z-index: 0;
        animation: t1-blob-float 15s infinite alternate;
    }

    .t1-blob-1 { top: 10%; right: 10%; width: 500px; height: 500px; background: var(--t1-accent-glow); }
    .t1-blob-2 { bottom: 10%; left: 10%; width: 400px; height: 400px; background: var(--t1-accent-secondary); animation-delay: -7s; }

    @keyframes t1-blob-float {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(40px, -40px) scale(1.1); }
    }
</style>

<section id="skills" class="t1-skills-section">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-skills-container">
        <!-- Title -->
        <div class="t1-title-wrapper">
            <h2 class="t1-section-title">Technical Arsenal</h2>
            <p class="t1-section-subtitle">Technologies I work with to bring ideas to life</p>
            <div class="t1-title-underline"></div>
        </div>

        @if($skills->isEmpty())
            <!-- Empty State -->
            <div class="t1-empty-state">
                <div class="t1-empty-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--t1-text-primary); margin-bottom: 0.5rem;">No Skills Added Yet</h3>
                <p class="t1-empty-text">Skills will appear here once added through the admin panel.</p>
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
                        'icon' => 'https://img.icons8.com/?size=100&id=38561&format=png&color=000000',
                    ],
                    'tools' => [
                        'title' => 'Tools & Technologies',
                        'icon' => 'https://img.icons8.com/?size=100&id=46959&format=png&color=000000',
                    ],
                ];
                
                $groupedSkills = $skills->groupBy('category');
            @endphp

            <!-- Categories -->
            <div class="t1-categories-wrapper">
                @foreach($categories as $categoryKey => $categoryData)
                    @if($groupedSkills->has($categoryKey) && $groupedSkills[$categoryKey]->isNotEmpty())
                        <div class="t1-category-section">
                            <!-- Category Header -->
                            <div class="t1-category-header">
                                <div class="t1-category-icon">
                                    <img src="{{ $categoryData['icon'] }}" alt="{{ $categoryData['title'] }}">
                                </div>
                                <div class="t1-category-info">
                                    <h3>{{ $categoryData['title'] }}</h3>
                                    <p class="t1-category-count">
                                        {{ $groupedSkills[$categoryKey]->count() }} 
                                        {{ Str::plural('skill', $groupedSkills[$categoryKey]->count()) }}
                                    </p>
                                </div>
                            </div>

                            <!-- Skills Grid -->
                            <div class="t1-skills-grid">
                                @foreach($groupedSkills[$categoryKey] as $skill)
                                    <div class="t1-skill-card">
                                        <div class="t1-skill-icon-wrapper">
                                            @if($skill->url && filter_var($skill->url, FILTER_VALIDATE_URL))
                                                <img src="{{ $skill->url }}" 
                                                     alt="{{ $skill->name }}" 
                                                     class="t1-skill-icon"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="t1-skill-fallback" style="display: none;">
                                                    <i class="fas fa-code"></i>
                                                </div>
                                            @else
                                                <div class="t1-skill-fallback">
                                                    <i class="fas fa-code"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="t1-skill-name">{{ $skill->name }}</span>
                                        @if($skill->level)
                                            <span class="t1-skill-level">{{ $skill->level }}</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>