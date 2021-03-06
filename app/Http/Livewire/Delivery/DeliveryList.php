<?php

namespace App\Http\Livewire\Delivery;

use Livewire\Component;
use App\Models\Order;
use App\Models\Transaction;
use Auth;


class DeliveryList extends Component
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

		$update_trans = Transaction::find($del_id)->update([
			'status' => $this->del_status
		]);

		if ($update_del && $update_trans) {
			$this->dispatchBrowserEvent('CloseDeliveryStatusModal');
		}
	}
	public function render()
	{
		$orders = Order::where('delivery', Auth::user()->name)->get();
		$ord = Order::all();
		$x = Order::where('status', 'approved')->count();
		$y = Order::where('status', 'delivering')->count();
		$ord = $x + $y; 
		return view('livewire.delivery.delivery-list', ['orders'=>$orders], ['ord'=>$ord])->layout('layouts.delivery', ['title' => 'List of Deliveries']);
	}
}
