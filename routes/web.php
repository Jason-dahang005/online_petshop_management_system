<?php

use Illuminate\Support\Facades\Route;

// ADMIN LIVEWIRE COMPONENTS
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\Admin\DeliveryComponent;
use App\Http\Livewire\Admin\Reservations;
use App\Http\Livewire\Admin\OrderComponent;
use App\Http\Livewire\Admin\ProductCategoryComponent;
use App\Http\Livewire\Admin\User;
use App\Http\Livewire\Admin\UserComponent;
use App\Http\Livewire\Admin\GoldfishComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\InventoryComponent;
use App\Http\Livewire\Admin\SalesComponent;
use App\http\Livewire\Admin\OrderDetailComponent;
use App\Http\Livewire\Admin\AdminProfile;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;

// CUSTOMER LIVEWIRE COMPONENTS
use App\Http\Livewire\Customer\Home;
use App\Http\Livewire\Customer\Shop;
use App\Http\Livewire\Customer\AboutUs;
use App\Http\Livewire\Customer\Goldfish;
use App\Http\Livewire\Customer\ContactUs;
use App\Http\Livewire\Customer\ProductDetails;
use App\Http\Livewire\Customer\ShoppingCart;
use App\Http\Livewire\Customer\Category;
use App\Http\Livewire\Customer\Search;
use App\Http\Livewire\Customer\Wishlist;
use App\Http\Livewire\Customer\Checkout;
use App\Http\Livewire\Customer\Thankyou;
use App\Http\Livewire\Customer\OrderHistory;
use App\Http\Livewire\Customer\CancelOrder;

use App\Http\Livewire\Customer\MyOrder;
use App\Http\Livewire\Customer\Profile;
use App\Http\Livewire\Customer\UserChangePassword;


// DELIVERY LIVEWIRE COMPONENTS
use App\Http\Livewire\Delivery\Main;
use App\Http\Livewire\Delivery\DeliveryHistory;
use App\http\Livewire\Delivery\CustomerOrderDetailComponent;
use App\Http\Livewire\Delivery\DeliveryList;
use App\Http\Livewire\Delivery\DeliveryProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/', Home::class)->name('/');
Route::get('customer/shop', Shop::class)->name('customer.shop');
Route::get('customer/about-us', AboutUs::class)->name('customer.about-us');
Route::get('customer/contact-us', ContactUs::class)->name('customer.contact-us');
Route::get('customer/goldfish', Goldfish::class)->name('customer.goldfish');
Route::get('customer/product/{slug}', ProductDetails::class)->name('product.product-details');
Route::get('customer/category/{category_slug}', Category::class)->name('customer.category');
Route::get('customer/search', Search::class)->name('customer.search');
Route::get('customer/thankyou', Thankyou::class)->name('customer.thankyou');
Route::get('customer/order-history', OrderHistory::class)->name('customer.order-history');



// CUSTOMER ROUTE COMPONENTS
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('customer/shopping-cart', ShoppingCart::class)->name('customer.shopping-cart');
    Route::get('customer/wishlist', Wishlist::class)->name('customer.wishlist');
    Route::get('customer/checkout', Checkout::class)->name('customer.checkout');
    Route::get('customer/my-order', MyOrder::class)->name('customer.my-order');
    Route::get('customer/profile', Profile::class)->name('customer.profile');
    Route::get('customer/wishlist', Wishlist::class)->name('customer.wishlist');
    Route::get('customer/change-password', UserChangePassword::class)->name('customer.change-password');
    Route::get('customer/cancel-order', CancelOrder::class)->name('customer.cancel-order');
});

// ADMIN ROUTE COMPONENTS
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/product-component', ProductComponent::class)->name('admin.product-component');
    Route::get('admin/delivery-component', DeliveryComponent::class)->name('admin.delivery-component');
    Route::get('admin/reservations', Reservations::class)->name('admin.reservations');
    Route::get('admin/order-component', OrderComponent::class)->name('admin.order-component');
    Route::get('admin/product-category-component', ProductCategoryComponent::class)->name('admin.product-category-component');
    Route::get('admin/users', User::class)->name('admin.users');
    Route::get('admin/user-component', UserComponent::class)->name('admin.user-component');
    Route::get('admin/goldfish-component', GoldfishComponent::class)->name('admin.goldfish-component');
    Route::get('admin/contact-component', AdminContactComponent::class)->name('admin.contact-component');
    Route::get('admin/inventory-component', InventoryComponent::class)->name('admin.inventory-component');
    Route::get('admin/sales-component', SalesComponent::class)->name('admin.sales-component');
    Route::get('admin/order/{order_id}', OrderDetailComponent::class)->name('admin.order-detail-component');
    Route::get('admin/admin-profile', AdminProfile::class)->name('admin.admin-profile');
    Route::get('admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    
});

// DELIVERY ROUTE COMPONENTS
Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('delivery/main', Main::class)->name('delivery.main');
    Route::get('delivery/delivery-history', DeliveryHistory::class)->name('delivery.delivery-history');
    Route::get('delivery/order/{order_id}', CustomerOrderDetailComponent::class)->name('delivery.customer-order-detail-component');
    Route::get('delivery/delivery-list', DeliveryList::class)->name('delivery.delivery-list');
    Route::get('delivery/delivery-profile',DeliveryProfile::class)->name('delivery.delivery-profile');

});