<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heroContent['hero_name'] ?? 'Portfolio' }} | Full-Stack Developer Portfolio</title>
    <meta name="description" content="{{ $heroContent['hero_description'] ?? 'Full-Stack Developer Portfolio' }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-D1xDxkGKfQ3FtA4iO7QdZq6r8N2IoT2EKHFXPhprYyLq4zHTGv7Ew2AZZT1jK8ZCKy9v6gRXH8tK2+gFqM6PlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Enhanced Custom Styles */
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

        /* Smooth fade-in animation */
        .fade-in { animation: fadeIn 0.8s ease-in; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Card hover effects */
        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-8px) scale(1.02); }

        /* Section styling */
        .section-full { min-height: auto; padding: 6rem 1.5rem; }

        @media (max-width: 768px) {
            .section-full { padding: 4rem 1.5rem; }
        }

        /* Enhanced scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--bg-secondary); }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--accent-blue), var(--accent-purple));
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, var(--accent-purple), var(--accent-blue));
        }

        /* Loading animation for images */
        .skeleton {
            background: linear-gradient(90deg, var(--bg-secondary) 25%, var(--bg-primary) 50%, var(--bg-secondary) 75%);
            background-size: 200% 100%;
            animation: loading 1.5s ease-in-out infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .float { animation: float 3s ease-in-out infinite; }

        /* Glowing effect */
        .glow { box-shadow: 0 0 20px rgba(59, 130, 246, 0.5); }
        .glow:hover { box-shadow: 0 0 30px rgba(59, 130, 246, 0.8); }

        /* Reveal animation on scroll */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <x-header :headerContent="$headerContent" />
    @yield('content')
    
    <x-footer :footerContent="$footerContent" />

    <!-- Back to top button -->
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
        // Smooth scroll reveal animation
        function reveal() {
            const reveals = document.querySelectorAll('.fade-in');
            reveals.forEach(element => {
                const windowHeight = window.innerHeight;
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    element.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', reveal);
        reveal(); // Check on load

        // Back to top button
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
    @stack('scripts')
</body>
</html>