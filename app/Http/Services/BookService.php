<?php

namespace App\Http\Services;

use App\Models\Book;

class BookService
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function createBook(array $data)
    {
        return Book::create($data);
    }

    public function getBookById(string $id)
    {
        return Book::findOrFail($id);
    }

    public function updateBook(string $id, array $data)
    {
        $book = $this->getBookById($id);
        $book->update($data);
        return $book;
    }

    public function deleteBook(string $id)
    {
        $book = $this->getBookById($id);
        $book->delete();
        return $book;
    }
}
