module.exports = {
  devtool: "inline-source-map",
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
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
      // require("jquery") is external and available
      //  on the global var jQuery
      "jquery": "jQuery"
  },
  sassLoader: {
    includePaths: ["./node_modules"]
  }
};