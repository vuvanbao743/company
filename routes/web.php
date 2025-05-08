<?php

use Illuminate\Support\Facades\Route;
use User\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminSettingController;


Route::get('/', function () {
    return 'Hello main web.php';
});

// admin dashboard
Route::prefix('admins')->middleware(['web', 'admin.auth', 'admin.default.guard'])->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::middleware('check.admin')->group(function () {
        // quản lý tài khoản admin
        Route::get('account', [AccountController::class, 'showAccount'])->name('admins.account');
        Route::get('create-account', [AccountController::class, 'createAccount'])->name('admins.create-account');
        Route::post('store-account', [AccountController::class, 'storeAccount'])->name('admins.store-account');
        Route::get('edit-account/{id}', [AccountController::class, 'showEditAccount'])->name('admins.edit-account');
        Route::put('update-account/{id}', [AccountController::class, 'updateAccount'])->name('admins.update-account');
        Route::delete('delete-account/{id}', [AccountController::class, 'deleteAccount'])->name('admins.delete-account');
        Route::get('detail-account/{id}', [AccountController::class, 'showDetailAccount'])->name('admins.detail-account');

        // quản lý tắt bật package
        Route::get('/settings', [AdminSettingController::class, 'edit'])->name('admins.settings');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('admins.settings.update');
    });
});
