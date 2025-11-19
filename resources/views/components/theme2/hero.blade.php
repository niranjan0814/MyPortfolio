@props(['heroContent', 'techStackSkills'])

{{-- THEME 2: ULTRA PREMIUM CORPORATE HERO --}}
<section id="hero" class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    
    {{-- ANIMATED GRID BACKGROUND --}}
    <div class="absolute inset-0 overflow-hidden opacity-30">
        <div class="absolute inset-0" style="background-image: 
            linear-gradient(to right, #e5e7eb 1px, transparent 1px),
            linear-gradient(to bottom, #e5e7eb 1px, transparent 1px);
            background-size: 40px 40px;"></div>
        {{-- Animated Gradient Orbs --}}
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-1/3 -right-20 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-1/2 w-96 h-96 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 py-24">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            {{-- LEFT COLUMN: CONTENT --}}
            <div class="space-y-8 animate-slide-left">
                
                {{-- STATUS BADGE --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm border border-blue-200 rounded-full shadow-lg">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    <span class="text-sm font-semibold text-slate-700">Available for new opportunities</span>
                </div>

                {{-- GREETING --}}
                <div>
                    <p class="text-lg font-medium text-blue-600 mb-2 tracking-wide uppercase">
                        {{ $heroContent['greeting'] ?? 'Hello, I\'m' }}
                    </p>
                    <h1 class="text-6xl lg:text-7xl xl:text-8xl font-black text-slate-900 leading-none tracking-tight mb-6">
                        {{ $heroContent['user_name'] ?? 'Your Name' }}
                    </h1>
                </div>

                {{-- DYNAMIC TYPING ROLE --}}
                @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']))
                    <div class="flex items-center gap-3 text-3xl lg:text-4xl font-bold text-slate-700">
                        <span class="text-blue-600">→</span>
                        <span id="typed-text-theme2" class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600"></span>
                        <span class="typing-cursor-theme2 text-blue-600">|</span>
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

                            setTimeout(type, 500);
                        });
                    </script>
                @endif

                {{-- DESCRIPTION --}}
                <p class="text-xl text-slate-600 leading-relaxed max-w-xl">
                    {{ $heroContent['description'] ?? 'Crafting exceptional digital experiences with precision, creativity, and cutting-edge technology. Transforming complex problems into elegant solutions.' }}
                </p>

                {{-- CTA BUTTONS --}}
                <div class="flex flex-wrap gap-4">
                    @if ($heroContent['btn_contact_enabled'] ?? false)
                        <a href="#contact" 
                           class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-xl shadow-xl shadow-blue-500/50 hover:shadow-2xl hover:shadow-blue-600/50 transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            <span class="relative z-10">{{ $heroContent['btn_contact_text'] ?? 'Get In Touch' }}</span>
                            <svg class="relative z-10 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                    @endif

                    @if ($heroContent['btn_projects_enabled'] ?? false)
                        <a href="#projects" 
                           class="inline-flex items-center gap-3 px-8 py-4 bg-white text-slate-900 font-bold rounded-xl border-2 border-slate-200 shadow-lg hover:shadow-xl hover:border-blue-300 transform hover:-translate-y-1 transition-all duration-300">
                            <span>{{ $heroContent['btn_projects_text'] ?? 'View Projects' }}</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    @endif
                </div>

                {{-- SOCIAL LINKS --}}
                @if (!empty($heroContent['social_links'] ?? []))
                    <div class="flex items-center gap-4 pt-4">
                        <span class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Connect:</span>
                        <div class="flex gap-3">
                            @foreach ($heroContent['social_links'] as $social)
                                @if (!empty($social['url'] ?? ''))
                                    <a href="{{ $social['url'] }}" target="_blank" 
                                       class="group relative w-12 h-12 flex items-center justify-center bg-white border-2 border-slate-200 rounded-xl hover:border-blue-400 hover:bg-blue-50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                        @if (!empty($social['icon'] ?? ''))
                                            <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}" class="w-5 h-5 grayscale group-hover:grayscale-0 transition-all" />
                                        @else
                                            <i class="fab fa-link text-slate-600 group-hover:text-blue-600 transition-colors"></i>
                                        @endif
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- STATS ROW --}}
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="text-center p-4 bg-white/60 backdrop-blur-sm rounded-xl border border-slate-200 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">5+</div>
                        <div class="text-sm font-semibold text-slate-600 mt-1">Years Exp.</div>
                    </div>
                    <div class="text-center p-4 bg-white/60 backdrop-blur-sm rounded-xl border border-slate-200 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">50+</div>
                        <div class="text-sm font-semibold text-slate-600 mt-1">Projects</div>
                    </div>
                    <div class="text-center p-4 bg-white/60 backdrop-blur-sm rounded-xl border border-slate-200 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-600">100%</div>
                        <div class="text-sm font-semibold text-slate-600 mt-1">Satisfaction</div>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: VISUAL --}}
            <div class="relative animate-slide-right">
                {{-- Main Card --}}
                <div class="relative group">
                    {{-- Glow Effect --}}
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-3xl opacity-20 group-hover:opacity-30 blur-2xl transition-opacity duration-500"></div>
                    
                    {{-- Card Container --}}
                    <div class="relative bg-gradient-to-br from-white to-blue-50 rounded-3xl border-2 border-white shadow-2xl overflow-hidden transform group-hover:scale-105 transition-all duration-500">
                        @if (!empty($heroContent['hero_image_url']))
                            <img src="{{ $heroContent['hero_image_url'] }}" alt="Hero" class="w-full h-auto object-cover" />
                        @else
                            {{-- Premium Gradient Placeholder --}}
                            <div class="aspect-square bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 p-16 flex items-center justify-center relative overflow-hidden">
                                {{-- Animated Circles --}}
                                <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl animate-float"></div>
                                <div class="absolute bottom-10 right-10 w-40 h-40 bg-white/10 rounded-full blur-xl animate-float-delayed"></div>
                                
                                {{-- Center Icon --}}
                                <div class="relative z-10 text-center text-white">
                                    <svg class="w-32 h-32 mx-auto mb-6 drop-shadow-2xl" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                                        <path d="M3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zm9.99 7.176A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z"/>
                                    </svg>
                                    <h3 class="text-3xl font-bold mb-2">Premium Portfolio</h3>
                                    <p class="text-blue-100 text-lg">Crafting Excellence</p>
                                </div>
                            </div>
                        @endif
                        
                        {{-- Overlay Badge --}}
                        <div class="absolute top-6 right-6 px-4 py-2 bg-white/90 backdrop-blur-sm rounded-full shadow-xl border border-white">
                            <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                                ⭐ Top Rated
                            </span>
                        </div>
                    </div>

                    {{-- Decorative Elements --}}
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-gradient-to-br from-purple-500 to-pink-500 rounded-3xl -z-10 opacity-20 blur-xl"></div>
                    <div class="absolute -top-6 -left-6 w-40 h-40 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl -z-10 opacity-20 blur-xl"></div>
                </div>
            </div>
        </div>

        {{-- TECH STACK SECTION --}}
        @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
            <div class="mt-24 animate-slide-up">
                <div class="bg-white/60 backdrop-blur-sm rounded-3xl border border-slate-200 shadow-xl p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-2">Tech Stack</h3>
                            <p class="text-slate-600">Tools & Technologies I Master</p>
                        </div>
                        <div class="w-16 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
                    </div>
                    
                    <div class="grid grid-cols-4 sm:grid-cols-6 lg:grid-cols-9 gap-6">
                        @foreach ($techStackSkills as $skill)
                            <div class="group relative">
                                <div class="relative w-16 h-16 flex items-center justify-center bg-white rounded-2xl border-2 border-slate-200 shadow-lg hover:shadow-xl hover:border-blue-300 transition-all duration-300 hover:-translate-y-2">
                                    @if ($skill->url)
                                        <img src="{{ $skill->url }}" alt="{{ $skill->name }}" class="w-10 h-10 object-contain grayscale group-hover:grayscale-0 transition-all" />
                                    @else
                                        <i class="fas fa-code text-slate-400 text-2xl group-hover:text-blue-600 transition-colors"></i>
                                    @endif
                                </div>
                                <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="bg-slate-900 text-white text-xs font-semibold px-3 py-1 rounded-lg whitespace-nowrap shadow-xl">
                                        {{ $skill->name }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- SCROLL INDICATOR --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#about" class="flex flex-col items-center gap-2 text-slate-400 hover:text-blue-600 transition-colors">
            <span class="text-sm font-semibold uppercase tracking-wider">Scroll</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </a>
    </div>
</section>

<style>
    /* Theme 2 Premium Animations */
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    @keyframes float-delayed {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-30px); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float-delayed 8s ease-in-out infinite;
    }

    .typing-cursor-theme2 {
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        from, to { opacity: 1; }
        50% { opacity: 0; }
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

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-left {
        animation: slideInLeft 1s ease-out;
    }

    .animate-slide-right {
        animation: slideInRight 1s ease-out 0.2s backwards;
    }

    .animate-slide-up {
        animation: slideInUp 1s ease-out 0.4s backwards;
    }

    /* Dark Mode */
    [data-theme="dark"] #hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #312e81 100%) !important;
    }

    [data-theme="dark"] #hero .bg-white {
        background: rgba(30, 41, 59, 0.8) !important;
    }

    [data-theme="dark"] #hero .border-slate-200 {
        border-color: #334155 !important;
    }

    [data-theme="dark"] #hero .text-slate-900 {
        color: #f8fafc !important;
    }

    [data-theme="dark"] #hero .text-slate-700 {
        color: #cbd5e1 !important;
    }

    [data-theme="dark"] #hero .text-slate-600 {
        color: #94a3b8 !important;
    }
</style>