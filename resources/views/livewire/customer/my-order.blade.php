<div class="">
	{{-- @forelse ($orders as $order)
		<article class="card mb-3">
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
											<i class="fas fa-money-check-alt"></i>
										<strong>Payment Mode:</strong>
									</div>
									<div class="col-lg-6 col-md-6 col-6">
										@if ($order->transaction->paymentmode ?? 'card')
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
					@if ($order->status == 'pending')
						<div class="step active"><span class="icon"><i class="fas fa-history"></i></span><span class="text">Pending</span></div>
						<div class="step"><span class="icon"><i class="fas fa-thumbs-up"></i></span><span class="text">Approved</span></div>
						<div class="step"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">Delivering</span></div>
						<div class="step"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
					@elseif ($order->status == 'approved')
						<div class="step active"><span class="icon"><i class="fas fa-history"></i></span><span class="text">Pending</span></div>
						<div class="step active"><span class="icon"><i class="fas fa-thumbs-up"></i></span><span class="text">Approved</span></div>
						<div class="step"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">Delivering</span></div>
						<div class="step"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
					@elseif ($order->status == 'delivering')
						<div class="step active"><span class="icon"><i class="fas fa-history"></i></span><span class="text">Pending</span></div>
						<div class="step active"><span class="icon"><i class="fas fa-thumbs-up"></i></span><span class="text">Approved</span></div>
						<div class="step active"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">Delivering</span></div>
						<div class="step"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
					@elseif ($order->status == 'completed')
						<div class="step active"><span class="icon"><i class="fas fa-history"></i></span><span class="text">Pending</span></div>
						<div class="step active"><span class="icon"><i class="fas fa-thumbs-up"></i></span><span class="text">Approved</span></div>
						<div class="step active"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">Delivering</span></div>
						<div class="step active"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
					@endif
				</div>
				<div class="button">
					@if ($order->status == 'pending')
						<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
					@elseif ($order->status == 'completed')
						<button class="btn w-100" wire:click.prevent="receivedOrder({{ $order->id }})">Parcel Received</button>
					@endif
			</div>
		</article>
	@empty
		<h3 class="text-center py-5">No Orders For Today</h3>
		<div class="text-center button">
			<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
		</div>
	@endforelse --}}
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="delivering-tab" data-toggle="tab" href="#delivering" role="tab" aria-controls="delivering" aria-selected="false">Delivering</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">Completed</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="received-tab" data-toggle="tab" href="#received" role="tab" aria-controls="received" aria-selected="false">Received</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
			@forelse ($orders as $order)
				@if ($order->status == 'pending')
					<div class="d-flex justify-content-between pt-2">
						<div class="order-details">
							<h6 class="py-1"><b>Order ID: </b>{{ $order->order_code }}</h6>
							<h6 class="py-1"><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h6>
						</div>
						<div class="button">
							<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
						</div>
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
												<i class="fas fa-money-check-alt"></i>
											<strong>Payment Mode:</strong>
										</div>
										<div class="col-lg-6 col-md-6 col-6">
											@if ($order->transaction->paymentmode ?? 'card')
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
				@else
					<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
					<div class="text-center button">
						<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
					</div>
				@endif
			@empty
				<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
				<div class="text-center button">
					<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
				</div>
			@endforelse
		</div>

		<div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
			@forelse ($orders as $order)
				@if ($order->status == 'approved')
					<div class="d-flex justify-content-between pt-2">
						<div class="order-details">
							<h6 class="py-1"><b>Order ID: </b>{{ $order->order_code }}</h6>
							<h6 class="py-1"><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h6>
						</div>
						<div class="button">
							<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
						</div>
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
											<i class="fas fa-money-check-alt"></i>
										<strong>Payment Mode:</strong>
									</div>
									<div class="col-lg-6 col-md-6 col-6">
										@if ($order->transaction->paymentmode ?? 'card')
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
				@else
					<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
					<div class="text-center button">
						<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
					</div>
				@endif
			@empty
				<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
				<div class="text-center button">
					<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
				</div>
			@endforelse
		</div>

		<div class="tab-pane fade" id="delivering" role="tabpanel" aria-labelledby="delivering-tab">
			@forelse ($orders as $order)
				@if ($order->status == 'delivering')
					<div class="d-flex justify-content-between pt-2">
						<div class="order-details">
							<h6 class="py-1"><b>Order ID: </b>{{ $order->order_code }}</h6>
							<h6 class="py-1"><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h6>
						</div>
						<div class="button">
							<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
						</div>
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
												<i class="fas fa-money-check-alt"></i>
											<strong>Payment Mode:</strong>
										</div>
										<div class="col-lg-6 col-md-6 col-6">
											@if ($order->transaction->paymentmode ?? 'card')
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
				@else
					<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
					<div class="text-center button">
						<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
					</div>
				@endif
			@empty
				<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
				<div class="text-center button">
					<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
				</div>
			@endforelse
		</div>

		<div class="tab-pane fade show" id="completed" role="tabpanel" aria-labelledby="completed-tab">
			@forelse ($orders as $order)
				@if ($order->status == 'completed')
					<div class="d-flex justify-content-between pt-2">
						<div class="order-details">
							<h6 class="py-1"><b>Order ID: </b>{{ $order->order_code }}</h6>
							<h6 class="py-1"><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h6>
						</div>
						<div class="button">
							<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
						</div>
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
												<i class="fas fa-money-check-alt"></i>
											<strong>Payment Mode:</strong>
										</div>
										<div class="col-lg-6 col-md-6 col-6">
											@if ($order->transaction->paymentmode ?? 'card')
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
				@else
					<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
					<div class="text-center button">
						<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
					</div>
				@endif
			@empty
				<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
				<div class="text-center button">
					<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
				</div>
			@endforelse
		</div>

		<div class="tab-pane fade" id="received" role="tabpanel" aria-labelledby="received-tab">
			@forelse ($orders as $order)
				@if ($order->status == 'received')
					<div class="d-flex justify-content-between pt-2">
						<div class="order-details">
							<h6 class="py-1"><b>Order ID: </b>{{ $order->order_code }}</h6>
							<h6 class="py-1"><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h6>
						</div>
						<div class="button">
							<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
						</div>
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
												<i class="fas fa-money-check-alt"></i>
											<strong>Payment Mode:</strong>
										</div>
										<div class="col-lg-6 col-md-6 col-6">
											@if ($order->transaction->paymentmode ?? 'card')
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
				@else
					<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
					<div class="text-center button">
						<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
					</div>
				@endif
			@empty
				<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
				<div class="text-center button">
					<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
				</div>
			@endforelse
		</div>

		<div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
			@forelse ($orders as $order)
				@if ($order->status == 'cancelled')
					<div class="d-flex justify-content-between pt-2">
						<div class="order-details">
							<h6 class="py-1"><b>Order ID: </b>{{ $order->order_code }}</h6>
							<h6 class="py-1"><b>Date Ordered: </b>{{ date("Y-m-d h:i a", strtotime($order->created_at)) }}</h6>
						</div>
						<div class="button">
							<button class="btn w-100" wire:click.prevent="cancelOrder({{ $order->id }})">Cancel Order</button>
						</div>
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
												<i class="fas fa-money-check-alt"></i>
											<strong>Payment Mode:</strong>
										</div>
										<div class="col-lg-6 col-md-6 col-6">
											@if ($order->transaction->paymentmode ?? 'card')
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
				@else
					<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
					<div class="text-center button">
						<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
					</div>
				@endif
			@empty
				<h5 class="text-center pt-5 pb-2 text-secondary">No Orders For Today</h5>
				<div class="text-center button">
					<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
				</div>
			@endforelse
		</div>
	</div>
</div>