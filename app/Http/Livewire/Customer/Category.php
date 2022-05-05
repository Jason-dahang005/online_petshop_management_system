<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goldfish;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;
use Auth;


class Category extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug){
        $this->sorting = 'default';
        $this->category_slug = $category_slug;
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
            
        $category = ProductCategory::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if ($this->sorting == 'date') { 
            $products = Product::where('product_category_id', $category_id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        }elseif ($this->sorting == 'price') {
            $products = Product::where('product_category_id', $category_id)->where('status', 1)->orderBy('price', 'asc')->paginate(12);
        }else{
            $products = Product::where('product_category_id', $category_id)->where('status', 1)->paginate(12);
        }
        
        $product_category = ProductCategory::all();

        return view('livewire.customer.category', ['goldfish'=>$goldfish, 'products'=>$products, 'product_category'=>$product_category, 'category_name'=>$category_name])->layout('layouts.customer');
    }
}
