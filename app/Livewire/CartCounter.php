<?php

namespace App\Livewire;


use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_counter_updated' => 'render'];


    public function render()
    {

        $cart_counter = Cart::content()->count();
        return view('livewire.cart-counter', compact('cart_counter'));
    }
}
