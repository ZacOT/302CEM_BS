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
        'book_title'=>'The King Of Drugs',
        'book_author'=>'Nora Barrett',
        'publication_date'=>'2020-06-24',
        'ISBN_13'=>'9781566199090',
        'book_description'=>'With the starting position swiftly drawn, the stor...',
        'book_cover_img'=>'book1.jpeg',
        'trade_price'=>'16',
        'retail_price'=>'30',
        'book_stock'=>'20'
        ]);

        DB::table('books')->insert([
            'book_title'=>'The Gravity Of Us',
            'book_author'=>'Phil Stamper',
            'publication_date'=>'2022-01-03',
            'ISBN_13'=>'9781566199091',
            'book_description'=>'All Aboard Guinness World Records 2021 For A Life-...',
            'book_cover_img'=>'book2.webp',
            'trade_price'=>'12',
            'retail_price'=>'18',
            'book_stock'=>'20'
            ]);

        DB::table('books')->insert([
            'book_title'=>'September Love',
            'book_author'=>'Lang Leav',
            'publication_date'=>'2021-05-30',
            'ISBN_13'=>'9781566199092',
            'book_description'=>'This is the midnight monologues that require your focus and meditation',
            'book_cover_img'=>'book3.jpeg',
            'trade_price'=>'19',
            'retail_price'=>'25',
            'book_stock'=>'20'
            ]);

        DB::table('books')->insert([
            'book_title'=>'Milk and Honey',
            'book_author'=>'Rupi Kaur',
            'publication_date'=>'2021-10-03',
            'ISBN_13'=>'9781566199093',
            'book_description'=>'Milk and Honey is a collection of poetry and prose about survival. About the experience of violence, abuse, love, loss, and femininity.',
            'book_cover_img'=>'book4.webp',
            'trade_price'=>'18 ',
            'retail_price'=>'26',
            'book_stock'=>'20'
            ]);        

        DB::table('books')->insert([
            'book_title'=>'Love Her Wild: Poems',
            'book_author'=>'Atticus',
            'publication_date'=>'2019-01-03',
            'ISBN_13'=>'9781566199094',
            'book_description'=>'Love Her Wild is a collection of new and beloved poems from Atticus',
            'book_cover_img'=>'book5.webp',
            'trade_price'=>'30',
            'retail_price'=>'35',
            'book_stock'=>'20'
            ]);

            DB::table('books')->insert([
            'book_title'=>'Explorations of a Cosmic Soul',
            'book_author'=>'Allie Michelle',
            'publication_date'=>'2020-02-20',
            'ISBN_13'=>'9781566199095',
            'book_description'=>'A revised and expanded edition of the bestselling Explorations of a Cosmic Soul.',
            'book_cover_img'=>'book6.webp',
            'trade_price'=>'30',
            'retail_price'=>'35',
            'book_stock'=>'20'
            ]);

        DB::table('books')->insert([
            'book_title'=>'Pillow Thoughts #1',
            'book_author'=>'Courtney Peppernell',
            'publication_date'=>'2022-01-19',
            'ISBN_13'=>'9781566199096',
            'book_description'=>'Make a cup of tea and let yourself feel.',
            'book_cover_img'=>'book7.webp',
            'trade_price'=>'56',
            'retail_price'=>'67',
            'book_stock'=>'20'
            ]);

        /* DB::table('books')->insert([
            'book_title'=>'',
            'book_author'=>'',
            'publication_date'=>'',
            'ISBN_13'=>'',
            'book_description'=>'',
            'book_cover_img'=>'',
            'trade_price'=>'',
            'retail_price'=>'',
            'book_stock'=>''
            ]);       */
    }
}
