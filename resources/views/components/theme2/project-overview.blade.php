@props(['project', 'overview', 'techStackSkills'])

@php
use Illuminate\Support\Facades\Storage;
@endphp

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

    .t2-project-overview {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        min-height: 100vh;
        padding: 6rem 0 12rem;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    .t2-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Breadcrumbs */
    .t2-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 3rem;
        font-size: 0.9rem;
        color: var(--t2-text-sub);
    }

    .t2-breadcrumbs a {
        color: var(--t2-text-sub);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .t2-breadcrumbs a:hover {
        color: var(--t2-accent);
    }

    .t2-breadcrumbs span {
        opacity: 0.5;
    }

    .t2-project-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
    }

    @media (min-width: 1024px) {
        .t2-project-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    .t2-project-gallery {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .t2-main-image {
        width: 100%;
        max-width: 600px;
        border-radius: 24px;
        border: 1px solid var(--t2-glass-border);
        box-shadow: var(--t2-shadow);
        overflow: hidden;
    }

    .t2-main-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .t2-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
        max-width: 600px;
    }

    .t2-gallery-item {
        aspect-ratio: 1;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid var(--t2-glass-border);
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .t2-gallery-item:hover {
        transform: scale(1.05);
        border-color: var(--t2-accent);
    }

    .t2-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .t2-project-info {
        position: sticky;
        top: 6rem;
        height: fit-content;
    }

    .t2-project-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        color: var(--t2-text-main);
    }

    .t2-project-title span {
        color: var(--t2-accent);
    }

    .t2-project-desc {
        color: var(--t2-text-sub);
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 2.5rem;
    }

    .t2-tech-stack {
        margin-bottom: 2.5rem;
    }

    .t2-tech-label {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--t2-text-sub);
        margin-bottom: 1rem;
    }

    .t2-tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .t2-tech-tag {
        padding: 0.5rem 1rem;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        border-radius: 100px;
        color: var(--t2-text-main);
        font-size: 0.9rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .t2-tech-tag img {
        width: 20px;
        height: 20px;
        object-fit: contain;
    }

    .t2-features {
        margin-bottom: 2.5rem;
    }

    .t2-features-list {
        list-style: none;
        padding: 0;
    }

    .t2-features-list li {
        padding: 0.75rem 0;
        padding-left: 2rem;
        position: relative;
        color: var(--t2-text-sub);
    }

    .t2-features-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--t2-accent);
        font-weight: 700;
        font-size: 1.2rem;
    }

    .t2-project-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2.5rem;
    }

    .t2-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .t2-btn-primary {
        background: var(--t2-gradient);
        color: white;
        box-shadow: 0 4px 12px rgba(233, 155, 12, 0.3);
    }

    .t2-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(233, 155, 12, 0.4);
    }

    .t2-btn-outline {
        background: transparent;
        border: 2px solid var(--t2-border);
        color: var(--t2-text-main);
    }

    .t2-btn-outline:hover {
        border-color: var(--t2-accent);
        color: var(--t2-accent);
        background: var(--t2-surface);
    }

    /* Mobile Responsiveness */
    @media (max-width: 1024px) {
        .t2-project-info {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .t2-project-overview {
            padding: 4rem 0 6rem;
        }

        .t2-container {
            padding: 0 1rem;
        }

        .t2-breadcrumbs {
            font-size: 0.8rem;
            margin-bottom: 2rem;
        }

        .t2-project-grid {
            gap: 2rem;
        }

        .t2-main-image {
            max-width: 100%;
        }

        .t2-gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            max-width: 100%;
        }

        .t2-project-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .t2-project-desc {
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .t2-tech-stack,
        .t2-features {
            margin-bottom: 2rem;
        }

        .t2-tech-tags {
            gap: 0.5rem;
        }

        .t2-tech-tag {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }

        .t2-project-actions {
            flex-direction: column;
            gap: 0.75rem;
        }

        .t2-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .t2-project-title {
            font-size: 1.75rem;
        }

        .t2-tech-tag img {
            width: 16px;
            height: 16px;
        }
    }

    /* Mobile Only (< 640px) */
    @media (max-width: 640px) {
        .t2-project-grid {
            /* Kept as default (column) so main image stays top */
            gap: 3rem;
        }

        .t2-main-image {
            margin-bottom: 1rem;
            border-radius: 16px;
        }

        /* Horizontal Scroll Gallery */
        .t2-gallery-grid {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 1rem;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            margin: 0 -1rem;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .t2-gallery-grid::-webkit-scrollbar {
            height: 4px;
        }
        
        .t2-gallery-grid::-webkit-scrollbar-thumb {
            background: var(--t2-accent);
            border-radius: 4px;
        }

        .t2-gallery-grid::-webkit-scrollbar-track {
            background: transparent;
        }

        .t2-gallery-item {
            min-width: 250px;
            width: 70%;
            height: 180px;
            scroll-snap-align: start;
            flex-shrink: 0;
            border-radius: 16px;
        }
    }
</style>

<section class="t2-project-overview">
    <div class="t2-container">
        <!-- Breadcrumbs -->
        <div class="t2-breadcrumbs">
            <a href="{{ route('portfolio.show', $project->user) }}#projects">Projects</a>
            <span>›</span>
            <span style="color: var(--t2-text-main); font-weight: 600;">Project Overview</span>
        </div>

        <div class="t2-project-grid">
            <!-- Left: Images -->
            <div class="t2-project-gallery">
                @if($project->image)
                    <div class="t2-main-image">
                        <img src="{{ str_starts_with($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    </div>
                @endif

                @if($overview->gallery_images && count($overview->gallery_images) > 0)
                    <div class="t2-gallery-grid">
                        @foreach($overview->gallery_images as $image)
                            <div class="t2-gallery-item">
                                <img src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}" alt="Gallery Image">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right: Details -->
            <div class="t2-project-info">
                <h1 class="t2-project-title">{{ $project->title }}<span>.</span></h1>
                
                <div class="t2-project-desc">
                    <p>{{ $project->description }}</p>
                    @if($overview->overview_description)
                        <br>
                        <div>{!! $overview->overview_description !!}</div>
                    @endif
                </div>

                <div class="t2-project-actions">
                    @if($project->depurl)
                        <a href="{{ $project->depurl }}" target="_blank" class="t2-btn t2-btn-primary">
                            Live Demo
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        </a>
                    @endif

                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="t2-btn t2-btn-outline">
                            Source Code
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                        </a>
                    @endif
                </div>

                @if($techStackSkills && $techStackSkills->count() > 0)
                    <div class="t2-tech-stack">
                        <h4 class="t2-tech-label">Technologies</h4>
                        <div class="t2-tech-tags">
                            @foreach($techStackSkills as $skill)
                                <span class="t2-tech-tag">
                                    @if($skill->url)
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    @endif
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($overview->key_features && count($overview->key_features) > 0)
                    <div class="t2-features">
                        <h4 class="t2-tech-label">Key Features</h4>
                        <ul class="t2-features-list">
                            @foreach($overview->key_features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryGrid = document.querySelector('.t2-gallery-grid');
        const projectGallery = document.querySelector('.t2-project-gallery');
        const projectInfo = document.querySelector('.t2-project-info');
        
        if (!galleryGrid || !projectGallery || !projectInfo) return;

        function handleGalleryPosition() {
            const isMobile = window.innerWidth <= 640;
            
            if (isMobile) {
                // Move gallery grid to after project info (bottom of page)
                if (galleryGrid.parentElement !== projectInfo.parentElement) {
                    projectInfo.parentElement.appendChild(galleryGrid);
                    galleryGrid.style.marginTop = '0';
                    galleryGrid.style.marginBottom = '2rem';
                } else if (galleryGrid.nextElementSibling !== null) {
                    // Ensure it's the last child
                    projectInfo.parentElement.appendChild(galleryGrid);
                }
            } else {
                // Move gallery grid back to project gallery container
                if (galleryGrid.parentElement !== projectGallery) {
                    projectGallery.appendChild(galleryGrid);
                    galleryGrid.style.marginTop = '';
                    galleryGrid.style.marginBottom = '';
                }
            }
        }

        // Run on load
        handleGalleryPosition();

        // Run on resize with debounce
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(handleGalleryPosition, 250);
        });
    });
</script>
