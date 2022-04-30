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
								<td>{{ $s->week }}</td>
								<td>{{ $s->quantity }}</td>
								<td>{{ $s->total }}</td>
							</tr>							
						@endforeach
					</tr>
				</tbody>
				<tfoot>
					<th colspan="3" class="text-right">Total Sales</th>
					<td>
							{{ $sales }}
					</td>
				</tfoot>
			</table>
		</div>
	</div>
</div>
