<div>

	@if ($ord > 0)
		@foreach ($orders as $order)
			@if ($order->status == 'approved' || $order->status == 'delivering')
				<article class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<h5><b>Order ID: </b>{{ $order->order_code }}</h5>
							<h5><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h5>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<article class="card">
									<div class="card-body">
										<div class="text-center">
											<strong>Delivery Details</strong>
										</div>
										<hr>
										<div class="row">
											<div class="col-lg-6 col-md-6 col-6">
												<i class="fas fa-user px-2"></i>
												<strong>Ordered By:</strong>
											</div>
											<div class="col-lg-6 col-md-6 col-6">
												{{ $order->fullname }}
											</div>
				
											<div class="col-lg-6 col-md-6 col-6">
												<i class="fas fa-phone-alt px-2"></i>
												<strong>Contact No:</strong>
											</div>
											<div class="col-lg-6 col-md-6 col-6">
												{{ $order->mobile }}
											</div>
				
											<div class="col-lg-6 col-md-6 col-6">
												<i class="fas fa-map-marker-alt px-2"></i>
												<strong>Address:</strong>
											</div>
											<div class="col-lg-6 col-md-6 col-6">
												{{ $order->address }},{{ $order->city }},{{ $order->province }}
											</div>
				
											<div class="col-lg-6 col-md-6 col-6">
												@if ($order->transaction->paymentmode == 'cod')
												<i class="fas fa-coins px-2"></i>
												@else
												<i class="fas fa-money-check-alt"></i>
												@endif
												<strong>Payment Mode:</strong>
											</div>
											<div class="col-lg-6 col-md-6 col-6">
												@if ($order->transaction->paymentmode == 'cod')
													Cash on Delivery
												@else
													Online Payment (Paid)
												@endif
											</div>
										</div>
									</div>
								</article>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<article class="card">
									<div class="card-body">
										<div class="text-center">
											<strong>Delivery Items</strong>
										</div>
										<hr>
										<div class="row">
											@foreach ($order->orderitems as $item)
												<div class="col-lg-4 col-md-4 col-4">
													<strong>{{ $item->product->name }}</strong>
												</div>
												<div class="col-lg-4 col-md-4 col-4">
													<strong>x{{ $item->quantity }}</strong>
												</div>
												<div class="col-lg-4 col-md-4 col-4">
													<strong>&#8369;{{ $item->price }}</strong>
												</div>
											@endforeach
										</div>
										<hr>
										<div class="row">
											<div class="col-4"><strong>Subtotal:</strong></div>
											<div class="col-4"></div>
											<div class="col-4">&#8369;{{ $order->subtotal }}</div>
											<div class="col-4"><strong>Tax:</strong></div>
											<div class="col-4"></div>
											<div class="col-4">&#8369;{{ $order->tax }}</div>
											<div class="col-4"><strong>Total:</strong></div>
											<div class="col-4"></div>
											<div class="col-4"><strong>&#8369;{{ $order->total }}</strong></div>
										</div>
									</div>
								</article>
							</div>
						</div>
						<div class="track">
							@if ($order->status == 'approved')
								<div class="step active"><span class="icon"><i class="fas fa-box"></i></span><span class="text">Order approved</span></div>
								<div class="step"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">delivering</span></div>
								<div class="step"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
							@elseif ($order->status == 'delivering')
								<div class="step active"><span class="icon"><i class="fas fa-box"></i></span><span class="text">Order approved</span></div>
								<div class="step active"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">delivering</span></div>
								<div class="step"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
							@elseif ($order->status == 'completed')
								<div class="step active"><span class="icon"><i class="fas fa-box"></i></span><span class="text">Order approved</span></div>
								<div class="step active"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">delivering</span></div>
								<div class="step active"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
							@endif
						</div>
						<button type="button" class="btn btn-outline-primary btn-flat btn-block" wire:click="OpenDeliveryStatusModal({{ $order->id }})">Update Delivery Status</button>
					</div>
				</article>
			@endif
		@endforeach
	@else
		<div class="card">
			<div class="card-body">
				<h3 class="text-center py-5">No Delivery  For Today</h3>
			</div>
		</div>
	@endif

	<div class="modal fade" wire:ignore.self id="OpenDeliveryStatusModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenDeliveryStatusModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="OpenDeliveryStatusModalLabel"><b>Update Delivery Status</b></h5>
				</div>
				<form wire:submit.prevent="updateDelivery">
					<div class="modal-body">
						<input type="hidden" wire:model="del_id">
						
						<div class="form-group">
							<select class="custom-select" wire:model="del_status">
								<option value="pending">Pending</option>
								<option value="delivering">Delivering</option>
								<option value="completed">completed</option>
							</select>
							<span class="text-danger">@error('del_status') {{ $message }} @enderror</span>
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
</div>
