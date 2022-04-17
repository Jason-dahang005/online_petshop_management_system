<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goldfish;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;
use Auth;


class Shop extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = 'default';
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('customer.cart-count', 'refreshComponent');
        session()->flash('AddToCart', 'Item Added To Cart Succesfully!');
    }

    public function AddToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('customer.wishlist-count', 'refreshComponent');
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
        $goldfish = Goldfish::all();
            
        $product_category = ProductCategory::all();

        if ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'desc')->where('status', 1)->paginate(12);
        }elseif ($this->sorting == 'price') {
            $products = Product::orderBy('price', 'asc')->where('status', 1)->paginate(12);
        }else{
            $products = Product::where('status', 1)->paginate(12);
        }
        return view('livewire.customer.shop', ['goldfish'=>$goldfish, 'products'=>$products, 'product_category'=>$product_category])->layout('layouts.customer');
    }
}
