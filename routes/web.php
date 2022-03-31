<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Product;
use App\Http\Livewire\Admin\Delivery;
use App\Http\Livewire\Admin\Reservations;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\ProductCategrory;
use App\Http\Livewire\Customer\Home;


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

// CUSTOMER ROUTE
Route::middleware(['auth:sanctum','verified'])->group(function () {
    
});

// ADMIN ROUTE
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/product', Product::class)->name('admin.product');
    Route::get('admin/delivery', Delivery::class)->name('admin.delivery');
    Route::get('admin/reservations', Reservations::class)->name('admin.reservations');
    Route::get('admin/orders', Orders::class)->name('admin.orders');
    Route::get('admin/product-category', ProductCategrory::class)->name('admin.product-category');
});

// DELIVERY ROUTE
Route::middleware(['auth:sanctum','verified'])->group(function () {
    
});