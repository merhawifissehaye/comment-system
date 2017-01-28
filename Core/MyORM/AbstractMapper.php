<?php

// AbstractMapper.php
namespace Core\MyORM;
use Core\MyORM\Collection\ModelCollection;

/**
 * @property array entityOptions
 */
abstract class AbstractMapper implements MapperInterface
{
    protected $_adapter;
    protected $_entityTable;
    protected $_entityClass;

    /**
     * AbstractMapper constructor.
     * @param DatabaseAdapterInterface $_adapter
     * @param array $entityOptions
     */
    public function __construct(DatabaseAdapterInterface $_adapter, array $entityOptions = array())
    {
        $this->_adapter = $_adapter;
        if(isset($entityOptions['entityTable'])) {
            $this->setEntityTable($entityOptions['entityTable']);
        }
        if(isset($entityOptions['entityClass'])) {
            $this->setEntityClass($entityOptions['entityClass']);
        }
        $this->_checkEntityOptions();
    }

    private function _checkEntityOptions()
    {
        if(!isset($this->_entityTable)) {
            throw new \RuntimeException('The entity table has not been set yet.');
        }

        if(!isset($this->_entityClass)) {
            throw new \RuntimeException('The entity class has not been set yet.');
        }
    }

    /**
     * @return DatabaseAdapterInterface
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * @param mixed $entityTable
     * @return $this
     */
    public function setEntityTable($entityTable)
    {
        if(!is_string($entityTable) || empty($entityTable)) {
            throw new \InvalidArgumentException('The entity table is invalid.');
        }
        $this->_entityTable = $entityTable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntityTable()
    {
        return $this->_entityTable;
    }

    /**
     * @param mixed $entityClass
     * @return $this
     */
    public function setEntityClass($entityClass)
    {
        $this->_entityClass = $entityClass;
        if(!is_subclass_of($entityClass, 'ModelAbstractEntity')) {
            throw new \InvalidArgumentException('The entity class is invalid.');
        }
        $this->_entityClass = $entityClass;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntityClass()
    {
        return $this->_entityClass;
    }

    public function findById($id) {
        $this->_adapter->select($this->_entityTable, "id = $id");
        if($data = $this->_adapter->fetch()) {
            return $this->_createEntity($data);
        }
        return null;
    }

    public function find($conditions = '')
    {
        $collection = new ModelCollection;
        $this->_adapter->select($this->_entityTable, $conditions);
        while($data = $this->_adapter->fetch()) {
            $collection[] = $this->_createEntity($data);
        }
        return $collection;
    }

    public function insert($entity)
    {
        if(!$entity instanceof $this->_entityClass) {
            throw new \InvalidArgumentException('The entity to be inserted must be an instance of ' . $this->_entityClass . '.');
        }
        return $this->_adapter->insert($this->_entityTable, $entity->toArray());
    }

    public function update($entity)
    {
        if(!$entity instanceof $this->_entityClass) {
            throw new \InvalidArgumentException('The entity to be updated must be an instance of ' . $this->_entityClass . '.');
        }
        $id = $entity->id;
        $data = $entity->toArray();
        unset($data['id']);
        return $this->_adapter->update($this->_entityTable, $data, "id = $id");
    }

    public function delete($id, $col = 'id')
    {
        if($id instanceof $this->_entityClass) {
            $id = $id->id;
        }
        return $this->_adapter->delete($this->_entityTable, "$col = $id");
    }

    abstract protected function _createEntity(array $data);
}