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

Route::get('/addBook', function () {
    return view('addBook');
});

Route::post('insert','App\Http\Controllers\BookController@insert')->name('insertUser');
Route::post('/','App\Http\Controllers\BookController@printBook');

Route::get('/', function () {
    $books = DB::table('books')->select('book_title','retail_price','book_cover_img')->get();
    return view('welcome', compact('books'));
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'validateLogin']);

Route::get('/logout', [LoginController::class, 'logout']);
