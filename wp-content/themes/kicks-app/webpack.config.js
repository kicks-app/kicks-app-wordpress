const path = require('path');
const { sync: glob } = require('glob');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');

const context =  path.resolve(__dirname);

console.log('ENV: ', process.env.NODE_ENV);

const browsers = [
  'last 2 versions',
  'safari >= 7'
];

const entry = [
  'svg/*.svg',
  'js/main.js',
  'scss/main.scss'
];

const entryFiles = glob(`{${entry.join(',')}}`, {
  cwd: context,
  ignore: ['node_modules/**/*.*'],
  // nosort: true,
  // realpath: true
}).map(file => `./${file}`);

console.log('..', entryFiles);

module.exports = [{
  mode: process.env.NODE_ENV || 'development',
  context,
  entry: () => entryFiles,
  module: {
    rules: [{
      test: require.resolve('jquery'),
      use: [{
        loader: 'expose-loader?$!expose-loader?jQuery'
      }]
    }, {
      test: /\.js$/,
      // exclude: /(node_modules|bower_components)\/jquery/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: [
            [
              '@babel/preset-env', {
                targets: {
                  browsers
                }
              }
            ]
          ],
          plugins: [
            "@babel/plugin-transform-spread"
          ]
        }
      }
    }, {
      test: require.resolve('turbolinks'),
      use: [{
        loader: 'expose-loader',
        options: 'Turbolinks'
      }]
    }, {
      oneOf: [{
        test: /\.(svg)(\?[a-z0-9=\.]*)?$/,
        exclude: [
          path.resolve(__dirname, 'images')
        ],
        exclude: /node_modules/,
        loader: 'svg-sprite-loader',
        options: {
          esModule: false,
          extract: true,
          // plainSprite: true,
          spriteFilename: svgPath => `icons${svgPath.substr(-4)}`
        }
      }, {
        test: /\.(svg)(\?[a-z0-9=\.]*)?$/,
        loader: 'file-loader',
        exclude: [
          path.resolve(__dirname, 'svg')
        ],
        options: {
          name: '[path][name].[ext]',
          emitFile: true
        }
      }
    ]}, {
      test: /\.scss$/,
      use: [{
        loader: "file-loader",
        options: {
          name: "[name].css",
          emitFile: true
        }
      }, {
        loader: 'extract-loader'
      }, {
        loader: 'css-loader'
      }, {
        loader: 'fast-sass-loader',
        options: {
          includePaths: [
            path.resolve(__dirname, 'node_modules'),
            path.resolve(__dirname, 'bower_components')
          ]
        }
      }]
    }, {
      test: /\.(jpe?g|gif|png)(\?[a-z0-9=\.]*)?$/,
      loader: 'file-loader',
      options: {
        name: '[path][name].[ext]',
        emitFile: true
      }
    }, {
      test: /\.(woff(2)?|ttf|eot|otf)(\?[a-z0-9=\.]*)?$/,
      loader: 'file-loader',
      options: {
        name: '[path][name].[ext]',
        emitFile: true
      }
    }]
  },
  plugins: [
    new SpriteLoaderPlugin()
  ],
  optimization: {
    minimizer: [
      new UglifyJsPlugin({ /* your config */ })
    ],
    splitChunks: {
      cacheGroups: {
        commons: {
          test: /[\\/](node_modules)[\\/]/,
          name: "vendor",
          chunks: "all",
          priority: 5
        },
        svgxuse: {
          test: /svgxuse/,
          name: "svgxuse",
          chunks: "all",
          priority: 10
        }
      }
    }
  },
  devServer: {
    index: 'index.html',
    port: 9393,
    open: true
  }
}];
