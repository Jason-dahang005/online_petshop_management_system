<div>
    <div class="navbar-search search-style-5">
        <form  class="navbar-search-form" action="{{ route('customer.search') }}">
            <div class="search-input">
                <input type="text" placeholder="Search" value="{{ $search }}">
            </div>
            <div class="search-btn">
                <button type="submit"><i class="lni lni-search-alt"></i></button>
            </div>
            <input type="hidden" name="product_cat" value="{{ $product_cat }}">
            <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}">
        </form>
    </div>
</div>