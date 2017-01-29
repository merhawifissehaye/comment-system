<?php

/**
 * CollectionInterface.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Core\MyORM\Collection;

use Core\MyFramework\Model;

interface CollectionInterface extends \Countable, \IteratorAggregate, \ArrayAccess {
    public function toArray();
    public function clear();
    public function reset();
    public function add($key, Model $entity);
    public function get($key);
    public function remove($key);
    public function exists($key);
}