@props(['user' => null, 'blogPosts' => null])

@php
    // Super safe fallback — if no $user, use the first user with a slug (or empty string)
    $currentSlug = $user?->slug ?? \App\Models\User::whereNotNull('slug')->value('slug') ?? '';
    $baseUrl = $currentSlug ? route('portfolio.show', $currentSlug) : '/';
@endphp

<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    style="background: var(--card-bg); border-bottom: 1px solid var(--border-color); box-shadow: var(--card-shadow);">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <a href="#hero" class="text-2xl font-bold transition-colors hover:opacity-80"
                style="color: var(--text-primary);">NS</a>

            <ul class="hidden md:flex space-x-8 items-center">
                <li><a href="{{ $baseUrl }}#about" class="font-medium transition-colors hover:opacity-80"
                        style="color: var(--text-secondary);">About</a></li>
                <li><a href="{{ $baseUrl }}#projects" class="font-medium transition-colors hover:opacity-80"
                        style="color: var(--text-secondary);">Projects</a></li>
                <li><a href="{{ $baseUrl }}#skills" class="font-medium transition-colors hover:opacity-80"
                        style="color: var(--text-secondary);">Skills</a></li>
                <li><a href="{{ $baseUrl }}#experience" class="font-medium transition-colors hover:opacity-80"
                        style="color: var(--text-secondary);">Experience</a></li>
                <li><a href="{{ $baseUrl }}#education" class="font-medium transition-colors hover:opacity-80"
                        style="color: var(--text-secondary);">Education</a></li>
                @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
                    <li><a href="{{ $baseUrl }}#blog"
                            class="font-medium transition-colors hover:opacity-80"
                            style="color: var(--text-secondary);">Blog</a></li>
                @endif
                <li><a href="{{ $baseUrl }}#contact" class="font-medium transition-colors hover:opacity-80"
                        style="color: var(--text-secondary);">Contact</a></li>

                <li>
                    <button id="theme-toggle"
                        class="theme-toggle-btn flex items-center gap-2 px-4 py-2 rounded-full font-medium transition-all hover:scale-105"
                        style="color: var(--text-primary); border: 1px solid var(--border-color);">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"></svg>
                        <span class="theme-label">Dark</span>
                    </button>
                </li>
            </ul>

            <button id="mobile-menu-btn" class="md:hidden text-2xl transition-colors"
                style="color: var(--text-primary);">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2 rounded-lg p-4 shadow-lg"
            style="background: var(--card-bg); border: 1px solid var(--border-color);">
            <a href="#about" class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                style="color: var(--text-secondary);">About</a>
            <a href="#projects" class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                style="color: var(--text-secondary);">Projects</a>
            <a href="#skills" class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                style="color: var(--text-secondary);">Skills</a>
            <a href="#experience" class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                style="color: var(--text-secondary);">Experience</a>
            <a href="#education" class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                style="color: var(--text-secondary);">Education</a>
            @if($user && $user->isPremium() && isset($blogPosts) && $blogPosts->isNotEmpty())
                <a href="#blog"
                    class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                    style="color: var(--text-secondary);">Blog</a>
            @endif
            <a href="#contact" class="block py-2 font-medium transition-colors mobile-menu-link hover:opacity-80"
                style="color: var(--text-secondary);">Contact</a>

            <button
                class="theme-toggle-btn w-full flex items-center justify-center gap-2 px-4 py-3 rounded-lg font-medium transition-all mt-4"
                style="color: var(--text-primary); border: 1px solid var(--border-color);">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"></svg>
                <span class="theme-label">Dark</span>
            </button>
        </div>
    </nav>
</header>

<script>
    document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        link.addEventListener('click', function () {
            document.getElementById('mobile-menu')?.classList.add('hidden');
        });
    });
</script>