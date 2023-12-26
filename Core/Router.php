<?php 

namespace Core;

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller) 
  {
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
      'middleware' => null
    ];
    return $this;
  }
  
  public function get($uri, $controller) 
  {
    return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller) 
  {
    return $this->add('POST', $uri, $controller);
  }

  public function put($uri, $controller) 
  {
    return $this->add('PUT', $uri, $controller);
  }

  public function delete($uri, $controller) 
  {
    return $this->add('DELETE', $uri, $controller);
  }
  
  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;

    return $this;
  }

  public function route($method, $uri)
  {
    foreach($this->routes as $route) {
      if($route['method'] === $method && $route['uri'] === $uri) {
        Middleware::resolve($route['middleware']);

        return require base_path("Http/controllers/{$route['controller']}");
      }
    }

    $this->abort();
  }

  protected function abort($code = 404) 
  {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
  }
}