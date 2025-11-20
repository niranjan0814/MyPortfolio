@props(['heroContent', 'techStackSkills'])
<section id="hero" class="section-full relative overflow-hidden min-h-screen w-full theme2-hero">
    <!-- Animated Grid Background -->
    <div class="cyber-grid absolute inset-0 -z-10"></div>
    <!-- Floating Orbs -->
    <div class="orb-container absolute inset-0 -z-10 pointer-events-none"></div>

    <!-- Main Flex Container - Visual on LEFT, Text on RIGHT -->
    <div class="relative z-10 min-h-screen flex flex-col lg:flex-row items-center justify-center">

        <!-- LEFT: Profile Image + Orbiting Tech Icons -->
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end items-center px-6 order-2 lg:order-1">
            <div class="hologram-container relative slide-in-left">
                <!-- Center Profile -->
                <div class="center-profile">
                    <div class="profile-ring"></div>
                    <img src="{{ $heroContent['user']->profile_image ?? '/images/profile.png' }}"
                        alt="{{ $heroContent['user_name'] ?? 'Profile' }}" class="profile-image" />
                </div>

                <!-- Orbiting Tech Icons -->
                @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
                    <div class="floating-icons absolute inset-0 pointer-events-none">
                        @php
                            $visibleCount = 6; // You want 12 icons
                            $icons = $techStackSkills->take($visibleCount);
                        @endphp

                        @foreach ($icons as $index => $skill)
                            <div class="floating-icon"
                                style="--delay: {{ $index * 0.2 }}s; --angle: {{ ($index * (360 / $visibleCount)) }}deg;">
                                @if ($skill->url)
                                    <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="w-14 h-14 icon-glow"
                                        onerror="this.style.display='none';" />
                                @else
                                    <div class="w-14 h-14 flex items-center justify-center rounded-xl icon-glow cyber-icon-bg">
                                        <i class="fas fa-code text-xl"></i>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>

        <!-- RIGHT: All Text Content -->
        <div
            class="w-full lg:w-1/2 px-6 md:px-12 lg:px-16 flex items-center justify-center lg:justify-start order-1 lg:order-2">
            <div class="w-full slide-in-right text-center lg:text-left">
                <!-- Main Heading -->
                <div class="mb-6">
                    <h1
                        class="text-6xl md:text-7xl lg:text-8xl font-black mb-3 tracking-tight leading-none whitespace-nowrap flex flex-wrap lg:flex-nowrap items-center gap-4">
                        <span class="inline-block text-glow hero-name mr-4">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[0] }}
                        </span>

                        <span class="inline-block neon-text">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[1] ?? 'Developer' }}
                        </span>
                    </h1>

                </div>

                <!-- Typing Text -->
                @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
                    <div class="mb-8 min-h-[60px] flex items-center justify-center lg:justify-start">
                        <p class="text-2xl md:text-3xl font-bold glitch-text hero-subtitle">
                            <span id="typed-text-theme2"></span>
                            <span class="cursor-blink">|</span>
                        </p>
                    </div>
                @else
                    <p class="text-2xl md:text-3xl font-bold mb-8 glitch-text hero-subtitle">
                        Problem solver & Innovator<span class="cursor-blink">|</span>
                    </p>
                @endif



                <!-- CTA Buttons -->
                @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
                    <div class="flex flex-wrap gap-4 mb-10 justify-center lg:justify-start">
                        @if ($heroContent['btn_contact_enabled'] ?? false)
                            <a href="#contact" class="cyber-btn-primary group">
                                <span class="relative z-10">{{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}</span>
                                <div class="cyber-btn-glow"></div>
                            </a>
                        @endif
                        @if ($heroContent['btn_projects_enabled'] ?? false)
                            <a href="#projects" class="cyber-btn-secondary group">
                                <span class="relative z-10">{{ $heroContent['btn_projects_text'] ?? 'View Projects' }}</span>
                            </a>
                        @endif
                    </div>
                @endif

                <!-- Social Links -->
                @if (!empty($heroContent['social_links'] ?? []))
                    <div class="flex items-center gap-4 justify-center lg:justify-start">
                        <span class="text-sm font-medium social-label">Connect:</span>
                        <div class="flex gap-3">
                            @foreach ($heroContent['social_links'] as $social)
                                @if (!empty($social['url'] ?? ''))
                                    <a href="{{ $social['url'] }}" target="_blank" class="hexagon-link group"
                                        title="{{ $social['name'] ?? 'Social' }}">
                                        @if (!empty($social['icon'] ?? ''))
                                            <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}"
                                                class="w-5 h-5 relative z-10 social-icon"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';" />
                                        @endif
                                        <svg class="{{ !empty($social['icon']) ? 'hidden' : '' }} w-5 h-5 relative z-10 social-icon"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                        </svg>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 scroll-down">
        <a href="#about" class="flex flex-col items-center gap-2">
            <span class="text-xs font-medium tracking-widest uppercase scroll-text">Scroll</span>
            <div class="scroll-arrow"></div>
        </a>
    </div>
