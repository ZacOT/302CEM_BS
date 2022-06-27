<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_OrderRender()
    {
        $response = $this->get('/order');

        $response->assertSee('order')->assertStatus(500);
    }

    public function test_OrderToCart()
    {
        $response = $this->get('/cart');

        $response->assertSee('/cart')->assertStatus(500);
    }

    /* public function test_CartToConfirmOrder()
    {
        $response = $this->get('/confirmorder');
        $response->assertSee('/confirmorder')->assertStatus(500);
    } */
}
