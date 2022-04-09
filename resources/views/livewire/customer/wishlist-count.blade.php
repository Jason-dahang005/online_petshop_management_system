<div>
    <a href="{{ route('customer.wishlist') }}">
        <i class="lni lni-heart"></i>
        <span class="total-items">{{ Cart::instance('wishlist')->count() }} </span>
    </a>
</div>
