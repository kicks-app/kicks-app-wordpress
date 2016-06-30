<?php
// replace text/html with the content type you're using
header('Content-Type: text/plain; charset=UTF-8');

// Setup variables
$root = $_SERVER['DOCUMENT_ROOT'];
$path = '/' . trim(parse_url( $_SERVER['REQUEST_URI'] )['path'],'/');
$path = html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;", urldecode($path)), null, 'UTF-8'); 
if (file_exists( $root . $path )) {

  // Handle real files
  $file = $root . $path;
  
  // With directories, include index.php, if present
  if ( is_dir( $root . $path ) ) {
    if (file_exists( rtrim( $root . $path, '/' ) . '/index.php' )) {
      $file = rtrim($root . $path, '/') . '/index.php';
    }
  }
  
  // Handle only php files
  if (!(strpos($file, '.php') === false)) {
    
    // Add trailing slash to REQUEST_URI: Fixes redirect and path issues with login
    if (is_dir($root . $path) && substr($path, strlen($path) - 1, 1) !== "/") {
      $_SERVER['REQUEST_URI'] = rtrim($path, "/") . "/";
    }
    
    // Include File
    require_once $file;
    
  } else {
    // Serve other files as they are
    return false;
  }
  
} else {
  // Let wordpress handle virtual path
  include_once 'index.php';
}