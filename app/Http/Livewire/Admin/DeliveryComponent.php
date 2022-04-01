<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class DeliveryComponent extends Component
{
    public function render()
    {
        $users = User::where('user_type', 'delivery')->get();
        return view('livewire.admin.delivery-component', ['users'=>$users])->layout('layouts.admin', ['title'=>'Delivery']);
    }
}
