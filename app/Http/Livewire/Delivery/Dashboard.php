<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.delivery.dashboard')->layout('layouts.delivery');
    }
}
