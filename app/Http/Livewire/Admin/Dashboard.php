<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Goldfish;

class Dashboard extends Component
{

    public function render()
    {   
        $users = User::where('user_type', 'customer')->get();
        $orders = Order::where('status', 'pending')->get();
        $goldfish = Goldfish::all();
        $products = Product::all();
        $sales = Order::join('transactions', 'orders.id', '=', 'transactions.order_id')
                    ->select('orders.*', 'transaction.*')
                    ->where('transactions.status', 'completed')
                    ->sum('orders.total');
        return view('livewire.admin.dashboard',['sales' => $sales, 'users' => $users, 'products' => $products, 'orders' => $orders, 'goldfish' => $goldfish])->layout('layouts.admin', ['title'=>'Dashboard']);
    
    }
}
