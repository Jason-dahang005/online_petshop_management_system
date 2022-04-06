<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Cart;
use Auth;

class ShoppingCart extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('customer.cart-count', 'refreshComponent');
    }

    public function decreaseQuantity($rowId){   
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('customer.cart-count', 'refreshComponent');
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('addToCart', 'Item Successfully Removed From Cart');
        $this->emitTo('customer.cart-count', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.customer.shopping-cart')->layout('layouts.customer');
    }
}
