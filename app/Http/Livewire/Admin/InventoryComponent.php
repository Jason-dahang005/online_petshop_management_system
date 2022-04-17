<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class InventoryComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.inventory-component')->layout('layouts.admin', ['title'=>'Inventory Reports']);
    }
}
