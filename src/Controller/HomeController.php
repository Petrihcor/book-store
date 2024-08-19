<?php

namespace Src\Controller;

use App\Controller;
use Src\Book;

class HomeController extends Controller
{
    public function execute()
    {
        $booksList = $this->bookService->findAllBooks([], []);
        return $this->view->showPage('main', [
            'booksList' => $booksList
        ]);
    }
}