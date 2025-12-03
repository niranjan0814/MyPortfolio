@props(['educations'])

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

    .t2-education-section {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-edu-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 768px) {
        .t2-edu-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .t2-edu-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .t2-edu-card {
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: var(--t2-shadow);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .t2-edu-card:hover {
        transform: translateY(-5px);
        border-color: var(--t2-accent);
    }

    .t2-edu-year {
        position: absolute;
        top: 0;
        right: 0;
        background: var(--t2-accent);
        color: white;
        padding: 0.5rem 1.5rem;
        border-bottom-left-radius: 16px;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .t2-edu-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    .t2-edu-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .t2-edu-degree {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--t2-text-main);
        margin-bottom: 0.25rem;
    }

    .t2-edu-institution {
        font-size: 1rem;
        color: var(--t2-text-sub);
        font-weight: 500;
    }

    .t2-edu-details {
        color: var(--t2-text-sub);
        font-size: 0.95rem;
        line-height: 1.6;
        border-top: 1px solid var(--t2-glass-border);
        padding-top: 1rem;
    }
</style>

<section id="education" class="t2-education-section">
    <div class="t2-container">
        <div class="t2-title-wrapper">
            <h2 class="t2-title">Education</h2>
            <div class="t2-subtitle">My academic background and qualifications.</div>
        </div>

        @if($educations->isEmpty())
            <div class="text-center py-12">
                <p class="text-xl text-[var(--t2-text-sub)]">No education added yet.</p>
            </div>
        @else
            <div class="t2-edu-grid">
                @foreach($educations->sortByDesc('year') as $education)
                    <div class="t2-edu-card">
                        <div class="t2-edu-year">{{ $education->year ?: 'Present' }}</div>
                        
                        @if($education->icon_url)
                            <div class="t2-edu-icon">
                                <img src="{{ $education->icon_url }}" alt="Institution Logo">
                            </div>
                        @else
                            <div class="t2-edu-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--t2-accent);"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                            </div>
                        @endif

                        <div>
                            <h3 class="t2-edu-degree">{{ $education->degree }}</h3>
                            <div class="t2-edu-institution">{{ $education->institution }}</div>
                        </div>

                        @if($education->details)
                            <div class="t2-edu-details">
                                {{ $education->details }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
