<div>
    <a href="
        @guest{{ route('login') }}@endguest
        @auth{{ route('customer.shopping-cart') }} @endauth" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">
            @auth
                {{ Cart::instance('cart')->count() }}
            @endauth
            @guest
                0
            @endguest
        </span>
    </a>
    @auth
        {{-- <!-- Shopping Item -->
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <span></span>
                <a href="{{ route('customer.shopping-cart') }}">View Cart</a>
            </div>
            <ul class="shopping-list">
                <li>
                    <h6 class="text-center">Cart is empty</h6>
                    <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="product-details.html"><img src="assets/images/header/cart-items/item1.jpg" alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="product-details.html">Apple Watch Series 6</a></h4>
                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="product-details.html"><img src="assets/images/header/cart-items/item2.jpg" alt="#"></a>
                    </div>
                    <div class="content">
                        <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                    </div>
                </li>
            </ul>
            <div class="bottom">
                <div class="total">
                    <span>Total</span>
                    <span class="total-amount">0</span>
                </div>
                <div class="button">
                    <a href="checkout.html" class="btn animate">Checkout</a>
                </div>
            </div>
        </div>
        <!--/ End Shopping Item --> --}}
    @endauth
</div>
