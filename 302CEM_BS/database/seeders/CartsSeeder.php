<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< Updated upstream
        /*Carts Seeder Template
        DB::table('carts')->insert([
            'username'=>'',
            'ISBN_13'=>'',
            'book_quantity'=>'',
            'subtotal'=>'',
        ]);*/
=======
        // Carts Seeder Template
        DB::table('carts')->insert([
            'username'=>'admin',
            'ISBN_13'=>'BS1001',
            'book_quantity'=>'2',
            'subtotal'=>'10',
        ]);
>>>>>>> Stashed changes
    }
}
