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

let productionSourceMaps = false;

mix.js('resources/assets/js/app.js', 'public/js')
   .vue()
   .sass('resources/assets/scss/app.scss', 'public/css')
   .sourceMaps(productionSourceMaps, 'source-map');

/**
 |--------------------------------------------------------------------------
 | Mix Copy Images
 |--------------------------------------------------------------------------
 |
 | @TODO Include a way to optimize images for the frontend
 |
 */
mix.copy('resources/assets/images/**/*', 'public/images');

mix.browserSync({
    proxy: 'https://clique-soapbox.app',
    reloadOnRestart: true,
    reloadDelay: 500,
});
