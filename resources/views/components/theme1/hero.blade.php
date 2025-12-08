@props(['heroContent', 'techStackSkills', 'user'])

<style>
    /* ==========================================
       THEME 1: COSMIC NEON & AURORA SOFT LIGHT
       Internal Styles for Hero Component
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

    /* Base Layout */
    .t1-hero-section {
        background-color: var(--t1-bg-primary);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 6rem 0;
        font-family: 'Inter', sans-serif;
    }

    /* Background Effects */
    .t1-hero-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.4;
        z-index: 0;
        animation: t1-blob-anim 10s infinite alternate;
    }

    .t1-hero-blob-1 {
        top: -10%;
        left: 20%;
        width: 40vw;
        height: 40vw;
        background: var(--t1-accent-glow);
    }

    .t1-hero-blob-2 {
        bottom: -10%;
        right: 10%;
        width: 35vw;
        height: 35vw;
        background: rgba(240, 181, 74, 0.15);
        animation-delay: -5s;
    }

    @keyframes t1-blob-anim {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(20px, -20px) scale(1.1); }
    }

    .t1-hero-particle {
        position: absolute;
        background: var(--t1-text-primary);
        border-radius: 50%;
        opacity: 0.3;
        animation: t1-float 20s linear infinite;
    }

    @keyframes t1-float {
        0% { transform: translateY(0) rotate(0deg); }
        100% { transform: translateY(-100vh) rotate(360deg); }
    }

    /* Container */
    .t1-hero-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 10;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 100%;
        box-sizing: border-box;
    }

    /* Typography */
    .t1-hero-title {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 800;
        margin: 4rem 0 1.5rem 0;
        color: var(--t1-text-primary);
        line-height: 1.1;
        letter-spacing: -0.02em;
        text-shadow: 0 0 40px var(--t1-glow-color);
    }

    [data-theme="light"] .t1-hero-title {
        text-shadow: none;
    }

    .t1-hero-subtitle-wrapper {
        font-size: clamp(1.25rem, 3vw, 1.875rem);
        font-weight: 600;
        color: var(--t1-text-secondary);
        margin-bottom: 2rem;
        min-height: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .t1-hero-typing-text {
        background: var(--t1-gradient-primary);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* Social Links (Water Drops) */
    .t1-hero-social {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .t1-water-drop {
        position: relative;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--t1-surface-card);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid var(--t1-border-color);
        box-shadow: 0 4px 20px var(--t1-card-shadow);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: var(--t1-text-primary);
        font-size: 1.5rem;
        text-decoration: none;
    }

    .t1-water-drop:hover {
        transform: translateY(-5px) scale(1.1);
        border-color: var(--t1-accent-primary);
        box-shadow: 0 0 20px var(--t1-icon-glow);
        color: var(--t1-accent-primary);
    }
    
    .t1-water-drop svg {
        width: 24px;
        height: 24px;
        fill: currentColor;
    }

    /* Buttons */
    .t1-hero-actions {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 4rem;
    }

    .t1-btn {
        padding: 1rem 2.5rem;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 1.125rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        backdrop-filter: blur(10px);
    }

    .t1-btn-primary {
        background: var(--t1-gradient-primary);
        color: #FFFFFF;
        box-shadow: 0 0 20px var(--t1-btn-glow);
    }

    .t1-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 30px var(--t1-btn-glow);
        filter: brightness(1.1);
    }

    .t1-btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid var(--t1-border-color);
        color: var(--t1-text-primary);
    }

    [data-theme="light"] .t1-btn-secondary {
        background: rgba(255, 255, 255, 0.6);
    }

    .t1-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--t1-accent-primary);
        color: var(--t1-accent-primary);
    }

    [data-theme="light"] .t1-btn-secondary:hover {
        background: #FFFFFF;
    }

    /* Tech Stack Marquee */
    .t1-tech-stack-container {
        background: var(--t1-surface-card);
        border: 1px solid var(--t1-border-color);
        border-radius: 1.5rem;
        padding: 1.5rem 0;
        backdrop-filter: blur(10px);
        box-shadow: var(--t1-card-shadow);
        max-width: 60rem;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        overflow: hidden;
        position: relative;
    }

    .t1-tech-label {
        color: var(--t1-text-secondary);
        font-weight: 600;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        opacity: 0.8;
    }

    .t1-tech-marquee-wrapper {
        width: 100%;
        overflow: hidden;
        position: relative;
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }

    .t1-tech-marquee {
        display: flex;
        gap: 2rem;
        width: max-content;
        animation: t1-scroll 30s linear infinite;
        padding: 0 1rem;
    }

    .t1-tech-marquee:hover {
        animation-play-state: paused;
    }

    @keyframes t1-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); } /* Move 50% because we duplicate the set once */
    }

    .t1-tech-item {
        width: 4rem;
        height: 4rem;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .t1-tech-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 0 5px rgba(0,0,0,0.2));
    }

    [data-theme="dark"] .t1-tech-item img {
        filter: drop-shadow(0 0 8px var(--t1-icon-glow));
    }

    .t1-tech-item:hover {
        transform: scale(1.2);
    }

    .t1-tech-fallback {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: var(--t1-gradient-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    /* Scroll Indicator - Bottom Center (Fixed) */
    .t1-scroll-indicator {
        position: fixed;
        bottom: 0.25rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 40;
        opacity: 0.9;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .t1-scroll-indicator:hover {
        transform: translateX(-50%) translateY(-5px);
        opacity: 1;
    }

    .t1-scroll-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .t1-mouse {
        width: 26px;
        height: 42px;
        border: 2px solid var(--t1-accent-primary);
        border-radius: 20px;
        position: relative;
        box-shadow: 0 0 15px var(--t1-glow-color);
    }

    .t1-wheel {
        width: 4px;
        height: 8px;
        background: var(--t1-accent-primary);
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
        animation: t1-scroll-wheel 2s infinite;
    }

    .t1-scroll-text {
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--t1-accent-primary);
        font-weight: 600;
        margin-top: 0.25rem;
        text-shadow: 0 0 10px var(--t1-glow-color);
    }

    @keyframes t1-scroll-wheel {
        0% { opacity: 1; transform: translateX(-50%) translateY(0); }
        100% { opacity: 0; transform: translateX(-50%) translateY(15px); }
    }

    /* Mobile Responsiveness */
    @media (max-width: 640px) {
        .t1-hero-section {
            padding: 4rem 0 2rem;
            min-height: 100vh;
        }

        .t1-hero-container {
            padding: 0 1rem;
        }

        .t1-hero-title {
            font-size: clamp(2rem, 8vw, 2.5rem);
            margin: 2rem 0 1rem;
            line-height: 1.2;
            padding: 0 0.5rem;
        }

        .t1-hero-subtitle-wrapper {
            font-size: clamp(1rem, 4vw, 1.1rem);
            flex-direction: column;
            gap: 0.25rem;
            margin-bottom: 1.5rem;
            padding: 0 0.5rem;
        }

        .t1-hero-social {
            gap: 0.75rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            padding: 0 0.5rem;
        }

        .t1-water-drop {
            width: 48px;
            height: 48px;
            font-size: 1.125rem;
        }

        .t1-water-drop svg {
            width: 20px;
            height: 20px;
        }

        .t1-hero-actions {
            flex-direction: column;
            width: 100%;
            gap: 0.75rem;
            padding: 0 1rem;
            margin-bottom: 2.5rem;
        }

        .t1-btn {
            width: 100%;
            max-width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
        }

        .t1-tech-stack-container {
            padding: 1rem 0;
            border-radius: 1rem;
            margin: 0 1rem;
            max-width: calc(100% - 2rem);
        }

        .t1-tech-label {
            font-size: 0.875rem;
        }

        .t1-tech-item {
            width: 2.75rem;
            height: 2.75rem;
        }

        .t1-tech-marquee {
            gap: 1.5rem;
        }

        /* Adjust blob sizes for mobile */
        .t1-hero-blob-1 {
            width: 60vw;
            height: 60vw;
            top: -15%;
            left: 10%;
        }

        .t1-hero-blob-2 {
            width: 50vw;
            height: 50vw;
            bottom: -15%;
            right: 5%;
        }

        /* Scroll indicator adjustments */
        .t1-scroll-indicator {
            bottom: 0.5rem;
        }

        .t1-mouse {
            width: 22px;
            height: 36px;
        }

        .t1-scroll-text {
            font-size: 0.625rem;
        }
    }

    /* Extra small devices */
    @media (max-width: 375px) {
        .t1-hero-section {
            padding: 3rem 0 1.5rem;
        }

        .t1-hero-container {
            padding: 0 0.75rem;
        }

        .t1-hero-title {
            font-size: 1.75rem;
            margin: 1.5rem 0 0.75rem;
        }

        .t1-hero-subtitle-wrapper {
            font-size: 0.95rem;
            margin-bottom: 1.25rem;
        }

        .t1-hero-social {
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .t1-water-drop {
            width: 44px;
            height: 44px;
            font-size: 1rem;
        }

        .t1-water-drop svg {
            width: 18px;
            height: 18px;
        }

        .t1-btn {
            padding: 0.75rem 1.25rem;
            font-size: 0.9375rem;
        }

        .t1-tech-item {
            width: 2.5rem;
            height: 2.5rem;
        }
    }
</style>

<section id="hero" class="t1-hero-section">
    <!-- Background Elements -->
    <div class="t1-hero-blob t1-hero-blob-1"></div>
    <div class="t1-hero-blob t1-hero-blob-2"></div>
    
    <div class="absolute inset-0 z-0 pointer-events-none">
        @for($i = 0; $i < 20; $i++)
            <div class="t1-hero-particle" style="
                top: {{ rand(0, 100) }}%;
                left: {{ rand(0, 100) }}%;
                animation-delay: {{ rand(0, 5) }}s;
                animation-duration: {{ rand(10, 20) }}s;
                width: {{ rand(2, 4) }}px;
                height: {{ rand(2, 4) }}px;
            "></div>
        @endfor
    </div>

    <div class="t1-hero-container">
        <!-- Main Title -->
        <h1 class="t1-hero-title">
            {{ $heroContent['user_name'] ?? $user->full_name ?? $user->name }}
        </h1>

        <!-- Typing Animation -->
        @if(!empty($heroContent['typing_texts']))
            <div class="t1-hero-subtitle-wrapper">
                <span class="t1-hero-typing-text" id="t1-typing-text"></span>
                <span class="animate-pulse ml-1" style="color: var(--t1-accent-primary)">|</span>
            </div>
        @endif

        <!-- Social Links -->
        @php
            $socialLinks = $heroContent['social_links'] ?? [];
            // Fallback to User model links if hero content links are empty
            if (empty($socialLinks)) {
                if (!empty($user->github_url)) $socialLinks['github'] = $user->github_url;
                if (!empty($user->linkedin_url)) $socialLinks['linkedin'] = $user->linkedin_url;
            }
        @endphp

        @if(!empty($socialLinks))
            <div class="t1-hero-social">
                @foreach((array) json_decode($hero->something ?? '[]', true) as $item)
                    @php
                        $url = $value;
                        $platform = $key;
                        $icon = null;

                        if (is_array($value)) {
                            $url = $value['url'] ?? null;
                            $platform = $value['platform'] ?? $value['name'] ?? $key;
                            $icon = $value['icon'] ?? null;
                        }
                        
                        // Clean up platform name for comparison
                        $platformLower = strtolower($platform);
                        
                        // If key is numeric (indexed array), and we didn't get a good platform name, try to guess from URL
                        if (is_numeric($key) && ($platform === $key || $platform === 'link')) {
                            if (str_contains($url, 'github.com')) $platformLower = 'github';
                            elseif (str_contains($url, 'linkedin.com')) $platformLower = 'linkedin';
                            elseif (str_contains($url, 'twitter.com') || str_contains($url, 'x.com')) $platformLower = 'twitter';
                            elseif (str_contains($url, 'instagram.com')) $platformLower = 'instagram';
                        }
                    @endphp

                    @if($url && is_string($url))
                        <a href="{{ $url }}" target="_blank" class="t1-water-drop" aria-label="{{ ucfirst($platform) }}">
                            @if(str_contains($platformLower, 'github'))
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.48 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                            @elseif(str_contains($platformLower, 'linkedin'))
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"></path></svg>
                            @elseif(str_contains($platformLower, 'twitter') || str_contains($platformLower, 'x'))
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z"></path></svg>
                            @elseif(str_contains($platformLower, 'instagram'))
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465 1.067-.047 1.407-.06 4.123-.06h.08zm0-2c-2.739 0-3.073.01-4.15.059-1.076.05-1.812.22-2.465.474a6.908 6.908 0 00-2.508 1.634 6.908 6.908 0 00-1.634 2.508c-.254.653-.424 1.389-.474 2.465-.049 1.077-.059 1.412-.059 4.15s.01 3.073.059 4.15c.05 1.076.22 1.812.474 2.465a6.908 6.908 0 001.634 2.508 6.908 6.908 0 002.508 1.634c.653.254 1.389.424 2.465.474 1.077.049 1.412.059 4.15.059s3.073-.01 4.15-.059c1.076-.05 1.812-.22 2.465-.474a6.908 6.908 0 002.508-1.634 6.908 6.908 0 001.634-2.508c.254-.653.424-1.389.474-2.465.049-1.077.059-1.412.059-4.15s-.01-3.073-.059-4.15c-.05-1.076-.22-1.812-.474-2.465a6.908 6.908 0 00-1.634-2.508 6.908 6.908 0 00-2.508-1.634c-.653-.254-1.389-.424-2.465-.474-1.077-.049-1.412-.059-4.15-.059H12.315zM12.315 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12.315 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" clip-rule="evenodd"></path></svg>
                            @elseif($icon)
                                <img src="{{ $icon }}" alt="{{ $platform }}" style="width: 24px; height: 24px; object-fit: contain;">
                            @else
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"></path></svg>
                            @endif
                        </a>
                    @endif
                @endforeach
            </div>
        @endif

        <!-- CTA Buttons -->
        <div class="t1-hero-actions">
            @if($heroContent['btn_projects_enabled'] ?? true)
                <a href="#projects" class="t1-btn t1-btn-primary">
                    {{ $heroContent['btn_projects_text'] ?? 'View Projects' }}
                    <i class="fas fa-arrow-right"></i>
                </a>
            @endif
            
            @if($heroContent['btn_contact_enabled'] ?? true)
                <a href="#contact" class="t1-btn t1-btn-secondary">
                    {{ $heroContent['btn_contact_text'] ?? 'Contact Me' }}
                    <i class="fas fa-envelope"></i>
                </a>
            @endif
        </div>

        <!-- Tech Stack Marquee -->
        @if(($heroContent['tech_stack_enabled'] ?? true) && isset($techStackSkills) && $techStackSkills->isNotEmpty())
            <div class="t1-tech-stack-container">
                <span class="t1-tech-label">Tech Stack</span>
                <div class="t1-tech-marquee-wrapper">
                    <div class="t1-tech-marquee">
                        <!-- Duplicate items for seamless loop -->
                        @for($i = 0; $i < 4; $i++)
                            @foreach($techStackSkills as $skill)
                                <div class="t1-tech-item" title="{{ $skill->name }}">
                                    @if($skill->url)
                                        <img src="{{ $skill->url }}" 
                                             alt="{{ $skill->name }}" 
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    @endif
                                    <div class="{{ $skill->url ? 'hidden' : 'flex' }} t1-tech-fallback">
                                        <i class="fas fa-code text-sm"></i>
                                    </div>
                                </div>
                            @endforeach
                        @endfor
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Scroll Indicator -->
    <div class="t1-scroll-indicator">
        <a href="#about" class="t1-scroll-link">
            <div class="t1-mouse">
                <div class="t1-wheel"></div>
            </div>
            <span class="t1-scroll-text">Scroll</span>
        </a>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const texts = @json($heroContent['typing_texts'] ?? []);
        const typingElement = document.getElementById('t1-typing-text');
        
        if (texts.length > 0 && typingElement) {
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typeSpeed = 100;

            function type() {
                const currentTextObj = texts[textIndex];
                const currentText = typeof currentTextObj === 'string' ? currentTextObj : (currentTextObj.text || '');
                
                if (isDeleting) {
                    typingElement.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                    typeSpeed = 50;
                } else {
                    typingElement.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                    typeSpeed = 100;
                }

                if (!isDeleting && charIndex === currentText.length) {
                    isDeleting = true;
                    typeSpeed = 2000; // Pause at end
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                    typeSpeed = 500; // Pause before new text
                }

                setTimeout(type, typeSpeed);
            }

            type();
        }

        // Hide scroll indicator when footer appears
        const scrollIndicator = document.querySelector('.t1-scroll-indicator');
        
        if (scrollIndicator) {
            window.addEventListener('scroll', function() {
                const footer = document.querySelector('footer');
                if (footer) {
                    const footerRect = footer.getBoundingClientRect();
                    const windowHeight = window.innerHeight;
                    
                    // Hide indicator when footer starts appearing
                    if (footerRect.top <= windowHeight) {
                        scrollIndicator.style.opacity = '0';
                        scrollIndicator.style.pointerEvents = 'none';
                    } else {
                        scrollIndicator.style.opacity = '0.9';
                        scrollIndicator.style.pointerEvents = 'auto';
                    }
                }
            });
        }
    });
</script>
