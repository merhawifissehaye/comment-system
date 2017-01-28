<?php

/**
 * User.php
 * Author: Merhawi Fissehaye
 * Author Email: merhawifissehaye@gamil.com
 * Date: January 28, 2017
 */

namespace Model;

use Core\MyORM\AbstractModel;

class User extends AbstractModel {

    protected $_allowedFields = array(
        'name',
        'email',
        'password'
    );

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