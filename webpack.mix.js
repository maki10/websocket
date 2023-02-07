let mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css/app.css');
mix.js('resources/js/app.js', 'public/js/app.js').vue({ version: 2 });
