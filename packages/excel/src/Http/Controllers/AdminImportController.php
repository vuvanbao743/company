<?php

namespace Excel\Http\Controllers;

use App\Http\Controllers\Controller;
use MongoDB\Client;
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

        foreach ($rows as $row) {
            $name     = $row[0] ?? '';
            $email    = $row[1] ?? '';
            $password = $row[2] ?? '';
            $roleText = strtolower(trim($row[3] ?? '')); // Chuyển đổi vai trò chuỗi -> chữ thường
            $created  = $row[4] ?? now();

            // Chuyển đổi role từ chuỗi -> số
            $role = match ($roleText) {
                'quản trị viên' => 1,
                'nhân viên'     => 2,
            };

            $collection->updateOne(
                ['email' => $email],
                ['$set' => [
                    'name'       => $name,
                    'password'   => $password,
                    'role'       => $role,
                    'created_at' => new UTCDateTime(strtotime($created) * 1000),
                ]],
                ['upsert' => true]
            );
        }

        return back()->with('success', 'Import thành công!');
    }
}
