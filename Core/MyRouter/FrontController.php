<?php

// FrontController.php
namespace Core\MyRouter;

use Core\MyHttp\Request;
use Core\MyHttp\Response;

class FrontController {

    protected $controller;
    protected $action;
    protected $params;
    protected $basePath = "/";

    public function __construct(array $options = array()) {

        if(empty($options)) {

            $this->parseUri();

        } else {
            if(isset($options['controller'])) {
                $this->setController($options['controller']);
            }
            if(isset($options['action'])) {
                $this->setAction($options['action']);
            }
            if(isset($options['params'])) {
                $this->setParams($options['params']);
            }
        }

        $route1 = new Route("http://example.com/test/", "Controller\\CommentController", 'test');

        $route2 = new Route("http://example.com/error", "Controller\\CommentController", 'error');

        $router = new Router(array($route1, $route2));

        $dispatcher = new Dispatcher;

        $this->router = $router;

        $this->dispatcher = $dispatcher;
    }

    public function run() {

        call_user_func_array(array(new $this->controller, $this->action), $this->params);

        /*$request = new Request("http://example.com/test/");

        $response = new Response;

        $route = $this->router->route($request, $response);

        $this->dispatcher->dispatch($route, $request, $response);*/
    }

    private function parseUri()
    {
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $path = preg_replace('/[^a-zA-Z0-9\/]/', '', $path);
        if(strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
        }
        @list($controller, $action, $params) = explode('/', $path, 3);
        if(isset($controller)) {
            $this->setController($controller);
        }
        if(isset($action)) {
            $this->setAction($action);
        }
        if(isset($params)) {
            $this->setParams(explode('/', $params));
        }
    }

    private function setController($controller)
    {
        $controller = ucfirst(strtolower($controller)) . 'Controller';
        if(!class_exists($controller)) {
            throw new \InvalidArgumentException("The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }

    private function setAction($action)
    {
        $reflector = new \ReflectionClass($this->controller);
        if(!$reflector->hasMethod($action)) {
            throw new \InvalidArgumentException("The controller action '$action' has not been defined.");
        }
        $this->action = $action;
        return $this;
    }

    private function setParams($params)
    {
        $this->params = $params;
        return $this;
    }
}