@props(['user' => null, 'blogPosts' => null])

@php
    // Super safe fallback — if no $user, use the first user with a slug (or empty string)
    $currentSlug = $user?->slug ?? \App\Models\User::whereNotNull('slug')->value('slug') ?? '';
    $baseUrl = $currentSlug ? route('portfolio.show', $currentSlug) : '/';
@endphp

<style>
    /* Theme 1 Header Internal Styles */
    .t1-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background: var(--surface-card);
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border-bottom: 1px solid var(--border-color);
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
    }

    .t1-nav-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 1rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .t1-brand {
        font-size: 1.75rem;
        font-weight: 800;
        text-decoration: none;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
        letter-spacing: -0.025em;
    }

    .t1-nav-links {
        display: none;
        gap: 2rem;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    @media (min-width: 768px) {
        .t1-nav-links {
            display: flex;
        }
    }

    .t1-nav-link {
        color: var(--text-secondary);
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        position: relative;
    }

    .t1-nav-link:hover {
        color: var(--accent-primary);
        text-shadow: 0 0 10px var(--glow-color);
    }

    /* Mobile Menu Button */
    .t1-mobile-btn {
        display: block;
        background: none;
        border: none;
        color: var(--text-primary);
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0.5rem;
    }

    @media (min-width: 768px) {
        .t1-mobile-btn {
            display: none;
        }
    }

    /* Mobile Menu Dropdown */
    .t1-mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--bg-secondary);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem 2rem;
        flex-direction: column;
        gap: 1.5rem;
        box-shadow: var(--card-shadow);
    }

    .t1-mobile-menu.active {
        display: flex;
        animation: slideDown 0.3s ease-out forwards;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .t1-mobile-menu .t1-nav-link {
        font-size: 1.1rem;
        display: block;
        padding: 0.5rem 0;
    }

    /* Theme Toggle Button (Glass) */
    .t1-btn-glass {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        padding: 0.5rem 1.25rem;
        border-radius: 9999px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }

    [data-theme="light"] .t1-btn-glass {
        background: rgba(255, 255, 255, 0.6);
        color: var(--text-primary);
    }

    .t1-btn-glass:hover {
        background: var(--accent-primary);
        border-color: var(--accent-primary);
        color: white;
        box-shadow: 0 0 15px var(--btn-glow);
        transform: translateY(-2px);
    }
</style>

<header class="t1-header">
    <nav class="t1-nav-container">
        <a href="#hero" class="t1-brand">
            NS
        </a>

        <ul class="t1-nav-links">
            <li><a href="{{ $baseUrl }}#about" class="t1-nav-link">About</a></li>
            <li><a href="{{ $baseUrl }}#projects" class="t1-nav-link">Projects</a></li>
            <li><a href="{{ $baseUrl }}#skills" class="t1-nav-link">Skills</a></li>
            <li><a href="{{ $baseUrl }}#experience" class="t1-nav-link">Experience</a></li>
            <li><a href="{{ $baseUrl }}#education" class="t1-nav-link">Education</a></li>
            @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
                <li><a href="{{ $baseUrl }}#blog" class="t1-nav-link">Blog</a></li>
            @endif
            <li><a href="{{ $baseUrl }}#contact" class="t1-nav-link">Contact</a></li>
            
            <li>
                <button id="theme-toggle" class="t1-btn-glass theme-toggle-btn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="theme-label">Dark</span>
                </button>
            </li>
        </ul>

        <button id="mobile-menu-btn" class="t1-mobile-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </nav>

    <div id="mobile-menu" class="t1-mobile-menu">
        <a href="#about" class="t1-nav-link mobile-menu-link">About</a>
        <a href="#projects" class="t1-nav-link mobile-menu-link">Projects</a>
        <a href="#skills" class="t1-nav-link mobile-menu-link">Skills</a>
        <a href="#experience" class="t1-nav-link mobile-menu-link">Experience</a>
        <a href="#education" class="t1-nav-link mobile-menu-link">Education</a>
        @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
            <a href="#blog" class="t1-nav-link mobile-menu-link">Blog</a>
        @endif
        <a href="#contact" class="t1-nav-link mobile-menu-link">Contact</a>
        
        <button class="t1-btn-glass theme-toggle-btn w-full justify-center">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"></svg>
            <span class="theme-label">Dark</span>
        </button>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
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