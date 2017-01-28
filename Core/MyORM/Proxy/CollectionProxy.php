<?php

/**
 * CollectionProxy.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Core\MyORM\Proxy;

use Core\MyORM\Collection\ModelCollection;

class CollectionProxy extends AbstractProxy implements ProxyInterface, \Countable, \IteratorAggregate {

    protected $_collection;

    public function getIterator()
    {
        return $this->load();
    }

    public function load()
    {
        if($this->_collection === null) {
            $this->_collection = $this->_mapper->find($this->_params);
            if(!$this->_collection instanceof ModelCollection) {
                throw new \RuntimeException('Unable to load the related collection.');
            }
        }
        return $this->_collection;
    }

    public function count()
    {
        return count($this->load());
    }
}