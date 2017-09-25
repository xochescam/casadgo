const elixir = require('laravel-elixir');
// const lost = require('lost');
const autoprefixer = require('autoprefixer');
require('laravel-elixir-postcss');

/*
|------------------------------------------------------------------------
| Configuration
|------------------------------------------------------------------------
*/

// Elixir and postcss  configuration
elixir.config.browserSync.notify = false;
elixir.config.css.autoprefix.enabled = false;
elixir.config.js.uglify.options = {compress: {drop_console: true}, preserveComments: 'license'};
// elixir.config.sourcemap = false;
// elixir.config.production = true;

const autoprefixerConfig = {browsers: ['> 1%', '> 1% in MX', 'last 3 versions']};
const postCssPaths = {
    source: './resources/assets/postcss/',
    public: './public/css'
};


/*
|------------------------------------------------------------------------
| Tasks
|------------------------------------------------------------------------
*/

elixir(function(mix) {
    mix.sass('main.min.scss', 'resources/assets/postcss')
    .postcss('main.min.css', {
        srcDir : postCssPaths.source,
        output : postCssPaths.public
    });

    //Scripts Dependencies
    mix.scripts([
        'vendor/bootstrap.min.js',
        'vendor/jquery.isotope.min.js',
        'vendor/owl.carousel.min.js',
        'vendor/mousescroll.js',
        'vendor/smoothscroll.js',
        'vendor/jquery.prettyPhoto.js',
        'vendor/jquery.inview.min.js',
        'vendor/wow.min.js',
    ], 'public/js/dependencies.min.js');

    // Site scripts
    mix.rollup('main/main.js', 'public/js/main.min.js');

    // // Admin scripts
    // mix.webpack('admin/admin.js', 'public/js/admin.min.js');

    mix.browserSync({
        proxy: 'casa.dev'
    });
});
