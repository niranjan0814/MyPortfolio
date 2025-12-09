@props(['projects', 'user'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON - PROJECTS
       Refined to match Theme 2's Structure
       ========================================== */

    :root {
        /* Reuse Theme 1 Variables */
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
    .t1-projects-section {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        background: var(--t1-bg-primary);
        font-family: 'Inter', sans-serif;
    }

    .t1-projects-container {
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
        margin-bottom: 1rem;
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t1-title-underline {
        width: 80px;
        height: 4px;
        background: var(--t1-gradient-primary);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* Projects Grid - Matching Theme 2 (2 Columns Max) */
    .t1-projects-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    @media (min-width: 768px) {
        .t1-projects-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Project Card */
    .t1-project-card {
        background: var(--t1-surface-card);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t1-border-color);
        border-radius: 24px;
        padding: 2rem;
        overflow: hidden;
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        box-shadow: var(--t1-card-shadow);
    }

    .t1-project-card:hover {
        transform: translateY(-10px);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3), 0 0 30px var(--t1-glow-color);
    }

    /* Image Container */
    .t1-project-image-wrapper {
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
        border-radius: 16px;
        border: 1px solid var(--t1-border-color);
        background: linear-gradient(135deg, var(--t1-bg-secondary), var(--t1-bg-primary));
    }

    .t1-project-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .t1-project-card:hover .t1-project-image {
        transform: scale(1.05);
    }

    .t1-project-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: var(--t1-accent-primary);
        opacity: 0.3;
    }

    /* Content */
    .t1-project-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .t1-project-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--t1-text-primary);
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .t1-project-description {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--t1-text-secondary);
        margin-bottom: 1.5rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Tags */
    .t1-project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .t1-project-tag {
        padding: 0.25rem 0.75rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        border-radius: 100px;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--t1-accent-primary);
        transition: all 0.3s ease;
    }

    [data-theme="light"] .t1-project-tag {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-project-tag:hover {
        background: var(--t1-accent-primary);
        color: white;
        transform: translateY(-2px);
    }

    /* Actions */
    .t1-project-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--t1-border-color);
    }

    .t1-project-btn {
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .t1-project-btn-primary {
        background: var(--t1-gradient-primary);
        color: #FFFFFF;
        box-shadow: 0 4px 12px var(--t1-btn-glow);
        border: none;
    }

    .t1-project-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px var(--t1-btn-glow);
    }

    .t1-project-btn-outline {
        background: transparent;
        border: 1px solid var(--t1-border-color);
        color: var(--t1-text-primary);
    }

    .t1-project-btn-outline:hover {
        border-color: var(--t1-accent-primary);
        color: var(--t1-accent-primary);
        background: var(--t1-surface-card);
        transform: translateY(-2px);
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
        animation: t1-blob-float 12s infinite alternate;
    }

    .t1-blob-1 {
        top: 10%;
        right: 10%;
        width: 400px;
        height: 400px;
        background: var(--t1-accent-glow);
    }

    .t1-blob-2 {
        bottom: 10%;
        left: 10%;
        width: 350px;
        height: 350px;
        background: var(--t1-accent-secondary);
        animation-delay: -6s;
    }

    @keyframes t1-blob-float {
        0% {
            transform: translate(0, 0) scale(1);
        }

        100% {
            transform: translate(30px, -30px) scale(1.1);
        }
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .t1-projects-section {
            padding: 4rem 0 3rem;
        }

        .t1-projects-container {
            padding: 0 1rem;
            width: 100%;
            box-sizing: border-box;
        }

        .t1-section-title {
            font-size: clamp(2rem, 8vw, 2.5rem);
            margin-bottom: 2rem;
        }

        .t1-projects-grid {
            gap: 2rem;
        }

        .t1-project-card {
            padding: 1.5rem;
        }

        .t1-project-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        /* Hide description on mobile */
        .t1-project-description {
            display: none;
        }

        .t1-project-tags {
            margin-bottom: 1rem;
        }

        .t1-project-tag {
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
        }

        .t1-project-actions {
            flex-direction: column;
            gap: 0.75rem;
            padding-top: 1rem;
        }

        .t1-project-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }
    }
</style>

<section id="projects" class="t1-projects-section">
    <!-- Background Elements -->
    <div class="t1-blob t1-blob-1"></div>
    <div class="t1-blob t1-blob-2"></div>

    <div class="t1-projects-container">
        <!-- Title -->
        <div class="t1-title-wrapper">
            <h2 class="t1-section-title">Featured Projects</h2>
            <div class="t1-title-underline"></div>
        </div>

        @if($projects->isEmpty())
            <!-- Empty State -->
            <div class="t1-empty-state">
                <div class="t1-empty-icon">
                    <i class="fas fa-folder-open"></i>
                </div>
                <p class="t1-empty-text">No projects available yet.</p>
            </div>
        @else
            <!-- Projects Grid -->
            <div class="t1-projects-grid">
                @foreach($projects as $project)
                    <div class="t1-project-card">
                        <!-- Image -->
                        @if($project->image)
                            <div class="t1-project-image-wrapper">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                    class="t1-project-image">
                            </div>
                        @else
                            <div class="t1-project-image-wrapper">
                                <div class="t1-project-placeholder">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                            </div>
                        @endif

                        <!-- Content -->
                        <div class="t1-project-content">
                            <h3 class="t1-project-title">{{ $project->title }}</h3>

                            <p class="t1-project-description">{{ $project->description }}</p>

                            <!-- Tags -->
                            @if($project->tags)
                                <div class="t1-project-tags">
                                    @foreach(explode(',', $project->tags) as $tag)
                                        <span class="t1-project-tag">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Actions -->
                            <div class="t1-project-actions">
                                @if($project->overview)
                                    @php
                                        $routeParams = ['user' => $user->slug ?? $user->id, 'project' => $project->id];
                                        if (request()->query('preview')) {
                                            $routeParams['preview'] = true;
                                        }
                                    @endphp
                                    <a href="{{ route('project.overview', $routeParams) }}"
                                        class="t1-project-btn t1-project-btn-primary">
                                        <i class="fas fa-book-open"></i>
                                        <span>Overview</span>
                                    </a>
                                @endif

                                @if($project->depurl)
                                    <a href="{{ $project->depurl }}" target="{{ request()->query('preview') ? '_self' : '_blank' }}" class="t1-project-btn t1-project-btn-outline">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>Live Demo</span>
                                    </a>
                                @endif

                                @if($project->link)
                                    <a href="{{ $project->link }}" target="{{ request()->query('preview') ? '_self' : '_blank' }}" class="t1-project-btn t1-project-btn-outline">
                                        <i class="fab fa-github"></i>
                                        <span>GitHub</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>