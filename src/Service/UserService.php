<?php

namespace Src\Service;

use App\Database;
use Src\Book;
use Src\User;

class UserService
{
    private Database $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }
    public function findUser($condition): User
    {
        $userData = $this->database->leftJoin(

            'users',
            'books',
            ['id', 'name', 'age'],
            ['title', 'author', 'year', 'user_id'],
            'id',
            'user_id',
            $condition
        );



        if ($userData[0]['user_id']){
            $books = array_map(function ($bookData) {
                return new Book(
                    $bookData['id'], // Убедитесь, что 'id' здесь соответствует названию столбца в вашей базе данных
                    $bookData['title'],
                    $bookData['author'],
                    $bookData['year'],
                    $bookData['user_id']

                // Другие свойства книги
                );
            }, $userData);
        } else {
            $books = null;
        }
        return new User(
            $userData[0] ['id'],
            $userData[0] ['name'],
            $userData[0] ['age'],
            $books
        );

    }

    public function findAllUsers()
    {
        $users = $this->database->leftJoin('users', 'books', ['id', 'name', 'age'], ['title'], 'id', 'user_id', [], []);
        $usersList = [];
        $booksByUser = [];
        foreach ($users as $user) {
            $userId = $user['id'];
            //я не понимаю, что делает эта часть
            if (!isset($booksByUser[$userId])) {
                $booksByUser[$userId] = [];
            }

            $booksByUser[$userId][] = $user['title'];
        }


        foreach ($booksByUser as $userId => $books) {
            //я не понимаю, что делает эта часть
            $userDetails = $users[array_search($userId, array_column($users, 'id'))];

            $usersList[] = new User($userDetails['id'], $userDetails['name'], $userDetails['age'], $books);

        }
        return $usersList;
    }
    public function insertUser($data)
    {
        return $this->database->insert('users', $data);
    }
    public function updateUser(array $data, $id)
    {

        $userdata = $data;
        $currentBooks = $this->database->findall('books', 'user_id', $data['id']);
        var_dump($currentBooks);
        if (isset($userdata['listBooks'])) {

            $currentIds = array_column($currentBooks, 'id');
            $booksdata = $data['listBooks'];


            $changeIds = array_diff($currentIds, $booksdata);

            if (!empty($changeIds)) {
                $bookUserId['user_id'] = null;
                foreach ($changeIds as $changeId) {
                    $this->database->update('books', $bookUserId, $changeId);
                }
            }

            $bookUserId['user_id'] = $data['id'];
            foreach ($booksdata as $bookdata) {

                $this->database->update('books', $bookUserId, $bookdata);
            }
            unset($userdata['listBooks']);
        } elseif (!empty($currentBooks)) {
            $bookUserId['user_id'] = null;
            foreach ($currentBooks as $currentBook) {
                $this->database->update('books', $bookUserId, $currentBook['id']);
            }
        }


        return $this->database->update('users', $userdata, $id);
    }
    public function deleteUser(int $value)
    {
        return $this->database->delete('users', 'id', $value);
    }

    public function searchUser($value)
    {
        $usersdata = $this->database->like('users', 'name', $value);
        $users = [];
        foreach ($usersdata as $userdata) {
            $users[] = new User($userdata['id'], $userdata['name'], $userdata['age'], null);
        }
        return $users;
    }

}