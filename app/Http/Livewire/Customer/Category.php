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

    public function render()
    {
        $goldfish = Goldfish::all();
            
        $category = ProductCategory::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if ($this->sorting == 'date') { 
            $products = Product::where('product_category_id', $category_id)->orderBy('created_at', 'desc')->paginate(12);
        }elseif ($this->sorting == 'price') {
            $products = Product::where('product_category_id', $category_id)->orderBy('price', 'asc')->paginate(12);
        }else{
            $products = Product::where('product_category_id', $category_id)->paginate(12);
        }
        
        $product_category = ProductCategory::all();

        return view('livewire.customer.category', ['goldfish'=>$goldfish, 'products'=>$products, 'product_category'=>$product_category, 'category_name'=>$category_name])->layout('layouts.customer');
    }
}