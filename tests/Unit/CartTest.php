<?php

namespace Unit;

use PHPUnit\Framework\TestCase;
use App\Cart;

class CartTest extends TestCase
{
    public function testAddItemToCart()
    {
        $cart = new Cart();

        $cart->addItem('P111', 'Pizza', 1, 110000);

        $this->assertCount(1, $cart->getItems());
        $this->assertNotNull($cart);
    }

    public function testAddSameItemMutlipleTimesIncreasesQuantity()
    {
        $cart = new Cart();

        $cart->addItem('P111', 'Pizza', 1, 110000);
        $cart->addItem('P111', 'Pizza', 1, 110000);

        $expected = [
            [
                'code' => 'P111',
                'name' => 'Pizza',
                'quantity' => 2,
                'price' => 110000
            ]
        ];

        $this->assertEquals($expected, $cart->getItems());
    }

    public function testRemoveItemFromCart()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);

        $cart->removeItem('P111');

        $this->assertCount(0, $cart->getItems());
    }

    public function testRemoveItemDecreasesQuantityOrRemovesItem()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);
        $cart->addItem('B111', 'Beer', 2, 10000);

        $cart->removeItem('B111');

        $expected = [
            [
                'code' => 'P111',
                'name' => 'Pizza',
                'quantity' => 1,
                'price' => 110000
            ],
            [
                'code' => 'B111',
                'name' => 'Beer',
                'quantity' => 1,
                'price' => 10000
            ]
        ];

        $this->assertEquals($expected, $cart->getItems());
    }

    public function testGetCartTotal()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 1, 110000);
        $cart->addItem('B111', 'Beer', 2, 10000);

        $this->assertEquals(130000, $cart->getTotal());
    }

    public function testGetCartItemCount()
    {
        $cart = new Cart();
        $cart->addItem('P111', 'Pizza', 2, 110000);
        $cart->addItem('B111', 'Beer', 1, 10000);

        $this->assertEquals(3, $cart->getItemCount());
    }

    public  function testRemovingNotExistingCartItemThrowsException()
    {
        $this->expectException(\Exception::class);

        $cart = new Cart();
        $cart->removeItem('notExisting');
    }
}
