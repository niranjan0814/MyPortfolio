<!-- resources/views/components/header.blade.php -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <a href="#hero" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition-colors">NS</a>
            <ul class="hidden md:flex space-x-8">
                <li><a href="{{ route('portfolio.index') }}#about" class="text-gray-600 hover:text-blue-600 transition-colors font-medium">About</a></li>
                <li><a href="{{ route('portfolio.index') }}#projects" class="text-gray-600 hover:text-blue-600 transition-colors font-medium">Projects</a></li>
                <li><a href="{{ route('portfolio.index') }}#skills" class="text-gray-600 hover:text-blue-600 transition-colors font-medium">Skills</a></li>
                <li><a href="{{ route('portfolio.index') }}#experience" class="text-gray-600 hover:text-blue-600 transition-colors font-medium">Experience</a></li>
                <li><a href="{{ route('portfolio.index') }}#education" class="text-gray-600 hover:text-blue-600 transition-colors font-medium">Education</a></li>
                <li><a href="{{ route('portfolio.index') }}#contact" class="text-gray-600 hover:text-blue-600 transition-colors font-medium">Contact</a></li>
            </ul>
            <button id="mobile-menu-btn" class="md:hidden text-2xl text-gray-700 hover:text-blue-600 transition-colors">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2 bg-white rounded-lg p-4 shadow-lg">
            <a href="#about" class="block py-2 text-gray-600 hover:text-blue-600 transition-colors font-medium mobile-menu-link">About</a>
            <a href="#projects" class="block py-2 text-gray-600 hover:text-blue-600 transition-colors font-medium mobile-menu-link">Projects</a>
            <a href="#skills" class="block py-2 text-gray-600 hover:text-blue-600 transition-colors font-medium mobile-menu-link">Skills</a>
            <a href="#experience" class="block py-2 text-gray-600 hover:text-blue-600 transition-colors font-medium mobile-menu-link">Experience</a>
            <a href="#education" class="block py-2 text-gray-600 hover:text-blue-600 transition-colors font-medium mobile-menu-link">Education</a>
            <a href="#contact" class="block py-2 text-gray-600 hover:text-blue-600 transition-colors font-medium mobile-menu-link">Contact</a>
        </div>
    </nav>
</header>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Close mobile menu when link is clicked
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    });
</script>