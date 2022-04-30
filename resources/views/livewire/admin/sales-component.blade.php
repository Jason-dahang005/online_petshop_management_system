<div>
	<div class="card">
		<div class="card-body">
			<table class="table table-striped table-bordered">
				<thead class="bg-dark">
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
								<td>&#8369;&nbsp;{{ number_format($s->total, 2) }}</td>
							</tr>							
						@endforeach
					</tr>
				</tbody>
				<tfoot>
					<th colspan="3" class="text-right bg-dark">Total Sales</th>
					<td>
						&#8369;&nbsp;{{ number_format($sales, 2) }}
					</td>
				</tfoot>
			</table>
		</div>
	</div>
</div>