</section>

<!-- Keep your existing <script> blocks for typing & orbs + the full <style> block unchanged -->

<!-- Typing Animation Script -->
@if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const texts = @json(array_map(function ($text) {
                return is_array($text) && isset($text['text']) ? $text['text'] : $text;
            }, array_values($heroContent['typing_texts'])));

            const typedElement = document.getElementById('typed-text-theme2');
            if (!typedElement || !Array.isArray(texts) || texts.length === 0) return;

            let textIndex = 0, charIndex = 0, isDeleting = false;

            function type() {
                const currentText = String(texts[textIndex]);
                if (isDeleting) {
                    typedElement.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typedElement.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                }

                let speed = isDeleting ? 50 : 100;
                if (!isDeleting && charIndex === currentText.length) {
                    speed = 2000;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                    speed = 500;
                }
                setTimeout(type, speed);
            }

            setTimeout(type, 800);
        });
    </script>
@endif
<!-- Orbit Icon Rotation Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allIcons = @json($techStackSkills->pluck('url')->toArray());
        const visibleIcons = document.querySelectorAll('.floating-icon img');

        let nextIndex = 0;
        let fadeIndex = 0;

        function rotateOneIcon() {
            const icon = visibleIcons[fadeIndex];
            icon.src = allIcons[nextIndex]; // just swap instantly

            nextIndex = (nextIndex + 1) % allIcons.length;
            fadeIndex = (fadeIndex + 1) % visibleIcons.length;
        }

        setInterval(rotateOneIcon, 2500);
    });
</script>


<!-- Orb Animation Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const orbContainer = document.querySelector('.orb-container');
        if (!orbContainer) return;

        const orbCount = 6;
        for (let i = 0; i < orbCount; i++) {
            const orb = document.createElement('div');
            orb.className = 'floating-orb';
            orb.style.left = `${Math.random() * 100}%`;
            orb.style.top = `${Math.random() * 100}%`;
            orb.style.animationDelay = `${Math.random() * 5}s`;
            orb.style.animationDuration = `${15 + Math.random() * 10}s`;
            orbContainer.appendChild(orb);
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allIcons = @json($techStackSkills->pluck('url')->toArray());
        const maxVisible = 10;
        let startIndex = 0;

        const visibleIcons = document.querySelectorAll('.floating-icon img');

        function updateIcons() {
            visibleIcons.forEach((icon, i) => {
                const nextIndex = (startIndex + i) % allIcons.length;

                // Fade-out
                icon.style.opacity = 0;

                // After fade-out completes, change image
                setTimeout(() => {
                    icon.src = allIcons[nextIndex];

                    // Fade-in
                    icon.style.opacity = 1;
                }, 800); // match transition speed
            });

            startIndex = (startIndex + 1) % allIcons.length;
        }

        // Change icons every 4 seconds
        setInterval(updateIcons, 10000);
    });
</script>

