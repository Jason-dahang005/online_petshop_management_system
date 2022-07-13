<div>
	{{-- <div class="card">
		<div class="card-body">
			<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Date Registered</th>
							<th width="10%">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ date('M d,Y', strtotime($user->created_at)) }}</td>
								<td>
									<button class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View details</button>
								</td>
							</tr>
						@endforeach
					</tbody>
			</table>
		</div>
	</div> --}}

	<div class="card">
		<div class="card-body">
			<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Customers</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Delivery</a>
				</li>
			</ul>
			<div class="tab-content" id="custom-content-below-tabContent">
				<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
					<table class="table table-striped table-bordered table-sm">
						<thead>
							<tr>
								<th>Customer name</th>
								<th>Email</th>
								<th>Date Registered</th>
								<th width="10%">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($customer as $users)
								<tr>
									<td>{{ $users->name }}</td>
									<td>{{ $users->email }}</td>
									<td>{{ date('M d,Y', strtotime($users->created_at)) }}</td>
									<td>
										<button class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View details</button>
									</td>
								</tr>
							@endforeach
						</tbody>
				</table>
				</div>
				<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
					<table class="table table-striped table-bordered table-sm">
						<thead>
							<tr>
								<th>Delivery name</th>
								<th>Email</th>
								<th>Date Registered</th>
								<th width="10%">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($delivery as $user)
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ date('M d,Y', strtotime($user->created_at)) }}</td>
									<td>
										<button class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View details</button>
									</td>
								</tr>
							@endforeach
						</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
