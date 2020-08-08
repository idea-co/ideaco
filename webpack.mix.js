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

mix
    .js('resources/js/onboarding/app.js', 'public/js/onboarding')
    .js('resources/js/dashboard/app.js', 'public/js/dashboard')
    .sass('resources/sass/app.scss', 'public/css');
