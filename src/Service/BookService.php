<?php

namespace Src\Service;

use App\Database;
use Src\Book;

class BookService
{
    private Database $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }
    public function findBook($column, $value): Book
    {
        $bookData = $this->database->find('books', $column, $value);
        return new Book(
            $bookData['id'],
            $bookData['title'],
            $bookData['author'],
            $bookData['year'],
            $bookData['user_id']
        );
    }

    public function findAllBooks($conditions)
    {
        $books = $this->database->leftJoin(
            'books',
            'users',
            ['id', 'title', 'author', 'year', 'user_id'],
            ['name', 'age'],
            'user_id',
            'id',
            $conditions
        );
        $booksList = [];
        foreach ($books as $book) {
            $booksList[] = new Book($book['id'], $book['title'], $book['author'], $book['year'], $book['name']);
        }
        return $booksList;
    }

    public function insertBook($value)
    {
        return $this->database->insert('books', $value);
    }
    public function updateBook($data, $id)
    {
        return $this->database->update('books', $data, $id);
    }
    public function deleteBook(int $value)
    {
        return $this->database->delete('books', 'id', $value);
    }

    public function searchBook($value)
    {
        $booksdata = $this->database->like('books', 'title', $value);
        $books = [];
        foreach ($booksdata as $bookdata) {
            $books[] = new Book($bookdata['id'], $bookdata['title'], $bookdata['author'], $bookdata['year'], $bookdata['user_id']);
        }
        return $books;
    }

}