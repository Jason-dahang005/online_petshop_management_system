<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Order;
use Auth;

class MyOrder extends Component
{
    public function ReceivedModal($id){
        $this->dispatchBrowserEvent('ReceivedModal');
    }

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
    public function cancelOrder($id){
        $order = Order::find($id);
        $order->status = 'cancelled';
        $order->save();
    }

    public function receivedOrder($id){
        $order = Order::find($id);
        $order->status = 'received';
        $order->save();
    }

    public function render()
    {
        $orders = Order::where('status', 'pending')->orWhere('status', 'approved')->orWhere('status', 'delivering')->orWhere('status', 'completed')->get();
        return view('livewire.customer.my-order', ['orders' => $orders])->layout('layouts.customer');
    }
}
