<?php
define( 'WP_HOME', (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . ( basename(dirname($_SERVER['SCRIPT_NAME'])) === 'wp-admin' ? dirname(dirname($_SERVER['SCRIPT_NAME'])) : dirname($_SERVER['SCRIPT_NAME'])));
define( 'WP_SITEURL', WP_HOME);
define( 'WP_USE_THEMES', true);
require( './wp-core/wp-blog-header.php' );
?>