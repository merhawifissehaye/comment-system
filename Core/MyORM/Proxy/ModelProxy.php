<?php

/**
 * ModelProxy.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Core\MyORM\Proxy;

use Core\MyORM\AbstractModel;

class ModelProxy extends AbstractProxy implements ProxyInterface {

    protected $_entity;

    public function load()
    {
        if($this->_entity === null) {
            $this->_entity = $this->_mapper->findById($this->_params);
            if(!$this->_entity instanceof AbstractModel) {
                throw new \RuntimeException('Unable to load the related entity');
            }
        }

        return $this->_entity;
    }
}