<?php

// CommentServiceInjector.php

namespace Core\MyInjector;

use Model\BlogMapper;
use Model\CommentMapper;
use Model\UserMapper;
use Service\CommentService;

class CommentServiceInjector implements InjectorInterface
{
    public function create()
    {
        $mysqlAdapterInjector = new MySQLAdapterInjector;
        $mysqlAdapter = $mysqlAdapterInjector->create();
        return new CommentService(
            new CommentMapper($mysqlAdapter,
                new UserMapper($mysqlAdapter), new BlogMapper($mysqlAdapter)
            )
        );
    }
}