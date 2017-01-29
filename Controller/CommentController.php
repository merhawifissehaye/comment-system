<?php

/**
 * CommentController.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Controller;

use Core\MyFramework\Controller;
use Core\MyFramework\View;
use Core\Service\ServiceLocator;
use Model\Comment;
use Service\CommentService;

class CommentController extends Controller
{

    /**
     * @var CommentService
     */
    protected $commentService;

    public function __construct()
    {
        $this->commentService = ServiceLocator::getInstance()->getService('comment');
    }

    public function index() {
        $comments = $this->commentService->find();
        View::render('comment/index', array('comment/comments', 'comments' => $comments));
    }

    public function create() {
        if(isset($_POST['comment'])) {
            $commentText = $_POST['comment'];
            $comment = new Comment(array(
                'comment' => $commentText,
                'user_id' => 1,
                'blog_id' => 1
            ));
            $this->commentService->insert($comment);
            View::redirect("/", array('message' => 'New comment created'));
        }
        View::render('comment/create-comment', array());
    }
}