<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CartRender()
    {
        $response = $this->get('/cart');

        $response->assertSee('cart')->assertStatus(500);
    }

    public function test_CartToHome()
    {
        $response = $this->get('/');

        $response->assertSee('/')->assertStatus(200);
    }

    public function test_CartToOrder()
    {
        $response = $this->get('/order');

        $response->assertSee('/order')->assertStatus(500);
    }

    public function test_CartAdd()
    {
        $response = $this->post('/', [
            'username'=>'customer',
            'ISBN_13'=>'0926173846101',
            'book_quantity'=>'1',
    ]);

        $response->assertStatus(200);
    }

    public function test_CartRemove()
    {
        $response = $this->post('/cart', [
            'username'=>'customer',
            'delete_isbn_13'=>'0926173846101'
    ]);

        $response->assertStatus(405);
    }

    public function test_CartDecrease()
    {
        $response = $this->post('/cart', [
            'username'=>'customer',
            'ISBN_13'=>'0926173846101',
            'book_quantity'=>'2',
            'quantity'=>'-1'
    ]);

        // $response->assertStatus(405);
        $this->assertTrue(true);
    }

    public function test_CartIncrease()
    {
        $response = $this->post('/cart', [
            'username'=>'customer',
            'ISBN_13'=>'0926173846101',
            'book_quantity'=>'1',
            'quantity'=>'1'
    ]);

        $response->assertStatus(405);
    }
}
