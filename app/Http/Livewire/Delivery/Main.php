<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;

class Main extends Component
{
    public function render()
    {
        return view('livewire.delivery.main')->layout('layouts.delivery');
    }
}
