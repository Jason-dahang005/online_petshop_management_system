<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Hash;

class DeliveryComponent extends Component
{
    public $name, $email, $password;

    public function render()
    {
        $users = User::where('user_type', 'delivery')->get();
        return view('livewire.admin.delivery-component', ['users'=>$users])->layout('layouts.admin', ['title'=>'Delivery']);
    }

    public function OpenAddUserModal(){
        $this->dispatchBrowserEvent('OpenAddUserModal');
    }

    public function addUser(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $save = new user();
        $save->name = $this->name;
        $save->email = $this->email;
        $save->password = Hash::make($this->password);
        $save->user_type = "delivery";
        $p = $save->save();

        if($p){
            $this->dispatchBrowserEvent('CloseAddUserhModal');
        }
    }
}
