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
    public $upd_name, $upd_description, $upd_price, $upd_image, $upd_slug;

    public function render()
    {
        return view('livewire.admin.goldfish-component',[
            'goldF' => goldfish::orderBy('name', 'desc')->get()
            ])->layout('layouts.admin', ['title'=>'Goldfish']);
    }

    // create modal
    public function OpenGoldfishModal(){
        $this->dispatchBrowserEvent('OpenGoldfishModal');
    }

    // update modal
	public function OpenEditGoldfishModal($id){
		$upc_fish               = goldfish::find($id);
		$this->upd_name             = $upc_fish->name;
        $this->upd_slug             = $upc_fish->slug;
		$this->upd_description      = $upc_fish->description;
        $this->upd_price            = $upc_fish->price;
		$this->status               = $upc_fish->status;
		$this->upd_id               = $upc_fish->id; 
        $this->image                = $upc_fish->image; 
		$this->dispatchBrowserEvent('OpenEditGoldfishModal',[
			'id' => $id
		]);
	}

    public function updateGoldfish(){
		$upd_id = $this->upd_id;
		$this->validate([
			'upd_name'          => 'required|unique:goldfish,name,'.$upd_id,

		],[
			'upd_name.unique'=>'Name already exist'
		]);

		$goldF = goldfish::find($upd_id);
		$goldF->name         = $this->upd_name;
        $goldF->slug         = $this->upd_slug;
		$goldF->description  = $this->upd_description;
		$goldF->status       = $this->status;
        $goldF->price        = $this->upd_price;
        if($this->upd_image){
            $imageName = Carbon::now()->timestamp. '.'. $this->upd_image->extension();
            $this->upd_image->storeAs('image', $imageName);
            $goldF->image = $imageName;
        }
		$pc = $goldF->save();

		if ($pc) {
			$this->dispatchBrowserEvent('CloseEditGoldfishModal');
		}
	}

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function generateeditslug(){
        $this->upd_slug = Str::slug($this->upd_name);
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
