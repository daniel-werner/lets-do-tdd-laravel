<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request)
    {
        /** @var Cart $cart */
        $cart = session()->get('cart');
        $cart->addItem(
            $request->get('code'),
            $request->get('name'),
            $request->get('quantity'),
            $request->get('price')
        );

        return redirect('/cart');
    }

    public function index(Request $request)
    {
        /** @var Cart $cart */
        $cart = session()->get('cart');

        return view('cart.index',[
            'cart' => $cart
        ]);
    }

    public function add()
    {
        return view('cart.add');
    }
}
