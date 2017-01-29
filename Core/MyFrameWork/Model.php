<?php

// AbstractModel.php

namespace Core\MyFramework;

use Core\MyORM\Proxy\ModelProxy;

class Model
{
    public $id;
    protected $_values = array();
    protected $_allowedFields;

    /**
     * AbstractModel constructor.
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        foreach($fields as $name => $value) {
            $this->$name = $value;
        }
    }

    public function __set($name, $value)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new \InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        $mutator = 'set' . ucfirst($name);
        $mutator = preg_replace_callback('/(_.)/', function($matches) {
            return strtoupper(str_replace('_', '', $matches[0]));
        }, $mutator);
        if(method_exists($this, $mutator) && is_callable(array($this, $mutator))) {
            $this->$mutator($value);
        } else {
            $this->_values[$name] = $value;
        }
    }

    public function __get($name)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new \InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        $accessor = 'get' . ucfirst($name);
        $accessor = preg_replace_callback('/(_.)/', function($matches) {
            return strtoupper(str_replace('_', '', $matches[0]));
        }, $accessor);
        if(method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return $this->$accessor;
        }
        if(!isset($this->_values[$name])) {
            throw new \InvalidArgumentException('The field ' . $name . ' has not been set for this entity yet.');
        }
        $field = $this->_values[$name];
        if($field instanceof ModelProxy) {
            $field = $field->load();
        }
        return $field;
    }

    public function __isset($name)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new \InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        return isset($this->_values[$name]);
    }

    public function __unset($name)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new \InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        if(isset($this->_values[$name])) {
            unset($this->_values[$name]);
            return true;
        }
        return false;
    }

    public function toArray()
    {
        return $this->_values;
    }
}