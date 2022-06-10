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
        
        $result = DB::select('select * from carts where username = ? AND ISBN_13 = ?', [$username, $ISBN_13]);

        if ($result == NULL) {
            // Create new if ISBN_13 not exist

            $data=array(
                "username"=>$username,
                "ISBN_13"=>$ISBN_13,
                "book_quantity"=>$book_quantity);
    
            DB::table('carts')->insert($data);
            echo "Added to cart successfully.<br/>";

        } else if($result) {
            //$result_1 = DB::select('select book_quantity from carts where username = ? AND ISBN_13 = ?', [$username, $ISBN_13])->value('book_quantity');

            $bookQty = DB::table('carts')->where('username',$username)->where('ISBN_13',$ISBN_13)->pluck('book_quantity')->first();

            $newQuantity = ($bookQty) + 1;

            $data=array(
                "book_quantity"=>$newQuantity);

            DB::table('carts')->where('ISBN_13', $ISBN_13)->update($data);
            echo "Added to cart successfully. 2<br/>";
        }

        
        echo '<a href = "/">Click Here</a> to go back.';

    }

    // remove function
    // remove all from user function
}
