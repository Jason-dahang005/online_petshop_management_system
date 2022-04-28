<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class MyAccountSidebar extends Component
{
    public function render()
    {
        return view('livewire.customer.my-account-sidebar')->layout('layouts.customer');
    }
}
