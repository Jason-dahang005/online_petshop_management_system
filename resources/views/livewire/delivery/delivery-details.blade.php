<div>
  {{-- @foreach ($orders as $d)
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
  @endforeach --}}
  <article class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <div class="text-center">
          <strong class="h4">Delivery Items</strong>
        </div>
        <a href="{{ route('delivery.delivery-history') }}">Back</a>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($orders->orderitems as $item)
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
        <div class="col-4">&#8369;{{ $orders->subtotal }}</div>
        <div class="col-4"><strong>Tax:</strong></div>
        <div class="col-4"></div>
        <div class="col-4">&#8369;{{ $orders->tax }}</div>
        <div class="col-4"><strong>Total:</strong></div>
        <div class="col-4"></div>
        <div class="col-4"><strong>&#8369;{{ $orders->total }}</strong></div>
      </div>
    </div>
  </article>
</div>
