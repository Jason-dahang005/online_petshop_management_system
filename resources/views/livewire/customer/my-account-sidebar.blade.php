<div>
	<div class="product-sidebar">
		<div class="single-widget">
			<h3>All Categories</h3>
			<ul class="list">
				<li><a href="{{ route('customer.profile') }}" class="{{  request()->routeIs('customer.profile') ? 'active' : '' }}" aria-label="Toggle navigation">Profile</a></li>
				<li><a href="{{ route('customer.change-password') }}" class="{{  request()->routeIs('customer.change-password') ? 'active' : '' }}"  aria-label="Toggle navigation">Change Password</a></li>
				<li><a href="{{ route('customer.my-order') }}" class="{{  request()->routeIs('customer.my-order') ? 'active' : '' }}"  aria-label="Toggle navigation">My orders</a></li>
				<li><a href="{{ route('customer.wishlist') }}" class="{{  request()->routeIs('customer.wishlist') ? 'active' : '' }}"  aria-label="Toggle navigation">Wishlist</a></li>
			</ul>
		</div>
	</div>
</div>
