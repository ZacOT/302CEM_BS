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
        $book_author = $request->input('book_author');
        $publication_date = $request->input('publication_date');
        $isbn_13 = $request->input('ISBN_13');
        $book_description = $request->input('book_description');
        $book_cover_img = $request->input('book_cover_img');
        $trade_price = $request->input('trade_price');
        $retail_price = $request->input('retail_price');
        $book_stock = $request->input('book_stock');

        $imageName = $request->book_cover_img->getClientOriginalName();
         
        $request->book_cover_img->move(public_path('images'), $imageName);

        $data=array(
            "book_title"=>$book_title,
            "book_author"=>$book_author,
            "publication_date"=>$publication_date,
            "ISBN_13"=>$isbn_13,
            "book_description"=>$book_description, 
            "trade_price"=>$trade_price,
            "retail_price"=>$retail_price,
            "book_stock"=>$book_stock,
            "book_cover_img"=>$imageName);

        DB::table('books')->insert($data);
            
        return redirect('/')->with('alert', 'Book added and updated successfully!');

            }
}

