<?php

// BlogServiceInjector.php
namespace Core\MyInjector;

use Model\CommentMapper;
use Model\UserMapper;
use Service\BlogService;
use Model\BlogMapper;

class BlogServiceInjector implements InjectorInterface
{
    public function create()
    {
        $mysqlInjector = new MySQLAdapterInjector;
        $mysqlAdapter = $mysqlInjector->create();
        return new BlogService(
            new BlogMapper(
                $mysqlAdapter,
                new CommentMapper(
                    $mysqlAdapter,
                    new UserMapper($mysqlAdapter))
            )
        );
    }
}