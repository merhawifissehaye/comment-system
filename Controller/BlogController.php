<?php

// BlogController.php

namespace Controller;

use Core\MyFramework\Controller;
use Core\MyFramework\View;
use Core\Service\ServiceLocator;
use Service\BlogService;

class BlogController extends Controller
{

    /**
     * @var BlogService
     */
    protected $_blogService;

    public function __construct()
    {
        $this->_blogService = ServiceLocator::getInstance()->getService('blog');
    }

    public function index() {
        $blogs = $this->_blogService->find();
        View::render('blog/index', array('blogs' => $blogs));
    }
}