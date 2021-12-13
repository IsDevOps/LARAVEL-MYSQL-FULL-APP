const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

mix
.sass('resources/sass/style.scss', 'public/argon/css/style.css').options({ processCssUrls: false })
.scripts('node_modules/jquery-mask-plugin/dist/jquery.mask.js', 'public/argon/js/mask.js')
.scripts('resources/js/script.js', 'public/argon/js/script.js');
