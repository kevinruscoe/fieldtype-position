let mix = require('laravel-mix');

mix.js('resources/js/bootstrap.js', 'dist/js/position-fieldtype.js')
    .sass('resources/sass/position-fieldtype.scss', 'dist/css/position-fieldtype.css');
