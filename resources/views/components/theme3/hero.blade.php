@props(['heroContent', 'techStackSkills'])

<section id="hero" class="section-full relative overflow-hidden min-h-screen w-full theme3-hero">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>
    <div class="grid-lines absolute inset-0 -z-10 pointer-events-none"></div>

    <!-- Main Layout Container -->
    <div class="relative z-10 min-h-screen flex flex-col lg:flex-row items-center justify-center">

        <!-- LEFT SIDE - Content + Tech Stack -->
        <div class="w-full lg:w-[55%] px-16 flex items-start justify-start">
            <div class="max-w-md lg:max-w-lg xl:max-w-2xl content-area">

                <!-- Main Heading -->
                <div class="mb-12 space-y-4">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black leading-tight tracking-tight">
                        <span class="block digital-text name-primary inline-block">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[0] }}
                        </span>
                        <span class="block matrix-gradient name-secondary inline-block">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[1] ?? 'Developer' }}
                        </span>
                    </h1>
                </div>

                <!-- Dynamic Role Text -->
                @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
                    <div class="typing-wrapper mb-16 min-h-[48px] flex items-center">
                        <div class="role-display">
                            <span id="typed-text-theme3" class="role-text"></span>
                            <span class="typing-cursor">|</span>
                        </div>
                    </div>
                @else
                    <div class="typing-wrapper mb-16 min-h-[48px] flex items-center">
                        <div class="role-display">
                            <span class="role-text">Full Stack Developer</span>
                            <span class="typing-cursor">|</span>
                        </div>
                    </div>
                @endif

                <!-- Tech Stack (still on left, under typing text) -->
                @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
                    <div class="tech-stack-section mt-16">
                        <div class="tech-label-wrapper">
                            <span class="tech-label">Tech Stack</span>
                        </div>
                        <div class="tech-grid" id="tech-stack-container">
                            @foreach ($techStackSkills as $index => $skill)
                                <div class="tech-item" style="--item-index: {{ $index }}">
                                    @if($skill->url)
                                        <div class="tech-icon-wrapper">
                                            <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="tech-icon">
                                        </div>
                                    @else
                                        <div class="tech-icon-wrapper">
                                            <div class="tech-icon-fallback">
                                                <i class="fas fa-code"></i>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="tech-tooltip">{{ $skill->name }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>

        <!-- RIGHT SIDE - Image + CTA Buttons + Social Links -->
        <div class="w-full lg:w-1/2 px-8 lg:px-16 py-16 lg:py-0 flex items-center justify-start">
            <div class="visual-area text-center lg:text-left space-y-10">

                <!-- Profile Image -->
                <div class="profile-container inline-block">
                    <div class="profile-frame">
                        <div class="frame-rotating-border"></div>
                        <div class="frame-glow"></div>
                        <div class="frame-border"></div>
                        <img src="{{ $heroContent['user']->profile_image ?? '/images/profile.png' }}"
                            alt="{{ $heroContent['user_name'] ?? 'Profile' }}" class="profile-image"
                            id="profile-image" />
                        <div class="floating-orb orb-1"></div>
                        <div class="floating-orb orb-2"></div>
                        <div class="floating-orb orb-3"></div>
                    </div>
                </div>

                <!-- CTA Buttons - NOW UNDER THE IMAGE -->
                @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if ($heroContent['btn_contact_enabled'] ?? false)
                            <a href="#contact" class="cta-btn primary-btn group">
                                <span class="btn-shimmer"></span>
                                <span class="btn-content">
                                    <span class="btn-text">{{ $heroContent['btn_contact_text'] ?? 'Hire Me' }}</span>
                                    <span class="btn-arrow">→</span>
                                </span>
                                <span class="btn-glow"></span>
                            </a>
                        @endif

                        @if ($heroContent['btn_projects_enabled'] ?? false)
                            <a href="#projects" class="cta-btn secondary-btn group">
                                <span class="btn-content">
                                    <span class="btn-text">{{ $heroContent['btn_projects_text'] ?? 'My Work' }}</span>
                                    <span class="btn-arrow">↗</span>
                                </span>
                            </a>
                        @endif
                    </div>
                @endif

                <!-- Social Links - UNDER THE CTA BUTTONS -->
                @if (!empty($heroContent['social_links'] ?? []))
                    <div class="social-section mt-8">
                        <div class="social-label-container justify-center lg:justify-start">
                            <span class="social-label">Connect with me</span>
                            <div class="label-underline"></div>
                        </div>
                        <div class="social-icons-grid justify-center lg:justify-start">
                            @foreach ($heroContent['social_links'] as $social)
                                @if (!empty($social['url'] ?? ''))
                                    <a href="{{ $social['url'] }}" target="_blank" class="crystal-bubble group"
                                        title="{{ $social['name'] ?? 'Social' }}">
                                        <div class="bubble-shine"></div>
                                        <div class="bubble-content">
                                            @if (!empty($social['icon'] ?? ''))
                                                <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}"
                                                    class="social-icon-img" />
                                            @else
                                                <i class="fas fa-share-alt social-icon-fallback"></i>
                                            @endif
                                        </div>
                                        <span class="bubble-tooltip">{{ $social['name'] ?? 'Social' }}</span>
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
    <div class="scroll-indicator">
        <a href="#about" class="scroll-link">
            <span class="scroll-text">Scroll to explore</span>
            <div class="scroll-icon">
                <div class="scroll-wheel"></div>
            </div>
        </a>
    </div>
