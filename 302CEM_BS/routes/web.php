<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route for Paging
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/addBook', function () {
    return view('addBook');
});

<<<<<<< Updated upstream
Route::post('insert','App\Http\Controllers\BookController@insert')->name('insertUser');
Route::post('/','App\Http\Controllers\BookController@printBook');
=======
>>>>>>> Stashed changes

// Route for Login & Logout

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LogoutController::class, 'logout']);

// Route for Register

Route::post('insertUser','App\Http\Controllers\UserController@insert')->name('insertUser');
Route::post('/','App\Http\Controllers\UserController@printUser');

Route::get('/', function () {
    $books = DB::table('users')->select('username','password','name', 'email', 'address')->get();
    return view('welcome', compact('users'));
});

// Route for Cart Database

Route::post('insertCart','App\Http\Controllers\CartController@insert')->name('insertCart');
Route::post('/','App\Http\Controllers\CartController@printCart');

Route::get('/', function () {
    $carts = DB::table('carts')->select('username','ISBN_13','book_quantity', 'subtotal')->get();
    return view('welcome', compact('carts'));
});

// Route for AddBook

Route::post('insertBook','App\Http\Controllers\BookController@insert')->name('insertBook');
Route::post('/','App\Http\Controllers\BookController@printBook');

Route::get('/', function () {
    $books = DB::table('books')->select('book_title','retail_price','book_cover_img')->get();
    return view('welcome', compact('books'));
});

<<<<<<< Updated upstream
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LoginController::class, 'logout']);
=======
>>>>>>> Stashed changes
