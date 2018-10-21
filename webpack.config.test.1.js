'use strict';
const path = require('path');

const webpack = require('webpack'),

    glob = require('glob');

let config = {

    entry: {

        'vendor': [

            'jquery',

            'bootstrap',

            'backbone'


        ],



        // Auto-detect all pages in directory.

        'tickets': glob.sync('./client/js/tickets.js'),

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

    output: {

        path: path.join(__dirname, "www/frontend/tickets/js"),

        filename: 'bundle--[name].js'

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

    plugins : [ new webpack.ProvidePlugin({
        $ : "jquery",
        Backbone : "backbone",
        _ : "underscore"
    }) ]

};

module.exports = config;