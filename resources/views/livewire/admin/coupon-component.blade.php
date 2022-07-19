<div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for category here">
        </div>
        <div class="col-lg-1 col-md-2 col-sm-12">
          </select>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-12">

        </div>
        <div class="col-lg-2 col-md-3 col-sm-12">
          <button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenCouponModal()"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Coupon</button>
        </div>
      </div>
      <hr>
      <table class="table table-striped table-bordered table-sm">
        <thead class="bg-dark">
          <tr>
            <th>Code</th>
            <th>Type</th>
            <th>Value</th>
            <th>Cart value</th>
            <th>Date Added</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coupon as $c)
            <tr>
              <td>{{ $c->code }}</td>
              <td>{{ $c->type }}</td>
              <td>{{ $c->value }}</td>
              <td>{{ $c->cart_value }}</td>
              <td>{{ date('M d,Y', strtotime($c->created_at)) }}</td>
              <td>
                <button class="btn btn-xs btn-success"><i class="fas fa-eye"></i></button>
                <button class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></button>
              </td>
            </tr>  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" wire:ignore.self id="OpenCouponModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="OpenCouponModalLabel">ADD NEW COUPON</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="AddCoupon">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Coupon code</label>
              <input type="text" class="form-control" wire:model="code">
              <span class="text-danger">@error('code') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Coupon type</label>
              <select class="custom-select" wire:model="type">
                <option selected>Select coupon type</option>
                <option value="fixed">Fixed</option>
                <option value="percent">Percent</option>
              </select>
              <span class="text-danger">@error('type') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Coupon value</label>
              <input type="text" class="form-control" wire:model="value">
              <span class="text-danger">@error('value') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <label for="">Cart value</label>
              <input type="text" class="form-control" wire:model="cart_value">
              <span class="text-danger">@error('cart_value') {{ $message }} @enderror</span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
