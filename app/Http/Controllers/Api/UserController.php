<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }   
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json($user);
    }
    
}
