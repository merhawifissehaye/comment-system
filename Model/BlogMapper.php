<?php

namespace Model;

use Core\MyORM\AbstractMapper;
use Core\MyORM\DatabaseAdapterInterface;
use Core\MyORM\Proxy\CollectionProxy;

class BlogMapper extends AbstractMapper {

    protected $_entityTable = 'blogs';
    protected $_entityClass = '\\Model\\Blog';

    /**
     * BlogMapper constructor.
     * @param DatabaseAdapterInterface $adapter
     */
    public function __construct(DatabaseAdapterInterface $adapter)
    {
        parent::__construct($adapter);
    }

    protected function _createEntity(array $data)
    {
        $entry = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'title' => $data['title'],
            'content' => $data['content'],
            'date_created' => time(),
            'date_modified' => time()
        ));

        return $entry;
    }
}