var webpack = require('webpack');
var pkg     = require('./package.json');  //loads npm config file
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var CSSSplitWebpackPlugin = require('css-split-webpack-plugin').default;
var path = require('path');
var OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
var VENDOR_PATTERN = /(node_modules|bower_components)/;
var FILE_PATTERN = /\.(jpe?g|gif|png|svg|woff(2)?|ttf|eot)(\?[a-z0-9=\.]+)?$/;
var OUTPUT_PATH = '_assets';

var isExternal = function(module) {
  var userRequest = module.userRequest;

  if (typeof userRequest !== 'string') {
    return false;
  }

  return userRequest.indexOf('bower_components') >= 0 ||
         userRequest.indexOf('node_modules') >= 0;
};

var extractApp = new ExtractTextPlugin(OUTPUT_PATH + '/index.css', {
  allChunks: false
});

module.exports = [{
  name: 'js',
  devtool: "inline-source-map",
  entry   : {
    "app-js"     : __dirname + '/js/index.js'
  },
  output  : {
    path      : path.join(__dirname, OUTPUT_PATH),
    filename  : 'app.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: VENDOR_PATTERN,
        loader: 'babel', // 'babel-loader' is also a valid name to reference
        query: {
          presets: ['es2015']
        }
      },
      {
        test: require.resolve('tether'),
        loader: 'expose?Tether!expose?$'
      }
    ]
  },
  externals: {
    "jquery": "jQuery"
  },
  plugins: [
    new webpack.optimize.CommonsChunkPlugin({
      name: 'vendor-js',
      chunks: ['app-js'],
      filename: 'vendor.js',
      minChunks: isExternal
    }),
    new webpack.optimize.UglifyJsPlugin({
        minimize: true,
        compress: {
            warnings: false
        }
    })
  ]
}, {
  name: 'css',
  devtool: "inline-source-map",
  context : __dirname,
  entry   : {
    "css"    : __dirname + '/css/index.scss'
  },
  output  : {
    path      : __dirname,
    filename  : OUTPUT_PATH + '/index.css',
    publicPath: '../'
  },
  module: {
    loaders: [
      { test: FILE_PATTERN, loader: 'file-loader',  query: "name=[path][name].[ext]&emitFile=false", exclude: VENDOR_PATTERN },
      { test: FILE_PATTERN, loader: "url-loader",  query: "limit=200000&name=" + OUTPUT_PATH + "/[name].[ext]", include: VENDOR_PATTERN },
      {
        test   : /\.scss$/,
        loader: extractApp.extract('css!sass?source-map', {
          //publicPath: './'
        })
      }
    ]
  },
  sassLoader: {
    includePaths: ["./node_modules"]
  },
  plugins: [
    new webpack.NoErrorsPlugin(),
    extractApp,
    new OptimizeCssAssetsPlugin({
      /*assetNameRegExp: /\.optimize\.css$/g,
      cssProcessor: require('cssnano'),
      cssProcessorOptions: { discardComments: {removeAll: true } },
      canPrint: true*/
    })
  ]
}];