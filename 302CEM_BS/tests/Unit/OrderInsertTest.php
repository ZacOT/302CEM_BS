<?php

namespace Tests\Unit;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

    class OrderInsertTest extends TestCase{
        /**
        * A basic unit test example.
        *
        * @return void
        */

        public function test_order_insert(){
            
            //Create a test order
            $this->post('/createOrder', [
                "username" => 'test username',
                "name" => 'test name',
                "address" => 'test address',
                "grandtotal" => '1000',
            ]);
            //Check if entry exists
            $this->assertDatabaseHas('orders',[
                "username" => 'test username',
                "name" => 'test name',
                "address" => 'test address',
                "subtotal" => '1000',
            ]);
            //Delete the test entry
            $deleteLast = DB::table('orders')->orderBy('order_id', 'desc')->limit(1)->delete();
        }
}
?>
