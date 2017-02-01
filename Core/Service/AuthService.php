<?php

// Auth.php

namespace Core\Service;

use Core\Service\AbstractService;

class AuthService extends AbstractService
{
	public function __construct($mapper) {
		$this->_mapper = $mapper;
	}

	public function login($username, $password) {
		if($this->userExists($username, $password)) {
			$_SESSION['username'] = $username;
			return true;
		}
		return false;
	}

	protected function userExists($username, $password)
	{
		$users = $this->_mapper->find('name = "$username" AND password = "$password"');
		return count($users) > 0;
	}

	public function isLoggedIn() {
		return isset($_SESSION['username']);
	}

	public function logout() {
		unset($_SESSION['username']);
	}
}