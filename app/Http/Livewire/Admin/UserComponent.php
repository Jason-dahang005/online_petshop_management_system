<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public function render()
    {
        $users = User::where('user_type', 'customer')->get();
        return view('livewire.admin.user-component', ['users'=>$users])->layout('layouts.admin', ['title'=>'List of Registered Users']);
    }
}
