<div id="main">
    <!-- Start Product Grids -->
    <div class="row">
        @if (Cart::instance('wishlist')->count() > 0)
            @foreach (Cart::instance('wishlist')->content() as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="{{ asset('/images/images') }}/{{ $item->model->image }}" alt="#" style="max-width: 335px; max-height: 335px">
                            <div class="button">
                                <a href="{{ route('product.product-details', ['slug'=>$item->model->slug]) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category"></span>
                            <h4 class="title">
                                <a href="product-grids.html">{{ $item->model->name }}</a>
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
                                <span>₱{{ $item->model->price }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            @endforeach
        @else
            <h3 class="text-center py-5">Wishlist is Empty</h3>
        @endif
    </div>
</div>