</section>

<!-- Typing Animation Script -->
@if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const texts = @json(array_map(function ($text) {
                return is_array($text) && isset($text['text']) ? $text['text'] : $text;
            }, array_values($heroContent['typing_texts'])));

            const typedElement = document.getElementById('typed-text-theme3');
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

                let speed = isDeleting ? 40 : 80;
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

            setTimeout(type, 1000);
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const particleContainer = document.querySelector('.particle-container');
        if (particleContainer) {
            const particleCount = 20;
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'floating-particle';
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                particle.style.animationDelay = `${Math.random() * 10}s`;
                particle.style.animationDuration = `${15 + Math.random() * 10}s`;
                particleContainer.appendChild(particle);
            }
        }

        const gridLines = document.querySelector('.grid-lines');
        if (gridLines) {
            for (let i = 0; i < 5; i++) {
                const line = document.createElement('div');
                line.className = 'grid-line';
                line.style.left = `${20 * i}%`;
                line.style.animationDelay = `${i * 0.2}s`;
                gridLines.appendChild(line);
            }
        }
    });
</script>

<style>
    /* ===================================
   THEME 3 PREMIUM HERO - ENHANCED
   =================================== */

    :root {
        --bg-primary: #0a0a12;
        --bg-secondary: #151522;
        --text-primary: #ffffff;
        --text-secondary: #b4c6e0;
        --text-muted: #8fa3c7;
        --accent-primary: #00ff9d;
        --accent-secondary: #00d4ff;
        --accent-glow: rgba(0, 255, 157, 0.3);
        --border-light: rgba(0, 255, 157, 0.2);
    }

    [data-theme="light"] {
        --bg-primary: #ffffff;
        --bg-secondary: #f8fafc;
        --text-primary: #1a202c;
        --text-secondary: #4a5568;
        --text-muted: #718096;
        --accent-primary: #00cc7a;
        --accent-secondary: #0099cc;
        --accent-glow: rgba(0, 204, 122, 0.2);
        --border-light: rgba(0, 204, 122, 0.3);
    }

    .theme3-hero {
        background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
        position: relative;
        overflow: hidden;
    }

    /* Enhanced Background Pattern */
    .background-pattern {
        background-image:
            radial-gradient(circle at 20% 80%, var(--accent-glow) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(0, 212, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, var(--accent-glow) 0%, transparent 70%);
        opacity: 0.15;
        animation: patternPulse 10s ease-in-out infinite;
    }

    @keyframes patternPulse {

        0%,
        100% {
            opacity: 0.15;
        }

        50% {
            opacity: 0.25;
        }
    }

    /* Premium Floating Particles */
    .floating-particle {
        position: absolute;
        width: 3px;
        height: 3px;
        border-radius: 50%;
        background: var(--accent-primary);
        box-shadow: 0 0 15px var(--accent-primary);
        animation: particleFloat 20s ease-in-out infinite;
    }

    @keyframes particleFloat {

        0%,
        100% {
            transform: translate(0, 0) scale(1) rotate(0deg);
            opacity: 0.4;
        }

        25% {
            transform: translate(100px, -100px) scale(1.5) rotate(90deg);
            opacity: 0.8;
        }

        50% {
            transform: translate(-50px, 150px) scale(0.8) rotate(180deg);
            opacity: 0.5;
        }

        75% {
            transform: translate(150px, 50px) scale(1.2) rotate(270deg);
            opacity: 0.7;
        }
    }

    /* Animated Grid Lines */
    .grid-line {
        position: absolute;
        width: 1px;
        height: 100%;
        background: linear-gradient(to bottom,
                transparent 0%,
                var(--accent-primary) 50%,
                transparent 100%);
        opacity: 0.1;
        animation: gridFlow 8s ease-in-out infinite;
    }

    @keyframes gridFlow {

        0%,
        100% {
            transform: translateY(-100%);
            opacity: 0;
        }

        50% {
            transform: translateY(100%);
            opacity: 0.2;
        }
    }

    /* Content Area */
    .content-area {
        animation: contentSlideIn 1s ease-out;
    }

    @keyframes contentSlideIn {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Premium Name Typography */
    .name-primary {
        color: var(--text-primary);
        font-weight: 900;
        letter-spacing: -0.02em;
        line-height: 0.95;
        margin-bottom: 0.5rem;
        text-shadow: 0 0 30px var(--accent-glow);
    }

    .name-secondary {
        background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 800;
        letter-spacing: -0.01em;
        line-height: 0.95;
        position: relative;
        animation: gradientShift 3s ease-in-out infinite;
    }

    @keyframes gradientShift {

        0%,
        100% {
            filter: hue-rotate(0deg);
        }

        50% {
            filter: hue-rotate(10deg);
        }
    }

    /* Premium Role Display */
    .role-display {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1.25rem 1.5rem;
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 2px solid var(--border-light);
        border-radius: 12px;
        position: relative;
        overflow: hidden;
    }

    .role-display::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg,
                var(--accent-primary),
                var(--accent-secondary),
                var(--accent-primary));
        border-radius: 12px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .role-display:hover::before {
        opacity: 0.3;
        animation: borderPulse 2s ease-in-out infinite;
    }

    @keyframes borderPulse {

        0%,
        100% {
            opacity: 0.3;
        }

        50% {
            opacity: 0.6;
        }
    }

    .role-text {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-secondary);
        line-height: 1.4;
        min-height: 1.5em;
    }

    .typing-cursor {
        color: var(--accent-primary);
        font-weight: 700;
        animation: blink 1s step-end infinite;
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

    /* Premium CTA Buttons */
    .cta-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1.25rem 2.5rem;
        font-weight: 600;
        font-size: 1.125rem;
        border-radius: 14px;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        min-width: 180px;
    }

    /* Primary Button - Premium Glass Effect */
    .primary-btn {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        color: var(--bg-primary);
        box-shadow:
            0 8px 32px rgba(0, 255, 157, 0.35),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    }

    .primary-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg,
                rgba(255, 255, 255, 0.2),
                transparent 50%,
                rgba(0, 0, 0, 0.1));
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .primary-btn:hover::before {
        opacity: 1;
    }

    .btn-shimmer {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .primary-btn:hover .btn-shimmer {
        transform: translateX(100%);
    }

    .btn-glow {
        position: absolute;
        inset: -4px;
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        border-radius: 14px;
        z-index: -1;
        filter: blur(20px);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .primary-btn:hover .btn-glow {
        opacity: 0.6;
        animation: glowPulse 2s ease-in-out infinite;
    }

    @keyframes glowPulse {

        0%,
        100% {
            opacity: 0.6;
        }

        50% {
            opacity: 0.9;
        }
    }

    .primary-btn:hover {
        transform: translateY(-4px);
        box-shadow:
            0 16px 48px rgba(0, 255, 157, 0.5),
            0 0 0 1px rgba(255, 255, 255, 0.2) inset;
    }

    /* Secondary Button */
    .secondary-btn {
        background: transparent;
        color: var(--text-primary);
        border: 2px solid var(--border-light);
        backdrop-filter: blur(10px);
    }

    .secondary-btn:hover {
        background: var(--accent-glow);
        border-color: var(--accent-primary);
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 255, 157, 0.25);
    }

    .btn-content {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        z-index: 2;
    }

    .btn-arrow {
        font-size: 1.25em;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cta-btn:hover .btn-arrow {
        transform: translateX(4px);
    }

    /* Premium Crystal Bubble Social Icons */
    .social-section {
        margin-top: 3rem;
    }

    .social-label-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .social-label {
        font-size: 0.875rem;
        color: var(--text-muted);
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .label-underline {
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, var(--border-light), transparent);
    }

    .social-icons-grid {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    /* Crystal Bubble Effect */
    .crystal-bubble {
        position: relative;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 2px solid var(--border-light);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        overflow: hidden;
    }

    .bubble-shine {
        position: absolute;
        top: 8px;
        left: 8px;
        width: 60%;
        height: 35%;
        background: radial-gradient(ellipse at center,
                rgba(255, 255, 255, 0.4) 0%,
                transparent 70%);
        border-radius: 50%;
        filter: blur(4px);
        opacity: 0.6;
        transition: opacity 0.4s ease;
    }

    .crystal-bubble::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(135deg,
                var(--accent-primary),
                var(--accent-secondary));
        border-radius: 50%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .crystal-bubble:hover::before {
        opacity: 1;
        animation: rotateBorder 3s linear infinite;
    }

    @keyframes rotateBorder {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .crystal-bubble:hover {
        transform: translateY(-6px) scale(1.1);
        border-color: var(--accent-primary);
        box-shadow:
            0 12px 35px var(--accent-glow),
            0 0 0 4px rgba(0, 255, 157, 0.1);
    }

    .crystal-bubble:hover .bubble-shine {
        opacity: 1;
    }

    .bubble-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-icon-img {
        width: 24px;
        height: 24px;
        filter: brightness(0) invert(1);
        transition: transform 0.4s ease;
    }

    [data-theme="light"] .social-icon-img {
        filter: brightness(0) saturate(100%) invert(30%) sepia(90%) saturate(2000%) hue-rotate(140deg);
    }

    .crystal-bubble:hover .social-icon-img {
        transform: scale(1.2) rotate(5deg);
    }

    .social-icon-fallback {
        font-size: 1.25rem;
        color: var(--accent-primary);
    }

    .bubble-tooltip {
        position: absolute;
        bottom: -45px;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: var(--bg-secondary);
        color: var(--text-primary);
        padding: 0.5rem 0.875rem;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        border: 1px solid var(--border-light);
        backdrop-filter: blur(10px);
        z-index: 10;
    }

    .crystal-bubble:hover .bubble-tooltip {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* Premium Profile Frame */
    .profile-container {
        position: relative;
        margin-bottom: 3rem;
        animation: visualSlideIn 1.2s ease-out;
    }

    @keyframes visualSlideIn {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .profile-frame {
        position: relative;
        width: 340px;
        height: 340px;
        border-radius: 28px;
        overflow: hidden;
    }

    /* Rotating Border Animation */
    .frame-rotating-border {
        position: absolute;
        inset: -4px;
        background: conic-gradient(from 0deg,
                var(--accent-primary),
                var(--accent-secondary),
                var(--accent-primary));
        border-radius: 32px;
        z-index: 1;
        animation: rotateBorder 4s linear infinite;
    }

    .frame-glow {
        position: absolute;
        inset: -8px;
        background: conic-gradient(from 0deg,
                var(--accent-primary),
                var(--accent-secondary),
                var(--accent-primary));
        border-radius: 36px;
        filter: blur(20px);
        opacity: 0.5;
        z-index: 0;
        animation: rotateBorder 4s linear infinite;
    }

    .frame-border {
        position: absolute;
        inset: 0;
        background: var(--bg-primary);
        border-radius: 28px;
        padding: 4px;
        z-index: 2;
    }

    .profile-image {
        position: relative;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 24px;
        z-index: 3;
        transition: transform 0.6s ease;
    }

    .profile-frame:hover .profile-image {
        transform: scale(1.05);
    }

    /* Floating Orbs */
    .floating-orb {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%,
                var(--accent-primary),
                var(--accent-secondary));
        opacity: 0.6;
        filter: blur(12px);
        z-index: 0;
        animation: floatOrb 6s ease-in-out infinite;
    }

    .orb-1 {
        width: 80px;
        height: 80px;
        top: -20px;
        right: -20px;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 60px;
        height: 60px;
        bottom: -15px;
        left: -15px;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 50px;
        height: 50px;
        top: 50%;
        left: -25px;
        animation-delay: 4s;
    }

    @keyframes floatOrb {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.6;
        }

        50% {
            transform: translate(15px, -15px) scale(1.2);
            opacity: 0.8;
        }
    }

    /* Premium Tech Stack */
    .tech-stack-section {
        text-align: center;
        margin-top: 2rem;
    }

    .tech-label-wrapper {
        margin-bottom: 1.5rem;
    }

    .tech-label {
        font-size: 0.875rem;
        color: var(--text-muted);
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.5rem 1.5rem;
        background: var(--card-bg);
        border: 1px solid var(--border-light);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        display: inline-block;
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        max-width: 300px;
        margin: 0 auto;
    }

    .tech-item {
        position: relative;
        opacity: 0;
        animation: techItemAppear 0.8s ease forwards;
        animation-delay: calc(var(--item-index) * 0.15s);
    }

    @keyframes techItemAppear {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.8);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .tech-icon-wrapper {
        position: relative;
        width: 60px;
        height: 60px;
        margin: 0 auto;
    }

    .tech-icon {
        width: 60px;
        height: 60px;
        padding: 12px;
        border-radius: 16px;
        background: var(--card-bg);
        backdrop-filter: blur(15px);
        border: 2px solid var(--border-light);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 2;
    }

    .tech-icon-wrapper::before {
        content: '';
        position: absolute;
        inset: -4px;
        background: linear-gradient(135deg,
                var(--accent-primary),
                var(--accent-secondary));
        border-radius: 18px;
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 1;
        filter: blur(8px);
    }

    .tech-item:hover .tech-icon-wrapper::before {
        opacity: 0.6;
        animation: techGlow 2s ease-in-out infinite;
    }

    @keyframes techGlow {

        0%,
        100% {
            opacity: 0.6;
            transform: scale(1);
        }

        50% {
            opacity: 0.9;
            transform: scale(1.1);
        }
    }

    .tech-item:hover .tech-icon {
        transform: translateY(-8px) scale(1.15) rotate(5deg);
        border-color: var(--accent-primary);
        box-shadow:
            0 12px 35px var(--accent-glow),
            0 0 0 4px rgba(0, 255, 157, 0.1);
    }

    .tech-icon-fallback {
        width: 60px;
        height: 60px;
        padding: 12px;
        border-radius: 16px;
        background: linear-gradient(135deg,
                var(--accent-primary),
                var(--accent-secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--bg-primary);
        font-size: 1.5rem;
        transition: all 0.4s ease;
    }

    .tech-item:hover .tech-icon-fallback {
        transform: translateY(-8px) scale(1.15) rotate(5deg);
        box-shadow: 0 12px 35px var(--accent-glow);
    }

    .tech-tooltip {
        position: absolute;
        bottom: -45px;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: var(--bg-secondary);
        color: var(--text-primary);
        padding: 0.5rem 0.875rem;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        border: 1px solid var(--border-light);
        backdrop-filter: blur(15px);
        z-index: 10;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .tech-item:hover .tech-tooltip {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* Premium Scroll Indicator */
    .scroll-indicator {
        position: fixed;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 40;
    }

    .scroll-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        transition: all 0.4s ease;
    }

    .scroll-link:hover {
        transform: translateY(5px);
    }

    .scroll-text {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-muted);
        letter-spacing: 0.05em;
    }

    .scroll-icon {
        width: 28px;
        height: 48px;
        border: 2px solid var(--border-light);
        border-radius: 20px;
        background: var(--card-bg);
        backdrop-filter: blur(10px);
        position: relative;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding-top: 8px;
    }

    .scroll-wheel {
        width: 4px;
        height: 12px;
        background: var(--accent-primary);
        border-radius: 2px;
        animation: scrollWheel 2s ease-in-out infinite;
    }

    @keyframes scrollWheel {
        0% {
            transform: translateY(0);
            opacity: 1;
        }

        100% {
            transform: translateY(20px);
            opacity: 0;
        }
    }

    .scroll-link:hover .scroll-icon {
        border-color: var(--accent-primary);
        box-shadow: 0 8px 25px var(--accent-glow);
    }

    /* Responsive Design */
    @media (max-width: 1280px) {
        .profile-frame {
            width: 300px;
            height: 300px;
        }

        .tech-grid {
            max-width: 280px;
            gap: 1rem;
        }

        .tech-icon,
        .tech-icon-fallback {
            width: 56px;
            height: 56px;
            padding: 10px;
        }
    }

    .name-primary,
    .name-secondary {
        display: inline-block;
        margin-right: 10px;
        /* spacing between first + second name */
        white-space: nowrap;
        /* FORCE one line */
        text-align: left;
    }

    .content-area {
        text-align: left;
        /* name stays left */
    }

    .role-display,
    .tech-stack-section {
        margin-left: 0;
    }

    .typing-wrapper,
    .tech-stack-section {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .visual-area {
        margin-left: 80px;
        /* move right */
        text-align: left !important;
    }

    .profile-container {
        margin-left: auto;
        /* push image to right */
    }

    .cta-btn {
        margin-left: auto;
    }

    .social-section {
        margin-left: auto;
    }

    @media (min-width: 1024px) {
        .theme3-hero .relative.flex {
            align-items: center;
            justify-content: space-between;
        }
    }

    @media (max-width: 1024px) {
        .content-area {
            text-align: center;
            max-width: 500px;
            margin: 0 auto;
        }

        .social-label-container {
            justify-content: center;
        }

        .social-icons-grid {
            justify-content: center;
        }

        .profile-frame {
            width: 260px;
            height: 260px;
            margin: 0 auto;
        }

        .tech-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {

        .name-primary,
        .name-secondary {
            font-size: 3rem;
        }

        .role-text {
            font-size: 1.25rem;
        }

        .cta-btn {
            padding: 1rem 2rem;
            font-size: 1rem;
            min-width: 160px;
        }

        .profile-frame {
            width: 220px;
            height: 220px;
        }

        .tech-icon,
        .tech-icon-fallback {
            width: 52px;
            height: 52px;
            padding: 8px;
        }

        .crystal-bubble {
            width: 52px;
            height: 52px;
        }

        .social-icon-img {
            width: 22px;
            height: 22px;
        }

        .floating-orb {
            display: none;
        }
    }

    @media (max-width: 480px) {

        .name-primary,
        .name-secondary {
            font-size: 2.5rem;
        }

        .role-display {
            padding: 1rem 1.25rem;
        }

        .role-text {
            font-size: 1.125rem;
        }

        .cta-btn {
            padding: 0.875rem 1.75rem;
            font-size: 0.95rem;
            width: 100%;
        }

        .profile-frame {
            width: 200px;
            height: 200px;
        }

        .tech-grid {
            grid-template-columns: repeat(3, 1fr);
            max-width: 240px;
        }

        .tech-icon,
        .tech-icon-fallback {
            width: 48px;
            height: 48px;
            padding: 6px;
            border-radius: 12px;
        }

        .crystal-bubble {
            width: 48px;
            height: 48px;
        }

        .scroll-indicator {
            bottom: 1.5rem;
        }

        .scroll-text {
            font-size: 0.75rem;
        }

        .scroll-icon {
            width: 24px;
            height: 42px;
        }
    }

    /* Performance Optimization */
    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Dark/Light Theme Transitions */
    * {
        transition: background-color 0.3s ease,
            color 0.3s ease,
            border-color 0.3s ease;
    }

    /* Hover States for Touch Devices */
    @media (hover: none) {

        .crystal-bubble:hover,
        .tech-item:hover .tech-icon,
        .cta-btn:hover {
            transform: none;
        }

        .crystal-bubble:active {
            transform: scale(0.95);
        }
    }