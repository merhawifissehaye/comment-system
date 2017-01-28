<?php

// Route.php
namespace Core\MyRouter;

use Core\MyHttp\RequestInterface;

/**
 * @property  string path
 * @property  string controllerClass
 */
class Route implements RouteInterface {


    public function __construct($path, $controllerClass)
    {
        $this->path = $path;
        $this->controllerClass = $controllerClass;
    }

    public function match(RequestInterface $request) {
        return $this->path == $request->getUri();
    }

    public function createController() {
        return new $this->controllerClass;
    }
}