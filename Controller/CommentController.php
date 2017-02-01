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
use MFissehaye\CommentSecurityCheck\CommentSecurityCheck;
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
        $this->authService = ServiceLocator::getInstance()->getService('auth');
        $this->csc = new CommentSecurityCheck(array(HOST, DB_USER, DB_PASS, DB_NAME));
    }

    public function index() {
        // Check if comment is valid here
        $comments = $this->commentService->find();
        View::render('comment/index', array('comments' => $comments));
    }

    public function create() {
        if(isset($_POST['comment']) && isset($_POST['blog_id'])) {
            $comment = new Comment(array(
                'comment' => $_POST['comment'],
                'user_id' => 1,
                'blog_id' => $_POST['blog_id'],
                'status' => $this->csc->hasSpamWord($_POST['comment']) ? 'SPAM' : 'PENDING',
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
        $spamWords = $this->csc->getSpamWords();
        foreach($comments as $comment) {
            $comment->comment = $this->csc->focusSpamWord($comment->comment);
        }
        View::render('spam/index', array('comments' => $comments));
    }

    private function approveLogic($id) {
        $comment = $this->commentService->findById($id);
        $comment->status = 'APPROVED';
        $this->commentService->update($comment);
    }

    public function approve($id) {
        $this->approveLogic($id);
        View::redirect('/comment/approved', array('message' => 'Approved comment successfully'));
    }

    private function spamLogic($id) {
        $comment = $this->commentService->findById($id);
        $comment->status = 'SPAM';
        $this->commentService->update($comment);
    }

    public function spam($id) {
        $this->spamLogic($id);
        View::redirect('/comment/spammed', array('message' => 'Spammed comment successfully'));
    }

    private function deleteLogic($id) {
        $this->commentService->delete($id);
    }

    public function delete($id) {
        $this->deleteLogic($id);
        View::redirect('/comment/', array('message' => 'Deleted comment succesffully'));
    }

    public function createspam() {

        $words = $this->csc->getSpamWords();

        if(isset($_POST['create_spam_submitted'])) {
            $word = $_POST['word'];
            if($word != '' && !in_array($word, $words)) {
                $this->csc->addToSpam($word);
                // If a new spam word is added, go through all comments and spam
                $comments = $this->commentService->find();
                foreach($comments as $comment) {
                    if($this->csc->hasSpamWord($comment->comment)) {
                        $comment->status = 'SPAM';
                        $this->commentService->update($comment);
                    }
                }
                View::redirect('/comment/createspam', array('message' => 'Added spam word successfully'));
                return;
            } else {
                View::redirect('/comment/createspam', array('error' => 'Enter valid spam word'));
                return;
            }
        }
        View::render('spam/create', array('spams' => $words));
    }

    public function deletespam($id) {
        $this->csc->removeFromSpam($id);
        View::redirect('/comment/createspam', array('message' => 'Removed spam word'));
    }

    public function getJson() {
        $comments = $this->commentService->find();
        header('Content-Type: application/json');
        echo json_encode($comments->toJson());
    }

    public function approveJson($ids) {
        $idsArray = explode(',', $ids);
        foreach($idsArray as $id) {
            $this->approveLogic($id);
        }
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'ids' => $idsArray,
                'message' => 'Successfully approved comments'
            )
        );
    }

    public function spamJson($ids) {
        $idsArray = explode(',', $ids);
        foreach($idsArray as $id) {
            $this->spamLogic($id);
        }
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'ids' => $idsArray,
                'message' => 'Successfully spammed comments'
            )
        );
    }

    public function deleteJson($ids) {
        $idsArray = explode(',', $ids);
        foreach($idsArray as $id) {
            $this->deleteLogic($id);
        }
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'ids' => $idsArray,
                'message' => 'Deleted comments'
            )
        );
    }

    public function signin() {
        if(!$this->authService->login('merhawi', 'test')) {
            echo "You need to login first";
        }
    }
}