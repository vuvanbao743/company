<?php

use Illuminate\Support\Facades\Route;
use Product\Http\Controllers\ProductController;

Route::prefix('admins')->middleware(['web', 'admin.auth', 'admin.default.guard'])->group(function () {
    Route::middleware('check.admin')->group(function () {
        // quản lý tài khoản user
        Route::get('products', [ProductController::class, 'showProduct'])->name('admins.product');
        Route::get('products/create', [ProductController::class, 'createProduct'])->name('admins.product.create');
        Route::post('store-products', [ProductController::class, 'storeProduct'])->name('admins.product.store');
        Route::get('products/{id}', [ProductController::class, 'showDetailProduct'])->name('admins.product.show');
        Route::get('products/{id}/edit', [ProductController::class, 'showEditProduct'])->name('admins.product.edit');
        Route::put('update-products/{id}', [ProductController::class, 'updateProduct'])->name('admins.product.update');
        Route::delete('products/{id}', [ProductController::class, 'deleteProduct'])->name('admins.product.delete');
    });
});
