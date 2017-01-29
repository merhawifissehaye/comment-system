<?php

// BlogController.php

namespace Controller;

use Core\MyFramework\Controller;
use Core\MyFramework\View;
use Core\Service\ServiceLocator;
use Model\Blog;
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

    public function create() {
        if(isset($_POST['create_blog_submitted'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            if($title == '' || $content == '') {
                $error = 'Both title and content are required';
                View::redirect('/blog/create', array('error' => $error));
                return;
            }
            $blog = new Blog(array(
                'title' => $title,
                'content' => $content,
                'date_created' => date('Y-m-d H:i:s', time()),
                'date_modified' => date('Y-m-d H:i:s', time())
            ));
            $this->_blogService->insert($blog);
            View::redirect('/blog', array('message' => 'Successfully created your blog'));
            return;
        }
        View::render('blog/create');
    }
}