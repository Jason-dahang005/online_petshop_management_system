<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Cart;
use Auth;

class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.customer.about-us')->layout('layouts.customer');
    }
}
