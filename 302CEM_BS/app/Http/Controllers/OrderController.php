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
  

    public function insertOrder(Request $request){

        $username = $request->input('username');
        
        //Create Order First

        $orderdata=array(
            "username" => $username,
            "subtotal" => 0,
        );
        DB::table('orders')->insert($orderdata);

        $grandTotal = 0;
        $carts = DB::table('carts')->where('username', $username)->get();
        $orderid =  DB::table('orders')->where('username', $username)->latest('order_id')->first();

        foreach ($carts as $cart){

            $data=array(
                "order_id"=>intval($orderid->order_id),
                "ISBN_13"=>$cart->ISBN_13,
                "orderitem_qty"=>$cart->book_quantity,
            );

            DB::table('orderitem')->insert($data);
            
            $books = DB::table('books')->where('ISBN_13', $cart->ISBN_13)->get()->first();
            $subTotal = $cart->book_quantity * $books->retail_price;
            $grandTotal += $subTotal; 
            DB::table('orders')->where('order_id', $orderid->order_id)->update(['subtotal'=>$grandTotal]);

        }    
        echo "Placed order successfully.<br/>";
        echo '<a href = "/">Click Here</a> to go back.';

    }

    // remove function
    // remove all from user function
}
