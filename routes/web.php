<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StoreController,CartController,CheckoutController};
use App\Http\Controllers\Admin\{AuthController,DashboardController,ProductController,CategoryController,OrderController};

Route::get('/',[StoreController::class,'home'])->name('home');
Route::get('/products',[StoreController::class,'products'])->name('products');
Route::get('/products/{product}',[StoreController::class,'show'])->name('products.show');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::post('/cart/add/{product}',[CartController::class,'add'])->name('cart.add');
Route::post('/cart/update/{product}',[CartController::class,'update'])->name('cart.update');
Route::post('/cart/remove/{product}',[CartController::class,'remove'])->name('cart.remove');
Route::get('/checkout',[CheckoutController::class,'create'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');
Route::get('/orders/{order}/success',[CheckoutController::class,'success'])->name('orders.success');

Route::prefix('admin')->name('admin.')->group(function(){
 Route::get('/login',[AuthController::class,'showLogin'])->name('login');
 Route::post('/login',[AuthController::class,'login'])->name('login.submit');
 Route::post('/logout',[AuthController::class,'logout'])->name('logout');
 Route::middleware('auth')->group(function(){
  Route::get('/',[DashboardController::class,'index'])->name('dashboard');
  Route::resource('products',ProductController::class)->except(['show']);
  Route::resource('categories',CategoryController::class)->except(['show']);
  Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
  Route::get('/orders/{order}',[OrderController::class,'show'])->name('orders.show');
  Route::patch('/orders/{order}/status',[OrderController::class,'updateStatus'])->name('orders.status');
 });
});
