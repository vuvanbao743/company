<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use User\Http\Controllers\AuthController;
use User\Http\Controllers\UserController;

Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return 'Linked!';
});
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
Route::middleware(['web', 'auth:user', 'auth'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'userDetail'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'userInfomation'])->name('user.profile.edit');
    Route::post('/user/profile/update', [UserController::class, 'userUpdate'])->name('user.profile.update');
});
// , 'check.admin.package.enabled'
Route::prefix('admins')->middleware(['web', 'admin.auth', 'admin.default.guard'])->group(function () {
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
