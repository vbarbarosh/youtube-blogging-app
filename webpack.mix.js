const LiveReloadPlugin = require('webpack-livereload-plugin');
const mix = require('laravel-mix');

// https://laracasts.com/discuss/channels/elixir/how-to-turn-off-build-sucess-notifications-from-laravel-mix
mix.disableSuccessNotifications();

mix.js('resources/js/app.js', 'public/js')
    .webpackConfig({
        plugins: [
            new LiveReloadPlugin(),
        ]
    })
    .vue({version: 2});
