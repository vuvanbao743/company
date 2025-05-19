<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use MongoDB\Client;

class CheckImportExportSetting
{
    public function handle(Request $request, Closure $next)
    {
        $client = new Client("mongodb://localhost:27017");
        $collection = $client->admindb->settings;
        
        $setting = $collection->findOne(['_id' => 'import_export_enabled']);
        $isEnabled = $setting['value'] ?? false;

        if (!$isEnabled) {
            return redirect()->back()->with('error', 'Tính năng Import/Export đang bị tắt.');
        }

        return $next($request);
    }
}
