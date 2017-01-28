<?php

// CommentMapper.php
namespace Model;

use Core\MyORM\AbstractMapper;
use Core\MyORM\DatabaseAdapterInterface;

class CommentMapper extends AbstractMapper {

    protected $_entityTable = 'comments';
    protected $_entityClass = 'CommentModel';
    protected $_userMapper;
    protected $_blogMapper;

    /**
     * CommentMapper constructor.
     * @param DatabaseAdapterInterface $adapter
     * @param UserMapper $userMapper
     */
    public function __construct(DatabaseAdapterInterface $adapter, UserMapper $userMapper, BlogMapper $blogMapper)
    {
        $this->_userMapper = $userMapper;
        $this->_blogMapper = $blogMapper;
        parent::__construct($adapter);
    }

    /**
     * @return UserMapper
     */
    public function getUserMapper()
    {
        return $this->_userMapper;
    }

    /**
     * @return BlogMapper
     */
    public function getBlogMapper()
    {
        return $this->_blogMapper;
    }

    protected function _createEntity(array $data)
    {
        $comment = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'content' => $data['content'],
            'user' => new UserProxy($this->_userMapper, $data['user_id']),
            'blog' => new ModelProxy($this->_blogMapper, $data['blog_id']),
            'date_created' => time(),
            'date_modified' => time()
        ));
        return $comment;
    }
}