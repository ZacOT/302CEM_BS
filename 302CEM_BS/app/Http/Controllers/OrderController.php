<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function printOrder(){
        $users = DB::table('orders')->get();
        return view('welcome',compact('orders'));
    }
  
    public function viewOrder(Request $request){
        $orders = DB::table('orders')->where('order_id', $request->input('orderid'))->get();
        $orderitems = DB::table('orderitem')->get();
        $books = DB::table('books')->get();
        return view('viewOrder', compact('orders', 'orderitems', 'books'));
    }

    public function insertOrder(Request $request){

        $username = $request->input('username');
        $address = "Filler Address";
        
        //Create Order First

        $orderdata=array(
            "username" => $username,
            "address" => $address,
            "subtotal" => 0,
            "status" => 0,
        );
        DB::table('orders')->insert($orderdata);

        $grandTotal = 0;
        $carts = DB::table('carts')->where('username', $username)->get();
        $orderid =  DB::table('orders')->where('username', $username)->latest('order_id')->first();

        foreach ($carts as $cart){

            $data=array(
                "order_id"=>intval($orderid->order_id),
                "ISBN_13"=>$cart->ISBN_13,
                "orderitem_quantity"=>$cart->book_quantity,
            );

            DB::table('orderitem')->insert($data);

            $oldQuantity = DB::table('carts')->where('ISBN_13',[$cart->ISBN_13])->pluck('book_quantity')->first();
            $newQuantity = $oldQuantity - ($cart->book_quantity);

            DB::table('books')->where('ISBN_13',$cart->ISBN_13)->update(['book_stock'=>$newQuantity]);
            DB::table('carts')->where('username',[$username])->delete(); 

            Session::put('totalPrice', 0);
            Session::put('totalQuantity', 0);

            $books = DB::table('books')->where('ISBN_13', $cart->ISBN_13)->get()->first();
            $subTotal = $cart->book_quantity * $books->retail_price;
            $grandTotal += $subTotal; 
            DB::table('orders')->where('order_id', $orderid->order_id)->update(['subtotal'=>$grandTotal]);


        }    
        return redirect('/')->with('alert', "Order placed successfully");


    }

    // remove function
    // remove all from user function
}
