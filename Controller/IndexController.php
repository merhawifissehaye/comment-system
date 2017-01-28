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
use Model\Comment;

class IndexController extends Controller
{
    public function index() {
        $commentModels = array();
        $commentsArray = array(
            array(
                'id' => 1,
                'content' => 'This is a sample comment',
                'user_id' => 1,
                'blog_id' => 1
            ),
            array(
                'id' => 2,
                'content' => 'Second comment. I think it\'s getting better',
                'user_id' => 1,
                'blog_id' => 1
            ),
            array(
                'id' => 3,
                'content' => 'Donald Trump is a real trump',
                'user_id' => 1,
                'blog_id' => 1
            ),
            array(
                'id' => 4,
                'content' => 'I love this blog very much.',
                'user_id' => 1,
                'blog_id' => 1
            ),
            array(
                'id' => 5,
                'content' => 'Would you like to see more? visit <a href="http://www.google.co.uk">Google</a>',
                'user_id' => 1,
                'blog_id' => 1
            )
        );

        foreach($commentsArray as $comment) {
            $commentModels[] = new Comment($comment);
        }
        $view = new View('index');
        $view->render(array('comments' => $commentModels));
    }
}