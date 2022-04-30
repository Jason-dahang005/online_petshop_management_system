<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;
use App\Models\User;
use Hash;
use Auth;

class DeliveryProfile extends Component
{
    public $old_pass, $password, $confirm_password;

    public function render()
    {
        $delivery = User::where('user_type', 'delivery')->where('active','unactive')->select('*')->get();
        return view('livewire.delivery.delivery-profile',['delivery' => $delivery])->layout('layouts.delivery', ['title'=>'Profile']);
    }

// Change delivery password
    public function changePassword(){
        $this->validate([
            'old_pass'=>'required',
            'password'=>'required|min:8|different:old_pass',
            'confirm_password' => 'required|same:password'
        ]);

        if(Hash::check($this->old_pass,Auth::user()->password)){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success','Password has been changed successfully!');
        }
        else{
            session()->flash('password_error','Password does not match!');
        }
    }
}
