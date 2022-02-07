<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Item $product)
    {

        if (Session::has('cart')) {
            $cart = new Cart(Session::get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);

        Session::put('cart', $cart);
        // Session::flush();
        // dd(session()->get('cart'));
        notify()->success('Product added to cart!');
        return redirect()->back();

    }

    public function showCart(){

        if(Session::has('cart'))
        if(Session::get('cart')->itemsQty > 0)
        $cart = new Cart(Session::get('cart'));
        else
        $cart = null;
        return view('cart', [
            'cart' => $cart,
        ]);
    }
}
