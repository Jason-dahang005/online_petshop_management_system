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
    public function render()
    {
        // $delivering = Order::where('user_id', Auth::user()->id)->where('status', 'delivering')->get();
        // $pending = Order::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        // $approved = Order::where('user_id', Auth::user()->id)->where('status', 'approved')->get();
        // $completed = Order::where('user_id', Auth::user()->id)->get();
        // $cancelled = Order::where('user_id', Auth::user()->id)->where('status', 'cancelled')->get();
        $orders = Order::all();
        return view('livewire.customer.my-order', [
            // 'delivering'    => $delivering,
            // 'pending'       => $pending,
            // 'approved'       => $approved,
            // 'completed'       => $completed,
            // 'cancelled'       => $cancelled,
            'orders'            => $orders
            ])->layout('layouts.customer');
    }
}
