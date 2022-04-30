<div>
	<div class="card">
		<div class="card-body">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Year</th>
						<th>Week</th>
						<th>Total Weekly Orders</th>
						<th>Weekly Sales</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach ($ws as $s)
							<tr>
								<td>{{ $s->year }}</td>
							</tr>							
						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
