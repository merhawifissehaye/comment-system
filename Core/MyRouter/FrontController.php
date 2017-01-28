<?php

// FrontController.php
namespace Core\MyRouter;

use Core\MyHttp\RequestInterface;
use Core\MyHttp\ResponseInterface;

class FrontController {

    public function __construct(Router $router, Dispatcher $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function run(RequestInterface $request, ResponseInterface $response) {
        $route = $this->router->route($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
    }
}