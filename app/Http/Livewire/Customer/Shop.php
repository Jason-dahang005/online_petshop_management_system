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

    public function render()
    {
        $goldfish = Goldfish::all();
            
        $product_category = ProductCategory::all();

        if ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'desc')->paginate(12);
        }elseif ($this->sorting == 'price') {
            $products = Product::orderBy('price', 'asc')->paginate(12);
        }else{
            $products = Product::paginate(12);
        }

        return view('livewire.customer.shop', ['goldfish'=>$goldfish, 'products'=>$products, 'product_category'=>$product_category])->layout('layouts.customer');
    }
}
