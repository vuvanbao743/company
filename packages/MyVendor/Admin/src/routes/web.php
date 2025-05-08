<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use MyVendor\Admin\Http\Controllers\AuthController;
use MyVendor\Admin\Http\Controllers\UserController;
// trang chủ
Route::middleware(['web'])->get('/domain', function () {
    if (!Auth::guard('user')->check() && !Auth::guard('admin')->check()) {
        return redirect()->route('login');
    }

    return view('admin::client.user.home');
})->name('home');

// login logout
Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])
        ->middleware('admin.guest', 'user.guest')
        ->name('login');
    Route::get('login', [AuthController::class, 'showLogin'])
        ->middleware('admin.guest', 'user.guest')
        ->name('admin.login'); // thêm dòng này nếu cần tương thích
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// sửa thông tin của user
Route::middleware(['web', 'auth:user', 'auth', 'check.admin.package.enabled'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'userDetail'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'userInfomation'])->name('user.profile.edit');
    Route::post('/user/profile/update', [UserController::class, 'userUpdate'])->name('user.profile.update');
});

Route::prefix('admins')->middleware(['web', 'admin.auth', 'admin.default.guard', 'check.admin.package.enabled'])->group(function () {
    Route::middleware('check.admin')->group(function () {
        // quản lý tài khoản user
        Route::get('user', [UserController::class, 'showUser'])->name('admins.user');
        Route::get('create-user', [UserController::class, 'createUser'])->name('admins.create-user');
        Route::post('store-user', [UserController::class, 'storeUser'])->name('admins.store-user');
        Route::get('edit-user/{id}', [UserController::class, 'showEditUser'])->name('admins.edit-user');
        Route::put('update-user/{id}', [UserController::class, 'updateUser'])->name('admins.update-user');
        Route::delete('delete-user/{id}', [UserController::class, 'deleteUser'])->name('admins.delete-user');
        Route::get('detail-user/{id}', [UserController::class, 'showDetailUser'])->name('admins.detail-user');
    });
});
