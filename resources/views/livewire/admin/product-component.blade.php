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
					<button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenAddProductModal()"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Product</button>
				</div>
      </div>
			<hr>
			<table class="table stable-striped">
				<thead class="bg-dark">
					<tr>
						<th>Name</th>
						<th>Category</th>
						<th>Image</th>
						<th>Description</th>
						<th>Price</th>
						<th>Stock</th>
						<th width="10%">Status</th>
            <th width="12%">Date Added</th>
            <th width="13%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($prod as $p)
						<tr>
							<td>{{ $p->name }}</td>
							<td>{{ $p->category->name }}</td>
							<td>
								<img src="{{ asset('/images/images') }}/{{ $p->image }}" alt="" style="max-width: 50px">
							</td>
							<td>{{ $p->description }}</td>
							<td>{{ $p->price }}</td>
							<td>{{ $p->stock }}</td>
							<td>
                @if ($p->status == "1")
                  <span class="badge badge-success">Active</span>
                @else
                  <span class="badge badge-danger">Inactive</span>
                @endif
              </td>
							<td>{{ date('M d,Y', strtotime($p->created_at)) }}</td>
							<td>
                <button class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View</button>
                <button class="btn btn-sm btn-primary" wire:click="OpenEditProductCategoryModal({{ $p->id }})"><i class="fas fa-edit"></i> Update</button>
              </td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
      <div class="d-flex justify-content-end">
        {!! $prod->links() !!}
      </div>
		</div>
	</div>

	<div class="modal fade" wire:ignore.self id="AddNewProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddNewProductModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="AddNewProductModalLabel">Modal title</h5>
				</div>
				<form enctype="multipart/form-data" wire:submit.prevent="addProduct">
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" class="form-control" placeholder="Enter product name here" wire:model="name">
									<span class="text-danger">@error('name') {{ $message }} @enderror</span>
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
									<input type="text" class="form-control" placeholder="Enter product stock here" wire:model="stock">
									<span class="text-danger">@error('stock') {{ $message }} @enderror</span>
								</div>
								<div class="form-group">
									<label for="">Image</label>
									<input type="file" class="form-control" wire:model="image">
									<span class="text-danger">@error('image') {{ $message }} @enderror</span>
									@if ($image)
										<img src="{{ $image->temporaryUrl() }}" width="120px">
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
</div>
