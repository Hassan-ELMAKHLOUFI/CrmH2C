const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.browserSync('localhost:8000');
mix.disableNotifications();
