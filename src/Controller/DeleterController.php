<?php

namespace Src\Controller;

use App\Controller;
use Src\Book;
use Src\Service\BookService;

class DeleterController extends Controller
{
    public function deleteBook()
    {
        $this->bookService->deleteBook($_GET['id']);
        $this->redirect('/');
    }

    public function deleteUser()
    {
        $this->userService->deleteUser($_GET['id']);
        $this->redirect('/users');
    }

}