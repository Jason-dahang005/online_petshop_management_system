<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class WishlistCount extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.customer.wishlist-count');
    }
}
