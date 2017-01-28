<?php

// AbstractModel.php

class AbstractModel
{
    protected $id;
    protected $date_created;
    protected $date_modified;
    protected $_values = array();
    protected $_allowedFields = array();

    /**
     * AbstractModel constructor.
     * @param array $fields
     */
    public function __construct(array $fields)
    {
        foreach($fields as $name => $value) {
            $this->$name = $value;
        }
        $this->id = null;
        $this->date_created = $this->date_modified = time();
    }

    function __set($name, $value)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        $mutator = 'set' . ucfirst($name);
        if(method_exists($this, $mutator) && is_callable(array($this, $mutator))) {
            $this->$mutator($value);
        } else {
            $this->_values[$name] = $value;
        }
    }

    function __get($name)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        $accessor = 'get' . ucfirst($name);
        if(method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return $this->$accessor;
        }
        if(!isset($this->_values[$name])) {
            throw new InvalidArgumentException('The field ' . $name . ' has not been set for this entity yet.');
        }
        $field = $this->_values[$name];
        if($field instanceof ProxyModel) {
            $field = $field->load();
        }
        return $field;
    }

    function __isset($name)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException('The field ' . $name . ' is not allowed for this entity.');
        }
        return isset($this->_values[$name]);
    }

    function __unset($name)
    {
        if(!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException('The firld ' . $name . ' is not allowed for this entity.');
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