<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Cart;

class Wishlist extends Component
{
    public function removeFromWishlist($product_id){
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('customer.wishlist-count', 'refreshComponent');
                return;
            }
        }
    }

    public function moveFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Modela\Product');
        $this->emitTo('customer.wishlist-count', 'refreshComponent');
        $this->emitTo('customer.cart-count', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.customer.wishlist')->layout('layouts.customer');
    }
}
