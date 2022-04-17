<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SalesComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.sales-component')->layout('layouts.admin', ['title'=>'Sales Reports']);
    }
}
