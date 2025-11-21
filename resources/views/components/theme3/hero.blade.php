@props(['heroContent', 'techStackSkills'])

<section id="hero" class="section-full relative overflow-hidden min-h-screen w-full theme3-hero">
    <!-- Background Elements -->
    <div class="background-pattern absolute inset-0 -z-10"></div>
    <div class="particle-container absolute inset-0 -z-10 pointer-events-none"></div>
    <div class="grid-lines absolute inset-0 -z-10 pointer-events-none"></div>

    <!-- Main Layout Container -->
    <div class="relative z-10 min-h-screen flex flex-col justify-center -mt-32">

        <!-- FULL WIDTH NAME SECTION -->
        <div class="w-full text-center space-y-2 mb-6">
            <!-- Main Heading - Full Width -->
            <h1 class="text-6xl md:text-7xl lg:text-8xl font-bold 
           mt-10 md:mt-16 lg:mt-20 
           mb-6 flex items-center justify-center gap-8 flex-wrap"
    style="color: var(--text-primary); line-height: 1.1;">

    <span class="gradient-text animate-gradient whitespace-nowrap">
        {{ explode(' ', $heroContent['user_name'])[0] }}
    </span>

    <span class="gradient-text animate-gradient whitespace-nowrap">
        {{ explode(' ', $heroContent['user_name'])[1] ?? '' }}
    </span>

