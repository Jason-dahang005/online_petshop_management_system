<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goldfish;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;
use Auth;


class Search extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;


    public function mount(){
        $this->sorting = 'default';
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function render()
    {
        $goldfish = Goldfish::all();
            
        $product_category = ProductCategory::all();

        if ($this->sorting == 'date') {
            $products = Product::where('name', 'like', '%'. $this->search . '%')->where('product_category_id', 'like', '%'. $this->product_cat_id . '%')->orderBy('created_at', 'desc')->paginate(12);
        }elseif ($this->sorting == 'price') {
            $products = Product::where('name', 'like', '%'. $this->search . '%')->where('product_category_id', 'like', '%'. $this->product_cat_id . '%')->orderBy('price', 'asc')->paginate(12);
        }else{
            $products = Product::where('name', 'like', '%'. $this->search . '%')->where('product_category_id', 'like', '%'. $this->product_cat_id . '%')->paginate(12);
        }

        return view('livewire.customer.search', ['goldfish'=>$goldfish, 'products'=>$products, 'product_category'=>$product_category])->layout('layouts.customer');
    }
}
