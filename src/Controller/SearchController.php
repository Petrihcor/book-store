<?php

namespace Src\Controller;

use App\Controller;
use Src\Book;

class SearchController extends Controller
{

    public function getBooks()
    {
        $query = $this->bookService->searchBook($_GET['query']);

        return $this->view->showPage('search', [
            'query' => $query
        ]);
    }

    public function getUsers()
    {
        $query = $this->userService->searchUser($_GET['query']);
        return $this->view->showPage('search', [
            'query' => $query
        ]);
    }
    public function execute()
    {
        $booksList = $this->bookService->findAllBooks();
        return $this->view->showPage('search', [
            'booksList' => $booksList
        ]);
    }
}