<?php

/**
 * User.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Model;

use Core\MyFramework\Model;

class User extends Model {

    protected $_allowedFields = array(
        'id',
        'name',
        'password',
        'email',
        'password',
        'avatar_url',
        'date_created',
        'date_modified'
    );

    public function setId($id) {
        if(!filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 65535)))) {
            throw new \InvalidArgumentException('The entry ID is invalid');
        }
        $this->_values['id'] = $id;
    }

    public function setName($name) {
        if(!is_string($name) || strlen($name) < 2) {
            throw new \InvalidArgumentException('The name of the author is invalid.');
        }
        $this->_values['name'] = $name;
    }

    public function setEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('The email address of the author is invalid.');
        }
        $this->_values['email'] = $email;
    }
}