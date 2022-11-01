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
        $response->assertRedirect('/cart');

        $this->assertTrue(Session::has('cart'));

        /** @var Cart $cart */
        $cart = Session::get('cart');

        $this->assertEquals([$data], $cart->getItems());
    }

    public function testCartContent()
    {
        /** @var Cart $cart */
        $cart = app(Cart::class);
        Session::put('cart', $cart);

        $cart->addItem('P111', 'Pizza', 1, 110000);

        $response = $this->get('/cart');
        $response->assertOk()
                 ->assertSee('P111');
    }
}
