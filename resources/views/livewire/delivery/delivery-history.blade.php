<div>
  @foreach ($delivery as $d)
    @if ($d->status == 'completed' || $d->status == 'received')
      <article class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5><b>Order ID: </b>{{ $d->order_code }}</h5>
            <h5><b>Date Delivered: </b>{{ date("Y-m-d h:i a", strtotime($d->updated_at)) }}</h5>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
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
                      {{ $d->fullname }}
                    </div>
      
                    <div class="col-lg-6 col-md-6 col-6">
                      <i class="fas fa-phone-alt px-2"></i>
                      <strong>Contact No:</strong>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                      {{ $d->mobile }}
                    </div>
      
                    <div class="col-lg-6 col-md-6 col-6">
                      <i class="fas fa-map-marker-alt px-2"></i>
                      <strong>Address:</strong>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                      {{ $d->address }},{{ $d->city }},{{ $d->province }}
                    </div>
      
                    <div class="col-lg-6 col-md-6 col-6">
                      @if ($d->transaction->paymentmode == 'cod')
                      <i class="fas fa-coins px-2"></i>
                      @else
                      <i class="fas fa-money-check-alt"></i>
                      @endif
                      <strong>Payment Mode:</strong>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                      @if ($d->transaction->paymentmode == 'cod')
                        Cash on Delivery
                      @else
                        Online Payment (Paid)
                      @endif
                    </div>
                  </div>
                </div>
              </article>
              <a href="{{ route('delivery.delivery-details', ['order_id'=>$d->id]) }}" class="btn btn-outline-primary btn-block">Details</a>
            </div>
            {{-- <div class="col-lg-6 col-md-6 col-12">
              <article class="card">
                <div class="card-body">
                  <div class="text-center">
                    <strong>Delivery Items</strong>
                  </div>
                  <hr>
                  <div class="row">
                    @foreach ($d->orderitems as $item)
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
                    <div class="col-4">&#8369;{{ $d->subtotal }}</div>
                    <div class="col-4"><strong>Tax:</strong></div>
                    <div class="col-4"></div>
                    <div class="col-4">&#8369;{{ $d->tax }}</div>
                    <div class="col-4"><strong>Total:</strong></div>
                    <div class="col-4"></div>
                    <div class="col-4"><strong>&#8369;{{ $d->total }}</strong></div>
                  </div>
                </div>
              </article>
            </div> --}}
          </div>
        </div>
      </article>
    @endif
	@endforeach
</div>