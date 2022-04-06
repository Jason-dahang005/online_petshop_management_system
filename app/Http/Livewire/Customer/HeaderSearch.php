<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\ProductCategory;

class HeaderSearch extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount(){
        $this->product_cat = 'All Category';
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function render()
    {
        $categories = ProductCategory::all();
        return view('livewire.customer.header-search', ['categories'=>$categories]);
    }
}
