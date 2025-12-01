@props(['educations'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Education Component
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
    .t1-education-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-secondary);
        font-family: 'Inter', sans-serif;
    }

    .t1-education-container {
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

    /* Education Grid */
    .t1-edu-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .t1-edu-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t1-edu-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Education Card */
    .t1-edu-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: var(--t1-card-shadow);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .t1-edu-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--t1-gradient-primary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .t1-edu-card:hover::before {
        opacity: 1;
    }

    .t1-edu-card:hover {
        transform: translateY(-8px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 30px var(--t1-glow-color);
    }

    /* Year Badge */
    .t1-edu-year {
        position: absolute;
        top: 0;
        right: 0;
        background: var(--t1-accent-primary);
        color: white;
        padding: 0.5rem 1.5rem;
        border-bottom-left-radius: 1rem;
        font-weight: 700;
        font-size: 0.875rem;
        box-shadow: 0 4px 12px var(--t1-btn-glow);
    }

    /* Icon Container */
    .t1-edu-icon {
        width: 70px;
        height: 70px;
        border-radius: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-edu-icon {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-edu-card:hover .t1-edu-icon {
        transform: scale(1.1);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 0 20px var(--t1-icon-glow);
    }

    .t1-edu-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .t1-edu-icon svg {
        width: 32px;
        height: 32px;
        color: var(--t1-accent-primary);
    }

    /* Degree */
    .t1-edu-degree {
        font-size: 1.25rem;
        font-weight: 700;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
        line-height: 1.3;
    }

    /* Institution */
    .t1-edu-institution {
        font-size: 1rem;
        color: var(--t1-text-secondary);
        font-weight: 600;
    }

    /* Details */
    .t1-edu-details {
        color: var(--t1-text-secondary);
        font-size: 0.95rem;
        line-height: 1.6;
        border-top: 1px solid var(--t1-border-color);
        padding-top: 1rem;
        margin-top: auto;
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

    .t1-empty-icon svg {
        width: 3rem;
        height: 3rem;
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

<section id="education" class="t1-education-section">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-education-container">
        <!-- Title -->
        <div class="t1-title-wrapper">
            <h2 class="t1-section-title">Education Journey</h2>
            <p class="t1-section-subtitle">Academic excellence and continuous learning</p>
            <div class="t1-title-underline"></div>
        </div>

        @if($educations->isEmpty())
            <!-- Empty State -->
            <div class="t1-empty-state">
                <div class="t1-empty-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--t1-text-primary); margin-bottom: 0.5rem;">No Education Added Yet</h3>
                <p class="t1-empty-text">Educational background will appear here once added through the admin panel.</p>
            </div>
        @else
            <!-- Education Grid -->
            <div class="t1-edu-grid">
                @foreach($educations->sortByDesc('year') as $education)
                    <div class="t1-edu-card">
                        <div class="t1-edu-year">{{ $education->year ?: 'Present' }}</div>
                        
                        @if($education->icon_url)
                            <div class="t1-edu-icon">
                                <img src="{{ $education->icon_url }}" alt="Institution Logo">
                            </div>
                        @else
                            <div class="t1-edu-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                                </svg>
                            </div>
                        @endif

                        <div>
                            <h3 class="t1-edu-degree">{{ $education->degree }}</h3>
                            <div class="t1-edu-institution">{{ $education->institution }}</div>
                        </div>

                        @if($education->details)
                            <div class="t1-edu-details">
                                {{ $education->details }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>