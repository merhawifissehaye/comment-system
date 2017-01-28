<?php

// ServiceLocator.php

use Core\MyInjector\InjectorInterface;
use Core\Service\AbstractService;

class ServiceLocator
{
    protected $_injectors = array();
    protected $_services = array();

    public function addInjector($key, InjectorInterface $injector)
    {
        if(!isset($this->_injectors[$key])) {
            $this->_injectors[$key] = $injector;
            return true;
        }
        return false;
    }

    public function addInjectors(array $injectors)
    {
        foreach($injectors as $key => $injector) {
            $this->addInjector($key, $injector);
        }
        return $this;
    }

    public function injectorExists($key)
    {
        return isset($this->_injectors[$key]);
    }

    public function getInjector($key)
    {
        return isset($this->_injectors[$key])
            ? $this->_injectors[$key] : null;
    }

    public function addService($key, AbstractService $service)
    {
        if(!isset($this->_services[$key])) {
            $this->_services[$key] = $service;
            return true;
        }
        return false;
    }

    public function addServices(array $services)
    {
        foreach($services as $key => $service) {
            $this->addService($key, $service);
        }
        return $this;
    }

    public function serviceExists($key)
    {
        return isset($this->_services[$key]);
    }

    public function getService($key)
    {
        if(isset($this->_services[$key])) {
            return $this->_services[$key];
        }
        if(!isset($this->_injectors[$key])) {
            throw new RuntimeException('The specified service cannot be created because the associated injector does not exist.');
        }
        $service = $this->getInjector($key)->create();
        $this->addService($key, $service);
        return $service;
    }
}