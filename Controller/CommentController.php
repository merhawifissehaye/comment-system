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
use Service\BlogService;
use Service\CommentService;

/**
 * @property BlogService blogService
 */
class CommentController extends Controller
{

    /**
     * @var CommentService
     */
    protected $commentService;

    public function __construct()
    {
        $this->commentService = ServiceLocator::getInstance()->getService('comment');
        $this->blogService = ServiceLocator::getInstance()->getService('blog');
    }

    public function index() {
        $comments = $this->commentService->find();
        View::render('comment/index', array('comments' => $comments));
    }

    public function create() {
        if(isset($_POST['comment']) && isset($_POST['blog_id'])) {
            $comment = new Comment(array(
                'comment' => $_POST['comment'],
                'user_id' => 1,
                'blog_id' => $_POST['blog_id'],
                'status' => 'PENDING',
                'date_created' => date('Y-m-d H:i:s', time()),
                'date_modified' => date('Y-m-d H:i:s', time())
            ));
            $this->commentService->insert($comment);
            View::redirect('/comment/', array('message' => 'Successfully created a comment'));
            return;
        }
        $blogs = $this->blogService->find();
        View::render("comment/create", array(
                'blogs' => $blogs,
                'message' => 'New comment created')
        );
    }

    public function approved() {
        $comments = $this->commentService->find('status="APPROVED"');
        View::render('comment/index', array('comments' => $comments));
    }

    public function pending() {
        $comments = $this->commentService->find('status="PENDING"');
        View::render('comment/index', array('comments' => $comments));
    }

    public function spammed() {
        $comments = $this->commentService->find('status="SPAM"');
        View::render('comment/index', array('comments' => $comments));
    }

    public function approve($id) {
        $this->updateStatus($id, 'APPROVED');
    }

    public function spam($id) {
        $this->updateStatus($id, 'SPAM');
    }

    public function delete($id) {
        $this->commentService->delete($id);
        View::redirect('/comment/', array('message' => 'Deleted comment succesffully'));
    }

    private function updateStatus($id, $status) {
        $comment = $this->commentService->findById($id);
        $comment->status = $status;
        $this->commentService->update($comment);
        View::redirect('/comment/approved', array('message' => ucfirst(strtolower($status)) . 'ed comment successfully'));
    }
}