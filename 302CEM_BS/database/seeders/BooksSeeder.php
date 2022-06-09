<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        'book_title'=>'13 Reason Why',
        'book_author'=>'Author 1',
        'publication_date'=>'2020-01-01',
        'ISBN_13'=>'BS1001',
        'book_description'=>'You is the reason why',
        'book_cover_img'=>'Book1.jpg',
        'trade_price'=>'2',
        'retail_price'=>'5',
        'book_stock'=>'10'
        ]);

        DB::table('books')->insert([
            'book_title'=>'Love Simon',
            'book_author'=>'Author 2',
            'publication_date'=>'2020-02-02',
            'ISBN_13'=>'BS1002',
            'book_description'=>'Gulp Gulp',
            'book_cover_img'=>'Love-Simon.jfif',
            'trade_price'=>'3',
            'retail_price'=>'6',
            'book_stock'=>'20'
            ]);
    }
}