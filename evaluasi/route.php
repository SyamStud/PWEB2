<?php

class Route
{
  public string $method;
  public string $path;
  public array $handler;

  function __construct(string $method, string $path, array $handler)
  {
    $this->method = $method;
    $this->path = $path;
    $this->handler = $handler;
  }

  public static function get(string $path, array $handler)
  {
    return new Route("GET", $path, $handler);
  }

  public static function post(string $path, array $handler)
  {
    return new Route("POST", $path, $handler);
  }

  public static function delete(string $path, array $handler)
  {
    return new Route("DELETE", $path, $handler);
  }
}

class Router
{
  private array $routes;

  function __construct(array $routes)
  {
    $this->routes = $routes;
  }

  public function handle(string $path)
  {
    foreach ($this->routes as $route) {
      // this will get the url path segment including the regex parameters
      $matchRoutePath = preg_match("#^" . $route->path . "$#", $path, $params);
      $isValidMethod = $route->method === $_SERVER["REQUEST_METHOD"];

      if ($matchRoutePath && $isValidMethod) {
        list($controller, $method) = $route->handler;

        $controller = new $controller;

        array_shift($params); // exclude path from $params
        call_user_func_array([$controller, $method], $params);

        return;
      }
    }

    http_response_code(404);
    echo 'Not Found';
  }
}
