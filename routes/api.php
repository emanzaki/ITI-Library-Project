<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BorrowController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


//books
Route::get('/books',[BookController::class,"index"] );
Route::get('/books/{id}',[BookController::class,"show"] );
Route::post('/books',[BookController::class,"store"] );
Route::put('/books/{id}',[BookController::class,"update"] );
Route::delete('/books/{id}',[BookController::class,"destroy"] );
//users
Route::get('/users', [UserController::class,"index"]);
Route::get('/users/{id}', [UserController::class,"show"]);
Route::post('/users', [UserController::class,"store"]);
Route::put('/users/{id}', [UserController::class,"update"]);
Route::delete('/users/{id}', [UserController::class,"destroy"]);
//borrow
Route::get('/borrows', [BorrowController::class,"index"]);
Route::get('/borrows/{id}', [BorrowController::class,"show"]);
Route::post('/borrows', [BorrowController::class,"store"]);
Route::put('/borrows/{id}', [BorrowController::class,"update"]);
Route::delete('/borrows/{id}', [BorrowController::class,"destroy"]);