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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/task_dnd.js', 'public/js')
    .js('resources/js/delete/task.js', 'public/js/delete')
    .js('resources/js/delete/project.js', 'public/js/delete')
    .js('resources/js/delete/user.js', 'public/js/delete')
    .js('resources/js/task/task_add_update.js', 'public/js/task')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
