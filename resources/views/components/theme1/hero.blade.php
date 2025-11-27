@props(['heroContent', 'techStackSkills'])

<section id="hero"
    class="section-full relative overflow-hidden flex items-center justify-center glass-noise min-h-screen w-full"
    style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));">

    <!-- Floating Particles (Dark Only) -->
    <div class="hero-particles absolute inset-0 -z-10 pointer-events-none"></div>

    <!-- Background Blobs (Light Only) - Centered, no side shadows -->
    <div class="absolute inset-0 -z-10 normal-theme-only overflow-hidden">
        <div
            class="absolute top-1/4 left-1/2 transform -translate-x-1/2 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute bottom-1/4 left-1/2 transform -translate-x-1/2 -translate-y-20 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>
    </div>

    <!-- Hero Background Image -->
    @if (!empty($heroContent['hero_image_url']))
        <div class="absolute inset-0 -z-20">
            <img src="{{ $heroContent['hero_image_url'] }}" alt="Hero Background"
                class="w-full h-full object-cover opacity-10">
        </div>
    @endif

    <div class="mx-auto text-center fade-in relative z-10 px-6 md:px-12 lg:px-20 w-full max-w-7xl">
        <!-- Heading -->
        <h1 class="text-5xl mt-14 md:text-7xl lg:text-8xl font-bold mb-6 
           inline-flex gap-4 items-center justify-center flex-wrap"
            style="color: var(--text-primary); line-height: 1.2;">

            <span class="gradient-text animate-gradient whitespace-nowrap">
                {{ $heroContent['user_name'] ?? 'Your Name' }}
            </span>
        </h1>

        <!-- TYPING TEXT WITHOUT CURSOR -->
        @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
            <div class="mb-2 mt-0 md:mt-2 min-h-[40px] flex justify-center items-center">
                <p class="text-xl md:text-3xl font-semibold" style="color: var(--text-secondary);">
                    <span id="typed-text" class="min-w-[300px] text-center inline-block"></span>
                </p>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const texts = @json(array_map(function ($text) {
                        return is_array($text) && isset($text['text']) ? $text['text'] : $text;
                    }, array_values($heroContent['typing_texts'])));
                    const typedElement = document.getElementById('typed-text');
                    if (!typedElement || !Array.isArray(texts) || texts.length === 0) {
                        typedElement && (typedElement.textContent = 'Full-Stack Developer');
                        return;
                    }

                    let textIndex = 0, charIndex = 0, isDeleting = false, timeoutId = null;

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
                            speed = 2000; isDeleting = true;
                        } else if (isDeleting && charIndex === 0) {
                            isDeleting = false;
                            textIndex = (textIndex + 1) % texts.length;
                            speed = 500;
                        }
                        timeoutId = setTimeout(type, speed);
                    }

                    setTimeout(type, 800);
                    window.addEventListener('beforeunload', () => timeoutId && clearTimeout(timeoutId));
                });
            </script>
        @else
            <div class="mb-8 mt-2 md:mt-10 ">
                <p class="text-xl md:text-3xl font-semibold" style="color: var(--text-secondary);">
                    Problem solver & Innovator
                </p>
            </div>
        @endif

        <!-- Social Links - FIXED ICON VISIBILITY -->
        @php
            $socialLinks = $heroContent['social_links'] ?? [];
            if (is_string($socialLinks)) {
                $socialLinks = json_decode($socialLinks, true) ?? [];
            }
        @endphp
        @if (!empty($socialLinks))
            <div class="flex justify-center gap-6 mb-12 mt-8">
                @foreach ($socialLinks as $social)
                    @if (!empty($social['url'] ?? ''))
                        <a href="{{ $social['url'] }}" target="_blank" class="water-drop group relative">


                            @if (!empty($social['icon'] ?? ''))
                                <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}"
                                    class="social-icon w-7 h-7 group-hover:scale-110 transition-transform"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif

                            <svg class="{{ !empty($social['icon']) ? 'hidden' : '' }} w-7 h-7 group-hover:scale-110 transition-transform"
                                fill="currentColor" style="color: var(--text-primary);" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>

                            <span
                                class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs font-medium z-50"
                                style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                {{ $social['name'] ?? 'Social' }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
        <!-- CTA BUTTONS - LIQUID GLASS FINISH -->
        @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
            <div class="flex flex-col sm:flex-row gap-12 justify-center items-center mb-12 mt-12">

                @if ($heroContent['btn_contact_enabled'] ?? false)
                    <a href="#contact"
                        class="hero-cta-primary group relative inline-flex items-center gap-3 px-8 py-4 rounded-full font-bold text-lg shadow-lg transition-all duration-300 overflow-hidden">
                        <span class="relative z-10">{{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    </a>
                @endif

                @if ($heroContent['btn_projects_enabled'] ?? false)
                    <a href="#projects"
                        class="hero-cta-secondary group inline-flex items-center gap-3 px-8 py-4 rounded-full font-bold text-lg shadow-lg transition-all duration-300 border-2">
                        <span>{{ $heroContent['btn_projects_text'] ?? 'View My Work' }}</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform rotate-180"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                    </a>
                @endif
            </div>
        @endif



        <!-- Tech Stack with Running Marquee - FIXED ICON VISIBILITY -->
        @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
            <div class="tech-stack-container inline-flex flex-col items-center gap-4 px-8 py-4 rounded-2xl shadow-lg border mb-12 mt-3 w-full max-w-4xl mx-auto"
                style="background: var(--card-bg); border: 1px solid var(--border-color);">
                <span class="text-gray-600 font-medium text-lg" style="color: var(--text-secondary);">Tech Stack:</span>
                <div class="relative w-full overflow-hidden">
                    <div class="flex items-center gap-8 animate-marquee whitespace-nowrap">
                        @foreach ($techStackSkills as $skill)
                            <div class="group relative tech-skill flex-shrink-0" data-skill-id="{{ $skill->id }}">
                                @if ($skill->url)
                                    <img src="{{ $skill->url }}" alt="{{ $skill->name }}"
                                        class="tech-stack-icon w-10 h-10 hover:scale-125 transition-transform cursor-pointer"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                @endif
                                <div class="{{ $skill->url ? 'hidden' : '' }} w-10 h-10 flex items-center justify-center rounded-full hover:scale-125 transition-transform cursor-pointer"
                                    style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                    <i class="fas fa-code text-white text-sm"></i>
                                </div>
                                <span
                                    class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs z-50"
                                    style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    {{ $skill->name }}
                                </span>
                            </div>
                        @endforeach
                        @foreach ($techStackSkills as $skill)
                            <div class="group relative tech-skill flex-shrink-0" data-skill-id="{{ $skill->id }}-dup">
                                @if ($skill->url)
                                    <img src="{{ $skill->url }}" alt="{{ $skill->name }}"
                                        class="tech-stack-icon w-10 h-10 hover:scale-125 transition-transform cursor-pointer"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                @endif
                                <div class="{{ $skill->url ? 'hidden' : '' }} w-10 h-10 flex items-center justify-center rounded-full hover:scale-125 transition-transform cursor-pointer"
                                    style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                    <i class="fas fa-code text-white text-sm"></i>
                                </div>
                                <span
                                    class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs z-50"
                                    style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    {{ $skill->name }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Scroll Indicator - FIXED POSITION -->
        <div class="scroll-indicator animate-bounce fixed bottom-4 left-1/2 transform -translate-x-1/2 z-40">
            <a href="#about" class="flex flex-col items-center gap-2 transition-all duration-300"
                style="color: var(--text-muted);">
                <span class="text-sm font-medium">Scroll to explore</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Floating Particles Script (Dark Only) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const particlesContainer = document.querySelector('.hero-particles');
        if (!particlesContainer) return;

        function updateParticles() {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';

            if (isDark && particlesContainer.children.length === 0) {
                const particleCount = 40;
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'absolute w-1 h-1 bg-white rounded-full opacity-20 animate-float';
                    particle.style.left = `${Math.random() * 100}%`;
                    particle.style.top = `${Math.random() * 100}%`;
                    particle.style.animationDelay = `${Math.random() * 5}s`;
                    particle.style.animationDuration = `${5 + Math.random() * 10}s`;
                    particlesContainer.appendChild(particle);
                }
            } else if (!isDark) {
                particlesContainer.innerHTML = '';
            }
        }

        updateParticles();

        // Listen for theme changes
        const observer = new MutationObserver(updateParticles);
        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-theme']
        });
    });
