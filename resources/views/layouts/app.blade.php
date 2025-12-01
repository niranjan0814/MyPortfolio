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

        // Safety mapping for view rendering
        if ($activeTheme === 'golden') {
            $activeTheme = 'theme2';
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
        class="opacity-0 pointer-events-none transition-all duration-300 z-50 back-to-top-btn"
        style="
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--t1-surface-card, rgba(26, 16, 51, 0.6));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--t1-border-color, rgba(165, 107, 255, 0.2));
            box-shadow: var(--t1-card-shadow, 0 8px 32px 0 rgba(120, 60, 255, 0.25));
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--t1-text-primary, #FFFFFF);
        ">
        <svg style="width: 24px; height: 24px;" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <style>
        /* Back to Top Button Enhancements */
        .back-to-top-btn:hover {
            transform: translateY(-4px) scale(1.1);
            border-color: var(--t1-accent-primary, #A56BFF) !important;
            box-shadow: 0 0 30px var(--t1-icon-glow, rgba(168, 100, 255, 0.6)) !important;
        }

        .back-to-top-btn:active {
            transform: translateY(-2px) scale(1.05);
        }

        /* Light theme adjustments */
        [data-theme="light"] .back-to-top-btn {
            background: rgba(255, 255, 255, 0.7) !important;
            color: #1A1D23 !important;
            border-color: rgba(122, 90, 248, 0.15) !important;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.06) !important;
        }

        [data-theme="light"] .back-to-top-btn:hover {
            border-color: #7A5AF8 !important;
            box-shadow: 0 0 30px rgba(122, 90, 248, 0.2) !important;
        }
    </style>

    <script>
        // Global JavaScript that works for all themes
        const backToTop = document.getElementById('backToTop');

        // Back to top functionality with footer detection
        window.addEventListener('scroll', () => {
            const scrollPosition = window.pageYOffset;
            const windowHeight = window.innerHeight;
            const footer = document.querySelector('footer');
            
            // Show button after scrolling 300px
            if (scrollPosition > 300) {
                if (footer) {
                    // Get footer's position relative to viewport
                    const footerRect = footer.getBoundingClientRect();
                    
                    // Hide button when footer starts entering viewport (top of footer visible)
                    if (footerRect.top <= windowHeight) {
                        backToTop.style.opacity = '0';
                        backToTop.style.pointerEvents = 'none';
                    } else {
                        backToTop.style.opacity = '1';
                        backToTop.style.pointerEvents = 'auto';
                    }
                } else {
                    backToTop.style.opacity = '1';
                    backToTop.style.pointerEvents = 'auto';
                }
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