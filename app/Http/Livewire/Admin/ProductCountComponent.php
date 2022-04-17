<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ProductCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    
    public function render()
    {
        return view('livewire.admin.product-count-component');
    }
}
