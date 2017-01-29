<?php

// BlogServiceInjector.php
namespace Core\MyInjector;

use Service\BlogService;
use Model\BlogMapper;

class BlogServiceInjector implements InjectorInterface
{
    public function create()
    {
        $mysqlInjector = new MySQLAdapterInjector;
        $mysqlAdapter = $mysqlInjector->create();
        return new BlogService(new BlogMapper($mysqlAdapter));
    }
}