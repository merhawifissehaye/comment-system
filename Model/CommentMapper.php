<?php

// CommentMapper.php
namespace Model;

use Core\MyORM\AbstractMapper;
use Core\MyORM\DatabaseAdapterInterface;
use Core\MyORM\Proxy\ModelProxy;

class CommentMapper extends AbstractMapper {

    protected $_entityTable = 'comments';
    protected $_entityClass = '\\Model\\Comment';
    protected $_userMapper;
    protected $_blogMapper;

    /**
     * CommentMapper constructor.
     * @param DatabaseAdapterInterface $adapter
     * @param UserMapper $userMapper
     * @param BlogMapper $blogMapper
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

    public function getBlogMapper()
    {
        return $this->_blogMapper;
    }

    protected function _createEntity(array $data)
    {
        $comment = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'comment' => $data['comment'],
            'user' => new ModelProxy($this->_userMapper, $data['user_id']),
            'blog' => new ModelProxy($this->_blogMapper, $data['blog_id']),
            'date_created' => time(),
            'date_modified' => time()
        ));
        return $comment;
    }
}