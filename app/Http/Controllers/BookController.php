<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
     public function index()
    {
        $books = Book::all();
        return view('admin.books.index', ["books" => $books]);
    }
    public function create()
    {
        return view('admin.books.create');
    }
    public function store(StoreBookRequest $request)
    {   
        $img=$request->file('img')->getClientOriginalName();
        //dd($request);
        if ($request->hasFile('img')) {
            $request->file('img')->move(public_path('images'),$img);
        }
        Book::create(
            [
                'name'=>$request->name,
                'descr'=>$request->descr,
                'author'=>$request->author,
                'img'=>$img
            ]
            );
        return redirect('/books');
    }
    public function show($id)
    {
        $book = Book::find($id);
        $borrowed=Borrow::where('book_id',$book->id)
                        ->latest()
                        ->first();
        return !$book ? abort(404) : view('admin.books.show', ["book" => $book,"borrowed"=>$borrowed]);
    }
    public function edit($id)
    {
        $book=Book::find($id);
        return !$book ? abort(404) : view('admin.books.edit', ["book"=>$book]);
    }
    public function update(UpdateBookRequest $request, $id)
    {
        $book= Book::find( $id);
        if(!$book) 
           abort(404);
        if ($request->hasFile('img')) {
            unlink(public_path('images/' . $book->img));
            $img=$request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('images'),$img);
            $book->img = $img;
            
        }
        $book-> name = $request['name'];
        $book-> descr = $request['descr'];
        $book-> author = $request['author'];
        $book->save();
        return redirect('/books');

    }
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('/books');
    }
}
