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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/order', function () {
    return view('order');
});

// Route for Login & Logout

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LogoutController::class, 'logout']);

// Route for User Database

Route::post('insertUser','App\Http\Controllers\UserController@insert')->name('insertUser');
Route::post('/','App\Http\Controllers\UserController@printUser');

Route::get('/', function () {
    $books = DB::table('users')->select('username','password', 'role', 'name', 'email', 'address')->get();
    return view('welcome', compact('users'));
});

// Route for Cart Database

Route::post('insertCart','App\Http\Controllers\CartController@insertCart')->name('insertCart');
Route::post('updateCart','App\Http\Controllers\CartController@updateCart')->name('updateCart');
Route::get('deleteCart','App\Http\Controllers\CartController@deleteCart')->name('deleteCart');
Route::post('/','App\Http\Controllers\CartController@printCart');

Route::get('/cart', function () {
    $carts = DB::table('carts')->select('username','ISBN_13','book_quantity')->get();
    return view('cart', compact('carts'));
});

// Route for Order Database

Route::post('insertOrder','App\Http\Controllers\OrderController@insert')->name('insertOrder');
Route::post('/','App\Http\Controllers\OrderController@printOrder');

Route::get('/order', function () {
    $orders = DB::table('orders')->select('username','address','ISBN_13','book_quantity','retail_price')->get();
    return view('order', compact('orders'));
});

// Route for AddBook

Route::post('insertBook','App\Http\Controllers\BookController@insert')->name('insertBook');
Route::post('/','App\Http\Controllers\BookController@printBook');

Route::get('/', function () {
    $books = DB::table('books')->select('book_title','retail_price','book_cover_img', 'ISBN_13')->get();
    return view('welcome', compact('books'));
});
