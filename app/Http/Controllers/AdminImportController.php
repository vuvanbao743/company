<?php

namespace App\Http\Controllers;

use MongoDB\Client;
use App\Models\Setting;
use Illuminate\Http\Request;
use MongoDB\BSON\UTCDateTime;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdminImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Bỏ dòng tiêu đề
        array_shift($rows);

        // Kết nối MongoDB
        $client = new Client("mongodb://localhost:27017");
        $collection = $client->admindb->admins;

        // Chuyển dữ liệu
        $documents = [];
        foreach ($rows as $row) {
            // Chuyển đổi role từ chuỗi sang số
            $roleText = strtolower(trim($row[2] ?? ''));
            $role = match ($roleText) {
                'quản trị viên' => 1,
                'nhân viên'     => 2,
            };

            $collection->updateOne(
                ['email' => $row[1]], // Điều kiện tìm
                ['$set' => [
                    'name'       => $row[0] ?? '',
                    'role'       => $role,
                    'created_at' => new UTCDateTime(strtotime($row[3] ?? now()) * 1000),
                ]],
                ['upsert' => true] // Nếu không có thì insert
            );
        }

        if (!empty($documents)) {
            $collection->insertMany($documents);
        }

        return back()->with('success', 'Import thành công!');
    }
}
