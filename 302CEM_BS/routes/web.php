<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
<<<<<<< Updated upstream
use App\Http\Controllers\Auth\LogoutController;

=======
use App\Http\Controllers\OrderController;
>>>>>>> Stashed changes
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

Route::get('/addBook', function () {
    return view('addBook');
});

Route::post('insertBook','App\Http\Controllers\BookController@insert')->name('insertBook');
Route::post('/','App\Http\Controllers\BookController@printBook');

Route::get('/', function () {
    return view('welcome');
});

// Route for User Database
Route::post('insertUser','App\Http\Controllers\UserController@insert')->name('insertUser');
Route::post('/','App\Http\Controllers\UserController@printUser');

Route::get('/', function () {
    $books = DB::table('books')->select('book_title','book_price','book_cover_img')->get();
    return view('welcome', compact('books'));
});

Route::get('/', function () {
    $books = DB::table('users')->select('username','password','name', 'email', 'address')->get();
    return view('welcome', compact('users'));
});

<<<<<<< Updated upstream
Route::get('/', function () {
    $books = DB::table('carts')->select('username','ISBN_13','book_quantity', 'subtotal')->get();
    return view('welcome', compact('carts'));
=======
// Route for Order Database

Route::get('/order', function () {
    $carts = DB::table('carts')->where('username', Auth::user()->username)->get();
    $books = DB::table('books')->get();
    return view('order', compact('books', 'carts'));
>>>>>>> Stashed changes
});
Route::post('/createOrder', [OrderController::class, 'insertOrder'])->name('createOrder');

Route::get('/register', function () {
    return view('register');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/', function () {
    $books = DB::table('books')->select('book_title','retail_price','book_cover_img')->get();
    return view('welcome', compact('books'));
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LogoutController::class, 'logout']);
