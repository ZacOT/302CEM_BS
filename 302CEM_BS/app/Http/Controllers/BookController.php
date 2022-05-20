<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function printBook(){
        $books = DB::table('books')->get();
        return view('welcome',compact('books'));
    }

    public function printOne(){
        DB::table('books')->get(); 
        return view('welcome');
    }
  
    public function insert(Request $request){
        $book_title = $request->input('book_title');
        $book_description = $request->input('book_description');
        $book_price = $request->input('book_price');
        $book_stock = $request->input('book_stock');
        $book_cover_img = $request->input('book_cover_img');

        $imageName = $request->book_cover_img->getClientOriginalName();
         
        $request->book_cover_img->move(public_path('images'), $imageName);

        $data=array(
            "book_title"=>$book_title,
            "book_description"=>$book_description, 
            "book_price"=>$book_price,
            "book_stock"=>$book_stock,
            "book_cover_img"=>$imageName);

        DB::table('books')->insert($data);
            
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/">Click Here</a> to go back.';

            }
}

