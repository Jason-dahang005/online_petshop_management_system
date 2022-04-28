<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;
use App\Models\Order;

class CustomerOrderDetailComponent extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function render()
    {
        $orders = Order::find($this->order_id);
        $delivery = Order::all();
        return view('livewire.delivery.customer-order-detail-component', ['orders'=>$orders, 'delivery'=>$delivery])->layout('layouts.delivery', ['title'=>'Order Details']);
    }
}
