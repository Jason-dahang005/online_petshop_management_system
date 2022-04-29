<div>
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $delivery_list }}</h3>
          <p>
            @if ($delivery_list == 0)
              No Delivery For Today
            @else
              Delivery List
            @endif
          </p>
        </div>
        <div class="icon">
          <i class="fas fa-truck-loading"></i>
        </div>
        <a href="{{ route('delivery.delivery-list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $orders }}</h3>
          <p>Delivery History</p>
        </div>
        <div class="icon">
          <i class="fas fa-history"></i>
        </div>
        <a href="{{ route('delivery.delivery-history') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
