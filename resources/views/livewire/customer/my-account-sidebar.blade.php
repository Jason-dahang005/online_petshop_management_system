<div>
	<div class="product-sidebar">
		<div class="single-widget">
			<ul class="list">
				<li><a href="{{ route('customer.profile') }}" class="{{  request()->routeIs('customer.profile') ? 'active' : '' }}" aria-label="Toggle navigation">Profile</a></li>
				<li><a href="{{ route('customer.change-password') }}" class="{{  request()->routeIs('customer.change-password') ? 'active' : '' }}"  aria-label="Toggle navigation">Change Password</a></li>
				<li><a href="{{ route('customer.my-order') }}" class="{{  request()->routeIs('customer.my-order') ? 'active' : '' }}"  aria-label="Toggle navigation">My orders</a></li>
				<li><a href="{{ route('customer.order-history') }}" class="{{  request()->routeIs('customer.corder-history') ? 'active' : '' }}" aria-label="Toggle navigation">Order History</a></li>
				<li><a href="{{ route('customer.cancel-order') }}" class="{{  request()->routeIs('customer.cancel-order') ? 'active' : '' }}" aria-label="Toggle navigation">Cancelled Orders</a></li>
				<li><a href="{{ route('customer.wishlist') }}" class="{{  request()->routeIs('customer.wishlist') ? 'active' : '' }}"  aria-label="Toggle navigation">Wishlist</a></li>
			</ul>
		</div>
	</div>
</div>
