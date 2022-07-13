<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public function render()
    {
        $customer = User::where('user_type', 'customer')->get();
        $delivery = User::where('user_type', 'delivery')->get();
        return view('livewire.admin.user-component', ['delivery'=>$delivery, 'customer'=>$customer])->layout('layouts.admin', ['title'=>'List of Registered Users']);
    }
}
