<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;

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

//Route::get('/', function () {
//    return view('welcome');
//});

<<<<<<< Updated upstream
Route::get('/', HomeComponent::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
=======
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/admin/dashboard',AdminDashboardComponent::class);
    Route::get('/admin/dashboard', AdminProductsComponent::class)->name('home2');
    Route::get('/admin/editshop/{id}', [AdminEditShop::class, 'editForm']);
    Route::post('/editshop/{id}', [AdminEditShop::class, 'editShop']);
    Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.editprofile');
    Route::get('/admin/addproduct', [AdminEditProduct::class, 'addForm'])->name('admin.add');
    Route::post('/addproduct', [AdminEditProduct::class, 'addProduct'])->name('addproduct');
    Route::get('/admin/editproduct/{id}', [AdminEditProduct::class, 'editForm']);
    Route::post('/editproduct/{id}', [AdminEditProduct::class, 'editProduct']);
    Route::get('/admin/deleteproduct/{slug}', [AdminEditProduct::class, 'deleteProduct']);
});
>>>>>>> Stashed changes
