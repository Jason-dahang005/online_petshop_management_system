<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\models\Product;

class InventoryComponent extends Component
{
    public function render()
    {
        $product = Product::all();
        return view('livewire.admin.inventory-component', ['product'=>$product])->layout('layouts.admin', ['title'=>'Inventory Reports']);
    }
}