</h1>






            
        </div>

        <!-- CONTENT LAYOUT - Left and Right -->
        <div class="relative z-10 flex flex-col lg:flex-row items-stretch justify-between gap-6 px-8 lg:px-20">

            <!-- LEFT SIDE - Tech Stack -->
            @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
                <div class="w-full lg:w-1/3 flex items-start">
                    <div class="tech-stack-section space-y-6">
                        <div class="flex items-start gap-6">
                            <div class="tech-label-vertical">
                                T<br>E<br>C<br>H<br><br>S<br>T<br>A<br>C<br>K
                            </div>

                            <div class="tech-grid">
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

                                <!-- Three Dots -->
                                <a href="#skills" class="tech-item three-dot-icon">
                                    <div class="tech-icon-wrapper">
                                        <div class="three-dot-box">• • •</div>
                                    </div>
                                    <div class="tech-tooltip">More</div>
                                </a>
                            </div>
                        </div>

                        <!-- Social Links - Under Tech Stack -->
                        @if (!empty($heroContent['social_links'] ?? []))
                            <div class="social-section space-y-4 pt-4">
                                <div class="flex items-center gap-3">
                                    <span class="social-label">Connect</span>
                                    <div class="flex-1 h-px bg-gradient-to-r from-current to-transparent opacity-30"></div>
                                </div>
                                <div class="flex gap-3 flex-wrap">
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
            @endif

            <!-- CENTER - Empty Space -->
            <div class="hidden lg:block lg:w-1/3"></div>

            <!-- RIGHT SIDE - Profile Image + CTA Buttons -->
            <div class="w-full lg:w-1/3 flex flex-col items-center lg:items-end">
                <!-- Profile Image -->
                <div class="profile-container mb-8">
                    <div class="profile-frame">
                        <div class="frame-rotating-border"></div>
                        <div class="frame-glow"></div>
                        <div class="frame-border"></div>
                        <img src="{{ $heroContent['user']->profile_image ?? '/images/profile.png' }}"
                            alt="{{ $heroContent['user_name'] ?? 'Profile' }}" class="profile-image" />
                        <div class="floating-orb orb-1"></div>
                        <div class="floating-orb orb-2"></div>
                        <div class="floating-orb orb-3"></div>
                    </div>
                </div>

                <!-- CTA Buttons - Under Image -->
                @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
                    <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto lg:justify-end">
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
        --card-bg: rgba(255, 255, 255, 0.05);
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
        --card-bg: rgba(0, 204, 122, 0.05);
    }

    .theme3-hero {
        background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
        position: relative;
        overflow: hidden;
    }

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

    .grid-line {
        position: absolute;
        width: 1px;
        height: 100%;
        background: linear-gradient(to bottom, transparent 0%, var(--accent-primary) 50%, transparent 100%);
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

    /* Full Width Name Section */
    .hero-name {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.2rem;
        line-height: 0.9;
        font-size: 4.5rem;
        margin-bottom: 0;
    }

    .name-primary {
        color: var(--text-primary);
        font-weight: 900;
        letter-spacing: -0.03em;
    }

    .name-secondary {
        background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 900;
        letter-spacing: -0.03em;
    }

    /* Centered Role Display */
    .role-display {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 2px solid var(--border-light);
        border-radius: 12px;
        position: relative;
    }

    .role-text {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-secondary);
        min-height: 1.2em;
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

    /* Tech Stack */
    .tech-label-vertical {
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: var(--text-muted);
        text-transform: uppercase;
        white-space: nowrap;
        line-height: 1.4;
        padding-top: 0.5rem;
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
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
        width: 70px;
        height: 70px;
        margin: 0 auto;
    }

    .tech-icon,
    .tech-icon-fallback {
        width: 70px;
        height: 70px;
        padding: 14px;
        border-radius: 18px;
        background: var(--card-bg);
        backdrop-filter: blur(15px);
        border: 2px solid var(--border-light);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .tech-item:hover .tech-icon,
    .tech-item:hover .tech-icon-fallback {
        transform: translateY(-10px) scale(1.15);
        border-color: var(--accent-primary);
        box-shadow: 0 12px 35px var(--accent-glow);
    }

    .tech-icon-fallback {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        color: var(--bg-primary);
        font-size: 1.5rem;
    }

    .three-dot-box {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        background: var(--card-bg);
        border: 2px solid var(--border-light);
        backdrop-filter: blur(10px);
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-primary);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .three-dot-box:hover {
        border-color: var(--accent-primary);
        box-shadow: 0 8px 25px var(--accent-glow);
        transform: translateY(-10px);
    }

    .tech-tooltip {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: var(--bg-secondary);
        color: var(--text-primary);
        padding: 0.6rem 1rem;
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        border: 1px solid var(--border-light);
        z-index: 10;
    }

    .tech-item:hover .tech-tooltip {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* CTA Buttons */
    .cta-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1.25rem 2.5rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 14px;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
    }

    .primary-btn {
        background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
        color: var(--bg-primary);
        box-shadow: 0 8px 32px rgba(0, 255, 157, 0.35);
    }

    .primary-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 48px rgba(0, 255, 157, 0.5);
    }

    .btn-shimmer {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transform: translateX(-100%);
    }

    .primary-btn:hover .btn-shimmer {
        transform: translateX(100%);
        transition: transform 0.6s ease;
    }

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
        transition: transform 0.4s ease;
    }

    .cta-btn:hover .btn-arrow {
        transform: translateX(4px);
    }

    /* Social Links */
    .social-label {
        font-size: 0.85rem;
        color: var(--text-muted);
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .crystal-bubble {
        position: relative;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 2px solid var(--border-light);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        overflow: hidden;
        text-decoration: none;
    }

    .crystal-bubble:hover {
        transform: translateY(-8px) scale(1.12);
        border-color: var(--accent-primary);
        box-shadow: 0 12px 35px var(--accent-glow);
    }

    .bubble-shine {
        position: absolute;
        top: 8px;
        left: 8px;
        width: 60%;
        height: 35%;
        background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0.4) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(4px);
        opacity: 0.6;
    }

    .bubble-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-icon-img {
        width: 28px;
        height: 28px;
        filter: brightness(0) invert(1);
        transition: transform 0.4s ease;
    }

    .crystal-bubble:hover .social-icon-img {
        transform: scale(1.2) rotate(5deg);
    }

    .bubble-tooltip {
        position: absolute;
        bottom: -48px;
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: var(--bg-secondary);
        color: var(--text-primary);
        padding: 0.6rem 1rem;
        border-radius: 10px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        border: 1px solid var(--border-light);
        z-index: 10;
    }

    .crystal-bubble:hover .bubble-tooltip {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* Profile Image */
    .profile-container {
        position: relative;
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
        width: 380px;
        height: 380px;
        border-radius: 30px;
        overflow: hidden;
    }

    .frame-rotating-border {
        position: absolute;
        inset: -4px;
        background: conic-gradient(from 0deg, var(--accent-primary), var(--accent-secondary), var(--accent-primary));
        border-radius: 34px;
        z-index: 1;
        animation: rotateBorder 4s linear infinite;
    }

    .frame-glow {
        position: absolute;
        inset: -8px;
        background: conic-gradient(from 0deg, var(--accent-primary), var(--accent-secondary), var(--accent-primary));
        border-radius: 38px;
        filter: blur(20px);
        opacity: 0.5;
        z-index: 0;
        animation: rotateBorder 4s linear infinite;
    }

    @keyframes rotateBorder {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .frame-border {
        position: absolute;
        inset: 0;
        background: var(--bg-primary);
        border-radius: 30px;
        padding: 4px;
        z-index: 2;
    }

    .profile-image {
        position: relative;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 26px;
        z-index: 3;
        transition: transform 0.6s ease;
    }

    .profile-frame:hover .profile-image {
        transform: scale(1.05);
    }

    .floating-orb {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, var(--accent-primary), var(--accent-secondary));
        opacity: 0.6;
        filter: blur(12px);
        z-index: 0;
        animation: floatOrb 6s ease-in-out infinite;
    }

    .orb-1 {
        width: 100px;
        height: 100px;
        top: -30px;
        right: -30px;
    }

    .orb-2 {
        width: 70px;
        height: 70px;
        bottom: -20px;
        left: -20px;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 60px;
        height: 60px;
        top: 50%;
        left: -30px;
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

    /* Scroll Indicator */
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
        font-size: 0.9rem;
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

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-name {
            font-size: 3.5rem;
        }

        .profile-frame {
            width: 300px;
            height: 300px;
        }

        .tech-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .tech-icon-wrapper,
        .three-dot-box {
            width: 60px;
            height: 60px;
        }

        .tech-icon,
        .tech-icon-fallback {
            width: 60px;
            height: 60px;
            padding: 10px;
        }

        .role-text {
            font-size: 0.9rem;
        }

        .relative.flex.flex-col.lg\:flex-row {
            flex-direction: column;
            align-items: center;
        }

        .w-full.lg\:w-1\/3 {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .hero-name {
            font-size: 2.5rem;
            gap: 0.25rem;
        }

        .profile-frame {
            width: 260px;
            height: 260px;
        }

        .tech-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
        }

        .tech-icon-wrapper {
            width: 50px;
            height: 50px;
        }

        .tech-icon,
        .tech-icon-fallback,
        .three-dot-box {
            width: 50px;
            height: 50px;
            padding: 8px;
        }

        .role-display {
            padding: 0.6rem 1.2rem;
        }

        .role-text {
            font-size: 0.85rem;
        }

        .cta-btn {
            padding: 0.9rem 1.8rem;
            font-size: 0.95rem;
        }

        .social-label {
            font-size: 0.7rem;
        }

        .crystal-bubble {
            width: 52px;
            height: 52px;
        }

        .social-icon-img {
            width: 22px;
            height: 22px;
        }
    }

    @media (max-width: 640px) {
        .hero-name {
            font-size: 2rem;
            gap: 0.2rem;
        }

        .profile-frame {
            width: 220px;
            height: 220px;
        }

        .tech-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.6rem;
        }

        .tech-icon-wrapper {
            width: 45px;
            height: 45px;
        }

        .tech-icon,
        .tech-icon-fallback,
        .three-dot-box {
            width: 45px;
            height: 45px;
            padding: 6px;
        }

        .tech-label-vertical {
            font-size: 0.7rem;
            line-height: 1.2;
        }

        .role-text {
            font-size: 0.8rem;
        }

        .cta-btn {
            width: 100%;
            padding: 0.85rem 1.5rem;
            font-size: 0.9rem;
        }

        .flex.flex-col.sm\:flex-row {
            flex-direction: column;
        }

        .crystal-bubble {
            width: 48px;
            height: 48px;
        }

        .social-icon-img {
            width: 18px;
            height: 18px;
        }

        .px-8.lg\:px-20 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .profile-container {
            margin-bottom: 1rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>