<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Goldfish extends Component
{
    public function render()
    {
        return view('livewire.customer.goldfish')->layout('layouts.customer');
    }
}
