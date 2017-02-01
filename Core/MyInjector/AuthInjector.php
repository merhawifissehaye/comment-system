<?php

// AuthInjector.php

namespace Core\MyInjector;

use Model\UserMapper;
use Core\Service\AuthService;
use Core\MyInjector\MySQLAdapterInjector;

class AuthInjector implements InjectorInterface
{
	public function create()
	{
		$mySQLInjector = new MySQLAdapterInjector;
		$mySQLAdapter = $mySQLInjector->create();
		$mapper = new UserMapper($mySQLAdapter);
		return new AuthService($mapper);
	}
}