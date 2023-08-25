<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::all();
        return view('admin.users.users',["users"=>$users]);
    }
    
    public function show($id)
    {
        $user=User::find($id);
        return view('admin.users.index',["user"=>$user]);
    }
    

}
