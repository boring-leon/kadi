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

mix.js('resources/js/app/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.disableNotifications();


/*
    mix.js('resources/js/static/social/fb_slide_mobile.js', 'public/js')
    mix.js('resources/js/static/landing/landing.js', 'public/js');
    mix.js('resources/js/static/admin/portion_exchange_setter.js', 'public/js');
*/
