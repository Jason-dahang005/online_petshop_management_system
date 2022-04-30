<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class OrderComponent extends Component
{
	use WithPagination;
	public $status;
	public $perPage = 9;
	public $search = '';
	public $upd_id;
	public $upd_delivery;
	public $upd_status;
	public $order_details_id;
	public $order_details_customer;

	// ORDER DETAILS FUNCTION
	public function OpenOrderDetailsModal($id){
		$order_details 										= Order::find($id);
		$this->order_details_id						= $order_details->id;
		$this->order_details_customer			= $order_details->fullname;
		$this->dispatchBrowserEvent('OpenOrderDetailsModal',[
			'id' => $id
		]);
	}

	// ORDER UPDATE FUNCTION
	public function OpenUpdateOrderStatusModal($id){
		$upd_order 							= Order::find($id);
		$upd_trans							= Transaction::find($id);
		$this->upd_status 			= $upd_order->status;
		$this->upd_status				= $upd_trans->status;
		$this->upd_id						= $upd_order->id;
		$this->upd_delivery			= $upd_order->delivery;
		$this->dispatchBrowserEvent('OpenUpdateOrderStatusModal', [
			'id' => $id
		]);
	}

	public function update(){
		$upd_id 							= $this->upd_id;
		$upd_order 						= Order::find($upd_id);
		$upd_trans						= Transaction::find($upd_id);
		$upd_trans->status		= $this->upd_status;
		$upd_order->status		= $this->upd_status;
		$upd_order->delivery	= $this->upd_delivery;
		$uo 									= $upd_order->save();

		if ($uo) {
			$this->dispatchBrowserEvent('CloseUpdateOrderStatusModal');
		}
	}


	public function render()
	{
		$orders = Order::search($this->search)->orderBy('created_at', 'desc')->simplePaginate($this->perPage);
		$order_details = OrderItem::all();
		$delivery = User::where('user_type', 'delivery')->get();
		return view('livewire.admin.order-component', ['orders'=>$orders, 'order_details'=>$order_details, 'delivery'=>$delivery])->layout('layouts.admin', ['title'=>'Order List']);
	}
}