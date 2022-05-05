<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;

class CancelOrder extends Component
{
    public function render()
    {
        $orders = Order::where('status', 'cancelled')->orderBy('updated_at', 'DESC')->get();
        return view('livewire.customer.cancel-order', ['orders'=>$orders])->layout('layouts.customer');
    }
}
