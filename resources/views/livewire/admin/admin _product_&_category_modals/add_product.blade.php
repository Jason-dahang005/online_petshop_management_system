<div class="modal fade" wire:ignore.self id="AddNewProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddNewProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewProductModalLabel">ADD NEW PRODUCT</h5>
      </div>
      <form enctype="multipart/form-data" wire:submit.prevent="addProduct">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter product name here" wire:model="name" wire:keyup="generateSlug()">
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                {{-- <label for="">Slug</label> --}}
                <input type="hidden" class="form-control" placeholder="Enter product slug" wire:model="slug">
                <span class="text-danger">@error('slug') {{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="">Category</label>
                <select class="custom-select" class="form-control" wire:model="product_category_id">
                  <option selected>--- Select category ---</option>
                  @foreach ($prod_cat as $pc)
                    @if ($pc->status)
                      <option value="{{ $pc->id }}">{{ $pc->name }}</option>
                    @endif
                  @endforeach
                </select>
                <span class="text-danger">@error('product_category_id') {{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="">Description</label>
                <textarea cols="30" rows="5" class="form-control" placeholder="Enter product description here" wire:model="description"></textarea>
                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
              </div>
            </div>

            <div class="col-lg-6">

              <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" placeholder="Enter product price here" wire:model="price">
                <span class="text-danger">@error('price') {{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="">Stock</label>
                <select  class="custom-select" class="form-control" wire:model="stock">
                  <option value="1">In stock</option>
                  <option value="0">Out of stock</option>
                </select>
                <span class="text-danger">@error('stock') {{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" wire:model="image">
                <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                @if ($image)
                  <img src="{{ $image->temporaryUrl() }}" width="120px" >
                @endif
              </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>