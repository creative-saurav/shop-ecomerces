<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'isAdmin'])->prefix('backend')->as('admin.')->group(function () {

   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   //Product Category
   Route::get('/category', [CategoryController::class, 'category'])->name('category');
   Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
   Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
   Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
   Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
   Route::get('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Brand
   Route::get('/brand', [BrandController::class, 'brand'])->name('brand');
   Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
   Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
   Route::get('/brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
   Route::put('/brand/{brand}', [BrandController::class, 'update'])->name('brand.update');
   Route::get('/brand/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');

   //Product
   Route::get('/product', [ProductController::class, 'index'])->name('product.index');
   Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
   Route::post('/product', [ProductController::class, 'store'])->name('product.store');
   Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
   Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
   Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
   Route::get('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');

   //Attribute
   Route::get('/attribute', [AttributeController::class, 'index'])->name('attribute');
   Route::get('/attribute/create', [AttributeController::class, 'create'])->name('attribute.create');
   Route::post('/attribute', [AttributeController::class, 'store'])->name('attribute.store');
   Route::get('/attribute/{attribute}/edit', [AttributeController::class, 'edit'])->name('attribute.edit');
   Route::put('/attribute/{attribute}', [AttributeController::class, 'update'])->name('attribute.update');
   Route::get('/attribute/{attribute}', [AttributeController::class, 'destroy'])->name('attribute.destroy');

     //Product Variant
   Route::get('/variant', [ProductVariantController::class, 'product_variant'])->name('product.variant');
   Route::get('/product/variant/create', [ProductVariantController::class, 'create'])->name('product.variant.create');
   Route::post('/product/variant', [ProductVariantController::class, 'store'])->name('product.variant.store');
   Route::get('/product/variant/{variant}/edit', [ProductVariantController::class, 'edit'])->name('product.variant.edit');
   Route::put('/product/variant/{variant}', [ProductVariantController::class, 'update'])->name('product.variant.update');
   Route::delete('/variant/{variant}', [ProductVariantController::class, 'destroy'])
    ->name('product.variant.destroy');






   Route::get('/cc', [DashboardController::class, 'cacheClear'])->name('cc');

});