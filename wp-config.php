<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

require_once(dirname(__FILE__) . '/vendor/lib/autoload.php');

define( 'BASE_DIR', dirname(__FILE__) );
define( 'BASE_URL', 'http://' . preg_replace('/[^a-zA-Z0-9]/i', '', $_SERVER['HTTP_HOST']) . '/' . ltrim(str_replace('\\', '/', substr(dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT']))), "/"));

define ('WP_HOME', BASE_URL);
define ('WP_SITEURL', WP_HOME  . "/wp" );

/** Setup paths */
define( 'WP_CONTENT_DIR', BASE_DIR . '/app' );
define( 'WP_CONTENT_URL', BASE_URL . '/app' );

/** Absolute path to the WordPress directory. */
define('ABSPATH', BASE_DIR . '/wp/');

/** Set the default Theme */
define( 'WP_DEFAULT_THEME', 'kicks-app' );


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '<%= database.name %>');

/** MySQL database username */
define('DB_USER', '<%= database.user %>');

/** MySQL database password */
define('DB_PASSWORD', '<%= database.password %>');

/** MySQL hostname */
define('DB_HOST', '<%= database.host %>');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', '<%= database.charset %>');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', <%= environment === 'development' ? true : false %>);

/* That's all, stop editing! Happy blogging. */
  

/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

