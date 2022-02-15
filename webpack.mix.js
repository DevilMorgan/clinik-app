const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/dashboard/med-historia.scss', 'public/css')
    .js('resources/js/med-historia.js', 'public/js');
    //.js('resources/js/app.js', 'public/js')
    //.sourceMaps();/

if (mix.inProduction())
{
    mix.version();
}
