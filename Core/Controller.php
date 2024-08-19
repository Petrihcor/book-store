<?php

namespace App;

use Src\Service\BookService;
use Src\Service\UserService;

abstract class Controller
{
    protected Database $database;
    protected View $view;

    protected BookService $bookService;
    protected UserService $userService;

    /**
     * @param Database $database
     */
    public function __construct()
    {
        $this->database = new Database();
        $this->view = new View();
        $this->bookService = new BookService($this->database);
        $this->userService = new UserService($this->database);
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

}