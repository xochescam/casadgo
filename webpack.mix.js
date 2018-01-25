let mix = require('laravel-mix');

mix.options({
    postCss: [
        require('lost')(),
        require('autoprefixer')({
            browsers: ['> 1%', '> 1% in MX', 'last 3 versions']
        })
    ],
    processCssUrls: false,
    uglify: {
        compress: {
            drop_console: mix.inProduction()
        },
        preserveComments: 'license'
    }
});
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

mix.js('resources/assets/js/main/main.min.js', 'public/js');
mix.js('resources/assets/js/main/admin/admin.min.js', 'public/js');

//Scripts Dependencies
mix.scripts([
    'resources/assets/js/vendor/bootstrap.min.js',
    'resources/assets/js/vendor/jquery.isotope.min.js',
    'resources/assets/js/vendor/owl.carousel.min.js',
    'resources/assets/js/vendor/mousescroll.js',
    'resources/assets/js/vendor/smoothscroll.js',
    'resources/assets/js/vendor/jquery.prettyPhoto.js',
    'resources/assets/js/vendor/jquery.inview.min.js',
    'resources/assets/js/vendor/sweetalert2.js',
    'resources/assets/js/vendor/wow.min.js',
], 'public/js/dependencies.min.js');

mix.sass('resources/assets/sass/main.min.scss', 'public/css');


/*
|------------------------------------------------------------------------
| BrowserSync
|------------------------------------------------------------------------
*/

mix.browserSync({
    proxy: 'localhost:3000',
    notify: false
});