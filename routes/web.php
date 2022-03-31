<?php

use Illuminate\Support\Facades\Route;

// ADMIN LIVEWIRE
use App\Http\Livewire\Admin\Dashboard;


// CUSTOMER LIVEWIRE
use App\Http\Livewire\Customer\Home;
use App\Http\Livewire\Customer\Shop;
use App\Http\Livewire\Customer\Goldfish;
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
Route::get('customer/goldfish', Goldfish::class)->name('customer.goldfish');
Route::get('customer/about-us', AboutUs::class)->name('customer.about-us');
Route::get('customer/contact-us', ContactUs::class)->name('customer.contact-us');

// CUSTOMER ROUTE
Route::middleware(['auth:sanctum','verified'])->group(function () {
    
});

// ADMIN ROUTE
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::get('admin/dashboard', DAshboard::class)->name('admin.dashboard');
});

// DELIVERY ROUTE
Route::middleware(['auth:sanctum','verified'])->group(function () {
    
});