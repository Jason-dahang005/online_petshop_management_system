<div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-12">
					<input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for product category here">
				</div>
				<div class="col-lg-1 col-md-2 col-sm-12">
					{{-- <select class="custom-select" wire:model="perPage">
						<option>10</option>
						<option>25</option>
						<option>50</option>
						<option>100</option> --}}
					</select>
				</div>
				<div class="col-lg-5 col-md-4 col-sm-12">

				</div>
			</div>
			<hr>
			<table class="table table-striped table-bordered table-sm">
				<colgroup>
					<col width="7%">
					<col width="15%">
					<col width="">
					<col width="">
					<col width="">
					<col width="10%">
					<col width="13%">
				</colgroup>
				<thead class="bg-dark">
					<tr>
						<th>Order No.</th>
						<th>Date Ordered</th>
						<th>Customer</th>
						<th>Total Amount</th>
						<th>Payment</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if (count($orders) > 0)
						@foreach ($orders as $order)
							<tr>
								<td class="text-center">{{ $order->id }}</td>
								<td>{{ date("Y-m-d H:i", strtotime($order->created_at)) }}</td>
								<td>{{ $order->fullname }}</td>
								<td>&#8369; {{ $order->total }}</td>
								<td>{{ $order->transaction->paymentmode }}</td>
								<td>
									@if ($order->status == 'pending')
										<span class="badge badge-secondary">Pending</span>
									@elseif($order->status == 'approved')
										<span class="badge badge-success">Approved</span>
									@elseif($order->status == 'received')
										<span class="badge badge-primary">Received</span>
									@elseif($order->status == 'completed')
										<span class="badge badge-dark">Completed</span>
									@elseif($order->status == 'cancelled')
										<span class="badge badge-danger">Cancelled</span>
									@endif
								</td>
								<td>
									@if ($order->status == 'pending')
										<a href="{{ route('admin.order-detail-component', ['order_id'=>$order->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Details</a>
										<button class="btn btn-sm btn-primary" wire:click="OpenUpdateOrderStatusModal({{ $order->id }})"><i class="fas fa-edit"></i> Update</button>
									@else
										<a href="{{ route('admin.order-detail-component', ['order_id'=>$order->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Details</a>
									@endif
								</td>
							</tr>
						@endforeach
					@else
					<tr>
						<td colspan="8">
							<h4 class="text-center py-3">Table is empty</h4>
						</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal fade" wire:ignore.self id="OpenUpdateOrderStatusModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenUpdateOrderStatusModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center" id="OpenUpdateOrderStatusModalLabel">Update Order Status</h5>
					{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> --}}
				</div>
				<form wire:submit.prevent="update">
					<div class="modal-body">
						<input type="hidden" wire:model="upd_id">
						<div class="form-group">
							<label for="">Delivery Rider</label>
							<select class="custom-select" wire:model="upd_delivery">
								<option value="{{ $upd_delivery }}">Select delivery rider</option>
								@foreach ($delivery as $dlvy)
									@if (auth()->check())
										<option value="{{ $dlvy->name }}">{{ $dlvy->name }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="">Order Status</label>
							<select class="custom-select" wire:model="upd_status">
								<option value="{{ $upd_status }}">{{ ucfirst($upd_status) }}</option>
								<option value="approved">Approve</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-sm btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="OpenOrderDetailsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenOrderDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="OpenOrderDetailsModalLabel">Modal title</h5>
					{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> --}}
				</div>
				<div class="modal-body">
					<input type="text" wire:model="order_details_id">
					<table class="table">
						<thead>
							<tr>
								<th>Product Image</th>
								<th>Product Name</th>
								<th width="15%">Quantity</th>
								<th width="20%">Unit Price</th>
								<th>Subtotal</th>
								<th>Action<th>
							</tr>
						</thead>
						<tbody>

						</tbody>
				</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
