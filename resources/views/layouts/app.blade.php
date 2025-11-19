<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- BULLETPROOF TITLE - Works on ALL pages --}}
    <title>
        @if(isset($project))
            {{ $project->title }} | {{ $user->full_name ?? $user->name ?? 'Portfolio' }}
        @elseif(isset($heroContent['user_name']))
            {{ $heroContent['user_name'] }} | Full-Stack Developer Portfolio
        @else
            {{ $user->full_name ?? $user->name ?? 'Portfolio' }} | Developer Portfolio
        @endif
    </title>

    {{-- BULLETPROOF META DESCRIPTION --}}
    <meta name="description" content="{{
        $project->description ??
        $heroContent['description'] ??
        $user->description ??
        'Full-Stack Developer Portfolio'
    }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          integrity="sha512-D1xDxkGKfQ3FtA4iO7QdZq6r8N2IoT2EKHFXPhprYyLq4zHTGv7Ew2AZZT1jK8ZCKy9v6gRXH8tK2+gFqM6PlQ=="
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />

    <!-- Global Tailwind / App CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Determine active theme (with preview support) --}}
    @php
        $activeTheme = $theme ?? $user->active_theme ?? 'theme1';
        if (request('preview') && request('theme')) {
            $activeTheme = request('theme');
        }
    @endphp

    {{-- Load theme-specific CSS only --}}
    @if($activeTheme === 'theme1')
        @vite('resources/css/themes/theme1.css')
    @elseif($activeTheme === 'theme2')
        @vite('resources/css/themes/theme2.css')
    @elseif($activeTheme === 'theme3')
        @vite('resources/css/themes/theme3.css')
    @elseif($activeTheme === 'theme4')
        @vite('resources/css/themes/theme4.css')
    @endif

    <!-- Global styles that apply to every theme -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        * { scroll-behavior: smooth; }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-8px) scale(1.02); }

        .section-full { min-height: auto; padding: 6rem 1.5rem; }
        @media (max-width: 768px) { .section-full { padding: 4rem 1.5rem; } }

        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--bg-secondary); }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--accent-blue), var(--accent-purple));
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, var(--accent-purple), var(--accent-blue));
        }
    </style>
</head>
<body>

    {{-- Theme-aware Header --}}
    <x-dynamic-component :component="$activeTheme . '.header'" :user="$user" />

    {{-- Page Content --}}
    @yield('content')

    {{-- Theme-aware Footer --}}
    <x-dynamic-component :component="$activeTheme . '.footer'" :user="$user" />

    <!-- Back to Top Button -->
    <button id="backToTop"
            class="fixed bottom-8 right-8 p-4 rounded-full shadow-lg opacity-0 pointer-events-none transition-all duration-300 hover:scale-110 z-50 glass-button"
            style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple)));
                   color: var(--text-primary);
                   border: 1px solid var(--glass-border, var(--border-color));">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/>
        </svg>
    </button>

    <script>
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.pointerEvents = 'auto';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.pointerEvents = 'none';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

    @vite('resources/js/theme.js')
    @stack('scripts')
</body>
</html>