<?php

/**
 * ModelProxy.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Core\MyORM\Proxy;

use Core\MyORM\AbstractMapper;

abstract class AbstractProxy
{
    protected $_mapper;
    protected $_params;

    /**
     * ModelProxy constructor.
     * @param AbstractMapper $_mapper
     * @param $params
     * @throws \InvalidArgumentException
     * @internal param $_params
     */
    public function __construct(AbstractMapper $_mapper, $params)
    {
        if(!is_string($params) || empty($params)) {
            throw new \InvalidArgumentException('The mapper parameters are invalid');
        }
        $this->_mapper = $_mapper;
        $this->_params = $params;
    }

    /**
     * @return AbstractMapper
     */
    public function getMapper()
    {
        return $this->_mapper;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->_params;
    }
}