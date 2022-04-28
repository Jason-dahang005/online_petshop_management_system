<div>
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-end">
				<a href="{{ route('delivery.main') }}"><i class="fas fa-arrow-left"></i> Back</a>
			</div>
			<hr>
			<article class="card">
        <div class="card-body">
						@foreach ($orders->orderitems as $item)
							<li class="col-md-4">
								<figure class="itemside mb-3">
									<div class="aside">
										<img src="{{ asset('/images/images') }}/{{ $item->product->image }}" class="img-sm border" alt="Product image here">
									</div>
									<figcaption class="info align-self-center">
										<p class="title">{{ $item->product->name }}</p>
										<span class="text-muted">{{ $item->price }}</span>
										<p class="text-muted">x{{ $item->quantity }}</p>
									</figcaption>
								</figure>
							</li>
						@endforeach
        </div>
    	</article>
		</div>
	</div>
</div>
