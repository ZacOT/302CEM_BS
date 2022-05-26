<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function printCart(){
        $users = DB::table('carts')->get();
        return view('welcome',compact('carts'));
    }
  
    public function insert(Request $request){

        $username = $request->input('username');
        $ISBN_13 = $request->input('ISBN_13');
        $book_quantity = $request->input('book_quantity');
        $subtotal = $request->input('subtotal');

        $data=array(
            "username"=>$username,
            "ISBN_13"=>$ISBN_13,
            "book_quantity"=>$book_quantity,
            "subtotal"=>$subtotal);

        DB::table('carts')->insert($data);
            
        echo "Added to cart successfully.<br/>";
        echo '<a href = "/">Click Here</a> to go back.';

    }
}
