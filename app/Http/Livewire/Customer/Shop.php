<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goldfish;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Shop extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = 'default';
    }

    public function store($product_id, $product_name, $product_price){
        if (Auth::check()) {
            Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
            $this->emitTo('customer.cart-count', 'refreshComponent');
            $this->alert('success', 'Item Added to Cart!', [
                'toast' => false,
                'position' => 'center'
            ]);
        }else{
            return redirect()->route('login');
        }
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
            
        $product_category = ProductCategory::all();

        if ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'desc')->where('status', 1)->paginate(12);
        }elseif ($this->sorting == 'price') {
            $products = Product::orderBy('price', 'asc')->where('status', 1)->paginate(12);
        }else{
            $products = Product::where('status', 1)->paginate(12);
        }
        return view('livewire.customer.shop', ['products'=>$products, 'product_category'=>$product_category])->layout('layouts.customer');
    }
}
