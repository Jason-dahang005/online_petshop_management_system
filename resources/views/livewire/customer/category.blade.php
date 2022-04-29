<div id="main">
	<!-- Start Product Grids -->
	<section class="product-grids section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<!-- Start Product Sidebar -->
					<div class="product-sidebar">
						<!-- Start Single Widget -->
						<div class="single-widget">
							<h3>All Categories</h3>
							<ul class="list">
								@foreach ($product_category as $pc)
									@if ($pc->status)
										<li>
											<a href="{{ route('customer.category', ['category_slug'=>$pc->slug]) }}">{{ $pc->name }}</a><span></span>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>
					<!-- End Product Sidebar -->
				</div>
				<div class="col-lg-9 col-12">
					<div class="product-grids-head">
						<div class="product-grid-topbar">
							<div class="row align-items-center">
								<div class="col-lg-7 col-md-8 col-12">
									<div class="product-sorting">
										<label for="sorting">Sort by:</label>
										<select class="form-control" id="sorting" wire:model="sorting">
											<option value="default">Default sorting</option>
											<option value="date">New Products</option>
											<option value="price">Price Low to High</option>
										</select>
										<h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
									</div>
								</div>
								<div class="col-lg-5 col-md-4 col-12">
									<nav>
										<div class="nav nav-tabs" id="nav-tab" role="tablist">
											<button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
											<button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
										</div>
									</nav>
								</div>
							</div>
						</div>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
								<div class="row">
									@foreach ($products as $p)
										<div class="col-lg-4 col-md-6 col-12">
											@php
												$witems = Cart::instance('wishlist')->content()->pluck('id');
											@endphp
											<!-- Start Single Product -->
											<div class="single-product">
												<div class="product-image">
													<img src="{{ asset('/images/images') }}/{{ $p->image }}" alt="#">
													<div class="button">
														<div class="row">
															<div class="col-4">
																<a href="{{ route('product.product-details', ['slug'=>$p->slug]) }}" class="btn"><i class="lni lni-eye"></i></a>
															</div>
															<div class="col-4">
																<a href="#" class="btn" wire:click.prevent="store({{ $p->id }}, '{{ $p->name }}', {{ $p->price }})"><i class="lni lni-cart"></i></a>
															</div>
															<div class="col-4">
																@if ($witems->contains($p->id))
																	<button class="btn" wire:click.prevent="removeFromWishlist({{ $p->id }})"><i class="lni lni-heart-filled"></i></button>
																@else
																	<button class="btn" wire:click.prevent="AddToWishlist({{ $p->id }}, '{{ $p->name }}', {{ $p->price }})"><i class="lni lni-heart"></i></button>
																@endif
															</div>
														</div>
													</div>
												</div>
												<div class="product-info">
													<span class="category"></span>
													<h4 class="title">
														<a href="product-grids.html">{{ $p->name }}</a>
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
														<span>₱{{ $p->price }}</span>
													</div>
												</div>
											</div>
											<!-- End Single Product -->
										</div>
									@endforeach
								</div>
								<div class="row">
									<div class="col-12">
										<!-- Pagination -->
										<div class="pagination left">
											<ul class="pagination-list">
												<li><a href="javascript:void(0)">1</a></li>
												<li class="active"><a href="javascript:void(0)">2</a></li>
												<li><a href="javascript:void(0)">3</a></li>
												<li><a href="javascript:void(0)">4</a></li>
												<li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
											</ul>
										</div>
										<!--/ End Pagination -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Product Grids -->
</div>
