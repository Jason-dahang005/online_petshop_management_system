<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;
use App\Models\Order;
use Auth;

class Main extends Component
{

    public $del_id;
	public $del_status;


    // DELIVERY STATUS FUNCTION
    public function OpenDeliveryStatusModal($id){
        $delivery           = Order::find($id);
        $this->del_status   = $delivery->status;
        $this->del_id       = $delivery->id;
        $this->dispatchBrowserEvent('OpenDeliveryStatusModal', [
			'id' => $id
		]);
    }

    public function updateDelivery(){
        $del_id = $this->del_id;
        $update_del = Order::find($del_id)->update([
            'status' => $this->del_status
        ]);

        if ($update_del) {
            $this->dispatchBrowserEvent('CloseDeliveryStatusModal');
        }
    }

    public function render()
    {
        $orders = Order::where('delivery', Auth::user()->name)->get();
        return view('livewire.delivery.main', ['orders'=>$orders])->layout('layouts.delivery', ['title' => 'Home']);
    }
}
