<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        return view('livewire.customer.order')->layout('layouts.customer');
    }
}
