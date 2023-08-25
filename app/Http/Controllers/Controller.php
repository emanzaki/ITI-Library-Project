<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{   
    use AuthorizesRequests, ValidatesRequests;
    public function index(){
    //return user to home or admin to dashboard
        if(Auth::user()->role){
            $borrows=Borrow::all();   
            return view('admin.borrowed.index',["borrows"=>$borrows]);
        }
        $books = Book::all();
        return view('user.books.books', ["books" => $books]);

    }
}
