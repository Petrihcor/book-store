<?php

namespace App;

class Container
{
    private Database $database;
    private Router $router;

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $this->router = new Router($uri);
        $this->router->routing();

    }
}