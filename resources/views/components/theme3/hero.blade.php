@props(['heroContent', 'techStackSkills', 'user'])

<style>
    /* ============================================
       THEME 3 HERO - MODERN MINIMALIST SPLIT
       Matching About Section Color Scheme
       ============================================ */
    
    :root {
        /* Light Theme - Matching About Section */
        --t3-bg-primary: #f8fafc;
        --t3-bg-secondary: #ffffff;
        --t3-text-primary: #1a202c;
        --t3-text-secondary: #4a5568;
        --t3-accent: #00cc7a;
        --t3-accent-secondary: #0099cc;
        --t3-accent-hover: #00b36a;
        --t3-accent-light: rgba(0, 204, 122, 0.1);
        --t3-border: rgba(0, 204, 122, 0.3);
        --t3-surface: #ffffff;
        --t3-shadow: 0 10px 40px rgba(0, 204, 122, 0.15);
        --t3-gradient: linear-gradient(135deg, #00cc7a 0%, #0099cc 100%);
        --t3-glow: rgba(0, 204, 122, 0.15);
    }

    [data-theme="dark"] {
        /* Dark Theme - Matching About Section */
        --t3-bg-primary: #0a0a12;
        --t3-bg-secondary: #151522;
        --t3-text-primary: #ffffff;
        --t3-text-secondary: #b4c6e0;
        --t3-accent: #00ff9d;
        --t3-accent-secondary: #00d4ff;
        --t3-accent-hover: #00e68a;
        --t3-accent-light: rgba(0, 255, 157, 0.1);
        --t3-border: rgba(0, 255, 157, 0.2);
        --t3-surface: #151522;
        --t3-shadow: 0 10px 40px rgba(0, 255, 157, 0.3);
        --t3-gradient: linear-gradient(135deg, #00ff9d 0%, #00d4ff 100%);
        --t3-glow: rgba(0, 255, 157, 0.3);
    }

    /* Hero Section */
    .t3-hero {
        min-height: 100vh;
        background: var(--t3-bg-primary);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 8rem 0 4rem;
        transition: background 0.3s ease;
    }

    /* Geometric Background Elements */
    .t3-hero-bg {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .t3-geometric-shape {
        position: absolute;
        opacity: 0.05;
        transition: opacity 0.3s ease;
    }

    [data-theme="dark"] .t3-geometric-shape {
        opacity: 0.08;
    }

    .t3-shape-1 {
        top: 10%;
        right: 5%;
        width: 400px;
        height: 400px;
        background: var(--t3-gradient);
        border-radius: 50%;
        filter: blur(100px);
    }

    .t3-shape-2 {
        bottom: 10%;
        left: 5%;
        width: 300px;
        height: 300px;
        background: var(--t3-accent);
        clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        filter: blur(80px);
    }

    .t3-grid-pattern {
        display: none; /* Removed grid pattern */
    }

    /* Container */
    .t3-hero-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
        width: 100%;
        box-sizing: border-box;
    }

    /* Split Layout */
    .t3-hero-split {
        display: grid;
        grid-template-columns: 0.6fr 1.4fr;
        gap: 6rem;
        align-items: center;
    }

    /* Left Content */
    .t3-hero-left {
        animation: t3SlideInLeft 0.8s ease-out;
    }

    @keyframes t3SlideInLeft {
        from { opacity: 0; transform: translateX(-40px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* Status Badge */
    .t3-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.625rem 1.25rem;
        background: var(--t3-accent-light);
        border-radius: 100px;
        margin-bottom: 2rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t3-accent);
        backdrop-filter: blur(10px);
    }

    .t3-status-dot {
        width: 8px;
        height: 8px;
        background: var(--t3-accent);
        border-radius: 50%;
        animation: t3Pulse 2s ease-in-out infinite;
    }

    @keyframes t3Pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    /* Typography */
    .t3-hero-greeting {
        font-size: 1.5rem;
        color: var(--t3-text-secondary);
        font-weight: 500;
        margin-bottom: 0.5rem;
        letter-spacing: 0.02em;
    }

    .t3-hero-title {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 800;
        line-height: 1.1;
        color: var(--t3-text-primary);
        margin-bottom: 2rem;
        letter-spacing: -0.03em;
    }

    .t3-hero-title-accent {
        background: var(--t3-gradient);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        position: relative;
        display: inline-block;
    }

    /* Role Animation - Fade In Slide */
    .t3-role-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 2.5rem;
        min-height: 3rem;
    }

    .t3-role-prefix {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--t3-text-secondary);
    }

    .t3-role-text {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--t3-accent);
        position: relative;
        animation: t3FadeSlide 3s ease-in-out infinite;
    }

    @keyframes t3FadeSlide {
        0%, 100% { 
            opacity: 0;
            transform: translateY(10px);
        }
        10%, 90% { 
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Description */
    .t3-hero-description {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--t3-text-secondary);
        margin-bottom: 2.5rem;
        max-width: 90%;
    }

    /* Tech Stack Grid - 3 Columns */
    .t3-tech-vertical {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2.5rem;
    }

    .t3-tech-label {
        font-size: 0.875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--t3-text-secondary);
        margin-bottom: 0.75rem;
    }

    .t3-tech-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.875rem;
    }

    .t3-tech-vertical-item {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        background: var(--t3-accent-light);
        border: 1px solid var(--t3-border);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .t3-tech-vertical-item:hover {
        background: rgba(0, 255, 157, 0.15);
        border-color: var(--t3-accent);
        transform: translateY(-3px);
    }

    [data-theme="light"] .t3-tech-vertical-item:hover {
        background: rgba(0, 204, 122, 0.15);
    }

    .t3-tech-vertical-item img {
        width: 28px;
        height: 28px;
        object-fit: contain;
        flex-shrink: 0;
    }

    .t3-tech-vertical-item span {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--t3-text-primary);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .t3-tech-fallback-icon {
        width: 28px;
        height: 28px;
        background: var(--t3-gradient);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .t3-tech-more {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 1.25rem;
        background: transparent;
        border: 1px dashed var(--t3-border);
        border-radius: 12px;
        color: var(--t3-accent);
        text-decoration: none;
        font-weight: 600;
        font-size: 1.25rem;
        transition: all 0.3s ease;
    }

    .t3-tech-more:hover {
        background: var(--t3-accent-light);
        border-color: var(--t3-accent);
        border-style: solid;
        transform: translateY(-3px);
    }

    /* Action Buttons */
    .t3-hero-actions {
        display: flex;
        gap: 1.25rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .t3-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .t3-btn-primary {
        background: var(--t3-gradient);
        color: white;
        border: none;
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.3);
    }

    .t3-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
    }

    .t3-btn-secondary {
        background: transparent;
        color: var(--t3-text-primary);
        border: 2px solid var(--t3-border);
    }

    .t3-btn-secondary:hover {
        background: var(--t3-surface);
        border-color: var(--t3-accent);
        color: var(--t3-accent);
        transform: translateY(-2px);
    }

    .t3-btn svg {
        width: 18px;
        height: 18px;
    }

    /* Social Links */
    .t3-social-links {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .t3-social-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--t3-text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .t3-social-icons {
        display: flex;
        gap: 0.75rem;
    }

    .t3-social-link {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: var(--t3-surface);
        border: 1px solid var(--t3-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t3-text-secondary);
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .t3-social-link:hover {
        background: var(--t3-accent);
        border-color: var(--t3-accent);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
    }

    .t3-social-link svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
    }

    /* Right Content - Image Card */
    .t3-hero-right {
        position: relative;
        animation: t3SlideInRight 0.8s ease-out 0.2s backwards;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    @keyframes t3SlideInRight {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .t3-image-card {
        position: relative;
        width: 100%;
    }

    .t3-image-card::before {
        display: none; /* Remove gradient bar */
    }

    .t3-image-wrapper {
        position: relative;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        aspect-ratio: 1;
        border-radius: 24px;
        overflow: hidden;
        background: var(--t3-bg-secondary);
        box-shadow: var(--t3-shadow);
        border: 3px solid var(--t3-border);
    }

    .t3-profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .t3-image-wrapper:hover .t3-profile-image {
        transform: scale(1.05);
    }

    .t3-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--t3-gradient);
        font-size: 5rem;
        font-weight: 800;
        color: white;
    }

    /* Action Buttons Under Image */
    .t3-actions-bottom {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .t3-btn {
        padding: 1rem 1.75rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .t3-btn-primary {
        background: var(--t3-gradient);
        color: white;
        border: none;
        box-shadow: 0 4px 20px var(--t3-glow);
    }

    .t3-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px var(--t3-glow);
    }

    .t3-btn-secondary {
        background: transparent;
        color: var(--t3-text-primary);
        border: 2px solid var(--t3-border);
    }

    .t3-btn-secondary:hover {
        background: var(--t3-accent-light);
        border-color: var(--t3-accent);
        color: var(--t3-accent);
        transform: translateY(-2px);
    }

    .t3-btn svg {
        width: 18px;
        height: 18px;
    }

    /* Social Links Under Buttons */
    .t3-social-bottom {
        display: flex;
        gap: 1rem;
        justify-content: center;
        padding-top: 0.5rem;
    }

    .t3-social-link {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--t3-surface);
        border: 1px solid var(--t3-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--t3-text-secondary);
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .t3-social-link:hover {
        background: var(--t3-accent);
        border-color: var(--t3-accent);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px var(--t3-glow);
    }

    .t3-social-link svg {
        width: 22px;
        height: 22px;
        fill: currentColor;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .t3-hero-split {
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        .t3-hero-left {
            text-align: center;
        }

        /* Mobile order: name/typing (order: 1), image (order: 2), tech stack (order: 3) */
        .t3-hero-title-wrapper {
            order: 1;
        }

        .t3-hero-right {
            order: 2;
            max-width: 500px;
            margin: 0 auto;
        }

        .t3-tech-vertical {
            order: 3;
        }

        .t3-hero-description {
            max-width: 100%;
        }

        .t3-hero-actions {
            justify-content: center;
        }

        .t3-social-links {
            justify-content: center;
        }
    }

    @media (max-width: 640px) {
        .t3-hero {
            padding: 8rem 0 2rem; /* Increased top padding to prevent header overlap */
            min-height: auto;
        }

        .t3-hero-container {
            padding: 0 1rem;
        }

        .t3-hero-split {
            gap: 1.5rem;
        }

        /* Ensure proper mobile ordering */
        .t3-hero-title-wrapper {
            order: 1;
            margin-top: 3rem; /* Push name down from header */
        }

        .t3-hero-right {
            order: 2;
            max-width: 100%;
            width: 100%;
            display: block;
        }

        .t3-tech-vertical {
            order: 3;
        }

        .t3-status-badge {
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
            margin-bottom: 1.5rem;
        }

        .t3-hero-greeting {
            font-size: 1.125rem;
            margin-bottom: 0.375rem;
        }

        .t3-hero-title {
            font-size: clamp(2rem, 8vw, 3rem);
            margin-bottom: 1rem;
        }

        .t3-role-container {
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            min-height: auto;
        }

        .t3-role-prefix,
        .t3-role-text {
            font-size: 1.25rem;
        }

        .t3-hero-description {
            font-size: 1rem;
            margin-bottom: 2rem;
            padding: 0 0.5rem;
        }

        .t3-tech-vertical {
            display: none; /* Hide tech stack on mobile */
        }

        .t3-tech-label {
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .t3-tech-list {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.625rem;
        }

        .t3-tech-vertical-item {
            padding: 0.75rem 0.875rem;
            gap: 0.5rem;
        }

        .t3-tech-vertical-item img {
            width: 24px;
            height: 24px;
        }

        .t3-tech-vertical-item span {
            font-size: 0.8125rem;
        }

        .t3-tech-fallback-icon {
            width: 24px;
            height: 24px;
            font-size: 0.625rem;
        }

        .t3-hero-actions {
            flex-direction: column;
            width: 100%;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .t3-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
            font-size: 0.9375rem;
        }

        .t3-social-links {
            flex-direction: row;
            justify-content: center;
            gap: 0.75rem;
        }

        .t3-social-link {
            width: 44px;
            height: 44px;
        }

        .t3-social-link svg {
            width: 20px;
            height: 20px;
        }

        .t3-image-wrapper {
            max-width: 100%;
            margin-bottom: 1rem;
        }

        .t3-actions-bottom {
            gap: 0.75rem;
        }

        .t3-social-bottom {
            gap: 0.75rem;
        }

        /* Adjust background shapes for mobile */
        .t3-shape-1 {
            width: 250px;
            height: 250px;
            top: 5%;
            right: -10%;
        }

        .t3-shape-2 {
            width: 200px;
            height: 200px;
            bottom: 5%;
            left: -10%;
        }
    }

    @media (max-width: 375px) {
        .t3-hero {
            padding: 3rem 0 1.5rem;
        }

        .t3-hero-container {
            padding: 0 0.75rem;
        }

        .t3-hero-title {
            font-size: 1.75rem;
        }

        .t3-tech-list {
            grid-template-columns: 1fr;
        }

        .t3-social-links {
            flex-wrap: wrap;
        }
    }
</style>

<section id="hero" class="t3-hero">
    <!-- Background Elements -->
    <div class="t3-hero-bg">
        <div class="t3-grid-pattern"></div>
        <div class="t3-geometric-shape t3-shape-1"></div>
        <div class="t3-geometric-shape t3-shape-2"></div>
    </div>

    <div class="t3-hero-container">
        <div class="t3-hero-split">
            <!-- Right Content - Image Card (Now on Left) -->
            <div class="t3-hero-right">
                <div class="t3-image-card">
                    <div class="t3-image-wrapper">
                        @php
                            $imageToShow = $user->clean_profile_image ?? $user->profile_image ?? null;
                        @endphp

                        @if(!empty($imageToShow))
                            <img src="{{ $imageToShow }}" 
                                 alt="{{ $user->full_name ?? $user->name }}" 
                                 class="t3-profile-image">
                        @else
                            <div class="t3-image-placeholder">
                                {{ strtoupper(substr($user->full_name ?? $user->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons Under Image -->
                <div class="t3-actions-bottom">
                    @if($heroContent['btn_projects_enabled'] ?? true)
                    <a href="#projects" class="t3-btn t3-btn-primary">
                        {{ $heroContent['btn_projects_text'] ?? 'View My Work' }}
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    @endif

                    @if($heroContent['btn_contact_enabled'] ?? true)
                    <a href="#contact" class="t3-btn t3-btn-secondary">
                        {{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                    @endif
                </div>

                <!-- Social Links Under Buttons -->
                @php
                    $socialLinks = $heroContent['social_links'] ?? [];
                    if (empty($socialLinks)) {
                        if (!empty($user->github_url)) $socialLinks['github'] = $user->github_url;
                        if (!empty($user->linkedin_url)) $socialLinks['linkedin'] = $user->linkedin_url;
                    }
                @endphp

                @if(!empty($socialLinks))
                <div class="t3-social-bottom">
                    @foreach($socialLinks as $key => $value)
                        @php
                            $url = is_array($value) ? ($value['url'] ?? null) : $value;
                            $platform = is_array($value) ? ($value['platform'] ?? $value['name'] ?? $key) : $key;
                            $platformLower = strtolower($platform);
                            
                            if (is_numeric($key) && ($platform === $key || $platform === 'link')) {
                                if (str_contains($url, 'github.com')) $platformLower = 'github';
                                elseif (str_contains($url, 'linkedin.com')) $platformLower = 'linkedin';
                                elseif (str_contains($url, 'twitter.com') || str_contains($url, 'x.com')) $platformLower = 'twitter';
                            }
                        @endphp

                        @if($url && is_string($url))
                        <a href="{{ $url }}" target="_blank" class="t3-social-link" aria-label="{{ ucfirst($platform) }}">
                            @if(str_contains($platformLower, 'github'))
                                <svg viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.48 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                            @elseif(str_contains($platformLower, 'linkedin'))
                                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            @elseif(str_contains($platformLower, 'twitter') || str_contains($platformLower, 'x'))
                                <svg viewBox="0 0 24 24"><path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z"/></svg>
                            @else
                                <svg viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>
                            @endif
                        </a>
                        @endif
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Left Content (Now on Right) -->
            <div class="t3-hero-left">
                
                <!-- Title and Typing Animation Wrapper (for mobile ordering) -->
                <div class="t3-hero-title-wrapper">
                    <!-- Main Title -->
                    <h1 class="t3-hero-title">
                        <span class="t3-hero-title-accent">{{ $heroContent['user_name'] ?? $user->full_name ?? $user->name }}</span>
                    </h1>

                    <!-- Role Animation -->
                    @if(!empty($heroContent['typing_texts']))
                    <div class="t3-role-container">
                        <span class="t3-role-prefix">I'm a</span>
                        <span class="t3-role-text" id="t3-role-text">
                            {{ is_array($heroContent['typing_texts'][0]) ? $heroContent['typing_texts'][0]['text'] : $heroContent['typing_texts'][0] }}
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Tech Stack Grid (separate for mobile ordering) -->
                @if(($heroContent['tech_stack_enabled'] ?? true) && isset($techStackSkills) && $techStackSkills->isNotEmpty())
                <div class="t3-tech-vertical">
                    <div class="t3-tech-label">Tech Stack</div>
                    <div class="t3-tech-list">
                        @foreach($techStackSkills->take(8) as $skill)
                        <div class="t3-tech-vertical-item">
                            @if($skill->url)
                                <img src="{{ $skill->url }}" 
                                     alt="{{ $skill->name }}"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            @endif
                            <div class="{{ $skill->url ? 'hidden' : 'flex' }} t3-tech-fallback-icon">
                                {{ strtoupper(substr($skill->name, 0, 2)) }}
                            </div>
                            <span>{{ $skill->name }}</span>
                        </div>
                        @endforeach
                        
                        @if($techStackSkills->count() > 8)
                        <a href="#skills" class="t3-tech-more">
                            <span>...</span>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile image repositioning (640px and below)
        function repositionImageOnMobile() {
            const isMobile = window.innerWidth <= 640;
            const imageContainer = document.querySelector('.t3-hero-right');
            const roleContainer = document.querySelector('.t3-role-container');
            const techStack = document.querySelector('.t3-tech-vertical');
            const heroLeft = document.querySelector('.t3-hero-left');
            
            if (isMobile && imageContainer && roleContainer && techStack) {
                // Insert image after typing animation (before tech stack)
                heroLeft.insertBefore(imageContainer, techStack);
            } else if (!isMobile && imageContainer) {
                // Move it back to original position (first child of hero-split)
                const heroSplit = document.querySelector('.t3-hero-split');
                if (heroSplit && heroSplit.firstChild !== imageContainer) {
                    heroSplit.insertBefore(imageContainer, heroSplit.firstChild);
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
        const roleTexts = @json($heroContent['typing_texts'] ?? []);
        const roleElement = document.getElementById('t3-role-text');
        
        if (!roleElement || roleTexts.length === 0) return;

        let textIndex = 0;

        function changeRole() {
            textIndex = (textIndex + 1) % roleTexts.length;
            const currentItem = roleTexts[textIndex];
            const currentText = typeof currentItem === 'string' ? currentItem : (currentItem.text || '');
            roleElement.textContent = currentText;
        }

        // Change role every 3 seconds
        setInterval(changeRole, 3000);
    });
</script>
