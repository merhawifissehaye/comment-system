<?php

// index.php

namespace CommentSystem;

use Core\MyInjector\BlogServiceInjector;
use Core\MyInjector\CommentSecurityCheckInjector;
use Core\MyInjector\CommentServiceInjector;
use Core\MyInjector\AuthInjector;
use Core\MyRouter\FrontController;
use Core\Service\ServiceLocator;

session_start();

require_once 'AutoLoader.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once 'bootstrap/global.php';
$autoLoader = new AutoLoader();
$autoLoader->register();

$serviceLocator = ServiceLocator::getInstance();
$serviceLocator->addInjector('blog', new BlogServiceInjector);
$serviceLocator->addInjector('comment', new CommentServiceInjector);
$serviceLocator->addInjector('auth', new AuthInjector);

new FrontController;