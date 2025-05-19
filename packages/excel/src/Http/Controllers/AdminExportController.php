<?php

namespace Excel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use MongoDB\Client;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminExportController extends Controller
{
    public function export()
    {
        // Kết nối MongoDB
        $client = new Client("mongodb://localhost:27017");
        $collection = $client->admindb->admins;

        // Lấy dữ liệu
        $admins = $collection->find()->toArray();

        if (empty($admins)) {
            return back()->with('error', 'Không có dữ liệu để export!');
        }

        // Tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->fromArray(['Name', 'Email', 'Role', 'Created At'], NULL, 'A1');

        // Dữ liệu
        $rowIndex = 2;
        foreach ($admins as $admin) {
            $sheet->setCellValue("A$rowIndex", $admin['name'] ?? '');
            $sheet->setCellValue("B$rowIndex", $admin['email'] ?? '');
            $sheet->setCellValue("C$rowIndex", $admin['role'] == 1 ? 'Quản trị viên' : 'Nhân viên');
            $sheet->setCellValue("D$rowIndex", isset($admin['created_at']) ? $admin['created_at']->toDateTime()->format('Y-m-d H:i:s') : '');
            $rowIndex++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'admins_export.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}
