<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;

class DeliveryHistory extends Component
{
    public function render()
    {
        return view('livewire.delivery.delivery-history')->layout('layouts.delivery', ['title'=>'List of History']);
    
    }
}
