import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/style.css', 'resources/css/fonts.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
