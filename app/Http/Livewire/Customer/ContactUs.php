<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Contact;

class ContactUs extends Component
{
    public $name, $email, $phone, $comment;

    public function render()
    { 
        return view('livewire.customer.contact-us')->layout('layouts.customer');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'comment'=> 'required'
        ]);
    }

    public function sendMessage(){
        $this->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'phone'=> 'required',
            'comment'=> 'required'
        ]);

        $msg = new Contact();
        $msg->name = $this->name;
        $msg->email = $this->email;
        $msg->phone = $this->phone;
        $msg->comment = $this->comment;
        $msg->save();

        session()->flash('message','Thanks, your message has been sent successfully!');

    }
}
