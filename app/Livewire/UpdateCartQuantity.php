<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartQuantity extends Component
{
    public $rowId;
    public $quantity;
    public $stock;

    public function mount($rowId, $quantity, $stock)
    {
        $this->rowId = $rowId;
        $this->quantity = $quantity;
        $this->stock = $stock;
    }

    // Increase quantity but ensure it does not exceed stock
    public function increaseQuantity()
    {
        if ($this->quantity < $this->stock) {
            $this->quantity++;
            $this->updateCartQuantity();
        }
    }

    // Decrease quantity but ensure it does not go below 1
    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updateCartQuantity();
        }
    }

    // Method to update the quantity in the cart
    public function updateCartQuantity()
    {
        // Ensure the quantity is within the stock range
        $this->quantity = max(1, min($this->quantity, $this->stock));

        // Update the cart with the new quantity
        Cart::update($this->rowId, $this->quantity);

        // Optionally, emit an event or show a success message
        $this->dispatch('cart_updated');


    }

    protected $listeners = ['qyt_updated' => '$refresh'];

    public function render()
    {
        return view('livewire.update-cart-quantity');
    }
}
