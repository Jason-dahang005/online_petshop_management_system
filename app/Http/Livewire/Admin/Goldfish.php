<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Goldfish extends Component
{
    public function render()
    {
        return view('livewire.admin.goldfish')->layout('layouts.admin');
    }
}
