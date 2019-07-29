const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
mix.sass('resources/sass/print.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
;
mix.version();