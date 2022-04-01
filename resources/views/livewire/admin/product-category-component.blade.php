<div>
    <div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 col-md-3 col-sm-12">
                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for product category here">
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
                <button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenProductCategoryModal()"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Product Category</button>
              </div>
            </div>
            <hr>
            <table class="table table-striped" id="product_category_table">
              <thead class="bg-dark">
                <tr>
                  <th width="20%">Name</th>
									<th width="20%">Slug</th>
                  <th width="30%">Description</th>
                  <th width="7%">Status</th>
                  <th width="10%">Date Added</th>
                  <th width="13%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prod_cat as $pc)
                  <tr>
                    <td>{{ $pc->name }}</td>
										<td>{{ $pc->slug }}</td>
                    <td>{{ $pc->description }}</td>
                    <td>
                      @if ($pc->status == "1")
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </td>
                    <td>{{ date('M d,Y', strtotime($pc->created_at)) }}</td>
                    <td>
                      <button class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View</button>
                      <button class="btn btn-sm btn-primary" wire:click="OpenEditProductCategoryModal({{ $pc->id }})"><i class="fas fa-edit"></i> Update</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <hr>
            <div class="d-flex justify-content-end">
              {!! $prod_cat->links() !!}
            </div>
          </div>
        </div>
      
        <div class="modal fade" wire:ignore.self id="OpenProductCategoryModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenProductCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="OpenProductCategoryModalLabel">Palihog ko add Product</h5>
              </div>
              <form wire:submit.prevent="store">
                <div class="modal-body">

                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="Enter product category name" wire:model="name" wire:keyup="generateSlug()">
                    <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" placeholder="Enter product category slug" wire:model="slug">
                    <span class="text-danger">@error('slug') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" placeholder="Enter product category description" cols="30" rows="4" wire:model="description"></textarea>
                    <span class="text-danger">@error('description') {{ $message }} @enderror</span>
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
      
        <div class="modal fade" wire:ignore.self id="OpenEditProductCategoryModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenProductCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="OpenProductCategoryModalLabel">PAG ADD OG PRODUCT YOU MF!</h5>
              </div>
              <form wire:submit.prevent="update">
                <input type="hidden" wire:model="upd_id">
                <div class="modal-body">

                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="Enter product category here" wire:model="upd_name" wire:keyup="generateEditSlug()">
                    <span class="text-danger">@error('upd_name') {{ $message }} @enderror</span>
                  </div>

									<div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" placeholder="Enter product category slug" wire:model="upd_slug">
                    <span class="text-danger">@error('upd_slug') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" placeholder="Enter product category here" cols="30" rows="4" wire:model="upd_description"></textarea>
                    <span class="text-danger">@error('upd_description') {{ $message }} @enderror</span>
                  </div>

                  <div class="form-group">
                    <label for="">Status</label>
                    <select class="custom-select" wire:model="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    <span class="text-danger">@error('upd_status') {{ $message }} @enderror</span>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-success">Update</button>
                  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
</div>
