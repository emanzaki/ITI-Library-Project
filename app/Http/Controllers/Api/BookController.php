<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
    public function show($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book);
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return response()->json($book);
    }
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json($book);
    }
    
}
