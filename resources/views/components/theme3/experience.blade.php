@props(['experiences'])

<style>
    /* ============================================
       THEME 3 EXPERIENCE - HORIZONTAL TIMELINE
       Modern Scrollable Design
       ============================================ */
    
    :root {
        --t3-exp-bg: #f8fafc;
        --t3-exp-surface: #ffffff;
        --t3-exp-text: #1a202c;
        --t3-exp-text-muted: #4a5568;
        --t3-exp-accent: #00cc7a;
        --t3-exp-accent-2: #0099cc;
        --t3-exp-border: rgba(0, 204, 122, 0.15);
        --t3-exp-shadow: 0 15px 50px rgba(0, 204, 122, 0.12);
        --t3-exp-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
    }

    [data-theme="dark"] {
        --t3-exp-bg: #0a0a12;
        --t3-exp-surface: #151522;
        --t3-exp-text: #ffffff;
        --t3-exp-text-muted: #b4c6e0;
        --t3-exp-accent: #00ff9d;
        --t3-exp-accent-2: #00d4ff;
        --t3-exp-border: rgba(0, 255, 157, 0.15);
        --t3-exp-shadow: 0 15px 50px rgba(0, 255, 157, 0.25);
        --t3-exp-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
    }

    /* Section */
    .t3-exp-section {
        background: var(--t3-exp-bg);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    /* Background Orbs */
    .t3-exp-orb {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-exp-gradient);
        filter: blur(100px);
        opacity: 0.06;
        pointer-events: none;
    }

    .t3-exp-orb-1 {
        width: 450px;
        height: 450px;
        top: -15%;
        left: -10%;
    }

    .t3-exp-orb-2 {
        width: 400px;
        height: 400px;
        bottom: -15%;
        right: -10%;
    }

    /* Container */
    .t3-exp-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Header */
    .t3-exp-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t3-exp-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 1.25rem;
        color: var(--t3-exp-text);
        letter-spacing: -0.03em;
    }

    .t3-exp-title-accent {
        background: var(--t3-exp-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-exp-subtitle {
        font-size: 1.125rem;
        color: var(--t3-exp-text-muted);
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Timeline Wrapper */
    .t3-timeline-wrapper {
        position: relative;
        padding: 3rem 0;
    }

    /* Horizontal Scroll Container */
    .t3-timeline-scroll {
        overflow-x: auto;
        overflow-y: hidden;
        padding: 2rem 0 3rem;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        scrollbar-color: var(--t3-exp-accent) transparent;
    }

    .t3-timeline-scroll::-webkit-scrollbar {
        height: 8px;
    }

    .t3-timeline-scroll::-webkit-scrollbar-track {
        background: rgba(0, 204, 122, 0.05);
        border-radius: 10px;
    }

    .t3-timeline-scroll::-webkit-scrollbar-thumb {
        background: var(--t3-exp-gradient);
        border-radius: 10px;
    }

    [data-theme="dark"] .t3-timeline-scroll::-webkit-scrollbar-track {
        background: rgba(0, 255, 157, 0.05);
    }

    /* Timeline Track */
    .t3-timeline-track {
        display: flex;
        gap: 2rem;
        position: relative;
        padding: 0 1rem;
        min-width: min-content;
    }

    /* Timeline Line */
    .t3-timeline-line {
        position: absolute;
        top: 60px;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--t3-exp-gradient);
        border-radius: 2px;
    }

    /* Experience Card */
    .t3-exp-card {
        position: relative;
        background: var(--t3-exp-surface);
        border: 1px solid var(--t3-exp-border);
        border-radius: 20px;
        padding: 2rem;
        width: 380px;
        flex-shrink: 0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .t3-exp-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--t3-exp-gradient);
        border-radius: 20px 20px 0 0;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .t3-exp-card:hover {
        transform: translateY(-10px);
        border-color: var(--t3-exp-accent);
        box-shadow: var(--t3-exp-shadow);
    }

    .t3-exp-card:hover::before {
        opacity: 1;
    }

    /* Timeline Node */
    .t3-exp-node {
        position: absolute;
        top: -2rem;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 50px;
        background: var(--t3-exp-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        box-shadow: 0 8px 25px rgba(0, 204, 122, 0.3);
        z-index: 10;
    }

    [data-theme="dark"] .t3-exp-node {
        box-shadow: 0 8px 25px rgba(0, 255, 157, 0.3);
    }

    /* Duration Badge */
    .t3-exp-duration {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(0, 204, 122, 0.08);
        border: 1px solid var(--t3-exp-border);
        border-radius: 100px;
        color: var(--t3-exp-accent);
        font-size: 0.875rem;
        font-weight: 600;
        width: fit-content;
    }

    [data-theme="dark"] .t3-exp-duration {
        background: rgba(0, 255, 157, 0.08);
    }

    .t3-exp-duration i {
        font-size: 0.75rem;
    }

    /* Role & Company */
    .t3-exp-role {
        font-size: 1.375rem;
        font-weight: 700;
        color: var(--t3-exp-text);
        line-height: 1.3;
        margin-bottom: 0.5rem;
    }

    .t3-exp-company {
        font-size: 1.0625rem;
        font-weight: 600;
        background: var(--t3-exp-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.4;
    }

    /* Details */
    .t3-exp-details {
        font-size: 0.9375rem;
        line-height: 1.7;
        color: var(--t3-exp-text-muted);
    }

    /* Current Badge */
    .t3-exp-current {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.375rem 0.875rem;
        background: linear-gradient(135deg, #ff6b6b, #ffa726);
        border-radius: 100px;
        color: white;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        animation: t3CurrentPulse 2s ease-in-out infinite;
    }

    @keyframes t3CurrentPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .t3-exp-current i {
        font-size: 0.625rem;
    }

    /* Empty State */
    .t3-empty-state {
        text-align: center;
        padding: 6rem 2rem;
    }

    .t3-empty-icon {
        width: 100px;
        height: 100px;
        background: var(--t3-exp-gradient);
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
        color: var(--t3-exp-text);
        margin-bottom: 1rem;
    }

    .t3-empty-text {
        font-size: 1.0625rem;
        color: var(--t3-exp-text-muted);
        max-width: 500px;
        margin: 0 auto;
    }

    /* Scroll Hint */
    .t3-scroll-hint {
        text-align: center;
        margin-top: 2rem;
        color: var(--t3-exp-text-muted);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        animation: t3ScrollHint 2s ease-in-out infinite;
    }

    @keyframes t3ScrollHint {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(10px); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .t3-exp-section {
            padding: 4rem 0;
        }

        .t3-exp-header {
            margin-bottom: 3rem;
        }

        .t3-exp-card {
            width: 320px;
            padding: 1.5rem;
        }

        .t3-exp-node {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        .t3-timeline-line {
            top: 50px;
        }
    }

    @media (max-width: 480px) {
        .t3-exp-card {
            width: 280px;
            padding: 1.25rem;
        }

        .t3-exp-role {
            font-size: 1.125rem;
        }

        .t3-exp-company {
            font-size: 0.9375rem;
        }
    }
</style>

<section id="experience" class="t3-exp-section">
    <!-- Background Orbs -->
    <div class="t3-exp-orb t3-exp-orb-1"></div>
    <div class="t3-exp-orb t3-exp-orb-2"></div>

    <div class="t3-exp-container">
        <!-- Header -->
        <div class="t3-exp-header">
            <h2 class="t3-exp-title">
                Career <span class="t3-exp-title-accent">Journey</span>
            </h2>
            <p class="t3-exp-subtitle">
                My professional growth and career milestones
            </p>
        </div>

        @if($experiences->isEmpty())
            <!-- Empty State -->
            <div class="t3-empty-state">
                <div class="t3-empty-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <h3 class="t3-empty-title">No Experience Added</h3>
                <p class="t3-empty-text">
                    Professional experience will be displayed here once added to the portfolio.
                </p>
            </div>
        @else
            <!-- Timeline -->
            <div class="t3-timeline-wrapper">
                <div class="t3-timeline-scroll">
                    <div class="t3-timeline-track">
                        <!-- Timeline Line -->
                        <div class="t3-timeline-line"></div>

                        @foreach($experiences as $index => $experience)
                            <div class="t3-exp-card">
                                <!-- Timeline Node -->
                                <div class="t3-exp-node">
                                    @if($index === 0)
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                                    @elseif($index === $experiences->count() - 1)
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
                                    @else
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                    @endif
                                </div>

                                <!-- Current Badge -->
                                @if($index === 0)
                                    <div class="t3-exp-current">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                        Current
                                    </div>
                                @endif

                                <!-- Duration -->
                                @if($experience->duration)
                                    <div class="t3-exp-duration">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        {{ $experience->duration }}
                                    </div>
                                @endif

                                <!-- Role & Company -->
                                <div>
                                    <h3 class="t3-exp-role">{{ $experience->role }}</h3>
                                    <p class="t3-exp-company">{{ $experience->company }}</p>
                                </div>

                                <!-- Details -->
                                @if($experience->details)
                                    <p class="t3-exp-details">{{ $experience->details }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Scroll Hint -->
                <div class="t3-scroll-hint">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    <span>Scroll to explore timeline</span>
                </div>
            </div>
        @endif
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollContainer = document.querySelector('.t3-timeline-scroll');
        const scrollHint = document.querySelector('.t3-scroll-hint');
        
        if (scrollContainer && scrollHint) {
            // Hide scroll hint when user scrolls
            scrollContainer.addEventListener('scroll', function() {
                if (scrollContainer.scrollLeft > 50) {
                    scrollHint.style.opacity = '0';
                    scrollHint.style.pointerEvents = 'none';
                } else {
                    scrollHint.style.opacity = '1';
                    scrollHint.style.pointerEvents = 'auto';
                }
            });
        }

        // Smooth scroll animation for cards
        const cards = document.querySelectorAll('.t3-exp-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, { threshold: 0.1, root: document.querySelector('.t3-timeline-scroll') });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    });
</script>