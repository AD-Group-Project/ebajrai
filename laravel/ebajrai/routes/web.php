<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductsComponent;
use App\Http\Livewire\User\UserProfileComponent;

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

Route::get('/cart', CartComponent::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/admin/dashboard',AdminDashboardComponent::class);
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
});

Route::get('/admin/dashboard', AdminProductsComponent::class)->name('home2');
