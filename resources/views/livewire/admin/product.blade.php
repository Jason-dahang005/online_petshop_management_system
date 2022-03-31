
<div>
	<div class="card">
		<div class="card-body">
			<div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <h2>List of Product</h2>
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
				
						<tr>
							<td></td>
							<td></td>
							<td>
								<img src="" alt="" style="max-width: 50px">
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td>
              
                 
               
              </td>
							<td>
							<td>
              
              </td>
						</tr>
					
				</tbody>
			</table>
			<hr>
      <div class="d-flex justify-content-end">
       
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
									<span class="text-danger"></span>
								</div>
								<div class="form-group">
									<label for="">Category</label>
									<select class="custom-select" class="form-control" wire:model="product_category_id">
										<option selected>--- Select category ---</option>
										
												<option value=""></option>
										
									</select>
									<span class="text-danger"></span>
								</div>
								<div class="form-group">
									<label for="">Description</label>
									<textarea cols="30" rows="5" class="form-control" placeholder="Enter product description here" wire:model="description"></textarea>
									<span class="text-danger"></span>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Price</label>
									<input type="text" class="form-control" placeholder="Enter product price here" wire:model="price">
									<span class="text-danger"></span>
								</div>
								<div class="form-group">
									<label for="">Stock</label>
									<input type="text" class="form-control" placeholder="Enter product stock here" wire:model="stock">
									<span class="text-danger"></span>
								</div>
								<div class="form-group">
									<label for="">Image</label>
									<input type="file" class="form-control" wire:model="image">
									<span class="text-danger"></span>
									
										<img src="" width="120px">
									
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


