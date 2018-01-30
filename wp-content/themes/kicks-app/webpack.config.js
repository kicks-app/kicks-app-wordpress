const webpack = require('webpack');
const path = require('path');
const autoprefixer = require('autoprefixer');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const VENDOR_PATTERN = /(node_modules|bower_components)/;
const FILE_PATTERN = /\.(jpe?g|gif|png|svg|woff(2)?|ttf|eot|otf)(\?[a-z0-9=\.]*)?$/;
const OUTPUT_PATH = './dist';

const isExternal = function(module) {
  const userRequest = module.userRequest;

  if (typeof userRequest !== 'string') {
    return false;
  }
  return userRequest.indexOf('bower_components') >= 0 ||
         userRequest.indexOf('node_modules') >= 0;
};

const extractCSS = new ExtractTextPlugin({
  filename: OUTPUT_PATH + '/bundle.css',
  disable: false,
  allChunks: false
});

module.exports = (env = { production: false }) => {
  process.env.NODE_ENV = env.production && 'production' || process.env.NODE_ENV || 'development';
  return [{
    name: 'js',
    devtool: env.prodction && "inline-source-map",
    entry: {
      "app-js": __dirname + '/js/index.js'
    },
    output: {
      path: path.join(__dirname, OUTPUT_PATH),
      filename: 'app.js'
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: VENDOR_PATTERN,
          loader: 'babel-loader',
          options: {
            presets: ['es2015']
          }
        }
      ]
    },
    plugins: [
      new webpack.optimize.CommonsChunkPlugin({
        name: 'vendor-js',
        chunks: ['app-js'],
        filename: 'vendor.js',
        minChunks: isExternal
      }),
      new webpack.optimize.UglifyJsPlugin({
        minimize: env.production,
        compress: env.production && {
          warnings: false
        }
      }),
      new webpack.ProvidePlugin({
        jQuery: 'jquery',
        Popper: ['popper.js', 'default'],
      })
    ]
  }, {
    name: 'css',
    devtool: "inline-source-map",
    context: __dirname,
    entry: {
      "css": __dirname + '/css/index.scss'
    },
    output: {
      path: __dirname,
      filename: OUTPUT_PATH + '/bundle.css',
      publicPath: '../'
    },
    module: {
      rules: [
        // TODO: Get rid of query and pass as options
        { test: FILE_PATTERN, loader: 'file-loader', query: "name=[path][name].[ext]&emitFile=false", exclude: VENDOR_PATTERN },
        { test: FILE_PATTERN, loader: "url-loader", query: "limit=200000&name=" + OUTPUT_PATH + "/[name].[ext]", include: VENDOR_PATTERN },
        {
          test: /\.scss$/,
          use: ExtractTextPlugin.extract({
            use: [
              {
                loader: "css-loader",
                options: {
                  importLoaders: 2
                }
              },
              {
                loader: 'postcss-loader'
              },
              {
                loader: "sass-loader",
                options: {
                  includePaths: [
                    path.resolve(__dirname, "./node_modules")
                  ]
                }
              }
            ],
          })
        },
      ]
    },
    plugins: [
      new ExtractTextPlugin({
        filename: OUTPUT_PATH + '/bundle.css',
        disable: false,
        allChunks: false
      })
    ]
  }];
};
