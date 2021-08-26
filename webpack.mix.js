const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass("bootstrap-vue/dist/bootstrap-vue.css","bootstrap/dist/css/bootstrap.css","resources/css/styles.scss", "public/css");

mix.browserSync('localhost:8000');
mix.disableNotifications();
