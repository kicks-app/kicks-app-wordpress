var merge = require("deepmerge");
var path = require('path');

module.exports = function(grunt) {
 
  var pkg = grunt.file.readJSON('package.json');
  grunt.initConfig({
    dist: grunt.option('output') || 'dist',
    pkg: pkg,
    clean: {
      'dist': "<%= dist %>",
      'tmp': ['tmp']
    },
    copy: {
      'dist': {
        dot: true,
        expand: true, 
        cwd: '.',
        src: ['app/**/*', 'wp/**/*', 'vendor/**/*', 'index.php', 'wp-config.php', '.htaccess'], 
        dest: grunt.option('output') || "<%= dist %>"
      }
    },
    curl: {
      'composer': {
        src: 'https://getcomposer.org/installer',
        dest: 'composer.phar'
      }
    },
    template: {
      'dist': {
          options: {
            data: function() {
              return {
                pkg: pkg,
                environment: grunt.option("environment")  || 'development',
                database: grunt.file.readYAML('config/database.yml')[( grunt.option("environment")  || 'development' )]  
              };
            }
          },
          src: 'wp-config.php',
          dest: ( grunt.option('output') || "<%= dist %>" ) + "/wp-config.php"
      }
    },
    php: {
      serve: {
        options: {
          bin: "/Applications/MAMP/bin/php/php5.4.34/bin/php",
          base: 'dist',
          keepalive: true,
          open: true
        }
      }
    },
    'mincerrc': {
      themes: {
        options: {
          clean: true
        },
        cwd: 'app/themes',
        src: ['**/.mincerrc']
      }
    },
    'bowerrc': {
      themes: {
        cwd: 'app/themes',
        src: ['**/.bowerrc']
      }
    },
    rsync: {
      options: {
        src: "<%= dist %>/.",
        //args: ["--verbose"],
        recursive: true
      },
      development: {
        options: {
          dest: "/Applications/MAMP/htdocs/kicks-app/",
          //delete: true
        }
      },
      test: {
        options: {
          dest: "/var/www/site",
          host: "user@staging-host",
          //delete: true // Careful this option could cause data loss, read the docs!
        }
      },
      production: {
        options: {
          dest: "/var/www/site",
          host: "user@live-host",
          //delete: true // Careful this option could cause data loss, read the docs!
        }
      }
    }
  });
  
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-template');
  grunt.loadNpmTasks('grunt-curl');
  grunt.loadNpmTasks('grunt-rsync');
  
  grunt.loadNpmTasks('grunt-bowerrc');
  grunt.loadNpmTasks('grunt-mincerrc');
 
  /**
   * This task downloads the latest wordpress to dist
   */
  grunt.registerTask('install', [
    'clean:tmp',
    'curl:wordpress',
    'unzip:wordpress',
    'copy:wordpress',
    'clean:tmp'
  ]);
  
  grunt.registerTask('build', [
    'mincerrc',
    'clean:dist',
    'copy:dist',
    'template:dist'
  ]);
  
  grunt.registerTask('deploy', [
    'build',
    'rsync:' + (grunt.option('environment') || 'development')
  ]);
  
  grunt.registerTask('serve', [
    'php:serve'
  ]);
  
};