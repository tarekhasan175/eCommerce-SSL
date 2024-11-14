<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
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
Route::get('/slider', [ProductSlider::class,'ListProductSlider'])->name('product.slider');

//Product Details
Route::get('/product-details-by-id/{id}', [ProductController::class,'ProductDetailsById'])->name('product.details');
Route::get('/list-review-by-product/{id}', [ProductController::class,'ListReviewByProduct'])->name('product.list.review');

//Policy
Route::get('/policy-by-type/{type}', [PolicyController::class,'PolicyByType'])->name('policy.by.type');
