<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Thankyou extends Component
{
    public function render()
    {
        return view('livewire.customer.thankyou')->layout('layouts.customer');
    }
}
