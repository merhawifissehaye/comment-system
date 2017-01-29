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

    /**
     * CommentMapper constructor.
     * @param DatabaseAdapterInterface $adapter
     * @param UserMapper $userMapper
     */
    public function __construct(DatabaseAdapterInterface $adapter, UserMapper $userMapper)
    {
        $this->_userMapper = $userMapper;
        parent::__construct($adapter);
    }

    /**
     * @return UserMapper
     */
    public function getUserMapper()
    {
        return $this->_userMapper;
    }

    protected function _createEntity(array $data)
    {
        $comment = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'comment' => $data['comment'],
            'user' => new ModelProxy($this->_userMapper, $data['user_id']),
            'date_created' => $data['date_created'],
            'date_modified' => $data['date_modified']
        ));
        return $comment;
    }
}