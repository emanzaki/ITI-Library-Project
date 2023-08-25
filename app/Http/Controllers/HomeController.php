<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function borrowed()
    {
        $borrowed = Borrow::all();
        if(Auth::user()->role)
            return view('admin.borrowed.borrowed', ["borrowed" => $borrowed]);
        return view('user.books.borrow', ["borrows" => $borrowed]);

    }
    public function borrow(Request $request){
        $book=Book::find($request->book_id);
        $book->is_avilable = false;
        $book->save();
        Borrow::create(
            [
                'user_id'=>$request->user_id,
                'book_id'=>$request->book_id,
                'borrow_date'=>Carbon::now(),
                'return_date'=> Carbon::now()->addDays(3)
            ]
        );
        return redirect('/home');
    }
    
    public function return($id){
        $book = Book::find($id);
        $book->is_avilable = true;
        $book->save();
        Borrow::where('book_id',$id)->delete();
        return redirect('/profile/'.Auth::user()->id);

    }
    
    public function Book($id){
        
        $book = Book::find($id);
        return !$book ? abort(404) : view('user.books.book', ["book" => $book]);
    }
    public function view($id)
    {
        $user = User::find($id);
        if(Auth::user()->role)
            return view('admin.profile', ["user" => $user]);
        $borrowed = Borrow::where('user_id', $id)->get();

        return view('user.profile.profile', ["user" => $user, "borrowed" => $borrowed]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.profile.edit', ["user" => $user]);

    }
    public function update(Request $request, $id)
    {
        $user = user::find($id);
        if ($request->hasFile('user_img')) {
            $img = $request->file('user_img')->getClientOriginalName();
            $request->file('user_img')->move(public_path('images/users'), $img);
            $user->user_img = $img;
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return redirect('/profile/' . $id);
    }
}
