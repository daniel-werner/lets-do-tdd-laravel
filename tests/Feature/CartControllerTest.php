<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class CartControllerTest extends TestCase
{

    public function testAddItemToCart()
    {
        $data = [
            'code' => 'P111',
            'name' => 'Pizza',
            'quantity' => 2,
            'price' => 110000
        ];

        $response = $this->post('/cart/add', $data);
        $response->assertStatus(200);

        $this->assertTrue(Session::has('cart'));

        /** @var Cart $cart */
        $cart = Session::get('cart');

        $this->assertEquals([$data], $cart->getItems());
    }
}
