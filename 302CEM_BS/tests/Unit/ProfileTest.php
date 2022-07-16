<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\UserController;
use App\Models\User;
use Auth;
use Tests\TestCase;

    class ProfileTest extends TestCase{
        /**
        * A basic unit test example.
        *
        * @return void
        */

        public function test_profilepage_render(){
            
            $user = User::find(2);
            Auth::login($user);

            $response = $this->get('/profile');
            $response->assertSee('profile')->assertStatus(200);

        }

        public function test_address_update(){
            
            $user = User::find(2);
            Auth::login($user);
            $oldaddress = Auth::user()->address;

            //Update user 2 customer, with test address
            $response = $this->post('/updateAddress', [
                "address" => 'test address 123' 
            ]);
            //Check if address matches
            $this->assertDatabaseHas($user, [
                "address" => 'test address 123' 
            ]);
            //Reset address to default
            $this->post('/updateAddress', [
                "address" => $oldaddress 
            ]);
        }
}
?>
