<div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-12">
					<input wire:model.debounce.300ms="search" type="text" class="form-control form-control-sm" placeholder="Search for slider here">
				</div>
				<div class="col-lg-5 col-md-8">

				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<button type="button" class="btn btn-primary btn-sm btn-block h-100" wire:click="OpenHomeSliderModal()"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Home Slider</button>
				</div>
			</div>
			<hr>
			<table class="table table-striped table-bordered table-sm" id="home_slider_table">
				<thead class="bg-dark">
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th>Subtitle</th>
						<th>Price</th>
						<th>Link</th>
						<th>Status</th>
						<th>Date Added</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($slider as $s)
						<tr>
							<td>
								<img src="{{ asset('/images/sliders') }}/{{ $s->image }}" style="max-width: 50px" alt="" srcset="">
							</td>
							<td>{{ $s->title }}</td>
							<td>{{ $s->subtitle }}</td>
							<td>{{ $s->price }}</td>
							<td>{{ $s->link }}</td>
							<td>
								@if ($s->status == 0)
									<span class="badge badge-danger">Inactive</span>
								@else
									<span class="badge badge-success">Active</span>
								@endif
							</td>
							<td>{{ date('M d,Y', strtotime($s->created_at)) }}</td>
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

	<div class="modal fade OpenHomeSliderModal" wire:ignore.self id="OpenHomeSliderModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="OpenHomeSliderModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="OpenHomeSliderModalLabel">ADD NEW HOME SLIDER</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form wire:submit.prevent="AddSlide" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="">Title</label>
							<input type="text" class="form-control" wire:model="title">
						</div>
						<div class="form-group">
							<label for="">Subtitle</label>
							<input type="text" class="form-control" wire:model="subtitle">
						</div>
						<div class="form-group">
							<label for="">Price</label>
							<input type="text" class="form-control" wire:model="price">
						</div>
						<div class="form-group">
							<label for="">Link</label>
							<input type="text" class="form-control" wire:model="link">
						</div>
						<div class="form-group">
							<label for="">Image</label>
							<input type="file" class="form-control" wire:model="image">
							@if ($image)
								<img src="{{ $image->temporaryUrl() }}" width="120">
							@endif
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-sm btn-success">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</div>
