<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {   
        $users = User::where('user_type', 'customer')->get();
        return view('livewire.admin.dashboard',['users'=>$users])->layout('layouts.admin', ['title'=>'Dashboard']);
    
    }
}
