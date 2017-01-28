<?php

/**
 * ModelCollection.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gmail.com
 * Date: January 28, 2017
 */

namespace Core\MyORM\Collection;

use Core\MyORM\AbstractModel;

class ModelCollection implements CollectionInterface {

    protected $_entities = array();

    /**
     * ModelCollection constructor.
     * @param array $_entities
     */
    public function __construct(array $_entities = array())
    {
        $this->_entities = $_entities;
        $this->reset();
    }


    public function toArray()
    {
        return $this->_entities;
    }

    public function clear()
    {
        $this->_entities = array();
    }

    public function reset()
    {
        reset($this->_entities);
    }

    public function add($key, AbstractModel $entity)
    {
        return $this->offsetSet($key, $entity);
    }

    public function get($key)
    {
        return $this->offsetGet($key);
    }

    public function remove($key)
    {
        return $this->offsetUnset($key);
    }

    public function exists($key)
    {
        return $this->offsetExists($key);
    }

    public function count()
    {
        return count($this->_entities);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }

    public function offsetExists($key)
    {
        return isset($this->_entities[$key]);
    }

    public function offsetGet($key)
    {
        return isset($this->_entities[$key])
            ? $this->_entities[$key] : null;
    }

    public function offsetSet($key, $entity)
    {
        if(!$entity instanceof AbstractModel) {
            throw new \InvalidArgumentException('Only add instances of AbstractModel');
        }
        if(!isset($key)) {
            $this->_entities[] = $entity;
        }
        else {
            $this->_entities[$key] = $entity;
        }
        return true;
    }

    public function offsetUnset($key)
    {
        if($key instanceof AbstractModel) {
            $this->_entities = array_filter($this->_entities, function($v) use ($key) {
                return $v !== $key;
            });
            return true;
        }
        if(isset($this->_entities[$key])) {
            unset($this->_entities[$key]);
            return true;
        }
        return false;
    }
}