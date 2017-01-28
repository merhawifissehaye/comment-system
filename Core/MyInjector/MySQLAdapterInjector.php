<?php

// MySQLAdapterInjector.php
namespace Core\MyInjector;

use Core\MyORM\MySQLAdapter;

class MySQLAdapterInjector implements InjectorInterface
{
    protected static $_mysqlAdapter;

    public function create()
    {
        if(self::$_mysqlAdapter === null) {
            self::$_mysqlAdapter = new MySQLAdapter(array(
                'host',
                'user',
                'password',
                'database'
            ));
        }
        return self::$_mysqlAdapter;
    }
}