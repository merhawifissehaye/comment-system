<?php

// CommentServiceInjector.php

namespace Core\MyInjector;

use MFissehaye\CommentSecurityCheck\CommentSecurityCheck;

class CommentSecurityCheckInjector implements InjectorInterface
{
    public function create()
    {
        return new CommentSecurityCheck(HOST, DB_USER, DB_PASS, DB_NAME);
    }
}