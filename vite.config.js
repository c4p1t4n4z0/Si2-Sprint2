import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/modals.js',
                'resources/js/modal_uno.js',
                'resources/js/cargar_imagen.js',
            ],
            refresh: true,
        }),
    ],
});
