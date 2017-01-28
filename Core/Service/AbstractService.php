<?php

// AbstractService.php

namespace Core\Service;

use Core\MyORM\AbstractMapper;

class AbstractService
{
    protected $_mapper;

    /**
     * AbstractService constructor.
     * @param AbstractMapper $_mapper
     */
    public function __construct(AbstractMapper $_mapper)
    {
        $this->_mapper = $_mapper;
    }

    public function findById($id)
    {
        return $this->_mapper->findById($id);
    }

    public function find($conditions = '')
    {
        return $this->_mapper->find($conditions);
    }

    public function insert($entity)
    {
        return $this->_mapper->insert($entity);
    }

    public function update($entity)
    {
        return $this->_mapper->update($entity);
    }

    public function delete($id)
    {
        return $this->_mapper->delete($id);
    }
}