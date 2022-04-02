<?php

use Illuminate\Support\Facades\Route;

// ADMIN LIVEWIRE COMPONENTS
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\Admin\DeliveryComponent;
use App\Http\Livewire\Admin\Reservations;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\ProductCategoryComponent;
use App\Http\Livewire\Admin\User;
use App\Http\Livewire\Admin\GoldfishComponent;


// CUSTOMER LIVEWIRE COMPONENTS
use App\Http\Livewire\Customer\Home;
use App\Http\Livewire\Customer\Shop;
use App\Http\Livewire\Customer\AboutUs;
use App\Http\Livewire\Customer\ContactUs;


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

// CUSTOMER ROUTE COMPONENTS
Route::middleware(['auth:sanctum','verified'])->group(function () {
    
});

// ADMIN ROUTE COMPONENTS
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/product-component', ProductComponent::class)->name('admin.product-component');
    Route::get('admin/delivery-component', DeliveryComponent::class)->name('admin.delivery-component');
    Route::get('admin/reservations', Reservations::class)->name('admin.reservations');
    Route::get('admin/orders', Orders::class)->name('admin.orders');
    Route::get('admin/product-category-component', ProductCategoryComponent::class)->name('admin.product-category-component');
    Route::get('admin/users', User::class)->name('admin.users');
    Route::get('admin/goldfish-component', GoldfishComponent::class)->name('admin.goldfish-component');
});

// DELIVERY ROUTE COMPONENTS
Route::middleware(['auth:sanctum','verified'])->group(function () {
    
});