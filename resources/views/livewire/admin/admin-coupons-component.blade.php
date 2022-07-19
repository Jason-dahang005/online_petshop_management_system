<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12">

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
        <div class="col-lg-2 col-md-3 col-sm-12">
          <button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenAddCouponModal()"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Coupon</button>
        </div>
      </div>
      <hr>
      <table class="table table-striped table-bordered table-sm" id="product_category_table">
        <colgroup>
          <col width="10%">
          <col width="10%">
          <col width="10%">
          <col width="10%">
          <col width="10%">
          <col width="10%">
        </colgroup>
        <thead class="bg-dark">
          <tr>
            <th>Code</th>
            <th>Type</th>
            <th>Value</th>
            <th>Cart Value</th>
            <th>Date Added</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @if (count($coupons) > 0)
            @foreach ($coupons as $coupon)
              <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->type }}/td>
                <td>{{ $coupon->value }}</td>
                <td>{{ $coupon->cart_value }}</td>
                <td>
                  <button class="btn btn-sm btn-primary" ><i class="fas fa-edit"></i>Edit</button>
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

{{-- STORE COUPON --}}
  <div class="modal fade" wire:ignore.self id="OpenAddCouponModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenAddCouponModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="OpenAddCouponModalLabel">ADD NEW COUPON</h5>
        </div>
        <form wire:submit.prevent="store">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Coupon Code</label>
              <input type="text" class="form-control" placeholder="Enter coupon code" wire:model="code" >
              <span class="text-danger">@error('code') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
                <label for="">Coupon Type</label>
                <select class="custom-select" wire:model="type">
                  <option value="fixed">Fixed</option>
                  <option value="percent">Percent</option>
                </select>
                <span class="text-danger">@error('type') {{ $message }} @enderror</span>
              </div>

            <div class="form-group">
              <label for="">Coupon Value</label>
              <textarea class="form-control" placeholder="Enter value" wire:model="value"></textarea>
              <span class="text-danger">@error('value') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
                <label for="">Cart Value</label>
                <textarea class="form-control" placeholder="Enter cart value" wire:model="cart_value"></textarea>
                <span class="text-danger">@error('cart_value') {{ $message }} @enderror</span>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Submit</button>
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
