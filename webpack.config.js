const path = require('path');
const webpack = require('webpack');

module.exports = {

    entry: {
        common: "./client/js/common.js",
        tickets: "./client/js/tickets.js",
        vendor: ['jquery', 'underscore']
    },

    output: {
        path: path.join(__dirname, "www/frontend/tickets/js"),
        filename: "[name].js"
    },
    optimization: {
        runtimeChunk: 'single',
        splitChunks: {
            cacheGroups: {
                vendors: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    enforce: true,
                    chunks: 'all'
                }
            }
        }
    },



    module: {
        rules: [
            {
                test: /\.(scss)$/,
                use: [
                    {
                        // Adds CSS to the DOM by injecting a `<style>` tag
                        loader: 'style-loader'
                    },
                    {
                        // Interprets `@import` and `url()` like `import/require()` and will resolve them
                        loader: 'css-loader'
                    },
                    {
                        // Loader for webpack to process CSS with PostCSS
                        loader: 'postcss-loader',
                        options: {
                            plugins: function () {
                                return [
                                    require('autoprefixer')
                                ];
                            }
                        }
                    },
                    {
                        // Loads a SASS/SCSS file and compiles it to CSS
                        loader: 'sass-loader'
                    }
                ]
            },
        ],
    },
    plugins: [ new webpack.ProvidePlugin({
        $ : "jquery",
        jQuery : "jquery",
        Backbone : "backbone",
        _ : "underscore"
    }) ]
};