const mix = require('laravel-mix');
const { VueLoaderPlugin } = require('vue-loader');

mix.js('resources/js/app.js', 'public/js')
   .react()
   .sass('resources/sass/app.scss', 'public/css');
// Optionnel : Configuration supplémentaire
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.jsx'] // Inclure les extensions .jsx si vous utilisez JSX
    }
});
