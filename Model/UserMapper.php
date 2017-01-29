<?php

// UserMapper.php

namespace Model;

use Core\MyORM\AbstractMapper;

class UserMapper extends AbstractMapper {

    protected $_entityTable = "users";
    protected $_entityClass = '\\Model\\User';

    protected function _createEntity(array $data)
    {
        $user = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'avatar_url' => $data['avatar_url'],
            'date_created' => $data['date_created'],
            'date_modified' => $data['date_modified']
        ));

        return $user;
    }
}