<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Delivery extends Component
{
    public function render()
    {
        return view('livewire.admin.delivery')->layout('layouts.admin');
    }
}
