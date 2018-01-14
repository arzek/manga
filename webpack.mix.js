let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/assets/js');

mix.stylus('resources/assets/stylus/app.styl', 'public/assets/css');

mix.styles([
  'resources/assets/components/css/uikit.css',
  'public/assets/css/app.css'
], 'public/css/all.css');