</script>

<!-- COMPLETE STYLES -->
<style>
    @keyframes blob {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }

    .animate-marquee {
        animation: marquee 25s linear infinite;
    }

    .animate-marquee:hover {
        animation-play-state: paused;
    }

    .animate-float {
        animation: float linear infinite;
    }

    .gradient-text {
        background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
        display: inline-block;
        padding: 0 4px;
    }

    /* Fix text rendering and prevent clipping */
    h1 {
        overflow: visible !important;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h1 span {
        display: inline-block;
        overflow: visible !important;
    }

    /* ==========================================
       CTA BUTTONS - LIQUID GLASS FINISH
       ========================================== */
    .hero-cta-primary,
    .hero-cta-secondary {
        position: relative;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, 0.18);
    }

    /* PRIMARY BUTTON - Light Mode */
    [data-theme="light"] .hero-cta-primary {
        background: rgba(255, 255, 255, 0.25);
        box-shadow:
            0 8px 32px 0 rgba(59, 130, 246, 0.37),
            inset 0 2px 4px rgba(255, 255, 255, 0.5),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1);
        color: #1e40af;
    }

    [data-theme="light"] .hero-cta-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 9999px;
        padding: 2px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.1));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
    }

    [data-theme="light"] .hero-cta-primary:hover {
        background: rgba(255, 255, 255, 0.35);
        box-shadow:
            0 12px 48px 0 rgba(59, 130, 246, 0.5),
            inset 0 2px 6px rgba(255, 255, 255, 0.6),
            inset 0 -2px 6px rgba(0, 0, 0, 0.15);
        transform: translateY(-3px);
        border-color: rgba(255, 255, 255, 0.3);
    }

    /* PRIMARY BUTTON - Dark Mode */
    [data-theme="dark"] .hero-cta-primary {
        background: rgba(255, 255, 255, 0.08);
        box-shadow:
            0 8px 32px 0 rgba(0, 0, 0, 0.5),
            inset 0 2px 4px rgba(255, 255, 255, 0.1),
            inset 0 -2px 4px rgba(0, 0, 0, 0.3);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.15);
    }

    [data-theme="dark"] .hero-cta-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 9999px;
        padding: 2px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
    }

    [data-theme="dark"] .hero-cta-primary:hover {
        background: rgba(255, 255, 255, 0.15);
        box-shadow:
            0 12px 48px 0 rgba(255, 255, 255, 0.1),
            inset 0 2px 6px rgba(255, 255, 255, 0.15),
            inset 0 -2px 6px rgba(0, 0, 0, 0.4);
        transform: translateY(-3px);
        border-color: rgba(255, 255, 255, 0.3);
    }

    /* SECONDARY BUTTON - Light Mode */
    [data-theme="light"] .hero-cta-secondary {
        background: rgba(255, 255, 255, 0.2);
        box-shadow:
            0 8px 32px 0 rgba(0, 0, 0, 0.1),
            inset 0 2px 4px rgba(255, 255, 255, 0.5),
            inset 0 -2px 4px rgba(0, 0, 0, 0.05);
        color: #1e293b;
        border-color: rgba(255, 255, 255, 0.25);
    }

    [data-theme="light"] .hero-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.3);
        box-shadow:
            0 12px 48px 0 rgba(0, 0, 0, 0.15),
            inset 0 2px 6px rgba(255, 255, 255, 0.6),
            inset 0 -2px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
        border-color: rgba(59, 130, 246, 0.3);
    }

    /* SECONDARY BUTTON - Dark Mode */
    [data-theme="dark"] .hero-cta-secondary {
        background: rgba(255, 255, 255, 0.05);
        box-shadow:
            0 8px 32px 0 rgba(0, 0, 0, 0.5),
            inset 0 2px 4px rgba(255, 255, 255, 0.08),
            inset 0 -2px 4px rgba(0, 0, 0, 0.3);
        color: #e5e7eb;
        border-color: rgba(255, 255, 255, 0.12);
    }

    [data-theme="dark"] .hero-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.12);
        box-shadow:
            0 12px 48px 0 rgba(255, 255, 255, 0.08),
            inset 0 2px 6px rgba(255, 255, 255, 0.12),
            inset 0 -2px 6px rgba(0, 0, 0, 0.4);
        transform: translateY(-3px);
        border-color: rgba(255, 255, 255, 0.25);
    }

    /* ==========================================
       SOCIAL LINKS - FIXED ICON VISIBILITY
       ========================================== */
    .social-link {
        background: var(--card-bg);
        border-color: var(--border-color);
    }

    /* Light mode - Make dark icons visible with slight opacity */
    [data-theme="light"] .social-icon {
        filter: none !important;
        opacity: 0.8;
    }

    [data-theme="light"] .social-link:hover .social-icon {
        opacity: 1;
    }

    /* Dark mode - Force bright filter on dark icons */
    [data-theme="dark"] .social-icon {
        filter: brightness(0) invert(1) !important;
        opacity: 0.9;
    }

    [data-theme="dark"] .social-link:hover .social-icon {
        opacity: 1;
    }

    /* Tech Stack Icons - Show in original colors */
    [data-theme="light"] .tech-stack-icon {
        filter: none !important;
        opacity: 0.85;
    }

    [data-theme="light"] .tech-skill:hover .tech-stack-icon {
        opacity: 1;
    }

    /* Dark mode - Keep original colors, just brighten visibility */
    [data-theme="dark"] .tech-stack-icon {
        filter: brightness(1.2) !important;
        opacity: 0.95;
    }

    [data-theme="dark"] .tech-skill:hover .tech-stack-icon {
        filter: brightness(1.4) !important;
        opacity: 1;
    }

    [data-theme="light"] .social-link:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        border-color: #3b82f6;
        background: #ffffff;
    }

    [data-theme="dark"] .social-link {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        border-color: rgba(255, 255, 255, 0.15);
    }

    [data-theme="dark"] .social-link:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 48px rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.12);
    }

    /* ==========================================
       SCROLL INDICATOR - FIXED & STABLE
       ========================================== */
    .scroll-indicator {
        pointer-events: auto;
        position: fixed;
        bottom: 1.75rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 40;
    }

    .scroll-indicator a {
        opacity: 1;
    }

    [data-theme="light"] .scroll-indicator a:hover {
        color: #3b82f6;
        transform: translateY(4px);
    }

    [data-theme="dark"] .scroll-indicator a:hover {
        color: rgba(255, 255, 255, 0.9);
        transform: translateY(4px);
    }

    /* ==========================================
       TECH STACK - NO EDGE SHADES
       ========================================== */
    .tech-stack-container {
        backdrop-filter: blur(12px);
    }

    [data-theme="light"] .tech-stack-container {
        background: rgba(255, 255, 255, 0.7) !important;
        border-color: rgba(229, 231, 235, 0.8) !important;
    }

    [data-theme="dark"] .tech-stack-container {
        background: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(255, 255, 255, 0.15) !important;
    }

    /* Theme-specific visibility */
    [data-theme="dark"] .normal-theme-only {
        display: none !important;
    }

    [data-theme="light"] .hero-particles {
        display: none !important;
    }

    /* Glassmorphism */
    .glass-noise {
        backdrop-filter: blur(12px) saturate(180%);
        -webkit-backdrop-filter: blur(12px) saturate(180%);
    }

    .glass-card,
    .glass-button {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    [data-theme="light"] .glass-card,
    [data-theme="light"] .glass-button {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(229, 231, 235, 0.8);
    }

    [data-theme="dark"] .glass-card,
    [data-theme="dark"] .glass-button {
        background: rgba(30, 30, 30, 0.3);
        border-color: rgba(255, 255, 255, 0.1);
    }

    /* ==========================================
   LIQUID GLASS EFFECT FOR SOCIAL LINKS
   ========================================== */
    .liquid-glass-icon {
        position: relative;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 2px solid rgba(255, 255, 255, 0.18);
        border-radius: 9999px;
        /* fully round */
        overflow: hidden;
    }

    /* Light Mode */
    [data-theme="light"] .liquid-glass-icon {
        background: rgba(255, 255, 255, 0.35);
        box-shadow:
            0 8px 32px rgba(59, 130, 246, 0.25),
            inset 0 2px 4px rgba(255, 255, 255, 0.5),
            inset 0 -2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Dark Mode */
    [data-theme="dark"] .liquid-glass-icon {
        background: rgba(255, 255, 255, 0.08);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.5),
            inset 0 2px 4px rgba(255, 255, 255, 0.1),
            inset 0 -2px 4px rgba(0, 0, 0, 0.3);
    }

    /* Hover */
    .liquid-glass-icon:hover {
        transform: translateY(-6px);
        transition: 0.3s ease;
    }

    /* Light hover */
    [data-theme="light"] .liquid-glass-icon:hover {
        background: rgba(255, 255, 255, 0.45);
        box-shadow:
            0 12px 48px rgba(59, 130, 246, 0.35),
            inset 0 2px 6px rgba(255, 255, 255, 0.6),
            inset 0 -2px 6px rgba(0, 0, 0, 0.15);
    }

    /* Dark hover */
    [data-theme="dark"] .liquid-glass-icon:hover {
        background: rgba(255, 255, 255, 0.15);
        box-shadow:
            0 12px 48px rgba(255, 255, 255, 0.1),
            inset 0 2px 6px rgba(255, 255, 255, 0.15),
            inset 0 -2px 6px rgba(0, 0, 0, 0.4);
    }

   /* ⭐ CRYSTAL CLEAR LIQUID GLASS ICON */
.water-drop {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;

    /* Almost fully transparent centre */
    background: rgba(255, 255, 255, 0.08);

    /* Very low blur = crystal clear */
    backdrop-filter: blur(6px) saturate(180%);
    -webkit-backdrop-filter: blur(6px) saturate(180%);

    /* Sharp glossy edges */
    border: 1px solid rgba(255, 255, 255, 0.3);

    /* Strong glass edge highlight */
    box-shadow:
        inset 0 1px 4px rgba(255, 255, 255, 0.4),  /* top highlight */
        inset 0 -2px 6px rgba(0, 0, 0, 0.3),      /* bottom shadow */
        0 8px 22px rgba(0, 0, 0, 0.35);           /* outside depth */

    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s ease;
}

/* Curved top highlight (very glassy) */
.water-drop::before {
    content: '';
    position: absolute;
    top: 5px;
    left: 6px;
    width: 70%;
    height: 28%;
    background: rgba(255, 255, 255, 0.35);
    filter: blur(6px);
    border-radius: 50%;
    opacity: 0.55;
}

/* Bottom shine */
.water-drop::after {
    content: '';
    position: absolute;
    bottom: 6px;
    left: 50%;
    transform: translateX(-50%);
    width: 26%;
    height: 16%;
    background: rgba(255, 255, 255, 0.18);
    filter: blur(6px);
    border-radius: 9999px;
}

/* Hover effect */
.water-drop:hover {
    transform: translateY(-5px) scale(1.05);
    background: rgba(255, 255, 255, 0.12);
}

/* ICON inside */
.water-drop img {
    width: 28px;
    height: 28px;
    opacity: 0.95;
    transition: transform 0.3s ease;
}

.water-drop:hover img {
    transform: scale(1.18);
}

</style>