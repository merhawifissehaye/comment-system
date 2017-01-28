<?php

// BlogServiceInjector.php
namespace Core\MyInjector;

use Model\BlogMapper;
use Model\CommentMapper;
use Model\UserMapper;

class BlogServiceInjector implements InjectorInterface
{
    public function create()
    {
        $mysqlInjector = new MySQLAdapterInjector;
        $mysqlAdapter = $mysqlInjector->create();
        return new ModelService(
            new BlogMapper(
                $mysqlAdapter,
                new CommentMapper(
                    $mysqlAdapter,
                    new UserMapper($mysqlAdapter)
                )
            )
        );
    }
}