// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Global assets (always loaded)
                'resources/css/app.css',
                'resources/js/app.js',

                // All theme CSS files — add every theme here!
                'resources/css/themes/theme1.css',
                'resources/css/themes/theme2.css',
                'resources/css/themes/theme3.css',
                
            ],
            refresh: true,
        }),
    ],
});