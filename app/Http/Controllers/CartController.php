<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{


    public function __construct()
    {
        if(!session()->has('cart')) {
            session()->put('cart', app(Cart::class));
        }
    }

    public function add(Request $request): Response
    {
        /** @var Cart $cart */
        $cart = session()->get('cart');
        $cart->addItem(
            $request->get('code'),
            $request->get('name'),
            $request->get('quantity'),
            $request->get('price')
        );

        return \response('');
    }
}
