<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;
use App\Models\Order;

class DeliveryHistory extends Component
{
    public function render()
    {
        $delivery = Order::all();
        return view('livewire.delivery.delivery-history', ['delivery'=>$delivery])->layout('layouts.delivery', ['title'=>'Delivery History']);
    
    }
}
