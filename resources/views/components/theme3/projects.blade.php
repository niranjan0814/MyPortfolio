@props(['projects', 'user'])

<style>
    /* ============================================
       THEME 3 PROJECTS - MASONRY CARD LAYOUT
       Unique Pinterest-Style Design
       ============================================ */

    :root {
        --t3-proj-bg: #f8fafc;
        --t3-proj-surface: #ffffff;
        --t3-proj-text: #1a202c;
        --t3-proj-text-muted: #4a5568;
        --t3-proj-accent: #00cc7a;
        --t3-proj-accent-2: #0099cc;
        --t3-proj-border: rgba(0, 204, 122, 0.15);
        --t3-proj-shadow: 0 15px 50px rgba(0, 204, 122, 0.12);
        --t3-proj-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
        --t3-proj-glow: rgba(0, 204, 122, 0.2);
    }

    [data-theme="dark"] {
        --t3-proj-bg: #0a0a12;
        --t3-proj-surface: #151522;
        --t3-proj-text: #ffffff;
        --t3-proj-text-muted: #b4c6e0;
        --t3-proj-accent: #00ff9d;
        --t3-proj-accent-2: #00d4ff;
        --t3-proj-border: rgba(0, 255, 157, 0.15);
        --t3-proj-shadow: 0 15px 50px rgba(0, 255, 157, 0.25);
        --t3-proj-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
        --t3-proj-glow: rgba(0, 255, 157, 0.25);
    }

    /* Section */
    .t3-projects-section {
        background: var(--t3-proj-bg);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
    }

    /* Floating Gradient Orbs */
    .t3-proj-orb {
        position: absolute;
        border-radius: 50%;
        background: var(--t3-proj-gradient);
        filter: blur(100px);
        opacity: 0.06;
        pointer-events: none;
        animation: t3FloatOrb 25s ease-in-out infinite;
    }

    .t3-proj-orb-1 {
        width: 450px;
        height: 450px;
        top: -15%;
        right: -10%;
        animation-delay: 0s;
    }

    .t3-proj-orb-2 {
        width: 400px;
        height: 400px;
        bottom: -15%;
        left: -10%;
        animation-delay: 8s;
    }

    @keyframes t3FloatOrb {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
        }

        33% {
            transform: translate(60px, -60px) scale(1.15);
        }

        66% {
            transform: translate(-60px, 60px) scale(0.85);
        }
    }

    /* Container */
    .t3-proj-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
        width: 100%;
        box-sizing: border-box;
    }

    /* Header with Centered Title */
    .t3-proj-header {
        text-align: center;
        margin-bottom: 5rem;
        position: relative;
    }

    .t3-proj-header::before {
        content: '';
        position: absolute;
        top: -2rem;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--t3-proj-gradient);
        border-radius: 10px;
    }

    .t3-proj-main-title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 900;
        margin-bottom: 1.25rem;
        color: var(--t3-proj-text);
        letter-spacing: -0.03em;
    }

    .t3-proj-title-gradient {
        background: var(--t3-proj-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .t3-proj-subtitle {
        font-size: 1.125rem;
        color: var(--t3-proj-text-muted);
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Masonry Grid - 3 Columns */
    .t3-masonry-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 1024px) {
        .t3-masonry-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .t3-projects-section {
            padding: 4rem 0 3rem;
        }

        .t3-proj-container {
            padding: 0 1rem;
        }

        .t3-proj-header {
            margin-bottom: 3rem;
        }

        .t3-proj-header::before {
            width: 60px;
            height: 3px;
            top: -1.5rem;
        }

        .t3-proj-main-title {
            font-size: clamp(2rem, 8vw, 2.5rem);
            margin-bottom: 1rem;
        }

        .t3-proj-subtitle {
            font-size: 1rem;
            padding: 0 0.5rem;
        }

        .t3-masonry-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .t3-proj-image-container {
            height: 220px;
        }

        .t3-proj-content {
            padding: 1.5rem;
            gap: 1rem;
        }

        .t3-proj-title {
            font-size: 1.25rem;
        }

        .t3-proj-description {
            font-size: 0.875rem;
            /* Hide description on mobile to reduce clutter */
            display: none;
        }

        .t3-proj-tags {
            gap: 0.375rem;
        }

        .t3-proj-tag {
            padding: 0.3125rem 0.75rem;
            font-size: 0.6875rem;
        }

        .t3-proj-footer {
            padding: 1.25rem 1.5rem;
            flex-direction: column;
            gap: 0.625rem;
        }

        .t3-proj-btn {
            width: 100%;
            min-width: auto;
            padding: 0.75rem 1rem;
        }

        /* Adjust orbs for mobile */
        .t3-proj-orb-1 {
            width: 300px;
            height: 300px;
            top: -10%;
            right: -15%;
        }

        .t3-proj-orb-2 {
            width: 250px;
            height: 250px;
            bottom: -10%;
            left: -15%;
        }

        .t3-empty-state {
            padding: 4rem 1.5rem;
        }

        .t3-empty-icon {
            width: 64px;
            height: 64px;
            font-size: 1.5rem;
        }

        .t3-empty-text {
            font-size: 1.125rem;
        }
    }

    @media (max-width: 375px) {
        .t3-projects-section {
            padding: 3rem 0 2rem;
        }

        .t3-proj-container {
            padding: 0 0.75rem;
        }

        .t3-proj-main-title {
            font-size: 1.75rem;
        }

        .t3-proj-content {
            padding: 1.25rem;
        }

        .t3-proj-title {
            font-size: 1.125rem;
        }
    }

    /* Project Card - Vertical Orientation */
    .t3-proj-card {
        background: var(--t3-proj-surface);
        border: 1px solid var(--t3-proj-border);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .t3-proj-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--t3-proj-gradient);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .t3-proj-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: var(--t3-proj-shadow);
        border-color: var(--t3-proj-accent);
    }

    .t3-proj-card:hover::before {
        opacity: 1;
    }

    /* Image Section */
    .t3-proj-image-container {
        position: relative;
        width: 100%;
        height: 280px;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(0, 204, 122, 0.1) 0%, rgba(0, 153, 204, 0.1) 100%);
    }

    [data-theme="dark"] .t3-proj-image-container {
        background: linear-gradient(135deg, rgba(0, 255, 157, 0.1) 0%, rgba(0, 212, 255, 0.1) 100%);
    }

    .t3-proj-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .t3-proj-card:hover .t3-proj-image {
        transform: scale(1.15) rotate(2deg);
    }

    /* Gradient Overlay on Image */
    .t3-proj-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.5) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .t3-proj-card:hover .t3-proj-image-overlay {
        opacity: 1;
    }

    /* Content Section */
    .t3-proj-content {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        flex: 1;
    }

    .t3-proj-title {
        font-size: 1.375rem;
        font-weight: 700;
        color: var(--t3-proj-text);
        line-height: 1.3;
        margin: 0;
    }

    .t3-proj-description {
        font-size: 0.9375rem;
        line-height: 1.7;
        color: var(--t3-proj-text-muted);
        flex: 1;
    }

    /* Tech Tags - Horizontal Pills */
    .t3-proj-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .t3-proj-tag {
        padding: 0.375rem 0.875rem;
        background: rgba(0, 204, 122, 0.08);
        border: 1px solid var(--t3-proj-border);
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--t3-proj-accent);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .t3-proj-tag {
        background: rgba(0, 255, 157, 0.08);
    }

    .t3-proj-tag:hover {
        background: var(--t3-proj-accent);
        color: white;
        transform: translateY(-2px);
    }

    /* Action Footer */
    .t3-proj-footer {
        padding: 1.5rem 2rem;
        border-top: 1px solid var(--t3-proj-border);
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .t3-proj-btn {
        flex: 1;
        min-width: 120px;
        padding: 0.75rem 1.25rem;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .t3-proj-btn-primary {
        background: var(--t3-proj-gradient);
        color: white;
        border: none;
        box-shadow: 0 4px 15px var(--t3-proj-glow);
    }

    .t3-proj-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px var(--t3-proj-glow);
    }

    .t3-proj-btn-secondary {
        background: transparent;
        color: var(--t3-proj-text);
        border: 1.5px solid var(--t3-proj-border);
    }

    .t3-proj-btn-secondary:hover {
        background: rgba(0, 204, 122, 0.05);
        border-color: var(--t3-proj-accent);
        color: var(--t3-proj-accent);
    }

    [data-theme="dark"] .t3-proj-btn-secondary:hover {
        background: rgba(0, 255, 157, 0.05);
    }

    .t3-proj-btn svg {
        width: 14px;
        height: 14px;
    }

    /* Empty State */
    .t3-empty-state {
        text-align: center;
        padding: 6rem 2rem;
    }

    .t3-empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: var(--t3-proj-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
    }

    .t3-empty-text {
        font-size: 1.25rem;
        color: var(--t3-proj-text-muted);
    }
</style>

<section id="projects" class="t3-projects-section">
    <!-- Floating Orbs -->
    <div class="t3-proj-orb t3-proj-orb-1"></div>
    <div class="t3-proj-orb t3-proj-orb-2"></div>

    <div class="t3-proj-container">
        <!-- Header -->
        <div class="t3-proj-header">
            <h2 class="t3-proj-main-title">
                My <span class="t3-proj-title-gradient">Projects</span>
            </h2>
            <p class="t3-proj-subtitle">
                Explore my portfolio of innovative solutions and creative implementations
            </p>
        </div>

        @if($projects->isEmpty())
            <div class="t3-empty-state">
                <div class="t3-empty-icon">
                    <i class="fas fa-folder-open"></i>
                </div>
                <p class="t3-empty-text">No projects available yet. Check back soon!</p>
            </div>
        @else
            <!-- Masonry Grid -->
            <div class="t3-masonry-grid">
                @foreach($projects as $project)
                    <div class="t3-proj-card">
                        <!-- Image -->
                        <div class="t3-proj-image-container">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    class="t3-proj-image">
                            @endif
                            <div class="t3-proj-image-overlay"></div>
                        </div>

                        <!-- Content -->
                        <div class="t3-proj-content">
                            <h3 class="t3-proj-title">{{ $project->title }}</h3>

                            @if($project->description)
                                <p class="t3-proj-description">
                                    {{ Str::limit(strip_tags($project->description), 120) }}
                                </p>
                            @endif

                            @if($project->tags)
                                <div class="t3-proj-tags">
                                    @foreach(array_slice(explode(',', $project->tags), 0, 4) as $tech)
                                        <span class="t3-proj-tag">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Footer Actions -->
                        <div class="t3-proj-footer">
                            @if($project->overview)
                                <a href="{{ route('project.overview', ['user' => $user->slug ?? $user->id, 'project' => $project->id]) }}"
                                    class="t3-proj-btn t3-proj-btn-primary">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </a>
                            @endif

                            @if($project->depurl)
                                <a href="{{ $project->depurl }}" target="_blank" class="t3-proj-btn t3-proj-btn-secondary">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                    Live
                                </a>
                            @endif

                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="t3-proj-btn t3-proj-btn-secondary">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                    </svg>
                                    Code
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>