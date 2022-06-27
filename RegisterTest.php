<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_RegisterRender()
    {
        $response = $this->get('/register');

        $response->assertSee('register')->assertStatus(200);
    }

    public function test_RegisterToLogin()
    {
        $response = $this->get('/login');
        
        $response->assertSee('login')->assertStatus(200);
    }

    public function test_RegisterForm()
    {
        $response = $this->post('/register', [
            'username'=>'customer',
            'password'=>'customer',
            'role'=>'1',
            'name'=>'Store Customer',
            'email'=>'customer@bookstore.com',
            'address'=>'INTI College 11900'
    ]);

    $response->assertStatus(405);
    }
}
