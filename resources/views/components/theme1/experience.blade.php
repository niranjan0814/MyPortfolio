@props(['experiences'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Experience Component
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
    .t1-experience-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-primary);
        font-family: 'Inter', sans-serif;
    }

    .t1-experience-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Title */
    .t1-title-wrapper {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t1-section-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 0.5rem;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }

    .t1-section-subtitle {
        font-size: 1.125rem;
        color: var(--t1-text-secondary);
        margin-bottom: 1rem;
    }

    .t1-title-underline {
        width: 80px;
        height: 4px;
        background: var(--t1-gradient-primary);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Timeline */
    .t1-timeline {
        position: relative;
        max-width: 900px;
        margin: 0 auto;
    }

    .t1-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 30px;
        width: 2px;
        background: var(--t1-gradient-primary);
        opacity: 0.3;
    }

    @media (min-width: 768px) {
        .t1-timeline::before {
            left: 50%;
            transform: translateX(-50%);
        }
    }

    /* Timeline Item */
    .t1-timeline-item {
        position: relative;
        margin-bottom: 3rem;
    }

    /* Timeline Dot */
    .t1-timeline-dot {
        position: absolute;
        left: 21px;
        top: 0;
        width: 20px;
        height: 20px;
        background: var(--t1-accent-primary);
        border: 4px solid var(--t1-bg-primary);
        border-radius: 50%;
        z-index: 2;
        box-shadow: 0 0 20px var(--t1-icon-glow);
        transition: all 0.3s ease;
    }

    .t1-timeline-item:hover .t1-timeline-dot {
        transform: scale(1.3);
        box-shadow: 0 0 30px var(--t1-icon-glow);
    }

    @media (min-width: 768px) {
        .t1-timeline-dot {
            left: 50%;
            transform: translateX(-50%);
        }

        .t1-timeline-item:hover .t1-timeline-dot {
            transform: translateX(-50%) scale(1.3);
        }
    }

    /* Timeline Content */
    .t1-timeline-content {
        position: relative;
        margin-left: 60px;
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: var(--t1-card-shadow);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .t1-timeline-content:hover {
        transform: translateY(-8px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 30px var(--t1-glow-color);
    }

    @media (min-width: 768px) {
        .t1-timeline-content {
            width: 45%;
            margin-left: 0;
        }

        .t1-timeline-item:nth-child(odd) .t1-timeline-content {
            margin-left: auto;
        }

        .t1-timeline-item:nth-child(even) .t1-timeline-content {
            margin-right: auto;
        }
    }

    /* Current Badge */
    .t1-current-badge {
        display: inline-block;
        padding: 0.375rem 1rem;
        background: rgba(16, 185, 129, 0.2);
        border: 1px solid rgba(16, 185, 129, 0.4);
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 700;
        color: #10b981;
        margin-bottom: 1rem;
        animation: t1-pulse 2s infinite;
    }

    @keyframes t1-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* Duration Badge */
    .t1-duration {
        display: inline-block;
        padding: 0.375rem 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t1-accent-primary);
        margin-bottom: 1rem;
    }

    [data-theme="light"] .t1-duration {
        background: rgba(255, 255, 255, 0.6);
    }

    /* Role */
    .t1-exp-role {
        font-size: 1.5rem;
        font-weight: 700;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 0.5rem;
    }

    /* Company */
    .t1-exp-company {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--t1-text-secondary);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .t1-exp-company svg {
        width: 16px;
        height: 16px;
        color: var(--t1-accent-primary);
    }

    /* Details */
    .t1-exp-details {
        font-size: 1rem;
        line-height: 1.7;
        color: var(--t1-text-secondary);
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

<section id="experience" class="t1-experience-section">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-experience-container">
        <!-- Title -->
        <div class="t1-title-wrapper">
            <h2 class="t1-section-title">My Journey</h2>
            <p class="t1-section-subtitle">Professional experience & career milestones</p>
            <div class="t1-title-underline"></div>
        </div>

        @if($experiences->isEmpty())
            <!-- Empty State -->
            <div class="t1-empty-state">
                <div class="t1-empty-icon">
                    <svg fill="currentColor" viewBox="0 0 24 24" style="width: 2.5rem; height: 2.5rem;">
                        <path d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 15H4V8h16v11z" />
                    </svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--t1-text-primary); margin-bottom: 0.5rem;">No Experience Added Yet</h3>
                <p class="t1-empty-text">Work experience will appear here once added through the admin panel.</p>
            </div>
        @else
            <!-- Timeline -->
            <div class="t1-timeline">
                @foreach($experiences as $index => $experience)
                    <div class="t1-timeline-item">
                        <div class="t1-timeline-dot"></div>
                        <div class="t1-timeline-content">
                            @if($index === 0)
                                <div class="t1-current-badge">CURRENT</div>
                            @endif

                            @if($experience->duration)
                                <div class="t1-duration">{{ $experience->duration }}</div>
                            @endif

                            <h3 class="t1-exp-role">{{ $experience->role }}</h3>
                            
                            <div class="t1-exp-company">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                {{ $experience->company }}
                                @if($experience->location)
                                    <span style="opacity: 0.7;">• {{ $experience->location }}</span>
                                @endif
                            </div>

                            @if($experience->details)
                                <div class="t1-exp-details">{{ $experience->details }}</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>