<?php

// Dispatcher.php
namespace Core\MyRouter;

use Core\MyHttp\RequestInterface;
use Core\MyHttp\ResponseInterface;

class Dispatcher {

    public function dispatch(Route $route, RequestInterface $request, ResponseInterface  $response) {
        $controller = $route->createController();
        $controller->execute($request, $response);
    }
}