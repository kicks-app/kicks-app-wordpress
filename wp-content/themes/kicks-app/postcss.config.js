module.exports = ({ file, options, env }) => ({
  plugins: {
    'autoprefixer': {
      browsers: [
        'last 3 version',
        'ie >= 10'
      ]
    },
    'cssnano': env === 'production' ? {} : false
  }
})
