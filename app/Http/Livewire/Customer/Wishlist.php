<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Wishlist extends Component
{
    public function render()
    {
        return view('livewire.customer.wishlist')->layout('layouts.customer');
    }
}
