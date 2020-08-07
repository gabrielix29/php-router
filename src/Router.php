<?php

namespace gabrielix29\Router;

class Router
{
    private array $routes;
    private array $allowedHttpMethods = ["GET", "POST", "PUT", "DELETE", "ALL"];
    private array $customErrors;

    function __construct()
    {
        $this->routes = array();
        $this->customErrors = array();
    }

    public function add(string $method, string $route, callable $closure)
    {
        //check if method is valid
        if (in_array($method, $this->allowedHttpMethods)) {
            array_push($this->routes, [
                "method" => $method,
                "route" => $route,
                "closure" => $closure
            ]);
        }
    }

    public function custom404(callable $closure)
    {
        $this->customErrors["404"] = $closure;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $uriParts = explode('/', $uri);
        $routeFound = null;

        foreach ($this->routes as $route) {
            if (preg_match($route['route'], $uri)) {
                if ($route['method'] == $requestMethod || $route['method'] == "ALL") {
                    $routeFound = $route;
                    break;
                }
            }
        }

        if (!$routeFound) {
            http_response_code(404);
            if ($this->customErrors["404"]) {
                $this->customErrors["404"]();
            }
            return;
        }

        $routeFound['closure']($uriParts);
    }
}
