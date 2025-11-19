@props(['heroContent', 'techStackSkills'])

{{-- THEME 2: PREMIUM CORPORATE HERO --}}
<section id="hero" class="corporate-section corporate-section-alt min-h-screen flex items-center justify-center relative overflow-hidden">
    
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-gradient-to-br from-corporate-primary to-corporate-accent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cmVjdCB3aWR0aD0iNjAiIGhlaWdodD0iNjAiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
    </div>

    {{-- Subtle Grid Overlay --}}
    <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:60px_60px] [mask-image:radial-gradient(ellipse_80%_50%_at_50%_50%,black,transparent)]"></div>

    <div class="corporate-container relative z-10">
        <div class="corporate-grid corporate-grid-2 items-center gap-16">
            
            {{-- LEFT: CONTENT --}}
            <div class="corporate-animate-slide-left space-y-8">
                
                {{-- Status Badge --}}
                <div class="corporate-badge corporate-badge-primary inline-flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-corporate-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-corporate-primary"></span>
                    </span>
                    <span>Available for new opportunities</span>
                </div>

                {{-- Main Heading --}}
                <div class="space-y-4">
                    <h1 class="corporate-heading-1 leading-tight">
                        <span class="block">{{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[0] ?? 'Your' }}</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-corporate-primary to-corporate-accent">
                            {{ explode(' ', $heroContent['user_name'] ?? 'Your Name')[1] ?? 'Name' }}
                        </span>
                    </h1>
                </div>

                {{-- Dynamic Role --}}
                @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']))
                    <div class="flex items-center gap-3">
                        <div class="corporate-divider"></div>
                        <div class="corporate-heading-4 text-corporate-primary flex items-center gap-2">
                            <span id="corporate-typed-text"></span>
                            <span class="text-corporate-accent animate-blink">|</span>
                        </div>
                    </div>
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const texts = @json(array_map(function ($text) {
                                return is_array($text) && isset($text['text']) ? $text['text'] : $text;
                            }, array_values($heroContent['typing_texts'])));
                            
                            const typedElement = document.getElementById('corporate-typed-text');
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

                            setTimeout(type, 300);
                        });
                    </script>
                @endif

                {{-- Description --}}
                <p class="corporate-body-large max-w-2xl">
                    {{ $heroContent['description'] ?? 'Building scalable digital solutions with modern technology stacks and proven methodologies. Focused on delivering exceptional user experiences and robust system architecture.' }}
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-4 pt-4">
                    @if ($heroContent['btn_contact_enabled'] ?? false)
                        <a href="#contact" 
                           class="corporate-btn corporate-btn-primary corporate-btn-lg group">
                            <span>{{ $heroContent['btn_contact_text'] ?? 'Start Conversation' }}</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    @endif

                    @if ($heroContent['btn_projects_enabled'] ?? false)
                        <a href="#projects" 
                           class="corporate-btn corporate-btn-secondary corporate-btn-lg group">
                            <span>{{ $heroContent['btn_projects_text'] ?? 'View Portfolio' }}</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                    @endif
                </div>

                {{-- Quick Stats --}}
                <div class="corporate-grid corporate-grid-3 gap-6 pt-8">
                    <div class="corporate-stat">
                        <div class="corporate-stat-number">5+</div>
                        <div class="corporate-stat-label">Years Experience</div>
                    </div>
                    <div class="corporate-stat">
                        <div class="corporate-stat-number">50+</div>
                        <div class="corporate-stat-label">Projects</div>
                    </div>
                    <div class="corporate-stat">
                        <div class="corporate-stat-number">100%</div>
                        <div class="corporate-stat-label">Client Satisfaction</div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: PROFILE & TECH STACK --}}
            <div class="corporate-animate-slide-right space-y-8">
                
                {{-- Profile Card --}}
                <div class="corporate-card corporate-card-elevated p-8 text-center">
                    @if (!empty($heroContent['hero_image_url']))
                        <div class="corporate-avatar corporate-avatar-xl mx-auto mb-6">
                            <img src="{{ $heroContent['hero_image_url'] }}" alt="Profile" class="w-full h-full object-cover rounded-full" />
                        </div>
                    @else
                        <div class="corporate-avatar corporate-avatar-xl mx-auto mb-6 bg-gradient-to-br from-corporate-primary to-corporate-accent flex items-center justify-center text-corporate-white">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif

                    <h3 class="corporate-heading-4 mb-2">{{ $heroContent['user_name'] ?? 'Your Name' }}</h3>
                    <p class="corporate-body text-corporate-text-muted mb-4" id="current-role"></p>
                    
                    {{-- Availability Status --}}
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-corporate-bg-secondary border border-corporate-border">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-corporate-secondary opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-corporate-secondary"></span>
                        </span>
                        <span class="corporate-body-small font-medium">Open to opportunities</span>
                    </div>
                </div>

                {{-- Tech Stack --}}
                @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
                    <div class="corporate-card p-6">
                        <h4 class="corporate-heading-4 mb-4">Core Technologies</h4>
                        <div class="corporate-grid corporate-grid-3 gap-4">
                            @foreach ($techStackSkills->take(6) as $skill)
                                <div class="group relative text-center p-3 rounded-lg border border-corporate-border hover:border-corporate-primary transition-colors">
                                    @if ($skill->url)
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}" 
                                             class="w-8 h-8 mx-auto mb-2 grayscale group-hover:grayscale-0 transition-all" />
                                    @else
                                        <div class="w-8 h-8 mx-auto mb-2 bg-gradient-to-br from-corporate-primary to-corporate-accent rounded flex items-center justify-center">
                                            <i class="fas fa-code text-white text-sm"></i>
                                        </div>
                                    @endif
                                    <span class="corporate-body-small font-medium">{{ $skill->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <a href="#about" class="flex flex-col items-center gap-2 text-corporate-text-muted hover:text-corporate-primary transition-colors group">
                <span class="corporate-body-small font-medium uppercase tracking-wider">Explore More</span>
                <div class="w-6 h-10 border-2 border-current rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-current rounded-full mt-2 group-hover:mt-3 transition-all"></div>
                </div>
            </a>
        </div>
    </div>
</section>

<style>
    /* Corporate Theme Animations */
    @keyframes blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0; }
    }

    .animate-blink {
        animation: blink 1s step-end infinite;
    }

    /* Ensure theme variables are applied */
    .corporate-theme {
        --bg-primary: var(--corporate-bg-primary);
        --bg-secondary: var(--corporate-bg-secondary);
        --text-primary: var(--corporate-text-primary);
        --text-secondary: var(--corporate-text-secondary);
        --text-muted: var(--corporate-text-muted);
        --border-color: var(--corporate-border);
        --card-bg: var(--corporate-bg-primary);
        --card-shadow: var(--corporate-shadow);
    }

    /* Smooth transitions for theme switching */
    .corporate-card,
    .corporate-btn,
    .corporate-nav,
    .corporate-badge,
    .corporate-input {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>