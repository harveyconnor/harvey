const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/jquery.mCustomScrollbar.min.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        'resources/assets/css/extra.css'
    ], 'public/css/style.css')
    .styles(['resources/assets/css/jquery.mCustomScrollbar.min.css'],'public/css/jquery.mCustomScrollbar.min.css');
