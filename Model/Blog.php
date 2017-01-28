<?php

// Blog.php

class Blog extends AbstractModel {

    protected $_allowedFields = array(
        'title',
        'content',
        'comments'
    );

    public function setTitle($title)
    {
        if(!is_string($title) || strlen($title) < 2 || strlen($title) > 32) {
            throw new InvalidArgumentException('Invalid blog title');
        }
        $this->_values['title'] = $title;
    }

    public function setContent($content)
    {
        if(!is_string($content) || empty($content)) {
            throw new InvalidArgumentException('The entry is invalid.');
        }
        $this->_values['content'] = $content;
    }

    public function setComments(CollectionProxy $comments)
    {
        $this->_values['comments'] = $comments;
    }
}