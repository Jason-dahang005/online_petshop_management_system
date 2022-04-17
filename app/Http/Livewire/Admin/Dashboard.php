<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;

class Dashboard extends Component
{

    public function render()
    {   
        $users = User::where('user_type', 'customer')->get();
        $products = Product::all();
        return view('livewire.admin.dashboard',['users' => $users, 'products' => $products])->layout('layouts.admin', ['title'=>'Dashboard']);
    
    }
}
