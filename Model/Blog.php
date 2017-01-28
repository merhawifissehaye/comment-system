<?php

// Blog.php
namespace Model;

use Core\MyFramework\Model;
use Core\MyORM\Proxy\CollectionProxy;

class Blog extends Model {

    protected $_allowedFields = array(
        'title',
        'content',
        'comments'
    );


    public function setId($id) {
        if(!filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 65535)))) {
            throw new \InvalidArgumentException('The entry ID is invalid');
        }
        $this->_values['id'] = $id;
    }

    public function setTitle($title)
    {
        if(!is_string($title) || strlen($title) < 2 || strlen($title) > 32) {
            throw new \InvalidArgumentException('Invalid blog title');
        }
        $this->_values['title'] = $title;
    }

    public function setContent($content)
    {
        if(!is_string($content) || empty($content)) {
            throw new \InvalidArgumentException('The entry is invalid.');
        }
        $this->_values['content'] = $content;
    }

    public function setComments(CollectionProxy $comments)
    {
        $this->_values['comments'] = $comments;
    }
}