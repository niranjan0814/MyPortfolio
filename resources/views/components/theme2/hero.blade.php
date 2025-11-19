@props(['heroContent', 'techStackSkills'])

{{-- Theme 2: Side-by-side Hero Layout - Drastically Different from Theme 1 --}}
<section id="hero" class="corporate-section min-h-screen flex items-center relative overflow-hidden"
         style="background: linear-gradient(135deg, var(--theme2-bg-secondary) 0%, var(--theme2-bg-primary) 100%);">
    
    {{-- Geometric Pattern Background --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, var(--theme2-primary) 10px, var(--theme2-primary) 11px);"></div>
    </div>

    <div class="corporate-container w-full relative z-10">
        <div class="corporate-row items-center">
            
            {{-- LEFT: Content --}}
            <div class="flex-1 animate-slide-left">
                {{-- Greeting Badge --}}
                <div class="corporate-badge corporate-badge-primary inline-block mb-6">
                    {{ $heroContent['greeting'] ?? "Hi, I'm" }}
                </div>

                {{-- Main Heading --}}
                <h1 class="corporate-heading-1 mb-6">
                    {{ $heroContent['user_name'] ?? 'Your Name' }}
                </h1>

                {{-- Typing Text --}}
                @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']))
                    <div class="mb-8">
                        <h2 class="corporate-heading-3" style="color: var(--theme2-primary);">
                            <span id="typed-text-theme2"></span><span class="typing-cursor">|</span>
                        </h2>
                    </div>
                    
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

                {{-- Description --}}
                <p class="corporate-body-large mb-10 max-w-2xl">
                    {{ $heroContent['description'] ?? 'Transforming ideas into elegant, scalable digital solutions.' }}
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-6 mb-12">
                    @if ($heroContent['btn_contact_enabled'] ?? false)
                        <a href="#contact" class="corporate-btn-primary">
                            {{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}
                            <svg class="w-5 h-5 inline-block ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @endif

                    @if ($heroContent['btn_projects_enabled'] ?? false)
                        <a href="#projects" class="corporate-btn-secondary">
                            {{ $heroContent['btn_projects_text'] ?? 'View My Work' }}
                        </a>
                    @endif
                </div>

                {{-- Social Links - Horizontal Row --}}
                @if (!empty($heroContent['social_links'] ?? []))
                    <div class="flex gap-4">
                        @foreach ($heroContent['social_links'] as $social)
                            @if (!empty($social['url'] ?? ''))
                                <a href="{{ $social['url'] }}" target="_blank" 
                                   class="w-12 h-12 flex items-center justify-center border-2 border-current rounded transition-all hover:scale-110"
                                   style="color: var(--theme2-primary);">
                                    @if (!empty($social['icon'] ?? ''))
                                        <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}" class="w-6 h-6" />
                                    @else
                                        <i class="fab fa-link text-xl"></i>
                                    @endif
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- RIGHT: Image/Visual --}}
            <div class="flex-1 animate-slide-right">
                <div class="relative">
                    {{-- Main Image Container --}}
                    <div class="relative z-10">
                        <div class="corporate-card overflow-hidden" style="border-radius: 8px;">
                            @if (!empty($heroContent['hero_image_url']))
                                <img src="{{ $heroContent['hero_image_url'] }}" alt="Hero" class="w-full h-auto object-cover" />
                            @else
                                {{-- Fallback: Decorative Geometric Pattern --}}
                                <div class="aspect-square bg-gradient-to-br from-blue-600 to-purple-600 flex items-center justify-center">
                                    <svg class="w-64 h-64 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Decorative Elements --}}
                    <div class="absolute -bottom-8 -right-8 w-64 h-64 border-4 rounded-lg -z-10"
                         style="border-color: var(--theme2-primary);"></div>
                </div>
            </div>
        </div>

        {{-- Tech Stack - Bottom Row --}}
        @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
            <div class="mt-20 animate-slide-up">
                <div class="corporate-divider mb-6"></div>
                <h3 class="text-sm font-bold uppercase tracking-wider mb-6" style="color: var(--theme2-text-muted);">
                    Tech Stack
                </h3>
                <div class="flex flex-wrap gap-6 items-center">
                    @foreach ($techStackSkills as $skill)
                        <div class="group relative">
                            @if ($skill->url)
                                <img src="{{ $skill->url }}" alt="{{ $skill->name }}" 
                                     class="w-12 h-12 grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100" />
                            @else
                                <div class="w-12 h-12 flex items-center justify-center border-2 rounded transition-all"
                                     style="border-color: var(--theme2-border-medium);">
                                    <i class="fas fa-code"></i>
                                </div>
                            @endif
                            <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-xs whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity"
                                  style="color: var(--theme2-text-muted);">
                                {{ $skill->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    .typing-cursor {
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        from, to { opacity: 1; }
        50% { opacity: 0; }
    }
</style>