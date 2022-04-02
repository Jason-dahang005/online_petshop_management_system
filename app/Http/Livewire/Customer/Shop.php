<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Goldfish;

class Shop extends Component
{
    public function render()
    {
        $goldfish = Goldfish::all();
        return view('livewire.customer.shop', ['goldfish'=>$goldfish])->layout('layouts.customer');
    }
}
