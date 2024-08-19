<?php

namespace Src\Controller;

use App\Controller;
use App\Validator;

class CreatorController extends Controller
{
    public function showBook()
    {
        return $this->view->showPage('add-book', [
            'errors' => []
        ]);
    }

    public function addBook()
    {
        $validator = new Validator();
        $validator
            ->required($_POST['title'], 'title')
            ->min($_POST['title'], 3, 'title')
            ->max($_POST['title'], 50, 'title');

        $validator
            ->required($_POST['author'], 'author')
            ->min($_POST['author'], 3, 'author')
            ->max($_POST['author'], 50, 'author');
        $validator
            ->required($_POST['year'], 'year')
            ->max($_POST['year'], 4, 'year')
            ->numeric($_POST['year'], 'year');
        if ($validator->hasErrors()) {
            $this->view->showPage('add-book', [
                'errors' => $validator->getErrors(),
            ]);
        } else {
            $this->bookService->insertBook($_POST);
            $this->redirect($_SERVER['REQUEST_URI']);
        }
    }

    public function showUser()
    {
        return $this->view->showPage('add-user', [
            'errors' => []
        ]);
    }

    public function addUser()
    {
        $validator = new Validator();
        $validator
            ->required($_POST['name'], 'name')
            ->min($_POST['name'], 3, 'name')
            ->max($_POST['name'], 50, 'name');

        $validator
            ->required($_POST['age'], 'age')
            ->max($_POST['age'], 3, 'age')
            ->numeric($_POST['age'], 'age');

        if ($validator->hasErrors()) {
            $this->view->showPage('add-user', [
                'errors' => $validator->getErrors()
            ]);
        } else {
            $this->userService->insertUser($_POST);
            $this->redirect($_SERVER['REQUEST_URI']);
        }

    }

}