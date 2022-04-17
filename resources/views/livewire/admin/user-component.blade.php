<div>
	<div class="card">
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
	</div>
</div>
