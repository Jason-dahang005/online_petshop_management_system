<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Cart;
use Auth;

class Home extends Component
{
    public function render()
    { 
        return view('livewire.customer.home')->layout('layouts.customer');
    }
}
