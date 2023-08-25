<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Redirect user to home or admin to dashboard
Route::get('/', [HomeController::class, "index"]);
Route::get('/home', [HomeController::class, "index"]);
Route::middleware('admin')->get('/dashboard', [HomeController::class, "index"]);
//-------------------------------------------------
//borrowed books to borrow, view or return
Route::post('/borrow',[HomeController::class,"borrow"]);
Route::get('/borrow', [HomeController::class, "borrowed"]);
Route::delete('/borrow/{id}/return', [HomeController::class, "return"]);
//---------------------------------------------------
//user ,admin profile edit
Route::get('/profile/{id}', [HomeController::class, "view"]);
Route::get('/profile/{id}/edit', [HomeController::class, "edit"]);
Route::put('/profile/{id}', [HomeController::class, "update"]);
//----------------------------------------
//filters
Route::get('/filter/books',[HomeController::class,"borrowed"]);
Route::get('/book/{id}', [HomeController::class, "Book"]);

Route::resource('books', BookController::class)->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');
Auth::routes();
// // Route::middleware('admin')->get('/books/create', [BookController::class, "create"]);
// // Route::middleware('admin')->post('/books', [BookController::class, "store"]);
// // Route::middleware('admin')->put('/books/{id}', [BookController::class, "update"]);
// // Route::middleware('admin')->delete('/books/{id}', [BookController::class, "destroy"])->where('id','[0-9]+');
// // Route::middleware('admin')->get('/books/{id}/edit', [BookController::class, "edit"])->where('id', '[0-9]+');
