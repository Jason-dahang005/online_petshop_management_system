<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    public function render()
    {
        $x = Order::where('status', 'completed')->count();
        $y = Order::where('status', 'received')->count();
        $z = $x + $y;

        $orders = Order::where('status', 'received')->orderBy('updated_at', 'DESC')->get();
        return view('livewire.customer.order-history', ['z' => $z, 'orders' => $orders])->layout('layouts.customer');
    }
}
