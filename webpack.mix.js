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

mix.styles([
    'public/frontend-files/css/app.css',
    'public/frontend-files/plugins/bootstrap/css/bootstrap.min.css',
    'public/frontend-files/plugins/bootstrap/css/offcanvas.css',
    'public/frontend-files/plugins/fontawesome/css/all.min.css',
    'public/frontend-files/plugins/slick/css/slick.css',
    'public/frontend-files/plugins/slick/css/slick-theme.css',
    'public/frontend-files/plugins/slick/css/slide.css',
], 'public/css/all-frontend.css')
.scripts([
    'public/frontend-files/js/app.js',
    'public/frontend-files/plugins/bootstrap/js/jquery-3.1.1.min.js',
    'public/frontend-files/plugins/bootstrap/js/bootstrap.min.js',
    'public/frontend-files/plugins/bootstrap/js/holder.min.js',
    'public/frontend-files/plugins/bootstrap/js/offcanvas.js',
    'public/frontend-files/plugins/bootstrap/js/popper.min.js',
    'public/frontend-files/plugins/slick/js/jquery.css',
    'public/frontend-files/plugins/slick/js/slick.css',
], 'public/js/all-frontend.js')

