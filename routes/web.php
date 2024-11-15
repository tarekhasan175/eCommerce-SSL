<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenAuthenticate;
use App\Models\ProductSlider;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Brand List
Route::get('/brand-list', [BrandController::class,'BrandList'])->name('brand.list');

//Category List
Route::get('/category-list', [CategoryController::class,'CategoryList'])->name('category.list');

//Product List
Route::get('/list-product-by-category/{id}', [ProductController::class,'ListProductByCategory'])->name('product.list.by.category');
Route::get('/list-product-by-brand/{id}', [ProductController::class,'ListProductByBrand'])->name('prduct.list.by.brand');
Route::get('/list-product-by-remark/{remark}', [ProductController::class,'ListProductByRemark'])->name('product.list.by.remark');

//Slider
Route::get('/slider', [ProductController::class,'ListProductSlider'])->name('product.slider');

//Product Details
Route::get('/product-details-by-id/{id}', [ProductController::class,'ProductDetailsById'])->name('product.details');
Route::get('/list-review-by-product/{id}', [ProductController::class,'ListReviewByProduct'])->name('product.list.review');

//Policy
Route::get('/policy-by-type/{type}', [PolicyController::class,'PolicyByType'])->name('policy.by.type');


//User Auth
Route::get('/user-login/{userEmail}', [UserController::class,'UserLogin'])->name('user.login');
Route::get('/verify-user/{userEmail}/{otp}', [UserController::class,'UserVerify'])->name('user.verify');
Route::get('/log-out', [UserController::class,'LogOut'])->name('user.logout');

//Customer Profile
Route::get('/customer-profile', [CustomerController::class,'CustomerProfile'])->middleware([TokenAuthenticate::class])->name('customer.profile');
Route::post('/customer-profile-create', [CustomerController::class,'CustomerProfileCreate'])->middleware([TokenAuthenticate::class])->name('customer.profile.update');

//Product Review
Route::post('/product-review-create', [ProductController::class,'ProductReviewCreate'])->middleware([TokenAuthenticate::class])->name('product.review.create');


//Product Wish list
Route::get('/product-wish-list', [ProductController::class,'ProductWishList'])->middleware([TokenAuthenticate::class])->name('product.wish.list');
Route::get('/product-wish-list-add/{product_id}', [ProductController::class,'CreateWishList'])->middleware([TokenAuthenticate::class])->name('product.wish.list.add');
Route::post('/remove-wish-list/{product_id}', [ProductController::class,'RemoveWishList'])->middleware([TokenAuthenticate::class])->name('product.wish.list.remove');


//Product Cart
Route::post('/product-cart-add', [ProductController::class,'CreateCart'])->middleware([TokenAuthenticate::class])->name('product.cart.add');
Route::get('/product-cart/{product_id}', [ProductController::class,'Cartlist'])->middleware([TokenAuthenticate::class])->name('product.cart');
Route::get('/product-cart-remove/{product_id}', [ProductController::class,'RemoveCart'])->middleware([TokenAuthenticate::class])->name('product.cart.remove');


//Invoice and payment
Route::get('/invoice-create', [InvoiceController::class,'InvoiceCreate'])->middleware([TokenAuthenticate::class])->name('invoice.create');
Route::get('/invoice-list', [InvoiceController::class,'InvoiceList'])->middleware([TokenAuthenticate::class])->name('invoice.list');
Route::get('/invoice-product-list/{invoice_id}', [InvoiceController::class,'InvoiceProductList'])->middleware([TokenAuthenticate::class])->name('invoice.product.list');


//Payment Gateway
Route::post('/payment-success', [InvoiceController::class,'PaymentSuccess']);
Route::post('/payment-cancel', [InvoiceController::class,'PaymentCancel']);
Route::post('/payment-fail', [InvoiceController::class,'PaymentFail']);
