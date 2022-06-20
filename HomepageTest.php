<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_home_page_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertSee('/')->assertStatus(200);
    }
    
    public function test_register_page_can_be_rendered()
    {
        $response = $this->get('/register');
        $response->assertSee('register')->assertStatus(200);
    }
    
    public function test_login_page_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertSee('login')->assertStatus(200);
    }

    
}
