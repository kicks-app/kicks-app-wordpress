kicks-app-wordpress
===================

> Wordpress kickstarter template

Install
-------

Install [node.js](https://nodejs.org) if you haven't already.

Install grunt command line tools globally via npm. You may need to run this as administrator.

```cli
npm install -g grunt-cli
```

From the project directory, run the following command to install development dependencies. 

```
npm install
```

Run `grunt install` to install runtime dependencies

```cli
grunt install
```

Open `config/database.yml` to edit database settings.

```yml
# Development
development:
  name: audiolith
  user: root
  password: root
  host: localhost
  charset: utf8
# Staging
test:
  name: xxx
  user: xxx
  password: xxx
  host: xxx
  charset: utf8
# Production
production:
  name: xxx
  user: xxx
  password: xxx
  host: xxx
  charset: utf8
```

If you're running a recent MAMP on OSX, you should be done.
Otherwise you need to configure phpbin path in `Gruntfile.js`:

```js
grunt.initConfig({
  phpbin: "/Applications/MAMP/bin/php/php5.6.2/bin/php"
  // ...
});
```

Development
-----------

Run the project locally using the built-in web-server and start watching changes:

```cli
grunt serve
```

Production
----------

Build the project for production environment.

```
grunt build --environment production
```

Deploy `dist` to the server manually.