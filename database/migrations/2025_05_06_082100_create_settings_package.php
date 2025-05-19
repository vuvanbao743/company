<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Setting::updateOrCreate(
          
            ['key' => 'import_export_enabled'],
            ['value' => '1'], // bật
        ['created_at' => now()],
        ['updated_at' => now()],
        );
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Setting::where('_id', 'admin_package_enabled')->delete();
    // }
};
