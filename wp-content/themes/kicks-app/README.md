# kicks-app-wordpress-theme

Wordpress Kickstarter template integrating Bootstrap, FontAwesome, Webpack, ES6, SCSS and more...

![Kicks App](screenshot.png?raw=true "Kicks App Wordpress Theme")

## Demo

Get a quick view by visiting the Demo-Site (Bootstrap 4-alpha)

This theme has been tested using Wordpress Theme Unit Data which can be found [here](https://codex.wordpress.org/Theme_Unit_Test).


## Bootstrap

KicksApp Wordpress-Theme is bundled with [wp-bootstrap-hooks](https://github.com/rexblack/wp-bootstrap-hooks) which automatically generates Bootstrap-compatible markup under the hood.

We're using the sass-based version of Bootstrap 3. 
If you're keen on using Bootstrap 4, checkout the `bs4`-branch.


## Development

### Install Dependencies

Pull [node](https://nodejs.org/en/) to your local machine and install development dependencies from within your theme directory via npm:

```cli
npm install
```

Please note, when adding third-party modules, npm is favoured over bower since we already rely on npm for downloading build tools.
 
### Build Assets

KicksApp Wordpress-Theme relies on webpack for compiling assets. Kick off the build process via npm script. 

```
npm run build
```

A complete build may take a while.
When watching source files, we benefit from webpack's incremental build capabilitites, so it becomes quite fast.

Run the watch task to automatically compile assets on file changes:

```
npm run watch
```


### SASS

KicksApp's Wordpress-Theme integrates SASS.
The entry-file of your theme's css is found at `css/index.scss`.

Although you're free to choose your own code-style, KicksApp's Wordpress-Theme encourages Atomic Design and BEM. Your css should be organized as components into different subdirectories, such as atoms, molecules and organisms while your `index.scss` only contains imports and lives on top of them. Keep your house clean from the start. 

##### Resources

When referencing further assets in your css via `url(...)`, use paths relative to the entry-file.
Resources that are located under `node_modules` are automatically embedded in the resulting css, because vendor packages should never be deployed or put into repositories. 

### ECMAScript 6

KicksApp's Wordpress-Theme lets you write next-generation JS-Code which is compiled to plain Javascript via Babel.

The entry-file of your theme's js is located at `js/index.js`.

It's recommended to let the entry-file only contain imports. All other application assets should go under `js/modules`.

##### jQuery

Since Wordpress is already bundled with jquery, its global reference is injected as a module.

##### Code Splitting

Javascript output is split into different chunks for vendor libraries and your application layer. 
If your application code changes, the vendor bundle is still being cached by the browser. 





