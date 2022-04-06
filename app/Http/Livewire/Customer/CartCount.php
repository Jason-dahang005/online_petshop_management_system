<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class CartCount extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.customer.cart-count');
    }
}
