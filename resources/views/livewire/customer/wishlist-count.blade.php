<div>
    <a href="{{ route('customer.wishlist') }}">
        <i class="lni lni-heart"></i>
        <span class="total-items">
            @auth
                {{ Cart::instance('wishlist')->count() }}
            @endauth
            @guest
                0
            @endguest
        </span>
    </a>
</div>
