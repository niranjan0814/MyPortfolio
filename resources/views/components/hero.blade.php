@props(['heroContent', 'techStackSkills'])

<section id="hero"
         class="section-full relative overflow-hidden flex items-center pb-8 pt-24 glass-noise min-h-screen w-full"
         style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));">
   
    <!-- Floating Particles (Monochrome Only) -->
    <div class="hero-particles absolute inset-0 -z-10 pointer-events-none"></div>
   
    <!-- Background Blobs (Normal Theme Only) -->
    <div class="absolute inset-0 -z-10 normal-theme-only overflow-hidden">
        <div class="absolute top-20 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Hero Background Image -->
    @if (!empty($heroContent['hero_image_url']))
        <div class="absolute inset-0 -z-20">
            <img src="{{ $heroContent['hero_image_url'] }}" alt="Hero Background"
                 class="w-full h-full object-cover opacity-10">
        </div>
    @endif

    <div class="container mx-auto text-center fade-in relative z-10 px-4 w-full">
        <!-- Heading -->
        <h1 class="text-5xl mt-14 md:text-7xl lg:text-8xl font-bold mb-6"
            style="color: var(--text-primary);">
            {{ $heroContent['greeting'] ?? "Hi, I'm" }}
            <div class="inline-block px-4">
                <span class="gradient-text animate-gradient">
                    {{ $heroContent['user_name'] ?? 'Your Name' }}
                </span>
            </div>
        </h1>

        <!-- TYPING TEXT + CURSOR -->
        @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']) && count($heroContent['typing_texts']) > 0)
            <div class="mb-8 mt-6 md:mt-10 min-h-[60px] flex justify-center items-center">
                <p class="text-xl md:text-3xl font-semibold inline-flex items-center"
                   style="color: var(--text-secondary);">
                    <span id="typed-text" class="min-w-[300px] text-center inline-block"></span>
                    <span class="inline-block w-1 h-7 md:h-9 ml-1 animate-pulse"
                          style="background: var(--accent-blue);"></span>
                </p>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const texts = @json(array_map(function($text) {
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
            <div class="mb-8 mt-6 md:mt-10">
                <p class="text-xl md:text-3xl font-semibold" style="color: var(--text-secondary);">
                    Full-Stack Developer
                </p>
            </div>
        @endif

        <!-- Description -->
        <p class="text-lg md:text-xl max-w-3xl mx-auto mb-12 leading-relaxed"
           style="color: var(--text-secondary);">
            {!! $heroContent['description'] ?? 'Transforming ideas into elegant, scalable digital solutions...' !!}
        </p>

        <!-- CTA Buttons -->
        @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                @if ($heroContent['btn_contact_enabled'] ?? false)
                    <a href="#contact"
                       class="group theme-btn glass-button relative inline-flex items-center gap-3 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                        <span class="relative z-10">{{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}</span>
                        <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                @endif

                @if ($heroContent['btn_projects_enabled'] ?? false)
                    <a href="#projects"
                       class="group theme-btn glass-button inline-flex items-center gap-3 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-2"
                       style="background: var(--card-bg); color: var(--text-primary); border-color: var(--border-color);">
                        <span>{{ $heroContent['btn_projects_text'] ?? 'View My Work' }}</span>
                        <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </div>
        @endif

        <!-- Social Links (DB-Driven, GitHub Fixed via CSS) -->
        @if (!empty($heroContent['social_links'] ?? []))
            <div class="flex justify-center gap-6 mb-12">
                @foreach ($heroContent['social_links'] as $social)
                    @if (!empty($social['url'] ?? ''))
                        @php
                            $isGitHub = str_contains(strtolower($social['url'] ?? ''), 'github.com')
                                     || str_contains(strtolower($social['name'] ?? ''), 'github');
                        @endphp

                        <a href="{{ $social['url'] }}" target="_blank"
                           class="group glass-card relative w-14 h-14 flex items-center justify-center rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2"
                           style="background: var(--card-bg); border-color: var(--border-color);">

                            @if (!empty($social['icon'] ?? ''))
                                <img src="{{ $social['icon'] }}"
                                     alt="{{ $social['name'] ?? 'Social' }}"
                                     class="w-7 h-7 group-hover:scale-110 transition-transform {{ $isGitHub ? 'force-white' : '' }}"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif

                            <svg class="{{ !empty($social['icon']) ? 'hidden' : '' }} w-7 h-7 group-hover:scale-110 transition-transform"
                                 fill="currentColor"
                                 style="color: var(--text-primary);"
                                 viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>

                            <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs font-medium z-50"
                                  style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                {{ $social['name'] ?? 'Social' }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif

        <!-- Tech Stack with Running Marquee -->
        @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
            <div class="glass-card inline-flex flex-col items-center gap-4 px-8 py-4 rounded-2xl shadow-lg border mb-12 w-full max-w-4xl mx-auto"
                 style="background: var(--card-bg); border: 1px solid var(--border-color);">
                <span class="text-gray-600 font-medium text-lg" style="color: var(--text-secondary);">Tech Stack:</span>
                <div class="relative w-full overflow-hidden">
                    <div class="flex items-center gap-8 animate-marquee whitespace-nowrap">
                        @foreach ($techStackSkills as $skill)
                            <div class="group relative tech-skill flex-shrink-0" data-skill-id="{{ $skill->id }}">
                                @if ($skill->url)
                                    <img src="{{ $skill->url }}" alt="{{ $skill->name }}"
                                         class="w-10 h-10 hover:scale-125 transition-transform cursor-pointer"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                @endif
                                <div class="{{ $skill->url ? 'hidden' : '' }} w-10 h-10 flex items-center justify-center rounded-full hover:scale-125 transition-transform cursor-pointer"
                                     style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                    <i class="fas fa-code text-white text-sm"></i>
                                </div>
                                <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs z-50"
                                      style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    {{ $skill->name }}
                                </span>
                            </div>
                        @endforeach
                        @foreach ($techStackSkills as $skill)
                            <div class="group relative tech-skill flex-shrink-0" data-skill-id="{{ $skill->id }}-dup">
                                @if ($skill->url)
                                    <img src="{{ $skill->url }}" alt="{{ $skill->name }}"
                                         class="w-10 h-10 hover:scale-125 transition-transform cursor-pointer"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                @endif
                                <div class="{{ $skill->url ? 'hidden' : '' }} w-10 h-10 flex items-center justify-center rounded-full hover:scale-125 transition-transform cursor-pointer"
                                     style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                    <i class="fas fa-code text-white text-sm"></i>
                                </div>
                                <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs z-50"
                                      style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                    {{ $skill->name }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-current to-transparent pointer-events-none"
                         style="background: linear-gradient(to right, var(--bg-gradient-start), transparent);"></div>
                    <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-current to-transparent pointer-events-none"
                         style="background: linear-gradient(to left, var(--bg-gradient-start), transparent);"></div>
                </div>
            </div>
        @endif

        <!-- Scroll Indicator (Lifted Higher) -->
        <div class="animate-bounce mt-0.5">
            <a href="#about" class="flex flex-col items-center gap-2 transition-colors"
               style="color: var(--text-muted);">
                <span class="text-sm font-medium">Scroll to explore</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Floating Particles Script (Monochrome Only) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const particlesContainer = document.querySelector('.hero-particles');
        if (!particlesContainer) return;

        const isMonochrome = document.documentElement.getAttribute('data-theme') === 'monochrome';
        if (!isMonochrome) return;

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
    });
</script>

<!-- Animations & Theme Styles -->
<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    .animate-gradient { background-size: 200% 200%; animation: gradient 3s ease infinite; }
    .animate-marquee { animation: marquee 25s linear infinite; }
    .animate-marquee:hover { animation-play-state: paused; }
    .animate-float { animation: float linear infinite; }

    .gradient-text {
        background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple), var(--accent-pink));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent !important;
    }

    /* Force white on GitHub icons (DB-driven) */
    .force-white {
        filter: brightness(0) invert(1) !important;
    }
    [data-theme="normal"] .force-white {
        filter: none !important;
    }

    /* Auto-detect any dark social icons by src/alt */
    img[src*="github"], img[alt*="github" i],
    img[src*="linkedin"], img[alt*="linkedin" i],
    img[src*="gitlab"], img[alt*="gitlab" i] {
        filter: brightness(0) invert(1);
    }
    [data-theme="normal"] img[src*="github"],
    [data-theme="normal"] img[alt*="github" i],
    [data-theme="normal"] img[src*="linkedin"],
    [data-theme="normal"] img[alt*="linkedin" i],
    [data-theme="normal"] img[src*="gitlab"],
    [data-theme="normal"] img[alt*="gitlab" i] {
        filter: none;
    }

    /* Theme-specific visibility */
    [data-theme="monochrome"] .normal-theme-only,
    [data-theme="normal"] .hero-particles { display: none; }

    /* Glassmorphism */
    .glass-noise {
        backdrop-filter: blur(12px) saturate(180%);
        -webkit-backdrop-filter: blur(12px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.1);
    }
    .glass-card, .glass-button {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    [data-theme="monochrome"] .glass-card,
    [data-theme="monochrome"] .glass-button {
        background: rgba(30, 30, 30, 0.3);
        border-color: rgba(255, 255, 255, 0.1);
    }

    /* Ensure text visibility */
    #typed-text { color: var(--text-secondary) !important; font-weight: 600 !important; }

    /* Fix horizontal scrolling - ONLY ADDED THIS */
    html, body {
        overflow-x: hidden;
        max-width: 100%;
    }
    .normal-theme-only {
        overflow: hidden;
    }
</style>