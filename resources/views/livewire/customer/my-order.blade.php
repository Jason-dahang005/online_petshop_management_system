<div>
  {{-- <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a href="#" class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
      <a href="#" class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" role="tab" aria-controls="approved" aria-selected="true">Approved</a>
      <a href="#" class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Delivering</a>
      <a href="#" class="nav-link" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" role="tab" aria-controls="delivered" aria-selected="false">Completed</a>
      <a href="#" class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="pending" role="tabpanel"aria-labelledby="pending-tab">
      @if (count($pending) > 0)
        @foreach ($pending as $p)
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <span><b>Order ID:</b> {{ $p->order_code }}</span>
                <span><b>Date Ordered:</b>{{ date("Y-m-d h:i a", strtotime($p->created_at)) }}</span>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Ordered By:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $p->fullname }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Contact No.:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $p->mobile }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Complete Address:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $p->address }},{{ $p->city }},{{ $p->province }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Zipcode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $p->zipcode }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>
                    @if ($p->transaction->paymentmode == 'cod')
                      Cash on Delivery
                    @else
                      Online Payment (Paid)
                    @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                @foreach ($p->orderitems as $item)
                <div class="col-lg-4 col-md-4 col-4">
                  <strong>{{ $item->product->name }}</strong>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>x{{ $item->quantity }}</p>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>&#8369;{{ $item->price }}</p>
                </div>
                @endforeach
                <hr>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Tax:</strong>
                </div>
                <div class="col-4">
                  <p>&#8369;{{ $p->tax }}</p>
                </div>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Total:</strong>
                </div>
                <div class="col-4">
                  <strong>&#8369;{{ $p->total }}</strong>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="text-center pt-5">
          <p>There are no orders placed yet.</p>
          <p class="py-3">
            <a href="{{ route('customer.shop') }}" class="btn btn-outline-warning">CONTINUE SHOPPING</a>
          </p>
        </div>
      @endif
    </div>

    <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
      @if (count($approved) > 0)
        @foreach ($approved as $a)
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <span><b>Order ID:</b> {{ $a->order_code }}</span>
                <span><b>Date Ordered:</b>{{ date("Y-m-d h:i a", strtotime($a->created_at)) }}</span>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Ordered By:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $a->fullname }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Contact No.:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $a->mobile }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Complete Address:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $a->address }},{{ $a->city }},{{ $a->province }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Zipcode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $a->zipcode }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>
                    @if ($a->transaction->paymentmode == 'cod')
                      Cash on Delivery
                    @else
                      Online Payment (Paid)
                    @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                @foreach ($a->orderitems as $item)
                <div class="col-lg-4 col-md-4 col-4">
                  <strong>{{ $item->product->name }}</strong>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>x{{ $item->quantity }}</p>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>&#8369;{{ $item->price }}</p>
                </div>
                @endforeach
                <hr>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Tax:</strong>
                </div>
                <div class="col-4">
                  <p>&#8369;{{ $a->tax }}</p>
                </div>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Total:</strong>
                </div>
                <div class="col-4">
                  <strong>&#8369;{{ $a->total }}</strong>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="text-center pt-5">
          <p>There are no orders placed yet.</p>
          <p class="py-3">
            <a href="{{ route('customer.shop') }}" class="btn btn-outline-warning">CONTINUE SHOPPING</a>
          </p>
        </div>
      @endif
    </div>

    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
      @if (count($delivering) > 0)
        @foreach ($delivering as $d)
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <span><b>Order ID:</b> {{ $d->order_code }}</span>
                <span><b>Date Ordered:</b>{{ date("Y-m-d h:i a", strtotime($d->created_at)) }}</span>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Ordered By:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $d->fullname }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Contact No.:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $d->mobile }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Complete Address:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $d->address }},{{ $d->city }},{{ $d->province }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Zipcode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $d->zipcode }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Payment Mode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>
                    @if ($d->transaction->paymentmode == 'cod')
                      Cash on Delivery
                    @else
                      Online Payment (Paid)
                    @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                @foreach ($d->orderitems as $item)
                <div class="col-lg-4 col-md-4 col-4">
                  <strong>{{ $item->product->name }}</strong>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>x{{ $item->quantity }}</p>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>&#8369;{{ $item->price }}</p>
                </div>
                @endforeach
                <hr>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Tax:</strong>
                </div>
                <div class="col-4">
                  <p>&#8369;{{ $d->tax }}</p>
                </div>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Total:</strong>
                </div>
                <div class="col-4">
                  <strong>&#8369;{{ $d->total }}</strong>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="text-center pt-5">
          <p>There are no orders placed yet.</p>
          <p class="py-3">
            <a href="{{ route('customer.shop') }}" class="btn btn-outline-warning">CONTINUE SHOPPING</a>
          </p>
        </div>
      @endif
    </div>

    <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
      @if (count($completed) > 0)
        @foreach ($completed as $c)
          @if ($c->status == 'completed' || $c->status == 'received')
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <span><b>Order ID:</b> {{ $c->order_code }}</span>
                <span><b>Date Delivered:</b>{{ date("Y-m-d h:i a", strtotime($c->updated_at)) }}</span>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Ordered By:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $c->fullname }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Contact No.:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $c->mobile }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Complete Address:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $c->address }},{{ $c->city }},{{ $c->province }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Zipcode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $c->zipcode }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Payment Mode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>
                    @if ($c->transaction->paymentmode == 'cod')
                      Cash on Delivery
                    @else
                      Online Payment (Paid)
                    @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                @foreach ($c->orderitems as $item)
                <div class="col-lg-4 col-md-4 col-4">
                  <strong>{{ $item->product->name }}</strong>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>x{{ $item->quantity }}</p>
                </div>
                <div class="col-lg-4 col-md-4 col-4">
                  <p>&#8369;{{ $item->price }}</p>
                </div>
                @endforeach
                <hr>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Tax:</strong>
                </div>
                <div class="col-4">
                  <p>&#8369;{{ $c->tax }}</p>
                </div>
                <div class="col-7"></div>
                <div class="col-1">
                  <strong>Total:</strong>
                </div>
                <div class="col-4">
                  <strong>&#8369;{{ $c->total }}</strong>
                </div>
              </div>
              <form>
                <div class="form-group row">
                  <input type="text" wire:model="received" value="received">
                  <div class="col-12">
                    @if ($c->status == 'received')
                      <button class="btn btn-flat btn-success w-100 disabled" type="submit">Parcel received <i class="far fa-check-circle"></i></button>
                    @else
                      <div class="button">
                        <button class="btn w-100" type="button" wire:click="ReceivedModal({{ $c->id }})">Did you recieved the parcel?</button>
                      </div>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
          @endif
        @endforeach
      @else
        <div class="text-center pt-5">
          <p>There are no orders placed yet.</p>
          <p class="py-3">
            <a href="{{ route('customer.shop') }}" class="btn btn-outline-warning">CONTINUE SHOPPING</a>
          </p>
        </div>
      @endif
    </div>

    <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
      @if (count($cancelled) > 0)
        @foreach ($cancelled as $x)
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <span><b>Order ID:</b> {{ $x->order_code }}</span>
                <span><b>Date Cancelled:</b>{{ date("Y-m-d h:i a", strtotime($x->updated_at)) }}</span>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Ordered By:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $x->fullname }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Contact No.:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $x->mobile }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Complete Address:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $x->address }},{{ $x->city }},{{ $x->province }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p><b>Zipcode:</b></p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>{{ $x->zipcode }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <p>
                    @if ($x->transaction->paymentmode == 'cod')
                      Cash on Delivery
                    @else
                      Online Payment (Paid)
                    @endif
                  </p>
                </div>
              </div>
              <hr>
              <div class="d-flex justify-content-end">
                <a href="" class="btn btn-outline-primary">View Details</a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="text-center pt-5">
          <p>There are no orders placed yet.</p>
          <p class="py-3">
            <a href="{{ route('customer.shop') }}" class="btn btn-outline-warning">CONTINUE SHOPPING</a>
          </p>
        </div>
      @endif
  </div>

  <div class="modal fade" id="ReceivedModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ReceivedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ReceivedModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div> --}}
  @foreach ($orders as $order)
		@if ($order->status == 'pending' || $order->status == 'approved' || $order->status == 'delivering' || $order->status == 'completed')
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
            @if ($order->status == 'pending')
              <div class="step active"><span class="icon"><i class="fas fa-history"></i></span><span class="text">Pending</span></div>
							<div class="step"><span class="icon"><i class="fas fa-box"></i></span><span class="text">Order approved</span></div>
							<div class="step"><span class="icon"><i class="fas fa-shipping-fast"></i></span><span class="text">delivering</span></div>
							<div class="step"><span class="icon"><i class="fas fa-check"></i></span><span class="text">Completed </span></div>
						@elseif ($order->status == 'approved')
              <div class="step active"><span class="icon"><i class="fas fa-history"></i></span><span class="text">Pending</span></div>
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
