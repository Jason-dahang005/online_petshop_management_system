<div>
	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between">
				<h5><b>Order Items Details</b></h5>
				<a href="{{ route('admin.order-component') }}">Back</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders->orderitems as $item)
						<tr>
							<td>{{ $item->product->name }}</td>
							<td>
								@if ($item->quantity > 1)
									{{ $item->quantity }} pcs
								@else
									{{ $item->quantity }} pc
								@endif
							</td>
							<td>&#8369; {{ $item->price }}</td>
							<td>&#8369; {{ number_format($item->quantity * $item->price, 2) }}</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3" class="text-right">Tax</th>
						<td>&#8369; {{ $orders->tax }}</td>
					</tr>
					<tr>
						<th colspan="3" class="text-right">Total</th>
						<td>&#8369; {{ $orders->total }}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<div class="card">
		<div class="card-header">
			<h5><b>Shipping Address</b></h5>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th>Recipient Name</th>
						<th>Address</th>
						<th>City/Municipality</th>
						<th>Province</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $orders->fullname }}</td>
						<td>{{ $orders->address }}</td>
						<td>{{ $orders->city }}</td>
						<td>{{ $orders->province }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="card">
		<div class="card-header">
			<h5><b>Shipping Address</b></h5>
		</div>
		<div class="card-body">

		</div>
	</div>
</div>
