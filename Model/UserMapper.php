<?php

// UserMapper.php

namespace Model;

use Core\MyORM\AbstractMapper;

class UserMapper extends AbstractMapper {

    protected $_entityTable = "users";
    protected $_entityClass = 'UserModel';

    protected function _createEntity(array $data)
    {
        $user = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'date_created' => time(),
            'date_modified' => time()
        ));

        return $user;
    }
}