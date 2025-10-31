@props(['heroContent', 'techStackSkills'])

<section id="hero"
         class="section-full bg-gradient-to-br from-blue-50 via-white to-purple-50 pt-24 relative overflow-hidden flex items-center pb-8">
    <!-- Background Blobs -->
    <div class="absolute inset-0 -z-10">
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

    <div class="container mx-auto text-center fade-in relative z-10 px-4">
        <!-- Heading -->
        <h1 class="text-5xl mt-14 md:text-7xl lg:text-8xl font-bold mb-6 text-gray-800">
            {{ $heroContent['greeting'] ?? "Hi, I'm" }}
            <div class="inline-block px-4">
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient">
                    {{ $heroContent['user_name'] ?? 'Your Name' }}
                </span>
            </div>
        </h1>

        <!-- TYPING TEXT + CURSOR -->
        @if (!empty($heroContent['typing_texts']) && is_array($heroContent['typing_texts']))
            <div class="mb-8 mt-6 md:mt-10 h-12 flex justify-center items-center">
                <p class="text-xl md:text-3xl text-gray-600 font-medium inline-flex items-center">
                    <span id="typed-text"></span>
                    <span class="inline-block w-1 h-8 bg-blue-600 ml-1 animate-pulse"></span>
                </p>
            </div>
        @endif

        <!-- Description -->
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mb-12 leading-relaxed">
            {!! $heroContent['description'] ?? 'Transforming ideas into elegant, scalable digital solutions...' !!}
        </p>

        <!-- CTA Buttons -->
        @if (($heroContent['btn_contact_enabled'] ?? false) || ($heroContent['btn_projects_enabled'] ?? false))
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                @if ($heroContent['btn_contact_enabled'] ?? false)
                    <a href="#contact"
                       class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
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
                       class="group inline-flex items-center gap-3 bg-white text-gray-700 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300">
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
                           class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100"
                           style="--hover-border-color: {{ $social['color'] ?? '#3b82f6' }}">
                            @if (!empty($social['icon'] ?? ''))
                                <img src="{{ $social['icon'] }}" alt="{{ $social['name'] ?? 'Social' }}"
                                     class="w-7 h-7 group-hover:scale-110 transition-transform"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif
                            @if (empty($social['icon']) || str_contains($social['url'], 'mailto:'))
                                <svg class="{{ !empty($social['icon']) ? 'hidden' : '' }} w-7 h-7 group-hover:scale-110 transition-transform"
                                     style="color: {{ $social['color'] ?? '#dc2626' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            @endif
                            <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                {{ $social['name'] ?? 'Social' }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
            <style>
                a[style*="--hover-border-color"]:hover { border-color: var(--hover-border-color) !important; }
            </style>
        @endif

        <!-- Tech Stack -->
        @if (($heroContent['tech_stack_enabled'] ?? false) && $techStackSkills->isNotEmpty())
            <div class="inline-flex items-center gap-4 bg-white/80 backdrop-blur-sm px-8 py-4 rounded-2xl shadow-lg border border-gray-200 mb-12">
                <span class="text-gray-600 font-medium">Tech Stack:</span>
                <div class="flex items-center gap-4">
                    @foreach ($techStackSkills as $skill)
                        <div class="group relative">
                            @if ($skill->url)
                                <img src="{{ $skill->url }}" alt="{{ $skill->name }}"
                                     class="w-8 h-8 hover:scale-125 transition-transform cursor-pointer"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif
                            <div class="{{ $skill->url ? 'hidden' : '' }} w-8 h-8 flex items-center justify-center bg-gradient-to-br from-blue-500 to-purple-500 rounded hover:scale-125 transition-transform cursor-pointer">
                                <i class="fas fa-code text-white text-sm"></i>
                            </div>
                            <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                {{ $skill->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Scroll Indicator -->
        <div class="animate-bounce">
            <a href="#about" class="flex flex-col items-center gap-2 text-gray-400 hover:text-blue-600 transition-colors">
                <span class="text-sm font-medium">Scroll to explore</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Animations -->
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
</style>

<!-- TYPING SCRIPT (ONLY ONCE) -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const texts = @json($heroContent['typing_texts'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        const typedElement = document.getElementById('typed-text');

        if (!typedElement || !Array.isArray(texts) || texts.length === 0) {
            console.warn('Typing texts not available:', texts);
            return;
        }

        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const currentText = texts[textIndex];
            typedElement.textContent = isDeleting
                ? currentText.substring(0, charIndex - 1)
                : currentText.substring(0, charIndex + 1);

            charIndex = isDeleting ? charIndex - 1 : charIndex + 1;

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
    });
</script>
@endpush