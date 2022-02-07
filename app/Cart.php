<?php

namespace App;

class Cart
{

    public $items = [];
    public $totalPrice = 0;
    public $itemsQty = 0;

    public function __construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalPrice = $cart->totalPrice;
            $this->itemsQty = $cart->itemsQty;
        } else {
            $this->items = [];
            $this->totalPrice = 0;
            $this->itemsQty = 0;
        }
    }
    public function add($product)
    {
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 0,
            'image' => $product->image_url,
        ];
        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->itemsQty += 1;
            $this->totalPrice += $product->price;
        } else {
            // $this->itemsQty +=1;
            $this->totalPrice += $product->price;
        }
        $this->items[$product->id]['qty'] += 1;
    }
    public function updateQty($id, $qty)
    {
        $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
        $this->items[$id]['qty'] = $qty;
        $this->totalPrice += $this->items[$id]['qty'] * $this->items[$id]['price'];
    }
    public function destroy($id){
        $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
        $this->itemsQty--;
        unset($this->items[$id]);
    }
}
