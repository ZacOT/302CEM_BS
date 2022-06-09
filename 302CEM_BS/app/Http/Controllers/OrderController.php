<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getCart(){
        $carts = DB::table('carts')->where('username', Auth::user()->username)->get();
        return view('orderpage',compact('carts'));
    }
    public function createOrderItem(){
        $username = $request->input('username');
        $ISBN_13 = $request->input('ISBN_13');
        $book_quantity = $request->input('book_quantity');
        $subtotal = $request->input('subtotal');
    }

}
