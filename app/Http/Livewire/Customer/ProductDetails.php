<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;
use Cart;

class ProductDetails extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('AddToCart', 'Item Added To Cart Succesfully!');
        return back();
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        return view('livewire.customer.product-details', ['product'=>$product])->layout('layouts.customer');
    }
}
