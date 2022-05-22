<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addBook', function () {
    return view('addBook');
});

// Route for User Database
Route::post('insert','App\Http\Controllers\UserController@insert')->name('insertUser');
Route::post('/','App\Http\Controllers\UserController@printUser');

Route::get('/', function () {
    $books = DB::table('books')->select('book_title','book_price','book_cover_img')->get();
    return view('welcome', compact('books'));
});

Route::get('/', function () {
    $books = DB::table('users')->select('username','password','name', 'email', 'address')->get();
    return view('welcome', compact('users'));
});

Route::get('/', function () {
    $books = DB::table('carts')->select('username','ISBN_13','book_quantity', 'subtotal')->get();
    return view('welcome', compact('carts'));
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/cart', function () {
    return view('cart');
});