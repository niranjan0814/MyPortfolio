@props(['skills'])

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

    .t2-skills-section {
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
    .t2-title-wrapper {
        margin-bottom: 5rem;
        text-align: center;
    }

    .t2-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        background: var(--t2-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t2-subtitle {
        color: var(--t2-text-sub);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Decorative Elements */
    .t2-decoration-circle {
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: var(--t2-gradient);
        opacity: 0.05;
        filter: blur(80px);
        pointer-events: none;
    }

    .t2-decoration-1 { top: 0; right: -150px; }
    .t2-decoration-2 { bottom: 0; left: -150px; }

    /* BENTO GRID LAYOUT */
    .t2-bento-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        .t2-bento-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t2-bento-grid {
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, auto);
        }
        
        /* Specific Card Placements for Desktop */
        .t2-card-frontend { grid-column: span 2; grid-row: span 1; }
        .t2-card-backend { grid-column: span 1; grid-row: span 2; }
        .t2-card-database { grid-column: span 1; grid-row: span 1; }
        .t2-card-tools { grid-column: span 1; grid-row: span 1; }
        .t2-card-other { grid-column: span 3; grid-row: span 1; }
    }

    .t2-category-card {
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 24px;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: var(--t2-shadow);
    }

    .t2-category-card:hover {
        transform: translateY(-5px);
        border-color: var(--t2-accent);
    }

    /* Category Headers */
    .t2-cat-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--t2-glass-border);
    }

    .t2-cat-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--t2-surface);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t2-accent);
        border: 1px solid var(--t2-glass-border);
    }

    .t2-cat-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--t2-text-main);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Skill Pills Cloud */
    .t2-skill-cloud {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-content: flex-start;
        justify-content: center; /* Center the grid of skills */
    }

    .t2-skill-pill {
        display: inline-flex;
        flex-direction: column; /* Stack icon and text */
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1.5rem 1rem;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        border-radius: 16px;
        color: var(--t2-text-main);
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
        width: 110px; /* Fixed width */
        height: 110px; /* Fixed height */
        text-align: center;
    }

    .t2-skill-pill:hover {
        background: var(--t2-accent);
        color: white;
        border-color: var(--t2-accent);
        transform: scale(1.05);
    }

    .t2-pill-icon {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .t2-pill-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Empty State */
    .t2-empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 4rem;
        color: var(--t2-text-sub);
    }
</style>

<section id="skills" class="t2-skills-section">
    <!-- Decorative Elements -->
    <div class="t2-decoration-circle t2-decoration-1"></div>
    <div class="t2-decoration-circle t2-decoration-2"></div>

    <div class="t2-container">
        <div class="t2-title-wrapper">
            <h2 class="t2-title">Technical Skills</h2>
            <div class="t2-subtitle">A comprehensive ecosystem of my technical expertise.</div>
        </div>

        @if($skills->isEmpty())
            <div class="t2-empty-state">
                <p class="text-xl">No skills added yet.</p>
            </div>
        @else
            @php
                $groupedSkills = $skills->groupBy('category');
            @endphp

            <div class="t2-bento-grid">
                <!-- Frontend (Featured - Wide) -->
                @if(isset($groupedSkills['frontend']))
                <div class="t2-category-card t2-card-frontend">
                    <div class="t2-cat-header">
                        <div class="t2-cat-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="t2-cat-title">Frontend Development</h3>
                    </div>
                    <div class="t2-skill-cloud">
                        @foreach($groupedSkills['frontend'] as $skill)
                            <div class="t2-skill-pill">
                                @if($skill->url)
                                    <div class="t2-pill-icon">
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    </div>
                                @endif
                                {{ $skill->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Backend (Tall) -->
                @if(isset($groupedSkills['backend']))
                <div class="t2-category-card t2-card-backend">
                    <div class="t2-cat-header">
                        <div class="t2-cat-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                        <h3 class="t2-cat-title">Backend</h3>
                    </div>
                    <div class="t2-skill-cloud">
                        @foreach($groupedSkills['backend'] as $skill)
                            <div class="t2-skill-pill">
                                @if($skill->url)
                                    <div class="t2-pill-icon">
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    </div>
                                @endif
                                {{ $skill->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Database -->
                @if(isset($groupedSkills['database']))
                <div class="t2-category-card t2-card-database">
                    <div class="t2-cat-header">
                        <div class="t2-cat-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                        </div>
                        <h3 class="t2-cat-title">Database</h3>
                    </div>
                    <div class="t2-skill-cloud">
                        @foreach($groupedSkills['database'] as $skill)
                            <div class="t2-skill-pill">
                                @if($skill->url)
                                    <div class="t2-pill-icon">
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    </div>
                                @endif
                                {{ $skill->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Tools -->
                @if(isset($groupedSkills['tools']))
                <div class="t2-category-card t2-card-tools">
                    <div class="t2-cat-header">
                        <div class="t2-cat-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                        </div>
                        <h3 class="t2-cat-title">Tools</h3>
                    </div>
                    <div class="t2-skill-cloud">
                        @foreach($groupedSkills['tools'] as $skill)
                            <div class="t2-skill-pill">
                                @if($skill->url)
                                    <div class="t2-pill-icon">
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    </div>
                                @endif
                                {{ $skill->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Other (Full Width if needed) -->
                @if(isset($groupedSkills['other']))
                <div class="t2-category-card t2-card-other">
                    <div class="t2-cat-header">
                        <div class="t2-cat-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                        </div>
                        <h3 class="t2-cat-title">Other Skills</h3>
                    </div>
                    <div class="t2-skill-cloud">
                        @foreach($groupedSkills['other'] as $skill)
                            <div class="t2-skill-pill">
                                @if($skill->url)
                                    <div class="t2-pill-icon">
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    </div>
                                @endif
                                {{ $skill->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        @endif
    </div>
</section>
