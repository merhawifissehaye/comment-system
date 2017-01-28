<?php

// Dispatcher.php
namespace Core\MyRouter;

use Core\MyHttp\RequestInterface;
use Core\MyHttp\ResponseInterface;

class Dispatcher {

    public function dispatch(Route $route, RequestInterface $request, ResponseInterface  $response) {
        $controller = $route->createController();
        $method = $route->getMethodName();
        if(!(method_exists($controller, $method) && is_callable(array($controller, $method)))) {
            throw new \RuntimeException('Invalid method ' . $method . ' in controller ' . get_class($controller));
        }
        $controller->$method($request, $response);
    }
}