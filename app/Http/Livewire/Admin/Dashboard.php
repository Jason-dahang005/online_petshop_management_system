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
        return view('livewire.admin.dashboard',['users' => $users, 'products' => $products, 'orders' => $orders, 'goldfish' => $goldfish])->layout('layouts.admin', ['title'=>'Dashboard']);
    
    }
}
