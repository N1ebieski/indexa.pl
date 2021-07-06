const mix = require('laravel-mix');
let { CleanWebpackPlugin } = require('clean-webpack-plugin');

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

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin({
            verbose: true,
            cleanOnceBeforeBuildPatterns: [
                'fonts/**',
                'css/vendor/idir/**',
                'js/vendor/idir/**'
            ]
        })
    ],
    resolve: {
        alias: {
            '~': path.resolve(__dirname, 'node_modules/')
        }
    }
});

mix.js('resources/js/vendor/idir/vendor/vendor.js', 'js/vendor/idir/vendor')
    .js('resources/js/vendor/idir/web/web.js', 'js/vendor/idir/web')
    .js('resources/js/vendor/idir/admin/admin.js', 'js/vendor/idir/admin')
    .scripts([
        'resources/js/vendor/icore/web/scripts/**/*.js',
        'resources/js/vendor/idir/web/scripts/**/*.js'
    ], 'public/js/vendor/idir/web/scripts.js')
    .scripts([
        'resources/js/vendor/icore/admin/scripts/**/*.js',
        'resources/js/vendor/idir/admin/scripts/**/*.js'
    ], 'public/js/vendor/idir/admin/scripts.js')
    .sass('resources/sass/vendor/idir/vendor/vendor.scss',
        'css/vendor/idir/vendor')
    .sass('resources/sass/vendor/idir/web/web.scss',
        'css/vendor/idir/web')
    .sass('resources/sass/vendor/idir/web/web-dark.scss',
        'css/vendor/idir/web')
    .sass('resources/sass/vendor/idir/admin/admin.scss',
        'css/vendor/idir/admin')
    .sass('resources/sass/vendor/idir/admin/admin-dark.scss',
        'css/vendor/idir/admin')
    .browserSync({
        proxy: 'https://localhost',
        host: 'localhost',
        open: 'external',
        snippetOptions: {
            rule: {
                match: /<\/body>/i,
                fn: function (snippet, match) {
                    return snippet + match;
                }
            }
        }        
    });

if (mix.inProduction()) {
    mix.version();
}