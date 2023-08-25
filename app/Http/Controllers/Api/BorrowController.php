<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::all();
        return response()->json($borrows);
    }
    public function show($id)
    {
        $borrow = Borrow::find($id);
        return response()->json($borrow);
    }
    public function store(Request $request)
    {
        $borrow = Borrow::create($request->all());
        return response()->json($borrow);
    }
    public function update(Request $request, $id)
    {
        $borrow = Borrow::find($id);
        $borrow->update($request->all());
        return response()->json($borrow);
    }
    public function destroy($id)
    {
        $borrow = Borrow::find($id);
        $borrow->delete();
        return response()->json($borrow);
    }
}
