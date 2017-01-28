<?php

/**
 * CommentController.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Controller;

use Core\MyFramework\Controller;
use Model\Comment;

class CommentController extends Controller {
    public function execute()
    {
        $blog = new Comment(array(
            'title' => 'Title of the blog',
            'content' => 'Contents of the blog'
        ));

        echo '<pre>';
        print_r($blog->toArray());
        echo '</pre>';
    }

    public function test() {
        echo "Test called inside CommentController";
    }

    public function error() {
        echo "Error called inside CommentController";
    }
}