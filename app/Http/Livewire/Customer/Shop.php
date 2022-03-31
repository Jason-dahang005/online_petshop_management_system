<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Shop extends Component
{
    public function render()
    {
        return view('livewire.customer.shop')->layout('layouts.customer');
    }
}
