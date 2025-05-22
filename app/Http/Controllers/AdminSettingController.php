<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class AdminSettingController extends Controller
{
    // public function edit()
    // {
    //     $title = "Cài đặt quản trị viên";
    //     $enabled = Setting::get('admin_package_enabled', false);
    //     return view('admin.settings', compact('enabled', 'title'));
    // }

    public function update(Request $request)
    {
        $enabled = $request->boolean('admin_package_enabled');
        Setting::set('admin_package_enabled', $enabled);
        return redirect()->back()->with('status', 'Cập nhật thành công!');
    }
    //import export

    public function showView()
    {
        $title = "Quản lý Package";
        $enabled_excel = Setting::get('import_export_enabled', false);
        $enabled_theme = Setting::get('admin_package_enabled', false);

        return view('admin.settings', compact('enabled_excel','enabled_theme', 'title'));
    }

    public function ImportExport(Request $request)
    {
        $enabled = $request->boolean('import_export_enabled');
        Setting::set('import_export_enabled', $enabled);
        return redirect()->back()->with('status', 'Cập nhật thành công!');
    }
}
