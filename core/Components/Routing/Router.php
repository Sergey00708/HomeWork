<?php

namespace Sergey\Framework\Components\Routing;

use Sergey\Framework\Interfaces\RouteInterface;


class Router implements RouteInterface
{
    protected $routes = [];

    public function addRoute(string $path, $action)
    {
        $path = trim($path, '/');
        $this->routes[$path] = $action;
    }

    public function route(string $uri): callable
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = trim($path, '/');
        if (isset($this->routes[$path])){
            $action = $this->routes[$path];
            $controllerName = $action[0];
            $method = $action[1];
            $controller = new $controllerName();
        }
        if (method_exists($controller, $method)){
            return function () use ($controller, $method){
                $reflectionMethod = new \ReflectionMethod($controller, $method);
                $parameters = $this->resolveParameters($reflectionMethod);
                $reflectionMethod->invokeArgs($controller, $parameters);
            };
        }
    }

    public function resolveParameters($reflectionMethod)
    {
        foreach ($reflectionMethod->getParameters() as $parameter) {
            $name = $parameter->getName();
            $type = $parameter->getType();
            if ($type && !$type->isBuiltin()) {
                $className = $type->getName();
                $value = new $className();
            } else {
                $value = $_GET[$name];
            }
            $argument[$name] = $value;
        }
        return $argument;
    }
}

