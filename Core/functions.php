<?php

use Core\Session;

function dd($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
  
  die();
}

function base_path($path) {
  return BASE_PATH . $path;
}

function abort($code = 404) {
  http_response_code($code);
  require base_path("views/{$code}.php");
  die();
}

function view($path, $params = []) {
  extract($params);
  require base_path('views/' . $path);
}