<?php

/**
 * Comment.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Model;

use Core\MyORM\AbstractModel;
use Core\MyORM\Proxy\ModelProxy;

class Comment extends AbstractModel {
    protected $_allowedFields = array(
        'content',
        'user',
        'user_id',
        'blog_id'
    );

    public function setContent($content)
    {
        if(!is_string($content) || strlen($content) < 2) {
            throw new \InvalidArgumentException('The comment is invalid.');
        }
        $this->_values['content'] = $content;
    }

    public function setUser(ModelProxy $user)
    {
        $this->_values['user'] = $user;
    }
}