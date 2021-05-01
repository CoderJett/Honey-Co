<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AdminDashComponent;
use App\Http\Livewire\OrderDashComponent;
use App\Http\Livewire\ProductDashComponent;
use App\Http\Livewire\UserDashComponent;
use App\Http\Livewire\AddProductComponent;
use App\Http\Livewire\EditProductComponent;
use App\Http\Livewire\AdminComponent;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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


//GUEST PAGE

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', function () {
    return view('products-guest');
});

Route::get('guest-HS', function () {
    return view('guest-HS');
});

Route::get('guest-KR', function () {
    return view('guest-KR');
});



//ADMIN HOME PAGE
Route::middleware(['auth:sanctum', 'verified'])->get('admindash', AdminDashComponent::class)->name('admindash');
Route::middleware(['auth:sanctum', 'verified'])->get('orderdash', OrderDashComponent::class);
Route::middleware(['auth:sanctum', 'verified'])->get('productdash', ProductDashComponent::class);
Route::middleware(['auth:sanctum', 'verified'])->get('userdash', UserDashComponent::class);
Route::middleware(['auth:sanctum', 'verified'])->get('adminprof', AdminComponent::class);

//REVISIONS
Route::middleware(['auth:sanctum', 'verified'])->get('addproduct', AddProductComponent::class);
//Route::middleware(['auth:sanctum', 'verified'])->get('editproduct', EditProductComponent::class);

Route::middleware(['auth:sanctum', 'verified'])->get('editproduct/{id}', [EditProductComponent::class, 'edit'])->name('editproduct.edit');
Route::middleware(['auth:sanctum', 'verified'])->get('update', [EditProductComponent::class, 'update'])->name('update');
Route::middleware(['auth:sanctum', 'verified'])->get('saveNewProduct', [AddProductComponent::class, 'saveNewProduct'])->name('saveNewProduct');




//HOME PAGE

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard',  [HomeController::class,'checkUser'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/admindash', function () {
    return view('admindash');
})->name('admindash');


// -----UNDER PRODUCTS CONTROLLER-----
Route::middleware(['auth:sanctum', 'verified'])->get('products/user={id}/keyring-details', [ProductController::class,'Keyring'])->name('keyring-details');

Route::middleware(['auth:sanctum', 'verified'])->get('products/user={id}/highshine-details', [ProductController::class,'Highshine'])->name('highshine-details');

Route::middleware(['auth:sanctum', 'verified'])->get('products/user={id}',  [HomeController::class,'viewProduct'])->name('products');

//CART FUNCTION AND VIEW
Route::middleware(['auth:sanctum', 'verified'])->post('cart', [ProductController::class, 'addToCart'])->name('cart');

Route::middleware(['auth:sanctum', 'verified'])->get('cart/user={id}', [ProductController::class, 'Viewcart'])->name('cart');


Route::middleware(['auth:sanctum', 'verified'])->delete('cart/destroy/{cart_id}', [ProductController::class, 'destroy'])->name('cart.destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('cart/increment/{cart_id}', [ProductController::class, 'increment'])->name('cart.increment');
Route::middleware(['auth:sanctum', 'verified'])->get('cart/decrement/{cart_id}', [ProductController::class, 'decrement'])->name('cart.decrement');

Route::middleware(['auth:sanctum', 'verified'])->get('checkout/addToCheckout', [ProductController::class, 'addToCheckout'])->name('checkout.addToCheckout');

Route::middleware(['auth:sanctum', 'verified'])->get('checkout/submitOrder/{id}', [ProductController::class, 'submitOrder'])->name('checkout.submitOrder');

Route::middleware(['auth:sanctum', 'verified'])->get('addnewshade', [ProductDashComponent::class, 'addnewshade'])->name('addnewshade');



Route::middleware(['auth:sanctum', 'verified'])->get('received', function () {
    return view('received');
})->name('received');


//CART FUNCTION AND VIEW 

// -----UNDER PRODUCTS CONTROLLER-----


