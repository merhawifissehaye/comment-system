<?php

// index.php

namespace CommentSystem;

use Core\MyRouter\FrontController;

require_once 'AutoLoader.php';
$autoLoader = new AutoLoader();
$autoLoader->register();

$frontController = new FrontController();

$frontController->run();