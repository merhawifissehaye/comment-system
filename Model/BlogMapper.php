<?php

namespace Model;

use Core\MyORM\AbstractMapper;
use Core\MyORM\DatabaseAdapterInterface;
use Core\MyORM\Proxy\CollectionProxy;

class BlogMapper extends AbstractMapper {

    protected $_entityTable = 'blogs';
    protected $_entityClass = '\\Model\\Blog';

    protected $_commentMapper;

    /**
     * @param DatabaseAdapterInterface $adapter
     * @param AbstractMapper $mapper
     */
    public function __construct(DatabaseAdapterInterface $adapter, AbstractMapper $mapper)
    {
        parent::__construct($adapter);
        $this->_commentMapper = $mapper;
    }

    protected function _createEntity(array $data)
    {
        $entry = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'title' => $data['title'],
            'comments' => new CollectionProxy($this->_commentMapper, 'blog_id = ' . $data['id']),
            'content' => $data['content'],
            'date_created' => $data['date_created'],
            'date_modified' => $data['date_modified']
        ));
        return $entry;
    }
}