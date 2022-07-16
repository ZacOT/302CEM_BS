<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Auth;
use Tests\TestCase;

    class OrderHistoryTest extends TestCase{
        /**
        * A basic unit test example.
        *
        * @return void
        */

        public function test_orderhistory_render(){

            $user = User::find(1);
            Auth::login($user);

            $response = $this->actingAs($user);
            $response = $this->get('/orderhistory');
            $response->assertSee('Order History')->assertStatus(200);

        }
}
?>
