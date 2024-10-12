<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return response()->json($this->bookService->getAllBooks());
    }


    public function store(StoreBookRequest $request)
    {
        $book = $this->bookService->createBook($request->validated());
        return response()->json($book, 201);
    }

    public function show(string $id)
    {
        return response()->json($this->bookService->getBookById($id));
    }

    public function update(StoreBookRequest $request, string $id)
    {
        $book = $this->bookService->updateBook($id, $request->validated());
        return response()->json($book);
    }

    public function destroy(string $id)
    {
        $this->bookService->deleteBook($id);
        return response()->json(['message' => 'Book deleted successfully.']);
    }
}
