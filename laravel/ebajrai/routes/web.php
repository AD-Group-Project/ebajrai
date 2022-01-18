<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\AcceptOrderComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductsComponent;
use App\Http\Livewire\Admin\AdminEditProfilesComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Controllers\AdminAddProduct;
use App\Http\Controllers\AdminEditProduct;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\Payment;
use App\Http\Livewire\AboutShopComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminSalesComponent;
use App\Http\Controllers\AdminUpdateOrder;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;

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

Route::get('/', HomeComponent::class)->name('home1');
Route::get('/cart', CartComponent::class)->name('product.cart');;
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/checkout', [Checkout::class, 'render']);
Route::post('/submitOrder', [Checkout::class, 'submitOrder']);
Route::get('/payment/{id}', [Payment::class, 'paymentPage'])->name('payment');
Route::get('/aboutus', AboutShopComponent::class)->name('aboutshop');
Route::get('/payment/confirmation/{id}', [Payment::class, 'changeStatus'])->name('paymentConfirmation');
Route::get('/acceptOrder', AcceptOrderComponent::class)->name('acceptOrder'); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/admin/about', AdminEditProfilesComponent::class)->name('admin.about');
    Route::get('/admin/dashboard',AdminDashboardComponent::class);
    Route::get('/admin/dashboard', AdminProductsComponent::class)->name('home2');
    Route::get('/admin/editshop', 'App\Http\Controllers\AdminEditShop@editForm');
    Route::post('/editshop', 'App\Http\Controllers\AdminEditShop@editShop');
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/user/editprofile/{id}', 'App\Http\Controllers\UserEditProfile@userEditForm');
    Route::post('/updateprofile', 'App\Http\Controllers\UserEditProfile@updateProfile');
    Route::get('/deleteprofile/{id}', 'App\Http\Controllers\UserEditProfile@deleteProfile');
    Route::get('/admin/addproduct', [AdminEditProduct::class, 'addForm'])->name('admin.add');
    Route::post('/addproduct', [AdminEditProduct::class, 'addProduct'])->name('addproduct');
    Route::get('/admin/editproduct/{id}', [AdminEditProduct::class, 'editForm']);
    Route::post('/editproduct/{id}', [AdminEditProduct::class, 'editProduct']);
    Route::get('/admin/deleteproduct/{slug}', [AdminEditProduct::class, 'deleteProduct']);
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    Route::get('/admin/sales', AdminSalesComponent::class)->name('admin.sales');
    Route::get('/admin/updateorder/{id}', [AdminUpdateOrder::class, 'updateForm']);
    Route::post('/updateorder/{id}', [AdminUpdateOrder::class, 'updateOrder']);
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
});
