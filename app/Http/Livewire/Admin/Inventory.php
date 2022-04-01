<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Inventory extends Component
{
    public function render()
    {
        return view('livewire.admin.inventory')->layout('layouts.admin', ['title'=>'Invetory']);
    }
}
