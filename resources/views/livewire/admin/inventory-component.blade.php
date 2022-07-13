<div>
	<div class="card">
		<div class="card-body">
			<div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12">
          <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search for product here">
        </div>
      </div>
			<hr>
			<table class="table table-striped table-sm table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Stock</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($product as $p)
						<tr>
							<td>{{ $p->name }}</td>
							<td>{{ $p->stock }}	</td>
							<td>&#8369; {{ $p->price }}.00</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
