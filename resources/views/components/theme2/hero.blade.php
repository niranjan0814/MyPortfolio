{{-- resources/views/components/theme2/hero.blade.php --}}
@props(['heroContent', 'user', 'techStackSkills'])

<style>
    /* ============================================
       PREMIUM HERO COMPONENT - DUAL THEME
       Wix-Inspired: Bold, Minimalist, Modern
       ============================================ */
    
    :root {
        /* Light Theme Palette */
        --hero-bg: #F8F9FA;              /* Soft Cream/Off-White */
        --hero-text-main: #2C2E3E;       /* Dark Charcoal */
        --hero-text-sub: #6B7280;        /* Medium Gray */
        --hero-accent: #E89B0C;          /* Deep Mustard/Amber */
        --hero-accent-hover: #D97706;
        --hero-blue: #3D5CCC;            /* Rich Blue */
        --hero-coral: #E85555;           /* Deep Coral */
        --hero-surface: #FFFFFF;
        --hero-border: rgba(44, 46, 62, 0.08);
        --hero-shadow: 0 20px 60px rgba(233, 155, 12, 0.12);
        --hero-gradient: linear-gradient(135deg, #E89B0C 0%, #D97706 100%);
        --hero-card-bg: #FFFFFF;
        --hero-glass-border: rgba(44, 46, 62, 0.05);
        --hero-blob-opacity: 0.15;
    }

    [data-theme="dark"] {
        /* Dark Theme Palette */
        --hero-bg: #2C2E3E;              /* Dark Navy/Charcoal */
        --hero-text-main: #FFFFFF;       /* White */
        --hero-text-sub: #E5E7EB;        /* Light Gray */
        --hero-accent: #F5A623;          /* Mustard Yellow */
        --hero-accent-hover: #E09612;
        --hero-blue: #4C6FFF;            /* Bright Blue */
        --hero-coral: #FF6B6B;           /* Coral/Red */
        --hero-surface: rgba(255, 255, 255, 0.05);
        --hero-border: rgba(255, 255, 255, 0.1);
        --hero-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        --hero-gradient: linear-gradient(135deg, #F5A623 0%, #D97706 100%);
        --hero-card-bg: rgba(255, 255, 255, 0.03);
        --hero-glass-border: rgba(255, 255, 255, 0.1);
        --hero-blob-opacity: 0.25;
    }

    /* Base Layout */
    .hero-section {
        background-color: var(--hero-bg);
        color: var(--hero-text-main);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 6rem 0;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    /* Animated Background Orbs */
    .hero-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: var(--hero-blob-opacity);
        animation: float 20s infinite ease-in-out;
        pointer-events: none;
        transition: opacity 0.5s ease;
    }

    .hero-orb-1 {
        width: 600px;
        height: 600px;
        background: var(--hero-gradient);
        top: -200px;
        right: -200px;
        animation-delay: 0s;
    }

    .hero-orb-2 {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, var(--hero-blue) 0%, transparent 70%);
        bottom: -150px;
        left: -150px;
        animation-delay: 7s;
    }

    .hero-orb-3 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--hero-coral) 0%, transparent 70%);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation-delay: 14s;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(30px, -30px) rotate(120deg); }
        66% { transform: translate(-20px, 20px) rotate(240deg); }
    }

    /* Content Container */
    .hero-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 4rem;
        align-items: center;
    }

    /* Left Content */
    .hero-content-left {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* Badge */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 1.25rem;
        background: var(--hero-surface);
        border: 1px solid var(--hero-border);
        border-radius: 100px;
        width: fit-content;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .hero-badge-dot {
        width: 8px;
        height: 8px;
        background-color: var(--hero-accent);
        border-radius: 50%;
        box-shadow: 0 0 10px var(--hero-accent);
        animation: pulse 2s infinite;
    }

    .hero-badge-text {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--hero-text-sub);
        letter-spacing: 0.02em;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.9); }
    }

    /* Typography */
    .hero-greeting {
        font-size: 1.5rem;
        color: var(--hero-text-sub);
        font-weight: 500;
        margin-bottom: -1rem;
    }

    .hero-title {
        font-size: 4.5rem;
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -0.02em;
        margin: 0;
        color: var(--hero-text-main);
    }

    .hero-title-highlight {
        color: var(--hero-accent);
        position: relative;
        display: inline-block;
    }
    
    /* Typing Animation */
    .hero-typing-wrapper {
        font-size: 2rem;
        font-weight: 600;
        color: var(--hero-text-sub);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        min-height: 3rem;
    }

    .hero-typing-text {
        color: var(--hero-accent);
        font-weight: 700;
        position: relative;
    }

    .hero-cursor {
        display: inline-block;
        width: 3px;
        height: 2.2rem;
        background-color: var(--hero-accent);
        margin-left: 4px;
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    /* Description */
    .hero-description {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--hero-text-sub);
        max-width: 90%;
    }

    /* Buttons */
    .hero-actions {
        display: flex;
        gap: 1.5rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .hero-btn {
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .hero-btn-primary {
        background: var(--hero-gradient);
        color: white;
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.25);
        border: 1px solid transparent;
    }

    .hero-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(233, 155, 12, 0.4);
    }

    .hero-btn-secondary {
        background: var(--hero-surface);
        color: var(--hero-text-main);
        border: 2px solid var(--hero-border);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .hero-btn-secondary:hover {
        border-color: var(--hero-text-main);
        background: var(--hero-text-main);
        color: var(--hero-bg); /* Invert colors on hover */
        transform: translateY(-2px);
    }

    /* Social Links */
    .hero-social {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .hero-social-link {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--hero-surface);
        border: 1px solid var(--hero-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--hero-text-sub);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .hero-social-link:hover {
        background: var(--hero-surface);
        color: var(--hero-accent);
        border-color: var(--hero-accent);
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .hero-social-link svg {
        width: 22px;
        height: 22px;
        fill: currentColor;
    }

    /* Right Content - Glass Card */
    .hero-content-right {
        position: relative;
        animation: slideInRight 1s ease-out 0.2s backwards;
    }

    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .hero-card {
        background: var(--hero-card-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--hero-glass-border);
        border-radius: 24px;
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--hero-shadow);
        transition: all 0.5s ease;
    }

    .hero-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--hero-gradient);
    }

    .hero-card-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
        position: relative;
        z-index: 1;
    }

    .hero-avatar-wrapper {
        position: relative;
    }

    .hero-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--hero-accent);
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.2);
    }

    .hero-avatar-placeholder {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--hero-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
        color: white;
        border: 4px solid var(--hero-accent);
        box-shadow: 0 8px 24px rgba(233, 155, 12, 0.2);
    }

    .hero-card-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--hero-text-main);
        margin: 0 0 0.25rem 0;
    }

    .hero-card-info p {
        color: var(--hero-text-sub);
        font-size: 0.9rem;
        margin: 0;
        font-weight: 500;
    }

    /* Tech Stack Grid */
    .hero-tech-section {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid var(--hero-border);
        position: relative;
        z-index: 1;
    }

    .hero-tech-title {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--hero-text-sub);
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .hero-tech-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .hero-tech-item {
        aspect-ratio: 1;
        background: var(--hero-surface);
        border: 1px solid var(--hero-border);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .hero-tech-item:hover {
        background: var(--hero-surface);
        border-color: var(--hero-accent);
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .hero-tech-item img {
        width: 36px;
        height: 36px;
        object-fit: contain;
        transition: all 0.3s ease;
    }

    .hero-tech-item:hover img {
        transform: scale(1.1);
    }

    /* Image Container Styles */
    .hero-image-container {
        position: relative;
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-main-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 24px;
        box-shadow: var(--hero-shadow);
        border: 1px solid var(--hero-glass-border);
        transition: transform 0.5s ease;
    }

    .hero-main-image:hover {
        transform: scale(1.02);
    }

    .hero-avatar-placeholder.large {
        width: 100%;
        height: 100%;
        border-radius: 24px;
        font-size: 8rem;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 3rem;
        }

        .hero-content-left {
            align-items: center;
        }

        .hero-actions {
            justify-content: center;
        }

        .hero-social {
            justify-content: center;
        }

        .hero-title {
            font-size: 3.5rem;
        }

        .hero-content-right {
            max-width: 500px;
            margin: 0 auto;
            width: 100%;
        }
        
        .hero-card-header {
            justify-content: center;
            text-align: left;
        }
    }

    @media (max-width: 640px) {
        .hero-container {
            display: flex;
            flex-direction: column;
        }

        .hero-content-left {
            order: 1;
            width: 100%;
        }

        .hero-content-right {
            order: 2;
            width: 100%;
            max-width: 350px;
            margin: 2rem auto 0;
        }

        .hero-greeting {
            order: 1;
        }

        .hero-title {
            font-size: 2.5rem;
            order: 2;
        }

        .hero-typing-wrapper {
            font-size: 1.25rem;
            flex-direction: column;
            gap: 0;
            order: 3;
        }

        /* Hide description on mobile to reduce overwhelming content */
        .hero-description {
            display: none;
        }

        .hero-actions {
            flex-direction: column;
            width: 100%;
            order: 5;
            margin-top: 2rem;
        }

        .hero-btn {
            width: 100%;
            justify-content: center;
        }
        
        .hero-tech-grid {
            gap: 0.75rem;
        }

        .hero-social {
            order: 6;
        }

        .hero-image-container {
            max-width: 350px;
        }
    }
</style>

<section class="hero-section">
    <!-- Background Glows -->
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-orb hero-orb-3"></div>

    <div class="hero-container">
        <!-- Left Column -->
        <div class="hero-content-left">
            
            <br>
            <!-- Greeting -->
            <div class="hero-greeting">
                {{ $heroContent['greeting'] ?? "Hi, I'm" }}
            </div>

            <!-- Main Title -->
            <h1 class="hero-title">
                {{ $heroContent['user_name'] ?? $user->full_name ?? $user->name }}
            </h1>

            <!-- Typing Animation -->
            <div class="hero-typing-wrapper">
                
                <span class="hero-typing-text">
                    <span id="typingContent"></span><span class="hero-cursor"></span>
                </span>
            </div>

            <!-- Description -->
            <div class="hero-description">
                {!! $heroContent['description'] ?? "I build exceptional digital experiences that are fast, accessible, visually appealing, and responsive. Let's turn your vision into reality." !!}
            </div>

            <!-- CTA Buttons -->
            @if(($heroContent['btn_contact_enabled'] ?? true) || ($heroContent['btn_projects_enabled'] ?? true))
            <div class="hero-actions ">
                @if($heroContent['btn_contact_enabled'] ?? true)
                <a href="#contact" class="hero-btn hero-btn-primary">
                    {{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </a>
                @endif

                @if($heroContent['btn_projects_enabled'] ?? true)
                <a href="#projects" class="hero-btn hero-btn-secondary">
                    {{ $heroContent['btn_projects_text'] ?? 'View Projects' }}
                </a>
                @endif
            </div>
            @endif

            <!-- Social Links -->
            @if(!empty($heroContent['social_links']))
            <div class="hero-social">
                @foreach($heroContent['social_links'] as $link)
                <a href="{{ $link['url'] }}" target="_blank" class="hero-social-link" title="{{ $link['name'] }}">
                    @if(!empty($link['icon']))
                    <img src="{{ $link['icon'] }}" alt="{{ $link['name'] }}" style="width: 20px; height: 20px;">
                    @else
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                    </svg>
                    @endif
                </a>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Right Column (Image Only) -->
<div class="hero-content-right">
    <div class="hero-image-container">

        @php
            // Theme2: use cleaned image
            $imageToShow = $finalProfileImage ?? ($user->profile_image ?? null);
        @endphp

        @if(!empty($imageToShow))
            <img src="{{ $imageToShow }}" 
                 alt="{{ $user->full_name ?? $user->name }}" 
                 class="hero-main-image">
        @else
            <div class="hero-avatar-placeholder large">
                {{ strtoupper(substr($user->full_name ?? $user->name, 0, 1)) }}
            </div>
        @endif

    </div>
</div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile and Tablet image repositioning
        function repositionImageOnMobile() {
            const isMobileOrTablet = window.innerWidth <= 1024;
            const imageContainer = document.querySelector('.hero-content-right');
            const typingWrapper = document.querySelector('.hero-typing-wrapper');
            const heroActions = document.querySelector('.hero-actions');
            
            if (isMobileOrTablet && imageContainer && typingWrapper) {
                // Insert image after typing animation
                typingWrapper.parentNode.insertBefore(imageContainer, heroActions);
            } else if (!isMobileOrTablet && imageContainer) {
                // Move it back to original position (after hero-content-left)
                const heroContainer = document.querySelector('.hero-container');
                const heroContentLeft = document.querySelector('.hero-content-left');
                if (heroContainer && heroContentLeft && !heroContentLeft.nextElementSibling?.classList.contains('hero-content-right')) {
                    heroContainer.appendChild(imageContainer);
                }
            }
        }

        // Run on load
        repositionImageOnMobile();

        // Run on resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(repositionImageOnMobile, 250);
        });

        // Typing animation
        const typingTexts = @json($heroContent['typing_texts'] ?? [['text' => 'Developer'], ['text' => 'Designer'], ['text' => 'Freelancer']]);
        const typingElement = document.getElementById('typingContent');
        
        if (!typingElement || typingTexts.length === 0) return;

        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let isPaused = false;

        function type() {
            const currentItem = typingTexts[textIndex];
            const currentText = typeof currentItem === 'string' ? currentItem : (currentItem.text || '');
            
            if (!isDeleting && charIndex < currentText.length) {
                typingElement.textContent += currentText.charAt(charIndex);
                charIndex++;
                setTimeout(type, 100);
            } else if (isDeleting && charIndex > 0) {
                typingElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
                setTimeout(type, 50);
            } else if (!isDeleting && charIndex === currentText.length) {
                isPaused = true;
                setTimeout(() => {
                    isPaused = false;
                    isDeleting = true;
                    type();
                }, 2000);
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % typingTexts.length;
                setTimeout(type, 500);
            }
        }

        type();
    });
</script>
