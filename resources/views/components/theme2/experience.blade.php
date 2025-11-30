@props(['experiences'])

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

    .t2-experience-section {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .t2-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 20px;
        width: 2px;
        background: var(--t2-border);
    }

    @media (min-width: 768px) {
        .t2-timeline::before {
            left: 50%;
            transform: translateX(-50%);
        }
    }

    .t2-timeline-item {
        position: relative;
        margin-bottom: 3rem;
    }

    .t2-timeline-dot {
        position: absolute;
        left: 11px;
        top: 0;
        width: 20px;
        height: 20px;
        background: var(--t2-accent);
        border: 4px solid var(--t2-bg);
        border-radius: 50%;
        z-index: 2;
        box-shadow: 0 0 0 2px var(--t2-accent);
    }

    @media (min-width: 768px) {
        .t2-timeline-dot {
            left: 50%;
            transform: translateX(-50%);
        }
    }

    .t2-timeline-content {
        position: relative;
        margin-left: 50px;
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: var(--t2-shadow);
        transition: transform 0.3s ease;
    }

    .t2-timeline-content:hover {
        transform: translateY(-5px);
        border-color: var(--t2-accent);
    }

    @media (min-width: 768px) {
        .t2-timeline-content {
            width: 45%;
            margin-left: 0;
        }

        .t2-timeline-item:nth-child(odd) .t2-timeline-content {
            margin-left: auto;
        }

        .t2-timeline-item:nth-child(even) .t2-timeline-content {
            margin-right: auto;
        }
    }

    .t2-exp-date {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        border-radius: 100px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--t2-accent);
        margin-bottom: 1rem;
    }

    .t2-exp-role {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--t2-text-main);
        margin-bottom: 0.5rem;
    }

    .t2-exp-company {
        font-size: 1rem;
        font-weight: 600;
        color: var(--t2-text-sub);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .t2-exp-desc {
        color: var(--t2-text-sub);
        font-size: 0.95rem;
        line-height: 1.6;
    }
</style>

<section id="experience" class="t2-experience-section">
    <div class="t2-container">
        <div class="t2-title-wrapper">
            <h2 class="t2-title">Experience</h2>
            <div class="t2-subtitle">My professional journey and the companies I've had the privilege to work with.</div>
        </div>

        @if($experiences->isEmpty())
            <div class="text-center py-12">
                <p class="text-xl text-[var(--t2-text-sub)]">No experience added yet.</p>
            </div>
        @else
            <div class="t2-timeline">
                @foreach($experiences as $experience)
                    <div class="t2-timeline-item">
                        <div class="t2-timeline-dot"></div>
                        <div class="t2-timeline-content">
                            <div class="t2-exp-date">{{ $experience->duration ?? 'Ongoing' }}</div>
                            <h3 class="t2-exp-role">{{ $experience->role }}</h3>
                            <div class="t2-exp-company">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14"/><path d="M17 21v-8.5a2.5 2.5 0 0 0-5 0V21"/><path d="M7 10h2"/><path d="M7 14h2"/><path d="M7 18h2"/><path d="M17 10h2"/><path d="M17 14h2"/><path d="M17 18h2"/></svg>
                                {{ $experience->company }}
                                @if($experience->location)
                                    <span style="font-weight: 400; opacity: 0.7;">• {{ $experience->location }}</span>
                                @endif
                            </div>
                            <div class="t2-exp-desc">
                                {{ $experience->details }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
