@props(['project', 'overview', 'techStackSkills'])

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<style>
    /* ============================================
       THEME 3 PROJECT OVERVIEW - VERTICAL SECTIONS
       Sections Flow Like Homepage Components
       ============================================ */

    :root {
        --t3-pov-bg: #f8fafc;
        --t3-pov-surface: #ffffff;
        --t3-pov-text: #1a202c;
        --t3-pov-text-muted: #4a5568;
        --t3-pov-accent: #00cc7a;
        --t3-pov-accent-2: #0099cc;
        --t3-pov-border: rgba(0, 204, 122, 0.15);
        --t3-pov-shadow: 0 20px 60px rgba(0, 204, 122, 0.15);
        --t3-pov-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
    }

    [data-theme="dark"] {
        --t3-pov-bg: #0a0a12;
        --t3-pov-surface: #151522;
        --t3-pov-text: #ffffff;
        --t3-pov-text-muted: #b4c6e0;
        --t3-pov-accent: #00ff9d;
        --t3-pov-accent-2: #00d4ff;
        --t3-pov-border: rgba(0, 255, 157, 0.15);
        --t3-pov-shadow: 0 20px 60px rgba(0, 255, 157, 0.25);
        --t3-pov-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
    }

    /* Hero Section */
    .t3-pov-hero {
        background: var(--t3-pov-bg);
        padding: 8rem 0 6rem;
        position: relative;
        overflow: hidden;
        min-height: calc(100vh - 80px);
        /* Subtract header height */
        display: flex;
        align-items: center;
    }

    .t3-pov-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Back Button */
    .t3-pov-back {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: transparent;
        border: 1.5px solid var(--t3-pov-border);
        border-radius: 100px;
        color: var(--t3-pov-text-muted);
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-bottom: 3rem;
    }

    .t3-pov-back:hover {
        background: rgba(0, 204, 122, 0.05);
        border-color: var(--t3-pov-accent);
        color: var(--t3-pov-accent);
        transform: translateX(-5px);
    }

    [data-theme="dark"] .t3-pov-back:hover {
        background: rgba(0, 255, 157, 0.05);
    }

    .t3-pov-back svg {
        width: 16px;
        height: 16px;
    }

    /* Hero Content */
    .t3-pov-hero-content {
        text-align: center;
        max-width: 900px;
        margin: 0 auto 4rem;
    }

    .t3-pov-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        color: var(--t3-pov-text);
        margin-bottom: 1.5rem;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .t3-pov-title-accent {
        background: var(--t3-pov-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-pov-description {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--t3-pov-text-muted);
        margin-bottom: 2.5rem;
    }

    /* Hero Actions */
    .t3-pov-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 3rem;
    }

    .t3-pov-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
    }

    .t3-pov-btn-primary {
        background: var(--t3-pov-gradient);
        color: white;
        box-shadow: 0 8px 25px rgba(0, 204, 122, 0.25);
    }

    [data-theme="dark"] .t3-pov-btn-primary {
        box-shadow: 0 8px 25px rgba(0, 255, 157, 0.25);
    }

    .t3-pov-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(0, 204, 122, 0.35);
    }

    [data-theme="dark"] .t3-pov-btn-primary:hover {
        box-shadow: 0 12px 35px rgba(0, 255, 157, 0.35);
    }

    .t3-pov-btn-secondary {
        background: transparent;
        border: 2px solid var(--t3-pov-border);
        color: var(--t3-pov-text);
    }

    .t3-pov-btn-secondary:hover {
        background: rgba(0, 204, 122, 0.05);
        border-color: var(--t3-pov-accent);
        color: var(--t3-pov-accent);
    }

    [data-theme="dark"] .t3-pov-btn-secondary:hover {
        background: rgba(0, 255, 157, 0.05);
    }

    .t3-pov-btn svg {
        width: 18px;
        height: 18px;
    }

    /* Hero Image - Smaller Size */
    .t3-pov-hero-image {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--t3-pov-shadow);
        border: 1px solid var(--t3-pov-border);
    }

    .t3-pov-hero-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Section Base */
    .t3-pov-section {
        background: var(--t3-pov-bg);
        padding: 6rem 0;
        position: relative;
        margin: 0;
    }

    /* Last section should have normal padding - footer will follow naturally */
    .t3-pov-section:last-of-type {
        padding-bottom: 6rem;
        margin-bottom: 0;
    }

    .t3-pov-section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .t3-pov-section-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        color: var(--t3-pov-text);
        margin-bottom: 1rem;
    }

    .t3-pov-section-title-accent {
        background: var(--t3-pov-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Overview Section */
    .t3-overview-content {
        max-width: 900px;
        margin: 0 auto;
        font-size: 1.0625rem;
        line-height: 1.9;
        color: var(--t3-pov-text-muted);
    }

    /* Tech Stack Section */
    .t3-tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1.5rem;
    }

    .t3-tech-card {
        padding: 1.5rem;
        background: var(--t3-pov-surface);
        border: 1px solid var(--t3-pov-border);
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s ease;
    }

    .t3-tech-card:hover {
        transform: translateY(-8px);
        border-color: var(--t3-pov-accent);
        box-shadow: 0 15px 40px rgba(0, 204, 122, 0.15);
    }

    [data-theme="dark"] .t3-tech-card:hover {
        box-shadow: 0 15px 40px rgba(0, 255, 157, 0.15);
    }

    .t3-tech-icon {
        width: 48px;
        height: 48px;
        object-fit: contain;
    }

    .t3-tech-name {
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--t3-pov-text);
        text-align: center;
    }

    /* Features Section - Bullet List Style */
    .t3-features-list {
        list-style: none;
        padding: 0;
        max-width: 900px;
        margin: 0 auto;
    }

    .t3-features-list li {
        padding: 1rem 0 1rem 3rem;
        position: relative;
        color: var(--t3-pov-text-muted);
        font-size: 1.0625rem;
        line-height: 1.7;
        border-bottom: 1px solid var(--t3-pov-border);
    }

    .t3-features-list li:last-child {
        border-bottom: none;
    }

    .t3-features-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 1rem;
        width: 32px;
        height: 32px;
        background: var(--t3-pov-gradient);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.125rem;
    }

    /* Gallery Section */
    .t3-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
    }

    .t3-gallery-item {
        aspect-ratio: 16/10;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--t3-pov-border);
        cursor: pointer;
        transition: all 0.4s ease;
    }

    .t3-gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 20px 50px rgba(0, 204, 122, 0.2);
        border-color: var(--t3-pov-accent);
    }

    [data-theme="dark"] .t3-gallery-item:hover {
        box-shadow: 0 20px 50px rgba(0, 255, 157, 0.2);
    }

    .t3-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .t3-gallery-item:hover img {
        transform: scale(1.15);
    }

    /* Responsive */
    @media (max-width: 640px) {
        .t3-pov-hero {
            padding: 6rem 0 4rem;
        }

        .t3-pov-section {
            padding: 4rem 0;
        }

        .t3-tech-grid,
        .t3-features-grid,
        .t3-gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<!-- Hero Section -->
<section class="t3-pov-hero">
    <div class="t3-pov-container">
        <a href="{{ route('portfolio.show', $project->user) }}#projects" class="t3-pov-back">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Projects
        </a>

        <div class="t3-pov-hero-content">
            <h1 class="t3-pov-title">
                {{ $project->title }}<span class="t3-pov-title-accent">.</span>
            </h1>

            <p class="t3-pov-description">
                {{ $project->description }}
            </p>

            <div class="t3-pov-actions">
                @if($project->depurl)
                    <a href="{{ $project->depurl }}" target="_blank" class="t3-pov-btn t3-pov-btn-primary">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        View Live Demo
                    </a>
                @endif

                @if($project->link)
                    <a href="{{ $project->link }}" target="_blank" class="t3-pov-btn t3-pov-btn-secondary">
                        <svg fill="currentColor" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                        Source Code
                    </a>
                @endif
            </div>
        </div>

        @if($project->image)
            <div class="t3-pov-hero-image">
                <img src="{{ str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}"
                    alt="{{ $project->title }}">
            </div>
        @endif
    </div>
</section>

<!-- Overview Section -->
<section class="t3-pov-section">
    <div class="t3-pov-container">
        <div class="t3-pov-section-header">
            <h2 class="t3-pov-section-title">
                Project <span class="t3-pov-section-title-accent">Overview</span>
            </h2>
        </div>
        <div class="t3-overview-content">
            @if($overview->overview_description)
                {!! $overview->overview_description !!}
            @else
                <p>{{ $project->description }}</p>
            @endif
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
@if($techStackSkills && $techStackSkills->count() > 0)
    <section class="t3-pov-section">
        <div class="t3-pov-container">
            <div class="t3-pov-section-header">
                <h2 class="t3-pov-section-title">
                    Tech <span class="t3-pov-section-title-accent">Stack</span>
                </h2>
            </div>
            <div class="t3-tech-grid">
                @foreach($techStackSkills as $skill)
                    <div class="t3-tech-card">
                        @if($skill->url)
                            <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="t3-tech-icon">
                        @endif
                        <div class="t3-tech-name">{{ $skill->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Features Section -->
@if($overview->key_features && count($overview->key_features) > 0)
    <section class="t3-pov-section">
        <div class="t3-pov-container">
            <div class="t3-pov-section-header">
                <h2 class="t3-pov-section-title">
                    Key <span class="t3-pov-section-title-accent">Features</span>
                </h2>
            </div>
            <ul class="t3-features-list">
                @foreach($overview->key_features as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
        </div>
    </section>
@endif

<!-- Gallery Section -->
@if($overview->gallery_images && count($overview->gallery_images) > 0)
    <section class="t3-pov-section">
        <div class="t3-pov-container">
            <div class="t3-pov-section-header">
                <h2 class="t3-pov-section-title">
                    Project <span class="t3-pov-section-title-accent">Gallery</span>
                </h2>
            </div>
            <div class="t3-gallery-grid">
                @foreach($overview->gallery_images as $image)
                    <div class="t3-gallery-item">
                        <img src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}"
                            alt="Gallery Image">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif