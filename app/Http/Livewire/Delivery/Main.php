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

        $count_pending = Order::where('status','pending')->count();
        $count_delivering = Order::where('status','delivering')->count();
        $delivery_list = $count_pending + $count_delivering;

        $delivery_completed = Order::where('status','completed')->count();
        $delivery_received = Order::where('status','received')->count();
        $orders = $delivery_completed + $delivery_received;
        return view('livewire.delivery.main', ['orders'=>$orders], ['delivery_list'=>$delivery_list])->layout('layouts.delivery', ['title' => 'Home']);
    }
}
