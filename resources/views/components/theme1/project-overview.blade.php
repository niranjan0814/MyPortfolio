@props(['user', 'project', 'overview', 'techStackSkills', 'headerContent', 'footerContent'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Project Overview
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

    /* Page Layout */
    .t1-project-page {
        padding: 8rem 0 4rem;
        background: var(--t1-bg-primary);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        font-family: 'Inter', sans-serif;
    }

    .t1-project-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Breadcrumbs */
    .t1-breadcrumbs {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .t1-breadcrumb-link {
        color: var(--t1-accent-primary);
        text-decoration: none;
        font-weight: 500;
        transition: opacity 0.3s ease;
    }

    .t1-breadcrumb-link:hover {
        opacity: 0.7;
    }

    .t1-breadcrumb-separator {
        color: var(--t1-text-muted);
        width: 16px;
        height: 16px;
    }

    .t1-breadcrumb-current {
        color: var(--t1-text-secondary);
        font-weight: 500;
    }

    /* Hero Card */
    .t1-hero-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 3rem;
        box-shadow: var(--t1-card-shadow);
        margin-bottom: 2rem;
    }

    .t1-project-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 1rem;
    }

    .t1-project-description {
        font-size: 1.125rem;
        color: var(--t1-text-secondary);
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    /* Buttons */
    .t1-button-group {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .t1-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .t1-btn-primary {
        background: var(--t1-gradient-primary);
        color: white;
        border: none;
        box-shadow: 0 4px 12px var(--t1-btn-glow);
    }

    .t1-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px var(--t1-btn-glow);
    }

    .t1-btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: var(--t1-text-primary);
        border: 1px solid var(--t1-border-color);
    }

    [data-theme="light"] .t1-btn-secondary {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-btn-secondary:hover {
        border-color: var(--t1-accent-primary);
        background: var(--t1-accent-primary);
        color: white;
    }

    /* Stats Grid */
    .t1-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        margin-top: 2rem;
    }

    .t1-stat-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--t1-border-color);
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-stat-card {
        background: rgba(255, 255, 255, 0.4);
    }

    .t1-stat-card:hover {
        transform: translateY(-4px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 8px 20px var(--t1-glow-color);
    }

    .t1-stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .t1-stat-label {
        font-size: 0.875rem;
        color: var(--t1-text-secondary);
        margin-top: 0.5rem;
    }

    /* Tabs */
    .t1-tabs {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        border-radius: 1rem;
        padding: 0.5rem;
        margin-bottom: 2rem;
    }

    .t1-tab {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        background: transparent;
        color: var(--t1-text-secondary);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .t1-tab:hover {
        color: var(--t1-text-primary);
        background: rgba(255, 255, 255, 0.05);
    }

    .t1-tab.active {
        background: var(--t1-gradient-primary);
        color: white;
        box-shadow: 0 4px 12px var(--t1-btn-glow);
    }

    /* Content Card */
    .t1-content-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 3rem;
        box-shadow: var(--t1-card-shadow);
    }

    .t1-content-section {
        display: none;
    }

    .t1-content-section.active {
        display: block;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Section Title */
    .t1-section-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .t1-section-icon {
        width: 48px;
        height: 48px;
        background: var(--t1-gradient-primary);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    /* Features Grid */
    .t1-features-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        .t1-features-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .t1-feature-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--t1-border-color);
        border-radius: 1rem;
        padding: 2rem;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-feature-card {
        background: rgba(255, 255, 255, 0.4);
    }

    .t1-feature-card:hover {
        transform: translateY(-4px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 12px 30px var(--t1-glow-color);
    }

    .t1-feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .t1-feature-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 0.5rem;
    }

    .t1-feature-description {
        color: var(--t1-text-secondary);
        line-height: 1.6;
    }

    /* Tech Stack Grid */
    .t1-tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 1rem;
    }

    .t1-tech-item {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--t1-border-color);
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-tech-item {
        background: rgba(255, 255, 255, 0.4);
    }

    .t1-tech-item:hover {
        transform: translateY(-4px) scale(1.05);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 8px 20px var(--t1-glow-color);
    }

    .t1-tech-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 0.75rem;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .t1-tech-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .t1-tech-name {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t1-text-primary);
    }

    /* Gallery Grid */
    .t1-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .t1-gallery-item {
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid var(--t1-border-color);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .t1-gallery-item:hover {
        transform: scale(1.05);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 12px 30px var(--t1-glow-color);
    }

    .t1-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Prose Styling */
    .t1-prose {
        color: var(--t1-text-secondary);
        font-size: 1.125rem;
        line-height: 1.8;
    }

    .t1-prose h1, .t1-prose h2, .t1-prose h3 {
        color: var(--t1-text-primary);
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .t1-prose p {
        margin-bottom: 1.5rem;
    }

    .t1-prose a {
        color: var(--t1-accent-primary);
        text-decoration: underline;
    }

    .t1-prose ul, .t1-prose ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    /* Background Blobs */
    .t1-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.2;
        z-index: 0;
        animation: t1-blob-float 15s infinite alternate;
    }

    .t1-blob-1 { top: 10%; right: 10%; width: 500px; height: 500px; background: var(--t1-accent-glow); }
    .t1-blob-2 { bottom: 10%; left: 10%; width: 400px; height: 400px; background: var(--t1-accent-secondary); animation-delay: -7s; }

    @keyframes t1-blob-float {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(40px, -40px) scale(1.1); }
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .t1-project-page {
            padding: 5rem 0 2rem;
        }

        .t1-project-container {
            padding: 0 1rem;
        }

        .t1-project-title {
            font-size: 1.75rem;
        }

        /* Convert Tabs to Vertical Stack */
        .t1-tabs {
            display: none;
        }

        .t1-content-section {
            display: block !important; /* Override JS toggling */
            margin-bottom: 2rem;
            animation: none;
            opacity: 1;
            transform: none;
        }
        
        /* Hero Card Compact */
        .t1-hero-card {
            padding: 1.5rem;
            border-radius: 1rem;
        }

        .t1-button-group {
            flex-direction: column;
            width: 100%;
        }

        .t1-btn {
            width: 100%;
            justify-content: center;
        }

        /* Content Card Compact */
        .t1-content-card {
            padding: 1.5rem;
            border-radius: 1rem;
        }

        .t1-section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Horizontal Scroll Gallery (Theme 2 Style) */
        .t1-gallery-grid {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 1rem;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            margin: 0 -0.5rem;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            grid-template-columns: none;
        }
        
        .t1-gallery-grid::-webkit-scrollbar {
            height: 4px;
        }

        .t1-gallery-grid::-webkit-scrollbar-thumb {
            background: var(--t1-accent-primary);
            border-radius: 4px;
        }

        .t1-gallery-item {
            min-width: 250px;
            width: 75%;
            aspect-ratio: 16/9;
            scroll-snap-align: start;
            flex-shrink: 0;
        }

        .t1-features-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .t1-tech-grid {
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 0.75rem;
        }
        
        .t1-feature-card, .t1-tech-item {
            padding: 1rem;
        }
    }
