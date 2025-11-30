<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- DYNAMIC TITLE --}}
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ $user->full_name ?? $user->name ?? 'Portfolio' }}
        @endif
    </title>

    {{-- ✅ FIXED FAVICON SYSTEM - Always use $user variable --}}
    @if(isset($user) && $user->hasFavicon())
        {{-- Custom user favicon --}}
        <link rel="icon" type="image/png" href="{{ $user->favicon_url }}">
        <link rel="apple-touch-icon" href="{{ $user->favicon_url }}">
    @else
        {{-- Default favicon from public root --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-oqs5R4U4zGqT9h29VvY8WcN6i/K3PaY5E9O+V1YxDCEV4VpWw2X2gYdEx+kt1/3uzMdGII4XESyqCCptNPTRZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Theme-specific CSS -->
    @php
        $activeTheme = $theme ?? $user->active_theme ?? 'theme1';
        if (request('preview') && request('theme')) {
            $activeTheme = request('theme');
        }
    @endphp

    {{-- All themes use Tailwind + inline component styling --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Global Base Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        /* CSS Variables for Theme Consistency */
        :root {
            --header-height: 70px;
            --section-spacing: 6rem;
            --container-max-width: 1280px;
        }

        * {
            scroll-behavior: smooth;
            box-sizing: border-box;
        }

        html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        /* Global Animations */
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Section Spacing */
        .section-full {
            min-height: auto;
            padding: var(--section-spacing) 1.5rem;
        }

        @media (max-width: 768px) {
            .section-full {
                padding: 4rem 1.5rem;
            }

            :root {
                --section-spacing: 4rem;
            }
        }

        /* Scrollbar - Theme Aware */
        .theme-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .theme-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .theme-scrollbar::-webkit-scrollbar-thumb {
            background: var(--scrollbar-thumb, #cbd5e1);
            border-radius: 4px;
        }
    </style>

    {{-- Theme-specific additional styles --}}
    @if($activeTheme === 'theme2')
        <style>
            /* Theme 2 - Ensure no white space at bottom */
            html {
                background: #1a1c2e;
            }
            
            body {
                background: #F8F9FA;
            }

            [data-theme="dark"] html {
                background: #0f1015;
            }

            [data-theme="dark"] body {
                background: #2C2E3E;
            }

            /* Back to top button - ensure it doesn't cause layout issues */
            .back-to-top-btn {
                position: fixed !important;
                bottom: 2rem !important;
                right: 2rem !important;
                z-index: 9999 !important;
                pointer-events: auto;
            }

            .back-to-top-btn.opacity-0 {
                pointer-events: none;
            }
        </style>
    @endif
</head>

<body class="theme-scrollbar">

    {{-- Theme-aware Header --}}
    <x-dynamic-component :component="$activeTheme . '.header'" :user="$user" :blogPosts="$blogPosts ?? collect()" />

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Theme-aware Footer --}}
    <x-dynamic-component :component="$activeTheme . '.footer'" :user="$user" />

    <!-- Back to Top Button - Theme Aware -->
    <button id="backToTop"
        class="fixed bottom-8 right-8 p-4 rounded-full shadow-lg opacity-0 pointer-events-none transition-all duration-300 hover:scale-110 z-50 back-to-top-btn">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <script>
        // Global JavaScript that works for all themes
        const backToTop = document.getElementById('backToTop');

        // Back to top functionality
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
                    const headerHeight = document.querySelector('header')?.offsetHeight || 70;
                    const targetPosition = target.offsetTop - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Theme switching functionality
        function switchTheme(themeName) {
            // Update active theme
            fetch('/update-theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ theme: themeName })
            }).then(() => {
                window.location.reload();
            });
        }

        // Initialize theme-based styles
        document.addEventListener('DOMContentLoaded', function () {
            const activeTheme = '{{ $activeTheme }}';

            // Add theme class to body for specific overrides
            document.body.classList.add(activeTheme + '-theme');

            // Initialize any theme-specific JS
            if (typeof window[activeTheme + 'Init'] === 'function') {
                window[activeTheme + 'Init']();
            }
        });
    </script>

    {{-- Theme-specific scripts --}}
    @if($activeTheme === 'theme2')
        <script>
            function theme2Init() {
                // Corporate theme specific initializations
                console.log('Corporate theme initialized');
            }
        </script>
    @endif

    @stack('scripts')
</body>

</html>