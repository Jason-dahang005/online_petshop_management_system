<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Goldfish;
use App\Models\Product;


class Shop extends Component
{
    use WithPagination;

    public function render()
    {
        $goldfish = Goldfish::all();
        $products = Product::simplePaginate(12);
        return view('livewire.customer.shop', ['goldfish'=>$goldfish, 'products'=>$products])->layout('layouts.customer');
    }
}
