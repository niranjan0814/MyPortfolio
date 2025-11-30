@props(['user' => null, 'blogPosts' => null])

@php
    $currentSlug = $user?->slug ?? \App\Models\User::whereNotNull('slug')->value('slug') ?? '';
    $baseUrl = $currentSlug ? route('portfolio.show', $currentSlug) : '/';
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

    .t2-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--t2-glass-border);
        transition: all 0.3s ease;
    }

    [data-theme="dark"] .t2-header {
        background: rgba(44, 46, 62, 0.8);
    }

    .t2-nav-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 1rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .t2-brand {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--t2-text-main);
        text-decoration: none;
    }

    .t2-brand span {
        color: var(--t2-accent);
    }

    .t2-nav-links {
        display: none;
        gap: 2rem;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    @media (min-width: 768px) {
        .t2-nav-links {
            display: flex;
        }
    }

    .t2-nav-link {
        color: var(--t2-text-sub);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
        font-size: 0.95rem;
    }

    .t2-nav-link:hover {
        color: var(--t2-accent);
    }

    .t2-theme-btn {
        background: var(--t2-surface);
        border: 1px solid var(--t2-glass-border);
        color: var(--t2-text-main);
        padding: 0.5rem 1rem;
        border-radius: 100px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .t2-theme-btn:hover {
        border-color: var(--t2-accent);
        color: var(--t2-accent);
    }

    .t2-mobile-btn {
        display: block;
        background: none;
        border: none;
        color: var(--t2-text-main);
        font-size: 1.5rem;
        cursor: pointer;
    }

    @media (min-width: 768px) {
        .t2-mobile-btn {
            display: none;
        }
    }

    .t2-mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--t2-card-bg);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--t2-glass-border);
        padding: 1rem 2rem;
        flex-direction: column;
        gap: 1rem;
    }

    .t2-mobile-menu.active {
        display: flex;
    }
</style>

<header class="t2-header">
    <nav class="t2-nav-container">
        <a href="#hero" class="t2-brand">
            {{ substr($user->name ?? 'Portfolio', 0, 2) }}<span>.</span>
        </a>

        <ul class="t2-nav-links">
            <li><a href="{{ $baseUrl }}#about" class="t2-nav-link">About</a></li>
            <li><a href="{{ $baseUrl }}#projects" class="t2-nav-link">Projects</a></li>
            <li><a href="{{ $baseUrl }}#skills" class="t2-nav-link">Skills</a></li>
            <li><a href="{{ $baseUrl }}#experience" class="t2-nav-link">Experience</a></li>
            <li><a href="{{ $baseUrl }}#education" class="t2-nav-link">Education</a></li>
            @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
                <li><a href="{{ $baseUrl }}#blog" class="t2-nav-link">Blog</a></li>
            @endif
            <li><a href="{{ $baseUrl }}#contact" class="t2-nav-link">Contact</a></li>
            
            <li>
                <button id="theme-toggle" class="t2-theme-btn theme-toggle-btn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="theme-label">Dark</span>
                </button>
            </li>
        </ul>

        <button id="mobile-menu-btn" class="t2-mobile-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
    </nav>

    <div id="mobile-menu" class="t2-mobile-menu">
        <a href="#about" class="t2-nav-link mobile-menu-link">About</a>
        <a href="#projects" class="t2-nav-link mobile-menu-link">Projects</a>
        <a href="#skills" class="t2-nav-link mobile-menu-link">Skills</a>
        <a href="#experience" class="t2-nav-link mobile-menu-link">Experience</a>
        <a href="#education" class="t2-nav-link mobile-menu-link">Education</a>
        @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
            <a href="#blog" class="t2-nav-link mobile-menu-link">Blog</a>
        @endif
        <a href="#contact" class="t2-nav-link mobile-menu-link">Contact</a>
        
        <button class="t2-theme-btn theme-toggle-btn w-full justify-center">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"></svg>
            <span class="theme-label">Dark</span>
        </button>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
        document.getElementById('mobile-menu')?.classList.toggle('active');
    });
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        link.addEventListener('click', function () {
            document.getElementById('mobile-menu')?.classList.remove('active');
        });
    });
</script>