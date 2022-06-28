<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminHomeSliderComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $subtitle, $price, $link, $image;

    public function OpenHomeSliderModal(){
        $this->dispatchBrowserEvent('OpenHomeSliderModal');
    }

    public function AddSlide(){
        $slider             = new HomeSlider();
        $slider->title      = $this->title;
        $slider->subtitle   = $this->subtitle;
        $slider->price      = $this->price;
        $slider->link       = $this->link;
        $slider->image      = $this->image;

        $imageName = Carbon::now()->timestamp. '.'. $this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;

        $s = $slider->save();

        if($s){
            $this->dispatchBrowserEvent('CloseHomeSliderModal');
        }
    }

    public function render()
    {
        $slider = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['slider'=>$slider ])->layout('layouts.admin', ['title'=>'Admin Home Slider']);
    }
}
