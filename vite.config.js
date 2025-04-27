import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';
import { viteStaticCopy } from 'vite-plugin-static-copy';

const themeFilePath = path.resolve(__dirname, 'theme.json');
const activeTheme = fs.existsSync(themeFilePath) ? JSON.parse(fs.readFileSync(themeFilePath, 'utf8')).name : 'anchor';
console.log(`Active theme: ${activeTheme}`);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                `resources/themes/${activeTheme}/assets/css/app.css`,
                `resources/themes/${activeTheme}/assets/css/admin-app.css`,
                `resources/themes/${activeTheme}/assets/js/app.js`,
                `resources/themes/${activeTheme}/assets/js/admin-app.js`,
                'resources/css/filament/admin/theme.css',
            ],
            refresh: [
                `resources/themes/${activeTheme}/**/*`,
            ],
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'public/css/fonts/*',
                    dest: 'fonts'
                }
            ],
            options: {
                flatten: false
            }
        })
    ],
});
