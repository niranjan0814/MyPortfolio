@props(['projects', 'user'])

<style>


    /* ENTIRE SECTION Now Uses Full Theme Gradient */
    .t2-projects-section {
        background-color: var(--t2-bg);
        color: var(--t2-text-main);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    [data-theme="dark"] .t2-projects-section {
        background-color: var(--t2-bg);
    }

    .t2-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
    }

    /* Hero-style Title (matching About page) */
    .t2-title-wrapper {
        margin-bottom: 4rem;
        text-align: center;
    }

    .t2-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        background: var(--t2-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .t2-subtitle {
        color: var(--t2-text-sub);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .t2-projects-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    @media (min-width: 768px) {
        .t2-projects-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .t2-project-card {
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--t2-glass-border);
        border-radius: 24px;
        padding: 2rem;
        overflow: hidden;
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        box-shadow: var(--t2-shadow);
    }

    .t2-project-card:hover {
        transform: translateY(-10px);
        border-color: var(--t2-accent);
    }

    .t2-project-image {
        width: 100%;
        aspect-ratio: 16/9;
        object-fit: cover;
        border-radius: 16px;
        border: 1px solid var(--t2-glass-border);
        transition: transform 0.5s ease;
    }

    .t2-project-card:hover .t2-project-image {
        transform: scale(1.05);
    }

    .t2-project-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .t2-project-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--t2-text-main);
    }

    .t2-project-desc {
        color: var(--t2-text-sub);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }

    .t2-project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .t2-project-tag {
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 100px;
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        color: var(--t2-text-sub);
        font-weight: 600;
    }

    .t2-project-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--t2-glass-border);
    }

    .t2-project-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .t2-project-btn-primary {
        background: var(--t2-gradient);
        color: white;
        box-shadow: 0 4px 12px rgba(233, 155, 12, 0.25);
    }

    .t2-project-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(233, 155, 12, 0.35);
    }

    .t2-project-btn-outline {
        background: transparent;
        border: 1px solid var(--t2-border);
        color: var(--t2-text-main);
    }

    .t2-project-btn-outline:hover {
        border-color: var(--t2-accent);
        color: var(--t2-accent);
        background: var(--t2-surface);
    }

    .t2-project-btn svg {
        width: 16px;
        height: 16px;
    }

    /* Decorative Elements */
    .t2-decoration-circle {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: var(--t2-gradient);
        opacity: 0.05;
        filter: blur(60px);
        pointer-events: none;
    }

    .t2-decoration-1 {
        top: -100px;
        right: -100px;
    }

    .t2-decoration-2 {
        bottom: -100px;
        left: -100px;
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .t2-projects-section {
            padding: 4rem 0;
        }

        .t2-container {
            padding: 0 1rem;
        }

        .t2-title {
            font-size: 2.5rem;
        }

        .t2-title-wrapper {
            margin-bottom: 3rem;
        }

        .t2-projects-grid {
            gap: 2rem;
        }

        /* Hide project description on mobile */
        .t2-project-desc {
            display: none;
        }

        .t2-project-card {
            padding: 1.5rem;
        }

        .t2-project-title {
            font-size: 1.25rem;
        }

        .t2-project-actions {
            flex-direction: column;
        }

        .t2-project-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (min-width: 641px) and (max-width: 767px) {
        .t2-title {
            font-size: 2.75rem;
        }
    }
</style>

<section id="projects" class="t2-projects-section">
    <!-- Decorative Elements -->
    <div class="t2-decoration-circle t2-decoration-1"></div>
    <div class="t2-decoration-circle t2-decoration-2"></div>

    <div class="t2-container">
        <div class="t2-title-wrapper">
            <h2 class="t2-title">Featured Projects</h2>
        </div>

        @if($projects->isEmpty())
            <div class="text-center py-12">
                <p class="text-xl text-[var(--t2-text-sub)]">No projects available yet.</p>
            </div>
        @else
            <div class="t2-projects-grid">
                @foreach($projects as $project)
                    <div class="t2-project-card group">
                        @if($project->image)
                            <div class="overflow-hidden rounded-2xl border border-[var(--t2-glass-border)]">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="t2-project-image">
                            </div>
                        @endif

                        <div class="t2-project-content">
                            <h3 class="t2-project-title">{{ $project->title }}</h3>
                            
                            @if($project->description)
                                <p class="t2-project-desc line-clamp-3">
                                    {{ $project->description }}
                                </p>
                            @endif

                            @if($project->tags)
                                <div class="t2-project-tags">
                                    @foreach(explode(',', $project->tags) as $tech)
                                        <span class="t2-project-tag">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="t2-project-actions">

                                @if($project->overview)
                                    @php
                                        $routeParams = ['user' => $user->slug ?? $user->id, 'project' => $project->id];
                                        if (request()->query('preview')) {
                                            $routeParams['preview'] = true;
                                        }
                                    @endphp
                                    <a href="{{ route('project.overview', $routeParams) }}" class="t2-project-btn t2-project-btn-primary">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Overview
                                    </a>
                                @endif

                                @if($project->depurl)
                                    <a href="{{ $project->depurl }}" target="{{ request()->query('preview') ? '_self' : '_blank' }}" class="t2-project-btn t2-project-btn-outline">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                        Live Demo
                                    </a>
                                @endif

                                @if($project->link)
                                    <a href="{{ $project->link }}" target="{{ request()->query('preview') ? '_self' : '_blank' }}" class="t2-project-btn t2-project-btn-outline">
                                        <svg fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        GitHub
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
