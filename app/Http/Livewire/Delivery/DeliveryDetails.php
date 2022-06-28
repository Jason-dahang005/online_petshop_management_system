<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;
use App\Models\Order;

class DeliveryDetails extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }
    
    public function render()
    {
        $orders = Order::find($this->order_id);
        return view('livewire.delivery.delivery-details', ['orders'=>$orders])->layout('layouts.delivery', ['title'=>'Delivery Details']);
    }
}
