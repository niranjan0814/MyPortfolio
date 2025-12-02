@props(['user' => null, 'blogPosts' => null])

@php
    $currentSlug = $user?->slug ?? \App\Models\User::whereNotNull('slug')->value('slug') ?? '';
    $baseUrl = $currentSlug ? route('portfolio.show', $currentSlug) : '/';
@endphp

<style>
    /* Theme 3 Variables - Matching Hero/About Colors */
    :root {
        --t3-bg: #ffffff;
        --t3-text: #1a1a1a;
        --t3-text-muted: #666666;
        --t3-primary: #00cc7a; /* Green - matching hero */
        --t3-primary-hover: #00b36a;
        --t3-border: #e5e7eb;
        --t3-surface: #f3f4f6;
        --t3-nav-bg: rgba(255, 255, 255, 0.9);
        --t3-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    [data-theme="dark"] {
        --t3-bg: #0f172a;
        --t3-text: #f8fafc;
        --t3-text-muted: #94a3b8;
        --t3-primary: #00ff9d; /* Bright green - matching hero */
        --t3-primary-hover: #00e68a;
        --t3-border: #1e293b;
        --t3-surface: #1e293b;
        --t3-nav-bg: rgba(15, 23, 42, 0.9);
        --t3-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.5);
    }

    .t3-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background: var(--t3-nav-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--t3-border);
        transition: all 0.3s ease;
    }

    .t3-nav-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        height: 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .t3-brand {
        font-weight: 800;
        font-size: 1.75rem;
        text-decoration: none;
        color: var(--t3-text);
        letter-spacing: -0.05em;
    }

    .t3-brand span {
        color: var(--t3-primary);
    }

    .t3-nav-links {
        display: none;
        gap: 2rem;
        list-style: none;
        margin: 0;
        padding: 0;
        align-items: center;
    }

    @media (min-width: 768px) {
        .t3-nav-links {
            display: flex;
        }
    }

    .t3-nav-link {
        text-decoration: none;
        color: var(--t3-text-muted);
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.2s ease;
        position: relative;
    }

    .t3-nav-link:hover {
        color: var(--t3-primary);
    }

    .t3-nav-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--t3-primary);
        transition: width 0.3s ease;
    }

    .t3-nav-link:hover::after {
        width: 100%;
    }

    /* Theme Toggle Button */
    .t3-theme-btn {
        background: transparent;
        border: 1px solid var(--t3-border);
        color: var(--t3-text);
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .t3-theme-btn:hover {
        background: var(--t3-surface);
        border-color: var(--t3-primary);
        color: var(--t3-primary);
    }

    /* Mobile Menu */
    .t3-mobile-btn {
        display: block;
        background: none;
        border: none;
        color: var(--t3-text);
        cursor: pointer;
        padding: 0.5rem;
    }

    @media (min-width: 768px) {
        .t3-mobile-btn {
            display: none;
        }
    }

    .t3-mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--t3-nav-bg);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--t3-border);
        padding: 1.5rem 2rem;
        flex-direction: column;
        gap: 1.5rem;
        box-shadow: var(--t3-shadow);
    }

    .t3-mobile-menu.active {
        display: flex;
        animation: t3SlideDown 0.3s ease-out forwards;
    }

    @keyframes t3SlideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .t3-mobile-link {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--t3-text);
        text-decoration: none;
        display: block;
        padding: 0.5rem 0;
    }
</style>

<header class="t3-header">
    <nav class="t3-nav-container">
        <a href="#hero" class="t3-brand">
            {{ $user->name ?? 'Portfolio' }}<span>.</span>
        </a>

        <ul class="t3-nav-links">
            <li><a href="{{ $baseUrl }}#about" class="t3-nav-link">About</a></li>
            <li><a href="{{ $baseUrl }}#projects" class="t3-nav-link">Projects</a></li>
            <li><a href="{{ $baseUrl }}#skills" class="t3-nav-link">Skills</a></li>
            <li><a href="{{ $baseUrl }}#experience" class="t3-nav-link">Experience</a></li>
            <li><a href="{{ $baseUrl }}#education" class="t3-nav-link">Education</a></li>
            @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
                <li><a href="{{ $baseUrl }}#blog" class="t3-nav-link">Blog</a></li>
            @endif
            <li><a href="{{ $baseUrl }}#contact" class="t3-nav-link">Contact</a></li>
            
            <!-- Theme Toggle -->
            <li>
                <button id="theme-toggle" class="t3-theme-btn theme-toggle-btn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="theme-label">Dark</span>
                </button>
            </li>
        </ul>

        <!-- Mobile Menu Button -->
        <button id="t3-mobile-menu-btn" class="t3-mobile-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="t3-mobile-menu" class="t3-mobile-menu">
        <a href="#about" class="t3-mobile-link mobile-menu-link">About</a>
        <a href="#projects" class="t3-mobile-link mobile-menu-link">Projects</a>
        <a href="#skills" class="t3-mobile-link mobile-menu-link">Skills</a>
        <a href="#experience" class="t3-mobile-link mobile-menu-link">Experience</a>
        <a href="#education" class="t3-mobile-link mobile-menu-link">Education</a>
        @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
            <a href="#blog" class="t3-mobile-link mobile-menu-link">Blog</a>
        @endif
        <a href="#contact" class="t3-mobile-link mobile-menu-link">Contact</a>
        
        <button class="t3-theme-btn theme-toggle-btn w-full justify-center">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"></svg>
            <span class="theme-label">Dark</span>
        </button>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileBtn = document.getElementById('t3-mobile-menu-btn');
        const mobileMenu = document.getElementById('t3-mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-menu-link');

        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('active');
            });
        }

        mobileLinks.forEach(link => {
            link.addEventListener('click', function () {
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                }
            });
        });
    });
</script>
