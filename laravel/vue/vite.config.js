import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [laravel(['resources/js/app.js'])],
    root: 'resources', // ou 'public' dependendo da sua estrutura
});
