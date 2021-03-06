<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductDetails extends Component
{
    use LivewireAlert;
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('customer.cart-count', 'refreshComponent');
        $this->alert('success', 'Item Added to Cart!', [
            'toast' => false,
            'position' => 'center'
        ]);
    }

    public function AddToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('customer.wishlist-count', 'refreshComponent');
        $this->alert('success', 'Item Added to Wishlist!', [
            'toast' => false,
            'position' => 'center'
        ]);
    }

    public function removeFromWishlist($product_id){
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('customer.wishlist-count', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {

        $product = Product::where('slug', $this->slug)->first();


        return view('livewire.customer.product-details', ['product'=>$product])->layout('layouts.customer');
    }
}
