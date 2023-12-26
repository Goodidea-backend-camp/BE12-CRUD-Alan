<?php 

const BASE_PATH = __DIR__ . '/../';

session_start();

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'Core/functions.php';

$router = new \Core\Router;
require base_path('routes.php');

// $_POST['_method'] would be 'PUT' or 'DELETE' for update/delete request
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->route($method, $uri);