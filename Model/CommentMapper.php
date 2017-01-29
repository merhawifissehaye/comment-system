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
            'status' => $data['status'],
            'date_created' => $data['date_created'],
            'date_modified' => $data['date_modified']
        ));
        return $comment;
    }

    public function update($entity) {
        if(!$entity instanceof $this->_entityClass) {
            throw new \InvalidArgumentException('The entity to be updated must be an instance of ' . $this->_entityClass . '.');
        }
        $id = $entity->id;
        $data = $entity->toArray();
        $data['user_id'] = $data['user']->load()->id;
        unset($data['user']);
        unset($data['id']);
        return $this->_adapter->update($this->_entityTable, $data, "id = $id");
    }
}