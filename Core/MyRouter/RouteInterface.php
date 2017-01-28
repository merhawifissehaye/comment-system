<?php

// RouteInterface.php
namespace Core\MyRouter;

use Core\MyHttp\RequestInterface;

interface RouteInterface {
    public function match(RequestInterface $request);
}