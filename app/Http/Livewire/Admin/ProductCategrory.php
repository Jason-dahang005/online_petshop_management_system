<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ProductCategrory extends Component
{
    public function render()
    {
        return view('livewire.admin.product-categrory')->layout('layouts.admin');
    }
}
