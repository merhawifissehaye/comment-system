<?php

// Route.php
namespace Core\MyRouter;

use Core\MyHttp\RequestInterface;

/**
 * @property  string path
 * @property  string controllerClass
 * @property  string methodName
 */
class Route implements RouteInterface {


    public function __construct($path, $controllerClass, $methodName)
    {
        $this->path = $path;
        $this->controllerClass = $controllerClass;
        $this->methodName = $methodName;
    }

    public function match(RequestInterface $request) {
        return $this->path == $request->getUri();
    }

    public function createController() {
        return new $this->controllerClass;
    }

    public function getMethodName() {
        return $this->methodName;
    }
}