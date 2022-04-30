<div class="">
  @foreach ($orders as $order)
		@if ($order->status == 'pending' || $order->status == 'approved' || $order->status == 'delivering' || $order->status == 'completed')
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
              <button class="btn w-100">Parcel Received</button>
						@endif
				</div>
			</article>
		@endif
	@endforeach
</div>
