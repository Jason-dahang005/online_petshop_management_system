<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;
use Auth;

class OrderHistory extends Component
{
    public function render()
    {
        $x = Order::where('status', 'completed')->count();
        $y = Order::where('status', 'received')->count();
        $z = $x + $y;

        $orders = Order::where('user_id', Auth::user()->id)->where('status', 'received')->orderBy('updated_at', 'DESC')->get();
        return view('livewire.customer.order-history', ['z' => $z, 'orders' => $orders])->layout('layouts.customer');
    }
}
