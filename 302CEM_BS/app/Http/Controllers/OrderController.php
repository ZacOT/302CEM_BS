<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function printOrder(){
        $users = DB::table('orders')->get();
        return view('welcome',compact('orders'));
    }
  
    public function insert(Request $request){

        $username = $request->input('username');
        $username = $request->input('address');
        $ISBN_13 = $request->input('ISBN_13');
        $book_quantity = $request->input('book_quantity');
        $subtotal = $request->input('subtotal');

        $data=array(
            "username"=>$username,
            "address"=>$address,
            "ISBN_13"=>$ISBN_13,
            "book_quantity"=>$book_quantity,
            "subtotal"=>$subtotal);

        DB::table('orders')->insert($data);
            
        echo "Placed order successfully.<br/>";
        echo '<a href = "/">Click Here</a> to go back.';

    }

    // remove function
    // remove all from user function
}class OrderController extends Controller
{
    //
}
