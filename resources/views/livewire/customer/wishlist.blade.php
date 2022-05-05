<div id="main">
	<div class="row">
		@if (Cart::instance('wishlist')->count() > 0)
			@foreach (Cart::instance('wishlist')->content() as $item)
				<div class="col-lg-4 col-md-6 col-12">
					@php
						$witems = Cart::instance('wishlist')->content()->pluck('id');
					@endphp
					<!-- Start Single Product -->
					<div class="single-product">
						<div class="product-image">
							<img src="{{ asset('/images/images') }}/{{ $item->model->image }}" alt="#">
							<div class="button">
								<div class="row">
									<div class="col-6">
										<a href="#" class="btn" wire:click.prevent="store({{ $item->id }}, '{{ $item->name }}', {{ $item->price }})"><i class="lni lni-cart"></i></a>
									</div>
									<div class="col-6">
										@if ($witems->contains($item->id))
											<button class="btn" wire:click.prevent="removeFromWishlist({{ $item->id }})"><i class="lni lni-heart-filled"></i></button>
										@else
											<button class="btn" wire:click.prevent="AddToWishlist({{ $item->id }}, '{{ $item->name }}', {{ $item->price }})"><i class="lni lni-heart"></i></button>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="product-info">
							<span class="category"></span>
							<h4 class="title">
								<a href="product-grids.html">{{ $item->name }}</a>
							</h4>
							<ul class="review">
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star-filled"></i></li>
								<li><i class="lni lni-star"></i></li>
								<li><span>4.0 Review(s)</span></li>
							</ul>
							<div class="price">
								<span>₱{{ $item->price }}</span>
							</div>
						</div>
					</div>
					<!-- End Single Product -->
				</div>
			@endforeach
		@else
			<h3 class="text-center py-5">Wishlist is Empty</h3>
			<div class="text-center button">
				<a href="{{ route('customer.shop') }}" class="btn"><b>GO SHOPPING</b></a>
			</div>
		@endif
	</div>
</div>
