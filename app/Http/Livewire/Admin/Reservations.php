<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Reservations extends Component
{
    public function render()
    {
        return view('livewire.admin.reservations')->layout('layouts.admin');
    }
}
