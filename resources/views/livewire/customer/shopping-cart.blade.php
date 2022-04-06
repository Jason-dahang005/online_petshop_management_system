<div>
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            @if (Session::has('AddToCart'))
								<div class="alert alert-success">
									{{ Session::get('AddToCart') }}
								</div>
							@endif
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th width="15%">Quantity</th>
                                <th width="20%">Unit Price</th>
                                <th>Subtotal</th>
                                <th>Action<th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/images/images') }}/{{ $item->model->image }}" alt="#" style="max-width: 70px; max-height: 50px">
                                    </td>
                                    <td>{{ $item->model->name }}</td>
                                    <td>
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
                                    </td>
                                    <td>₱{{ $item->model->price }}.00</td>
                                    <td>₱{{ Cart::instance('cart')->subtotal() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="lni lni-trash-can"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Cart List Title -->
                <!-- Cart Single List list -->
                <!-- End Single List list -->
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Subtotal<span>₱{{ Cart::instance('cart')->subtotal() }}</span></li>
                                        <li>Tax<span>₱{{ Cart::instance('cart')->tax() }}</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li class="last">You Pay<span>₱{{ Cart::instance('cart')->total() }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="checkout.html" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
</div>
