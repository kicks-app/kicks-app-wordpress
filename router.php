<?php


$root = $_SERVER['DOCUMENT_ROOT'];
chdir($root);
$path = '/' . ltrim( parse_url($_SERVER['REQUEST_URI'])['path'], '/');
$file = $root . $path;


if (is_file($file)) {
  
  return false;
  
} else {
    
  
  if (substr($path, strlen($path) - 1, 1) !== "/") {
    $path = rtrim($path, "/") . "/";
    header("Location: $path");
    exit;
  }
    
  include_once 'index.php';
  
}