<?php

// index.php

namespace CommentSystem;

use Core\MyHttp\Request;
use Core\MyHttp\Response;
use Core\MyRouter\Dispatcher;
use Core\MyRouter\FrontController;
use Core\MyRouter\Route;
use Core\MyRouter\Router;

require_once 'AutoLoader.php';
$autoLoader = new AutoLoader();
$autoLoader->register();

$request = new Request("http://example.com/error");

$response = new Response;

$route1 = new Route("http://example.com/test/", "Controller\\CommentController");

$route2 = new Route("http://example.com/error", "Controller\\ErrorController");

$router = new Router(array($route1, $route2));

$dispatcher = new Dispatcher;

$frontController = new FrontController($router, $dispatcher);

$frontController->run($request, $response);