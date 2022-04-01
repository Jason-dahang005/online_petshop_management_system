<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Goldfish;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class GoldfishComponent extends Component
{
    use WithFileUploads;
    public $name, $description, $price, $image, $slug;

    public function render()
    {
        return view('livewire.admin.goldfish-component',[
            'goldF' => goldfish::orderBy('name', 'desc')->get()
            ])->layout('layouts.admin', ['title'=>'Goldfish']);
    }

    public function OpenGoldfishModal(){
        $this->dispatchBrowserEvent('OpenGoldfishModal');
    }

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function addGoldfish(){
        $this->validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'image'=> 'required'
        ]);

        $save = new goldfish();
        $save->name = $this->name;
        $save->slug = $this->slug;
        $save->description = $this->description;
        $save->price = $this->price;
        $imageName = Carbon::now()->timestamp. '.'. $this->image->extension();
        $this->image->storeAs('image', $imageName);
        $save->image = $imageName;
        $p = $save->save();
        

        if($p){
            $this->dispatchBrowserEvent('CloseGoldfishModal');
        }
    }

}
