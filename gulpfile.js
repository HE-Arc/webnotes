const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.copy('node_modules/simplemde/dist/simplemde.min.js', 'resources/assets/js')
        .copy('node_modules/simplemde/dist/simplemde.min.css', 'resources/assets/css');

    mix.sass('app.scss')
        .copy('resources/assets/js', 'public/js')
        .copy('resources/assets/css', 'public/css')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap')
        .webpack('app.js');
});
