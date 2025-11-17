<!-- resources/views/components/header.blade.php -->
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        style="background: var(--card-bg); border-bottom: 1px solid var(--border-color); box-shadow: var(--card-shadow);">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="#hero" 
               class="text-2xl font-bold transition-colors hover:opacity-80"
               style="color: var(--text-primary);">
                NS
            </a>
            
            <!-- Desktop Navigation -->
            <ul class="hidden md:flex space-x-8 items-center">
                <li><a href="{{ route('portfolio.index') }}#about" 
                       class="font-medium transition-colors hover:opacity-80"
                       style="color: var(--text-secondary);">About</a></li>
                <li><a href="{{ route('portfolio.index') }}#projects" 
                       class="font-medium transition-colors hover:opacity-80"
                       style="color: var(--text-secondary);">Projects</a></li>
                <li><a href="{{ route('portfolio.index') }}#skills" 
                       class="font-medium transition-colors hover:opacity-80"
                       style="color: var(--text-secondary);">Skills</a></li>
                <li><a href="{{ route('portfolio.index') }}#experience" 
                       class="font-medium transition-colors hover:opacity-80"
                       style="color: var(--text-secondary);">Experience</a></li>
                <li><a href="{{ route('portfolio.index') }}#education" 
                       class="font-medium transition-colors hover:opacity-80"
                       style="color: var(--text-secondary);">Education</a></li>
                <li><a href="{{ route('portfolio.index') }}#contact" 
                       class="font-medium transition-colors hover:opacity-80"
                       style="color: var(--text-secondary);">Contact</a></li>
                
                <!-- Theme Toggle Button -->
                <li>
                    <button 
                        id="theme-toggle"
                        class="glass-button flex items-center gap-2 px-4 py-2 rounded-full font-medium transition-all hover:scale-105"
                        style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); 
                               color: var(--text-primary); 
                               border: 1px solid var(--glass-border, var(--border-color));
                               box-shadow: var(--card-shadow);"
                        aria-label="Toggle Theme">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <!-- Icon will be updated by JavaScript -->
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                        <span class="theme-label text-sm">Dark</span>
                    </button>
                </li>
            </ul>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" 
                    class="md:hidden text-2xl transition-colors"
                    style="color: var(--text-primary);">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" 
             class="hidden md:hidden mt-4 space-y-2 rounded-lg p-4 shadow-lg"
             style="background: var(--card-bg); border: 1px solid var(--border-color);">
            <a href="#about" 
               class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
               style="color: var(--text-secondary);">About</a>
            <a href="#projects" 
               class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
               style="color: var(--text-secondary);">Projects</a>
            <a href="#skills" 
               class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
               style="color: var(--text-secondary);">Skills</a>
            <a href="#experience" 
               class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
               style="color: var(--text-secondary);">Experience</a>
            <a href="#education" 
               class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
               style="color: var(--text-secondary);">Education</a>
            <a href="#contact" 
               class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
               style="color: var(--text-secondary);">Contact</a>
            
            <!-- Mobile Theme Toggle -->
            <button 
                onclick="toggleTheme()"
                class="w-full glass-button flex items-center justify-center gap-2 px-4 py-3 rounded-lg font-medium transition-all mt-4"
                style="background: var(--glass-bg, linear-gradient(135deg, var(--accent-blue), var(--accent-purple))); 
                       color: var(--text-primary); 
                       border: 1px solid var(--glass-border, var(--border-color));">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                </svg>
                <span>Toggle Theme</span>
            </button>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu?.classList.toggle('hidden');
    });

    // Close mobile menu when link is clicked
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.add('hidden');
        });
    });
</script>