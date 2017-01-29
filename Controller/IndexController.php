<?php

/**
 * IndexController.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gmail.com
 * Date January 28, 2017
 */

namespace Controller;

use Core\MyFramework\Controller;
use Core\MyFramework\View;
use Core\Service\ServiceLocator;

class IndexController extends Controller
{
    public function index() {
        $blogService = ServiceLocator::getInstance()->getService('blog');
        $blogs = $blogService->find();

        View::render('blog/index', array('blogs' => $blogs));
    }
}