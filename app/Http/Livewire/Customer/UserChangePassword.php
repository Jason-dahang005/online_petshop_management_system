<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\User;
use Hash;
use Auth;

class UserChangePassword extends Component
{
    public $old_pass, $password, $confirm_password;

    public function render()
    {
        return view('livewire.customer.user-change-password')->layout('layouts.customer');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'old_pass'=>'required',
            'password'=>'required|min:8|different:old_pass',
            'confirm_password' => 'required|same:password'
        ]);
    }

    // Change password
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
