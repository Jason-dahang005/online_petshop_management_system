<div>
    @if (Cart::content()->count() > 0)
        <!-- Shopping Cart -->
        <div class="shopping-cart section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-list-head">
                            <!-- Cart List Title -->
                            <div class="cart-list-title">
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-12">
        
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-12">
                                        <p>Product Name</p>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-12">
                                        <p class="text-center">Quantity</p>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-12">
        
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <p>Unit Price</p>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-12">
                                        <p>Remove</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Cart List Title -->
                            <!-- Cart Single List list -->
                            @foreach (Cart::instance('cart')->content() as $item)
                            <div class="cart-single-list">
                                <div class="row align-items-center">
                                    <div class="col-lg-1 col-md-1 col-12">
                                        <a href="product-details.html">
                                            <img src="{{ asset('/images/images') }}/{{ $item->model->image }}" alt="#">
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-12">
                                        <h5 class="product-name">
                                            <a href="product-details.html">{{ $item->model->name }}</a>
                                            </h5>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-12">
                                        <div class="count-input">
                                            <div class="count-input">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <a href="#" class="btn btn-increase" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i class="lni lni-circle-minus"></i></a>
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{ $item->qty }}" class="form-control quantity text-center" min="1">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <a href="#" class="btn btn-reduce" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i class="lni lni-circle-plus"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-12">
        
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <p>&#8369; {{ $item->model->price }}.00</p>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-12">
                                        <button type="button" class="btn btn-danger" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="lni lni-trash-can"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="right">
                                <ul>
                                    <li><h5 class="title">Order Summary</h5></li>
                                    <hr>
                                    <li>Subtotal<span>&#8369; {{ Cart::instance('cart')->subtotal() }}</span></li>
                                    <li>Tax<span>&#8369; {{ Cart::instance('cart')->tax() }}</span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li class="last">You Pay<span>&#8369; {{ Cart::instance('cart')->total() }}</span></li>
                                </ul>
                                <div class="button">
                                    <a href="#" class="btn" wire:click.prevent="checkout">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            </div>
        </div>
    <!--/ End Shopping Cart -->
    @else
        <div style="margin-top: 1.5in; margin-bottom: 2in;" class="text-center">
            <p>There are no items in this cart</p>
            <p class="py-3">
                <a href="{{ route('customer.shop') }}" class="btn btn-outline-primary btn-lg btn-flat">CONTINUE SHOPPING</a>
            </p>
        </div>
    @endif
</div>
