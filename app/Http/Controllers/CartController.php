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
        } else {
            $cart = new Cart();
        }
        $cart->add($product);

        Session::put('cart', $cart);
        // Session::flush();
        // dd(session()->get('cart'));
        notify()->success('Product added to cart!');
        return redirect()->back();
    }

    public function showCart()
    {

        if (Session::has('cart')) {
            if (Session::get('cart')->itemsQty > 0) {
                $cart = new Cart(Session::get('cart'));
            }else{
                $cart = null;
            }
        } else {
            $cart = null;
        }
        return view('cart', [
            'cart' => $cart,
        ]);
    }

    public function updateCart(Request $request, Item $product)
    {

        $request->validate(
            ['qty' => ['required', 'numeric', 'min:1'],],
            ['qty.min' => "The Quantity must be greater than or equalt to 1."]
        );
        // dd($request->all(), $product);
        $cart = new Cart(Session::get('cart'));
        $cart->updateQty($product->id, $request->qty);
        Session::put('cart', $cart);
        notify()->success('Quantity updated successfully');
        return redirect()->back();
    }
    public function destroy(Item $product)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->destroy($product->id);
        if($cart->itemsQty > 0){
            Session::put('cart', $cart);

        }else{
            Session::forget('cart');
        }
        notify()->warning('The Product was deleted successfully');
        return redirect()->back();
    }
}
