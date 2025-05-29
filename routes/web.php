<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use User\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use Product\Http\Controllers\ProductController;
use App\Http\Controllers\AdminSettingController;
use Excel\Http\Controllers\AdminExportController;
use Excel\Http\Controllers\AdminImportController;


// Route::get('/product-image/{filename}', function ($filename) {
//     $path = storage_path('app/public/products/' . $filename);

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     return Response::file($path);
// })->name('product.image');
// Route::get('/user-image/{filename}', function ($filename) {
//     $path = storage_path('app/public/avatars/' . $filename);

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     return Response::file($path);
// })->name('user.image');

Route::middleware(['web', 'check.admin.package.enabled'])
    ->get('/', [ProductController::class, 'homepage'])
    ->name('home');

Route::get('/test-cloud', function () {
    dd(config('cloudinary')); // xem toàn bộ cấu hình cloudinary check
});
// admin dashboard
Route::prefix('admins') // , 'check.import_export'
    ->middleware(['web', 'admin.auth', 'admin.default.guard'])
    ->group(function () {
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
            
            // import export
            Route::get('/export', [AdminExportController::class, 'export'])->name('admins.export');
            Route::post('/import', [AdminImportController::class, 'import'])->name('admins.import');
            
            // quản lý tắt bật package import export
            // Route::get('/import-export', [AdminSettingController::class, 'showView'])
            //     ->name('admins.import_export');
            Route::post('/import-export', [AdminSettingController::class, 'ImportExport'])
                ->name('admins.import_export');

            // quản lý tắt bật package theme
            Route::get('/settings', [AdminSettingController::class, 'showView'])->name('admins.settings');
            Route::post('/settings', [AdminSettingController::class, 'update'])->name('admins.settings.update');
        });
    });
Route::get('/demo-adminlte', function () {
    return view('demo');
});
