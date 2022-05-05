<div>
	<div class="card">
		<div class="card-body">
			<div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for product here">
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
			<table class="table table-striped table-bordered table-sm">
				<thead class="bg-dark">
					<tr>
						<th width="15%">Name</th>
						<th width="8%">Category</th>
						<th width="8%">Image</th>
						{{-- <th width="">Description</th> --}}
						<th width="5%">Price</th>
						<th width="5%">Stock</th>
						<th width="8%">Status</th>
            <th width="8%">Date Added</th>
            <th width="13%">Action</th>
					</tr>
				</thead>
				<tbody>
					@if (count($prod) > 0)
						@foreach ($prod as $p)
							<tr>
								<td>{{ $p->name }}</td>
								<td>{{ $p->category->name }}</td>
								<td>
									<img src="{{ asset('/images/images') }}/{{ $p->image }}" alt="" style="max-width: 50px">
								</td>
								{{-- <td>{{ $p->description }}</td> --}}
								<td>&#8369; {{ $p->price }}</td>
								<td>
									@if ($p->stock == '1')
										In stock
									@elseif ($p->stock == '0')
										out of stock
									@endif
								</td>
								<td>
									@if ($p->status == "1")
										<span class="badge badge-success">Active</span>
									@else
										<span class="badge badge-danger">Inactive</span>
									@endif
								</td>
								<td>{{ date('M d,Y', strtotime($p->created_at)) }}</td>
								<td>
									<button class="btn btn-sm btn-success" wire:click="OpenViewProductModal({{ $p->id }})"><i class="fas fa-eye"></i> View</button>
									<button class="btn btn-sm btn-primary" wire:click="OpenEditProductModal({{ $p->id }})"><i class="fas fa-edit"></i> Update</button>
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
			<hr>
      <div class="d-flex justify-content-end">
        {!! $prod->links() !!}
      </div>
		</div>
	</div>

	{{-- Modals --}}

	{{-- Add Modal --}}
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

	{{-- Update Modal --}}
	<div class="modal fade" wire:ignore.self id="OpenEditProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenEditProductModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="OpenEditProductModalLabel">UPDATE PRODUCT</h5>
				</div>
				<form enctype="multipart/form-data" wire:submit.prevent="updateProduct">
					<input type="hidden" wire:model="upd_id">

					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6">
								
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" class="form-control" placeholder="Enter product name here" wire:model="upd_name" wire:keyup="generateEditSlug()">
									<span class="text-danger">@error('upd_name') {{ $message }} @enderror</span>
								</div>

								<div class="form-group">
									{{-- <label for="">Slug</label> --}}
									<input type="hidden" class="form-control" placeholder="Enter product slug" wire:model="upd_slug">
									<span class="text-danger">@error('upd_slug') {{ $message }} @enderror</span>
								</div>

								<div class="form-group">
									<label for="">Category</label>
									<select class="custom-select" class="form-control" wire:model="upd_product_category_id">
										<option selected>--- Select category ---</option>
										@foreach ($prod_cat as $pc)
											@if ($pc->status)
												<option value="{{ $pc->id }}">{{ $pc->name }}</option>
											@endif
										@endforeach
									</select>
									<span class="text-danger">@error('upd_product_category_id') {{ $message }} @enderror</span>
								</div>

								<div class="form-group">
									<label for="">Description</label>
									<textarea cols="30" rows="5" class="form-control" placeholder="Enter product description here" wire:model="upd_description"></textarea>
									<span class="text-danger">@error('upd_description') {{ $message }} @enderror</span>
								</div>
							</div>

							<div class="col-lg-6">

								<div class="form-group">
									<label for="">Price</label>
									<input type="text" class="form-control" placeholder="Enter product price here" wire:model="upd_price">
									<span class="text-danger">@error('upd_price') {{ $message }} @enderror</span>
								</div>

								<div class="form-group">
									<label for="">Stock</label>
									<select  class="custom-select" class="form-control" wire:model="upd_stock">
										<option value="1">In stock</option>
										<option value="0">Out of stock</option>
									</select>
									<span class="text-danger">@error('upd_stock') {{ $message }} @enderror</span>
								</div>

								<div class="form-group">
									<label for="">Status</label>
									<select class="custom-select" wire:model="status">
									  <option value="1">Active</option>
									  <option value="0">Inactive</option>
									</select>
									<span class="text-danger">@error('upd_status') {{ $message }} @enderror</span>
								  </div>

								  <div class="form-group">
									
									<label for="">Image</label>
									<input type="file" class="form-control" wire:model="upd_image">
									  @if ($upd_image)
											<img class="text-center pt-1" src="{{ $upd_image->temporaryUrl() }}" width="100" class="input-file">
									  @else
											<img class="text-center pt-1" src="{{ asset('/images/images') }}/{{ $old_image }}" width="120" alt="">
										@endif
									<span class="text-danger">@error('upd_image') {{ $message }}@enderror</span>
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

	{{-- View Modal --}}
	<div class="modal fade" wire:ignore.self id="OpenViewProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenEditProductModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="OpenEditProductModalLabel">PRODUCT DETAILS</h5>
				</div>
				<form enctype="multipart/form-data" >

					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6">
								
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" disabled class="form-control" placeholder="Enter product name here" wire:model="upd_name" wire:keyup="generateEditSlug()">
								</div>

								<div class="form-group">
									{{-- <label for="">Slug</label> --}}
									<input type="hidden" disabled class="form-control" placeholder="Enter product slug" wire:model="upd_slug">
								</div>

								<div class="form-group">
									<label for="">Category</label>
									<select class="custom-select" disabled class="form-control" wire:model="upd_product_category_id">
										@foreach ($prod_cat as $pc)
											@if ($pc->status)
												<option value="{{ $pc->id }}">{{ $pc->name }}</option>
											@endif
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label for="">Description</label>
									<textarea cols="30" rows="5" disabled class="form-control" placeholder="Enter product description here" wire:model="upd_description"></textarea>
								</div>
							</div>

							<div class="col-lg-6">

								<div class="form-group">
									<label for="">Price</label>
									<input type="text" disabled class="form-control" placeholder="Enter product price here" wire:model="upd_price">
								</div>

								<div class="form-group">
									<label for="">Stock</label>
									<input type="text" disabled class="form-control" placeholder="Enter product stock here" wire:model="upd_stock">
								</div>

								<div class="form-group">
									<label for="">Status</label>
									<select class="custom-select" disabled wire:model="status">
									  <option value="1">Active</option>
									  <option value="0">Inactive</option>
									</select>
								  </div>

								  <div class="form-group">
									<label for="">Image</label>
									<img class="text-center pt-1" disabled src="{{ asset('/images/images') }}/{{ $old_image }}" width="120" alt="">
								</div>

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>
