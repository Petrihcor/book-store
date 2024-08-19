<?php

namespace App;


use Src\Controller\CreatorController;
use Src\Controller\DeleterController;
use Src\Controller\HomeController;
use Src\Controller\SearchController;
use Src\Controller\UpdaterController;
use Src\Controller\UserController;

class Router
{
    private string $uri;

    /**
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    public function routing()
    {
        if ($this->uri == "/") {
            return (new HomeController())->execute();

        } else if($this->uri == "/users") {
            return (new UserController())->execute();
        } else if($this->uri == "/books/add") {
            return $_SERVER['REQUEST_METHOD'] == 'POST' ?  (new CreatorController())->addBook() : (new CreatorController())->showBook();
        } else if(str_starts_with($this->uri, "/book/edit")) {
            return $_SERVER['REQUEST_METHOD'] == 'POST' ? (new UpdaterController())->updateBook() :  (new UpdaterController())->showBook();
        } else if(str_starts_with($this->uri, "/book/delete")) {
            return (new DeleterController())->deleteBook();
        } else if($this->uri == "/users/add") {
            return $_SERVER['REQUEST_METHOD'] == 'POST' ?  (new CreatorController())->addUser() : (new CreatorController())->showUser();
        } else if(str_starts_with($this->uri, "/user/edit")) {
            return $_SERVER['REQUEST_METHOD'] == 'POST' ? (new UpdaterController())->updateUser() :  (new UpdaterController())->showUser();
        } else if(str_starts_with($this->uri, "/user/delete")) {
            return (new DeleterController())->deleteUser();
        } else if(str_starts_with($this->uri, "/search/books")) {
            return (new SearchController())->getBooks();
        } else if(str_starts_with($this->uri, "/search/users")) {
            return (new SearchController())->getUsers();
        } else {
            return "nothing";
        }
    }

}