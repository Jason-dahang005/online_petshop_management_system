<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Cart;
use Auth;

class ContactUs extends Component
{
    public function render()
    {
        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email);
        }
        return view('livewire.customer.contact-us')->layout('layouts.customer');
    }
}