<style>
    /* ===================================
   THEME 2 HERO - DUAL THEME SUPPORT
   =================================== */

    :root {
        /* Dark Theme Colors (Default) */
        --hero-bg-start: #0a0e27;
        --hero-bg-mid: #1a1f3a;
        --hero-bg-end: #0f1729;
        --hero-text-primary: #ffffff;
        --hero-text-secondary: #cbd5e1;
        --hero-text-muted: #94a3b8;
        --neon-primary: #00d9ff;
        --neon-secondary: #b537ff;
        --neon-accent: #ff006e;
        --grid-color: rgba(0, 217, 255, 0.05);
        --orb-color: rgba(0, 217, 255, 0.15);
        --badge-bg: rgba(0, 217, 255, 0.1);
        --badge-border: rgba(0, 217, 255, 0.3);
        --btn-primary-bg: #00d9ff;
        --btn-primary-text: #0a0e27;
        --btn-secondary-border: #00d9ff;
        --hexagon-bg: rgba(0, 217, 255, 0.1);
        --hexagon-hover-bg: #00d9ff;
        --hexagon-hover-text: #0a0e27;
        --ring-border-1: #00d9ff;
        --ring-border-2: #b537ff;
        --profile-border: #00d9ff;
        --ticker-bg: rgba(0, 217, 255, 0.05);
        --ticker-border: rgba(0, 217, 255, 0.2);
        --scroll-color: #00d9ff;
    }

    /* Light Theme Override */
    [data-theme="light"] {
        --hero-bg-start: #f8fafc;
        --hero-bg-mid: #e2e8f0;
        --hero-bg-end: #cbd5e1;
        --hero-text-primary: #1e293b;
        --hero-text-secondary: #475569;
        --hero-text-muted: #64748b;
        --neon-primary: #0ea5e9;
        --neon-secondary: #8b5cf6;
        --neon-accent: #ec4899;
        --grid-color: rgba(14, 165, 233, 0.08);
        --orb-color: rgba(14, 165, 233, 0.12);
        --badge-bg: rgba(14, 165, 233, 0.15);
        --badge-border: rgba(14, 165, 233, 0.4);
        --btn-primary-bg: #0ea5e9;
        --btn-primary-text: #ffffff;
        --btn-secondary-border: #0ea5e9;
        --hexagon-bg: rgba(14, 165, 233, 0.15);
        --hexagon-hover-bg: #0ea5e9;
        --hexagon-hover-text: #ffffff;
        --ring-border-1: #0ea5e9;
        --ring-border-2: #8b5cf6;
        --profile-border: #0ea5e9;
        --ticker-bg: rgba(14, 165, 233, 0.08);
        --ticker-border: rgba(14, 165, 233, 0.25);
        --scroll-color: #0ea5e9;
    }

    .theme2-hero {
        background: linear-gradient(135deg, var(--hero-bg-start) 0%, var(--hero-bg-mid) 50%, var(--hero-bg-end) 100%);
        position: relative;
    }

    /* Animated Grid Background */
    .cyber-grid {
        background-image:
            linear-gradient(var(--grid-color) 1px, transparent 1px),
            linear-gradient(90deg, var(--grid-color) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 50px 50px;
        }
    }

    /* Floating Orbs */
    .floating-orb {
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: radial-gradient(circle, var(--orb-color) 0%, transparent 70%);
        filter: blur(40px);
        animation: floatOrb 20s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes floatOrb {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
        }

        25% {
            transform: translate(100px, -100px) scale(1.2);
        }

        50% {
            transform: translate(-50px, 100px) scale(0.8);
        }

        75% {
            transform: translate(150px, 50px) scale(1.1);
        }
    }

    /* Slide In Animations */
    .slide-in-left {
        animation: slideInLeft 1s ease-out;
    }

    .slide-in-right {
        animation: slideInRight 1.2s ease-out;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-100px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Cyber Badge */
    .cyber-badge {
        background: var(--badge-bg);
        border: 1px solid var(--badge-border);
        backdrop-filter: blur(10px);
        color: var(--neon-primary);
    }

    .pulse-dot {
        background: var(--neon-primary);
        animation: pulse 2s ease-in-out infinite;
        box-shadow: 0 0 10px var(--neon-primary);
    }

    .floating-icon img {
        transition: opacity 0.8s ease;
        /* smooth fade */
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: 0.5;
            transform: scale(1.2);
        }
    }

    /* Text Styles */
    .hero-name {
        color: var(--hero-text-primary);
        text-shadow: 0 0 20px var(--orb-color);
    }

    .neon-text {
        background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary), var(--neon-accent));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: neonGlow 3s ease-in-out infinite;
    }

    @keyframes neonGlow {

        0%,
        100% {
            filter: brightness(1);
        }

        50% {
            filter: brightness(1.3);
        }
    }

    .hero-subtitle {
        color: var(--hero-text-secondary);
    }

    .hero-description {
        color: var(--hero-text-muted);
    }

    .cursor-blink {
        animation: blink 1s step-end infinite;
        color: var(--neon-primary);
    }

    @keyframes blink {

        0%,
        50% {
            opacity: 1;
        }

        51%,
        100% {
            opacity: 0;
        }
    }

    /* Cyber Buttons */
    .cyber-btn-primary {
        position: relative;
        padding: 16px 40px;
        font-weight: 700;
        font-size: 16px;
        color: var(--btn-primary-text);
        background: var(--btn-primary-bg);
        border: none;
        clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .cyber-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 40px var(--orb-color);
    }

    .cyber-btn-glow {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s;
    }

    .cyber-btn-primary:hover .cyber-btn-glow {
        transform: translateX(100%);
    }

    .cyber-btn-secondary {
        padding: 16px 40px;
        font-weight: 700;
        font-size: 16px;
        color: var(--neon-primary);
        background: transparent;
        border: 2px solid var(--btn-secondary-border);
        clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%);
        transition: all 0.3s ease;
    }

    .cyber-btn-secondary:hover {
        background: var(--badge-bg);
        transform: translateY(-2px);
        box-shadow: 0 10px 40px var(--orb-color);
    }

    /* Social Links */
    .social-label {
        color: var(--hero-text-muted);
    }

    .hexagon-link {
        position: relative;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--hexagon-bg);
        clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
        transition: all 0.3s ease;
        color: var(--neon-primary);
    }

    .hexagon-link:hover {
        background: var(--hexagon-hover-bg);
        color: var(--hexagon-hover-text);
        transform: scale(1.1) rotate(10deg);
        box-shadow: 0 0 20px var(--neon-primary);
    }

    .social-icon {
        filter: brightness(0) invert(1);
    }

    [data-theme="light"] .social-icon {
        filter: brightness(0) saturate(100%) invert(48%) sepia(79%) saturate(2476%) hue-rotate(180deg);
    }

    /* Hologram Container */
    .hologram-container {
        position: relative;
        width: 480px;
        height: 480px;
        transform: translate(-40px, -120px);
    }

    /* 3D Rotating Ring */
    .rotating-ring {
        position: absolute;
        inset: 0;
        border: 3px solid transparent;
        border-top-color: var(--ring-border-1);
        border-right-color: var(--ring-border-2);
        border-radius: 50%;
        animation: rotate3D 10s linear infinite;
        filter: drop-shadow(0 0 20px var(--neon-primary));
    }

    @keyframes rotate3D {
        0% {
            transform: rotateY(0deg) rotateX(20deg);
        }

        100% {
            transform: rotateY(360deg) rotateX(20deg);
        }
    }

    /* Center Profile */
    .center-profile {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60%;
        height: 60%;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .profile-ring {
        position: absolute;
        inset: -10%;
        border-radius: 50%;
        0 0 60px var(--neon-secondary),
        inset 0 0 40px var(--neon-primary);
        animation: pulse-ring 3s ease-in-out infinite;
    }

    .profile-image {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--profile-border);
        box-shadow:
            0 0 30px var(--neon-primary),
            inset 0 0 20px var(--orb-color);
        z-index: 10;
    }

    @keyframes pulse-profile {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    @keyframes pulse-ring {

        0%,
        100% {
            opacity: 0.6;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.1);
        }
    }

    /* Floating Icons */
    .floating-icons {
        pointer-events: none;
    }

    .floating-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform-origin: center;
        animation: orbit 20s linear infinite;
        animation-delay: var(--delay);
    }

    .floating-icon img {
        opacity: 1;
        transition: none;
    }


    @keyframes orbit {
        0% {
            transform: translate(-50%, -50%) rotate(var(--angle)) translateX(200px) rotate(calc(-1 * var(--angle)));
        }

        100% {
            transform: translate(-50%, -50%) rotate(calc(var(--angle) + 360deg)) translateX(200px) rotate(calc(-1 * (var(--angle) + 360deg)));
        }
    }


    .icon-glow {
        filter: drop-shadow(0 0 10px var(--neon-primary));
        transition: transform 0.3s ease;
    }

    .icon-glow:hover {
        transform: scale(1.2);
    }

    .cyber-icon-bg {
        background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary));
    }

    /* Scan Lines */
    .scan-lines {
        position: absolute;
        inset: 0;
        background: repeating-linear-gradient(0deg,
                transparent,
                transparent 2px,
                var(--grid-color) 2px,
                var(--grid-color) 4px);
        pointer-events: none;
        animation: scanMove 8s linear infinite;
    }

    @keyframes scanMove {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(50px);
        }
    }

    /* Bottom Ticker */
    .ticker-container {
        height: 50px;
        background: var(--ticker-bg);
        border-top: 1px solid var(--ticker-border);
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .ticker-content {
        display: flex;
        gap: 40px;
        animation: ticker 30s linear infinite;
        white-space: nowrap;
    }

    .ticker-item {
        font-size: 14px;
        font-weight: 600;
        color: var(--neon-primary);
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    @keyframes ticker {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    /* Scroll Indicator */
    .scroll-down {
        animation: bounce 2s ease-in-out infinite;
    }

    .scroll-text {
        color: var(--hero-text-muted);
    }

    .scroll-arrow {
        width: 2px;
        height: 30px;
        background: linear-gradient(180deg, var(--scroll-color) 0%, transparent 100%);
        position: relative;
    }

    .scroll-arrow::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: -3px;
        width: 8px;
        height: 8px;
        border-right: 2px solid var(--scroll-color);
        border-bottom: 2px solid var(--scroll-color);
        transform: rotate(45deg);
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(10px);
        }
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hologram-container {
            width: 300px;
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .neon-text {
            font-size: 3rem;
        }

        .hologram-container {
            width: 250px;
            height: 250px;
        }
    }
</style>