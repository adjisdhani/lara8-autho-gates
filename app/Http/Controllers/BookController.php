<?php

// app/Http/Controllers/BookController.php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    public function index()
    {
        if (Gate::allows('view-book')) {
            $books = Book::all();
            return response()->json($books);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage-book')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        if (Gate::denies('manage-book')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function destroy($id)
    {
        if (Gate::denies('manage-book')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}