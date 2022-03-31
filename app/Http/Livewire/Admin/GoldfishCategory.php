<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class GoldfishCategory extends Component
{
    public function render()
    {
        return view('livewire.admin.goldfish-category')->layout('layouts.admin');
    }
}
