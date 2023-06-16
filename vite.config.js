import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // scss
                'resources/sass/app.scss',
                // js
                'resources/js/app.js',
                'resources/js/chart/DoanhSoNgay.js',
                'resources/js/chart/DoanhSoThang.js',
                'resources/js/chart/AccountHistory.js',
                'resources/js/chart/SLSoNgay.js',
                'resources/js/chart/SLSoThang.js',
                'resources/js/chart/TotalTaiSan.js',
                // css
                "resources/css/app.css",
                "resources/css/list-user.css",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '@css': '/resources/css',
        },
    },
});
