<?php

// RequestInterface.php
namespace Core\MyHttp;

interface RequestInterface {
    public function match();
    public function getUri();
}