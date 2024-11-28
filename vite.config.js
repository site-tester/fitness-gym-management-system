import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/gym.css',
                'resources/js/app.js',
                'resources/js/scrollreveal.min.js',
                'resources/js/waypoints.min.js',
                'resources/js/jquery.counterup.min.js',
                'resources/js/imgfix.min.js',
                'resources/js/mixitup.js',
                'resources/js/accordions.js',
                'resources/js/custom.js',
            ],
            refresh: true,
        }),
    ],
});
