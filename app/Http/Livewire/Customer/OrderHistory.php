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

        $a = Order::where('status', 'completed')->get();
        $b = Order::where('status', 'received')->get();
        return view('livewire.customer.order-history', ['z' => $z, 'a' => $a, 'b' => $b])->layout('layouts.customer');
    }
}
