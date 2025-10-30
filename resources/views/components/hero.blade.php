@props(['heroContent'])
<!-- resources/views/components/hero.blade.php -->
<section id="hero" class="section-full bg-gradient-to-br from-blue-50 via-white to-purple-50 pt-24 relative overflow-hidden flex items-center pb-8">
    <!-- Animated background elements -->
    <div class="absolute inset-0 -z-10 ">
        <div class="absolute top-20 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Grid background -->
    <div class="absolute inset-0 grid-bg opacity-30 -z-10 "></div>

    <div class="container mx-auto text-center fade-in relative z-10 px-4">
        <!-- Main heading with animated gradient -->
        <h1 class="text-5xl mt-14 md:text-7xl lg:text-8xl font-bold mb-6 text-gray-800">
            {{ $heroContent['hero_greeting'] ?? 'Hi, I\'m' }}
            <div class="inline-block px-4">
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient">
                    {{ $heroContent['hero_name'] ?? 'Your Name' }}
                </span>
            </div>
        </h1>

        <!-- Typing effect subtitle -->
        <div class="mb-8 mt-6 md:mt-10 h-10">
            <p class="text-xl md:text-3xl text-gray-600 font-medium">
                <span id="typed-text"></span>
                <span class="animate-pulse">|</span>
            </p>
        </div>

        <!-- Description -->
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mb-12 leading-relaxed">
            {{ $heroContent['hero_description'] ?? 'Transforming ideas into elegant, scalable digital solutions' }}
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
            <a href="{{ $heroContent['hero_primary_button_link'] ?? '#contact' }}"
                class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <span class="relative z-10">{{ $heroContent['hero_primary_button_text'] ?? 'Get In Touch' }}</span>
                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                </svg>
                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <a href="{{ $heroContent['hero_secondary_button_link'] ?? '#projects' }}"
                class="group inline-flex items-center gap-3 bg-white text-gray-700 px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300">
                <span>{{ $heroContent['hero_secondary_button_text'] ?? 'View My Work' }}</span>
                <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>

        <!-- Social Links -->
        <div class="flex justify-center gap-6 mb-12">
            @if(!empty($heroContent['hero_github_url']))
            <a href="{{ $heroContent['hero_github_url'] }}" target="_blank"
                class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-gray-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub" class="w-7 h-7 group-hover:scale-110 transition-transform"/>
                <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">GitHub</span>
            </a>
            @endif

            @if(!empty($heroContent['hero_linkedin_url']))
            <a href="{{ $heroContent['hero_linkedin_url'] }}" target="_blank"
                class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-blue-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" alt="LinkedIn" class="w-7 h-7 group-hover:scale-110 transition-transform"/>
                <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">LinkedIn</span>
            </a>
            @endif

            @if(!empty($heroContent['hero_email']))
            <a href="mailto:{{ $heroContent['hero_email'] }}"
                class="group relative w-14 h-14 flex items-center justify-center bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-red-300">
                <svg class="w-7 h-7 text-red-600 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
                <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Email</span>
            </a>
            @endif
        </div>

        <!-- Tech Stack Preview -->
        @if(!empty($heroContent['hero_tech_stack_icons']))
        <div class="inline-flex items-center gap-4 bg-white/80 backdrop-blur-sm px-8 py-4 rounded-2xl shadow-lg border border-gray-200 mb-12">
            <span class="text-gray-600 font-medium">{{ $heroContent['hero_tech_stack_label'] ?? 'Tech Stack:' }}</span>
            <div class="flex items-center gap-4">
                @php
                    $techStack = explode(',', $heroContent['hero_tech_stack_icons']);
                @endphp
                @foreach($techStack as $tech)
                    @php
                        [$name, $url] = explode('|', $tech);
                    @endphp
                    <div class="group relative">
                        <img src="{{ trim($url) }}" alt="{{ trim($name) }}" class="w-8 h-8 hover:scale-125 transition-transform cursor-pointer"/>
                        <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">{{ trim($name) }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Scroll indicator -->
        <div class="animate-bounce">
            <a href="#about" class="flex flex-col items-center gap-2 text-gray-400 hover:text-blue-600 transition-colors">
                <span class="text-sm font-medium">{{ $heroContent['hero_scroll_text'] ?? 'Scroll to explore' }}</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </div>
</section>

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
    
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
        background-origin: padding-box;
    }
</style>

<script>
    // Typing effect with dynamic texts from database
    const typingTexts = "{{ $heroContent['hero_typing_texts'] ?? 'Full-Stack Developer,Problem Solver' }}";
    const texts = typingTexts.split(',').map(text => text.trim());
    
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typedTextElement = document.getElementById('typed-text');

    function type() {
        const currentText = texts[textIndex];

        if (isDeleting) {
            typedTextElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            typedTextElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }

        if (!isDeleting && charIndex === currentText.length) {
            isDeleting = true;
            setTimeout(type, 2000);
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            setTimeout(type, 500);
        } else {
            setTimeout(type, isDeleting ? 50 : 100);
        }
    }

    // Start typing effect when page loads
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(type, 1000);
    });
</script>