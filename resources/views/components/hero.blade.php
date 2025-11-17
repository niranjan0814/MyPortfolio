@props(['heroContent', 'techStackSkills'])

<section id="hero"
         class="section-full relative overflow-hidden flex items-center pb-8 pt-24 glass-noise"
         style="background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end)); min-height: 100vh;">
    
    <!-- Floating Particles (Monochrome Only) -->
    <div class="hero-particles"></div>
    
    <!-- Background Blobs (Normal Theme) -->
    <div class="absolute inset-0 -z-10 normal-theme-only">
        <div class="absolute top-20 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Hero Background Image (if set) -->
    @if (!empty($heroContent['hero_image_url']))
        <div class="absolute inset-0 -z-20">
            <img src="{{ $heroContent['hero_image_url'] }}" alt="Hero Background"
                 class="w-full h-full object-cover opacity-10">
        </div>
    @endif

    <div class="container mx-auto text-center fade-in relative z-10 px-4">
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
            <div class="mb-8 mt-6 md:mt-10 min-h-[48px] flex justify-center items-center">
                <p class="text-xl md:text-3xl font-medium inline-flex items-center"
                   style="color: var(--text-secondary);">
                    <span id="typed-text" class="min-w-[200px] text-left"></span>
                    <span class="inline-block w-1 h-8 ml-1 animate-pulse"
                          style="background: var(--accent-blue);"></span>
                </p>
            </div>

            <script>
                (function() {
                    const texts = @json(array_values($heroContent['typing_texts']));
                    const typedElement = document.getElementById('typed-text');

                    if (!typedElement || !Array.isArray(texts) || texts.length === 0) {
                        console.warn('Typing texts not configured properly');
                        return;
                    }

                    let textIndex = 0;
                    let charIndex = 0;
                    let isDeleting = false;

                    function type() {
                        const currentText = texts[textIndex];
                        
                        if (isDeleting) {
                            typedElement.textContent = currentText.substring(0, charIndex - 1);
                            charIndex--;
                        } else {
                            typedElement.textContent = currentText.substring(0, charIndex + 1);
                            charIndex++;
                        }

                        let speed = isDeleting ? 50 : 100;

                        if (!isDeleting && charIndex === currentText.length) {
                            speed = 1500;
                            isDeleting = true;
                        } else if (isDeleting && charIndex === 0) {
                            isDeleting = false;
                            textIndex = (textIndex + 1) % texts.length;
                            speed = 500;
                        }

                        setTimeout(type, speed);
                    }

                    setTimeout(type, 800);
                })();
            </script>
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
                    </a>
                @endif
                
                @if ($heroContent['btn_projects_enabled'] ?? false)
                    <a href="#projects"
                       class="group theme-btn glass-button inline-flex items-center gap-3 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        <span>{{ $heroContent['btn_projects_text'] ?? 'View My Work' }}</span>
                        <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </div>
        @endif

        <!-- Social Links -->
        @if (!empty($heroContent['social_links'] ?? []))
            <div class="flex justify-center gap-6 mb-12">
                @foreach ($heroContent['social_links'] as $social)
                    @if (!empty($social['url'] ?? ''))
                        <a href="{{ $social['url'] }}" target="_blank"
                           class="group glass-card relative w-14 h-14 flex items-center justify-center rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
                           style="background: var(--card-bg); border: 2px solid var(--border-color);">
                            @if (!empty($social['icon'] ?? ''))
                                <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}"
                                     class="w-7 h-7 group-hover:scale-110 transition-transform"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif
                            <svg class="{{ !empty($social['icon']) ? 'hidden' : '' }} w-7 h-7 group-hover:scale-110 transition-transform"
                                 style="color: {{ $social['color'] ?? '#dc2626' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs font-medium"
                                  style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                {{ $social['name'] ?? 'Social' }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif

        <!-- Tech Stack with Random Rotation -->
        @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
            <div class="glass-card inline-flex items-center gap-4 px-8 py-4 rounded-2xl shadow-lg mb-12"
                 style="background: var(--card-bg); border: 1px solid var(--border-color);">
                <span class="font-medium" style="color: var(--text-secondary);">Tech Stack:</span>
                <div id="tech-stack-container" class="flex items-center gap-4 transition-all duration-300">
                    @foreach ($techStackSkills->take($heroContent['tech_stack_count'] ?? 4) as $skill)
                        <div class="group relative tech-skill" data-skill-id="{{ $skill->id }}">
                            @if ($skill->url)
                                <img src="{{ $skill->url }}" alt="{{ $skill->name }}"
                                     class="w-8 h-8 hover:scale-125 transition-transform cursor-pointer"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif
                            <div class="{{ $skill->url ? 'hidden' : '' }} w-8 h-8 flex items-center justify-center rounded hover:scale-125 transition-transform cursor-pointer"
                                 style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                <i class="fas fa-code text-white text-sm"></i>
                            </div>
                            <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs"
                                  style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                {{ $skill->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <script>
                (function() {
                    const allSkills = @json($techStackSkills->map(fn($s) => ['id' => $s->id, 'name' => $s->name, 'url' => $s->url])->values());
                    const displayCount = {{ $heroContent['tech_stack_count'] ?? 4 }};
                    const container = document.getElementById('tech-stack-container');

                    if (!container || allSkills.length === 0) {
                        console.warn('Tech stack container or skills not available');
                        return;
                    }

                    function getRandomSkills() {
                        const shuffled = [...allSkills].sort(() => 0.5 - Math.random());
                        return shuffled.slice(0, Math.min(displayCount, allSkills.length));
                    }

                    function updateTechStack() {
                        const newSkills = getRandomSkills();
                        
                        // Fade out
                        container.style.opacity = '0';
                        container.style.transform = 'translateY(10px)';
                        
                        setTimeout(() => {
                            // Update content
                            container.innerHTML = newSkills.map(skill => `
                                <div class="group relative tech-skill" data-skill-id="${skill.id}">
                                    ${skill.url ? `
                                        <img src="${skill.url}" alt="${skill.name}"
                                             class="w-8 h-8 hover:scale-125 transition-transform cursor-pointer"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                                    ` : ''}
                                    <div class="${skill.url ? 'hidden' : ''} w-8 h-8 flex items-center justify-center rounded hover:scale-125 transition-transform cursor-pointer"
                                         style="background: linear-gradient(135deg, var(--accent-blue), var(--accent-purple));">
                                        <i class="fas fa-code text-white text-sm"></i>
                                    </div>
                                    <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap text-xs"
                                          style="background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--border-color);">
                                        ${skill.name}
                                    </span>
                                </div>
                            `).join('');
                            
                            // Fade in
                            container.style.opacity = '1';
                            container.style.transform = 'translateY(0)';
                        }, 300);
                    }

                    // Add transition styles
                    container.style.transition = 'opacity 0.3s ease, transform 0.3s ease';

                    // Auto-rotate every 3 seconds if there are more skills than display count
                    if (allSkills.length > displayCount) {
                        setInterval(updateTechStack, 3000);
                    }
                })();
            </script>
        @endif

        <!-- Scroll Indicator -->
        <div class="animate-bounce">
            <a href="#about" class="flex flex-col items-center gap-2 transition-colors hover:opacity-80"
               style="color: var(--text-muted);">
                <span class="text-sm font-medium">Scroll to explore</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Additional Animations -->
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
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    .animate-gradient { background-size: 200% 200%; animation: gradient 3s ease infinite; }
    
    /* Hide normal theme blobs in monochrome mode */
    [data-theme="monochrome"] .normal-theme-only {
        display: none;
    }
</style>