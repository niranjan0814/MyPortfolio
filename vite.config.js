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

                
            ],
            refresh: true,
        }),
    ],
});