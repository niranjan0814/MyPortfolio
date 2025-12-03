@php
    $previewUrl = "/portfolio/{$userSlug}?preview=true&theme={$selectedTheme}";
    $themeName = ucfirst(str_replace('_', ' ', $selectedTheme));
@endphp

<div class="space-y-3">
    <div class="flex items-center gap-3">
        <a href="{{ $previewUrl }}" 
           target="_blank" 
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            <span>Preview Selected Theme</span>
        </a>
        <div class="text-sm text-gray-500 dark:text-gray-400">
            <span class="font-medium">Current: </span>
            <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded">{{ $themeName }}</span>
        </div>
    </div>
    <p class="text-xs text-gray-500 dark:text-gray-400 flex items-start gap-2">
        <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
        </svg>
        <span>Preview updates instantly when you change the theme above. No need to save first!</span>
    </p>
</div>
