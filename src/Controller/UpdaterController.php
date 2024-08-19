<?php

namespace Src\Controller;

use App\Controller;
use App\Validator;
use Src\Book;
use Src\Service\BookService;

class UpdaterController extends Controller
{
    public function showBook($errors = [])
    {
        $book = $this->bookService->findBook('id', $_GET['id']);
        return $this->view->showPage('update-book', [
            'book' => $book,
            'errors' => $errors
        ]);
    }

    public function updateBook()
    {
        $validator = new Validator();
        $validator
            ->min($_POST['title'], 3, 'title')
            ->max($_POST['title'], 50, 'title');

        $validator
            ->min($_POST['author'], 3, 'author')
            ->max($_POST['author'], 50, 'author');
        $validator
            ->max($_POST['year'], 4, 'year')
            ->numeric($_POST['year'], 'year');

        if ($validator->hasErrors()) {
            $this->showBook($validator->getErrors());
        } else {
            $this->bookService->updateBook($_POST, $_GET['id']);
            $this->redirect($_SERVER['REQUEST_URI']);
        }

    }

    public function showUser($errors = [])
    {
        $user = $this->userService->findUser(['id' => $_GET['id']]);
        var_dump($user);
        $booksList = $this->bookService->findAllBooks([
            'user_id' => [$_GET['id'], null]
        ]);

        $booksIds = [];
        if ($user->getListbooks()) {
            foreach ($user->getListbooks() as $userbook) {
                $booksIds[] = $userbook->getTitle();
            }
        }

        return $this->view->showPage('update-user', [
            'user' => $user,
            'booksList' => $booksList,
            'booksIds' => $booksIds,
            'errors' => $errors
        ]);
    }

    public function updateUser()
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
            $this->showUser($validator->getErrors());
        } else {
            $this->userService->updateUser($_POST, $_GET['id']);
            $this->redirect($_SERVER['REQUEST_URI']);
        }

    }

}