</style>

<div class="t1-project-page">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-project-container">
        <!-- Breadcrumbs -->
        <nav class="t1-breadcrumbs">
            <a href="{{ route('portfolio.show', $user->slug) }}" class="t1-breadcrumb-link">Home</a>
            <svg class="t1-breadcrumb-separator" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="{{ route('portfolio.show', $user->slug) }}#projects" class="t1-breadcrumb-link">Projects</a>
            <svg class="t1-breadcrumb-separator" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="t1-breadcrumb-current">{{ $project->title }}</span>
        </nav>

        <!-- Hero Section -->
        <div class="t1-hero-card">
            <h1 class="t1-project-title">{{ $project->title }}</h1>
            <p class="t1-project-description">{{ $project->description }}</p>

            <div class="t1-button-group">
                @if($project->link)
                    <a href="{{ $project->link }}" target="_blank" class="t1-btn t1-btn-secondary">
                        <i class="fab fa-github"></i>
                        View Source
                    </a>
                @endif
                @if($project->depurl)
                    <a href="{{ $project->depurl }}" target="_blank" class="t1-btn t1-btn-primary">
                        <i class="fas fa-external-link-alt"></i>
                        Live Demo
                    </a>
                @endif
            </div>

            <!-- Stats -->
            <div class="t1-stats-grid">
                <div class="t1-stat-card">
                    <div class="t1-stat-value">{{ $techStackSkills->count() }}</div>
                    <div class="t1-stat-label">Technologies</div>
                </div>
                <div class="t1-stat-card">
                    <div class="t1-stat-value">{{ is_array($overview->key_features) ? count($overview->key_features) : 0 }}</div>
                    <div class="t1-stat-label">Key Features</div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="t1-tabs">
            <button class="t1-tab active" onclick="switchTab('overview')" data-tab="overview">
                <i class="fas fa-book-open"></i>
                <span>Overview</span>
            </button>
            <button class="t1-tab" onclick="switchTab('features')" data-tab="features">
                <i class="fas fa-sparkles"></i>
                <span>Features</span>
            </button>
            <button class="t1-tab" onclick="switchTab('tech')" data-tab="tech">
                <i class="fas fa-code"></i>
                <span>Tech Stack</span>
            </button>
            @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                <button class="t1-tab" onclick="switchTab('gallery')" data-tab="gallery">
                    <i class="fas fa-images"></i>
                    <span>Gallery</span>
                </button>
            @endif
        </div>

        <!-- Content Sections -->
        <div id="content-container">
            <!-- Overview Tab -->
            <div id="overview-content" class="t1-content-section active">
                <div class="t1-content-card">
                    <h2 class="t1-section-title">
                        <div class="t1-section-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        Project Overview
                    </h2>
                    <div class="t1-prose">
                        {!! $overview->overview_description !!}
                    </div>
                </div>
            </div>

            <!-- Features Tab -->
            <div id="features-content" class="t1-content-section">
                <div class="t1-content-card">
                    <h2 class="t1-section-title">
                        <div class="t1-section-icon">
                            <i class="fas fa-sparkles"></i>
                        </div>
                        Key Features
                    </h2>
                    <div class="t1-features-grid">
                        @if(is_array($overview->key_features))
                            @foreach($overview->key_features as $featureKey => $featureValue)
                                <div class="t1-feature-card">
                                    <div class="t1-feature-icon">
                                        @if($loop->index == 0) 💬
                                        @elseif($loop->index == 1) 🔄
                                        @elseif($loop->index == 2) 🔍
                                        @else 🛡️
                                        @endif
                                    </div>
                                    <h3 class="t1-feature-title">{{ $featureKey }}</h3>
                                    <p class="t1-feature-description">{{ $featureValue }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tech Stack Tab -->
            <div id="tech-content" class="t1-content-section">
                <div class="t1-content-card">
                    <h2 class="t1-section-title">
                        <div class="t1-section-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        Technology Stack
                    </h2>
                    <div class="t1-tech-grid">
                        @foreach($techStackSkills as $skill)
                            <div class="t1-tech-item">
                                <div class="t1-tech-icon">
                                    @if($skill->url)
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}">
                                    @else
                                        <i class="fas fa-code" style="font-size: 2rem; color: var(--t1-accent-primary);"></i>
                                    @endif
                                </div>
                                <div class="t1-tech-name">{{ $skill->name }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Gallery Tab -->
            @if(is_array($overview->gallery_images) && count($overview->gallery_images) > 0)
                <div id="gallery-content" class="t1-content-section">
                    <div class="t1-content-card">
                        <h2 class="t1-section-title">
                            <div class="t1-section-icon">
                                <i class="fas fa-images"></i>
                            </div>
                            Project Gallery
                        </h2>
                        <div class="t1-gallery-grid">
                            @foreach($overview->gallery_images as $image)
                                <div class="t1-gallery-item">
                                    <img src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}" alt="Project Screenshot">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Hide all content sections
        document.querySelectorAll('.t1-content-section').forEach(section => {
            section.classList.remove('active');
        });

        // Remove active class from all tabs
        document.querySelectorAll('.t1-tab').forEach(tab => {
            tab.classList.remove('active');
        });

        // Show selected content
        document.getElementById(tabName + '-content').classList.add('active');

        // Add active class to clicked tab
        document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
    }
</script>