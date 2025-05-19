<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use User\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminExportController;
use App\Http\Controllers\AdminImportController;
use App\Http\Controllers\AdminSettingController;


Route::middleware(['web','check.admin.package.enabled'])->get('/', function () {
    // if (!Auth::guard('user')->check() && !Auth::guard('admin')->check()) {
    //     return redirect()->route('login');
    // }

    // return view('admin::client.template2.index');

     $adminPackageEnabled = Setting::get('admin_package_enabled', false);

    if ($adminPackageEnabled) {
        return view('admin::client.template1.index');
    } else {
        return view('admin::client.template2.index');
    }
})->name('home');

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
            Route::get('/import-export', [AdminSettingController::class, 'showView'])
                ->name('admins.import_export');
            Route::post('/import-export', [AdminSettingController::class, 'ImportExport'])
                ->name('admins.import_export');

            // quản lý tắt bật package theme
            Route::get('/settings', [AdminSettingController::class, 'edit'])->name('admins.settings');
            Route::post('/settings', [AdminSettingController::class, 'update'])->name('admins.settings.update');
        });
    });
Route::get('/demo-adminlte', function () {
    return view('demo');
});
