<?php 

namespace Core;

class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller) 
  {
    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller
    ];
  }
  
  public function get($uri, $controller) 
  {
    $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller) 
  {
    $this->add('POST', $uri, $controller);
  }

  public function put($uri, $controller) 
  {
    $this->add('PUT', $uri, $controller);
  }

  public function delete($uri, $controller) 
  {
    $this->add('DELETE', $uri, $controller);
  }
  
  public function route($method, $uri)
  {
    foreach($this->routes as $route) {
      if($route['method'] === $method && $route['uri'] === $uri) {
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