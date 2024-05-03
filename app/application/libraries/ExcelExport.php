<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelExport {
    public function generateExcel() {
        require_once(APPPATH . 'vendor/autoload.php'); // Adjust the path as needed

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add your Excel generation logic here as shown in the previous example

        // Return the generated file path or content as needed
        $writer = new Xlsx($spreadsheet);
        $filename = "cutoff_data_head_" . date('Y-m-d') . ".xlsx";
        $writer->save($filename);

        return $filename; // or return $spreadsheet or the content
    }
}
