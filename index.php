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

$frontController = new FrontController();

$frontController->run();