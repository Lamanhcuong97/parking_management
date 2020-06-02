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

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .copyDirectory('resources/css', 'public/css')
    .copyDirectory('resources/js', 'public/js')
    .copyDirectory('resources/icons', 'public/icons')
    .copyDirectory('resources/images', 'public/images');
