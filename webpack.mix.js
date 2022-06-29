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

mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/plugins/bootstrap/');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/plugins/bootstrap/');

mix.copy('node_modules/tabulator-tables/dist/css/tabulator.min.css', 'public/plugins/tabulator/');
mix.copy('node_modules/tabulator-tables/dist/js/tabulator.min.js', 'public/plugins/tabulator/');

mix.combine
(
    [
        'node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss',
        'node_modules/@fortawesome/fontawesome-free/scss/regular.scss',
        'node_modules/@fortawesome/fontawesome-free/scss/solid.scss',
        'node_modules/@fortawesome/fontawesome-free/scss/brands.scss'
    ],
    'node_modules/@fortawesome/fontawesome-free/scss/fontawesomeTemp.scss'
);
mix.sass('node_modules/@fortawesome/fontawesome-free/scss/fontawesomeTemp.scss', 'public/plugins/fontawesome/fontawesome.css');
