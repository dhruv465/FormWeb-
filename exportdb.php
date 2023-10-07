<?php
// Your database connection
$servername = "156.67.222.1";
$username = "u443752012_niriadmin";
$password = "Niriadmin@2023";
$dbname = "u443752012_niridb";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Your SQL query
$query = "SELECT * FROM users";
$query_run = mysqli_query($connection, $query);

// Include the PhpSpreadsheet classes
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Assuming your query is like $query_run = mysqli_query($connection, $query);
if (mysqli_num_rows($query_run) > 0) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set column headers
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Customer Name');
    $sheet->setCellValue('C1', 'Mobile No');
    $sheet->setCellValue('D1', 'Alternate No');
    $sheet->setCellValue('E1', 'City');
    $sheet->setCellValue('F1', 'Customer PAN');
    $sheet->setCellValue('G1', 'VKYC Link');
    $sheet->setCellValue('H1', 'Application No');
    $sheet->setCellValue('I1', 'Application Status');
    $sheet->setCellValue('J1', 'Account Incomplete Reason');
    $sheet->setCellValue('K1', 'Backend Name');
    $sheet->setCellValue('L1', 'Caller Name');
    $sheet->setCellValue('M1', 'Office Name');
    $sheet->setCellValue('N1', 'Manager Name');
    $sheet->setCellValue('O1', 'Form Filed Date');
    $sheet->setCellValue('P1', 'Surrogate Type');
    $sheet->setCellValue('Q1', 'IPA Status');
    $sheet->setCellValue('R1', 'Pickup Remark');
    $sheet->setCellValue('S1', 'Extra2');
    $sheet->setCellValue('T1', 'Extra3');

    $rowCount = 2;
    foreach ($query_run as $data) {
        $sheet->setCellValue('A' . $rowCount, $data['id']);
        $sheet->setCellValue('B' . $rowCount, $data['customer_name']);
        $sheet->setCellValue('C' . $rowCount, $data['mobile_no']);
        $sheet->setCellValue('D' . $rowCount, $data['alternate_no']);
        $sheet->setCellValue('E' . $rowCount, $data['city']);
        $sheet->setCellValue('F' . $rowCount, $data['customer_pan']);
        $sheet->setCellValue('G' . $rowCount, $data['vkyc_link']);
        $sheet->setCellValue('H' . $rowCount, $data['application_no']);
        $sheet->setCellValue('I' . $rowCount, $data['application_status']);
        $sheet->setCellValue('J' . $rowCount, $data['account_incomplete_reason']);
        $sheet->setCellValue('K' . $rowCount, $data['backend_name']);
        $sheet->setCellValue('L' . $rowCount, $data['caller_name']);
        $sheet->setCellValue('M' . $rowCount, $data['office_name']);
        $sheet->setCellValue('N' . $rowCount, $data['manager_name']);
        $sheet->setCellValue('O' . $rowCount, $data['form_filed_date']);
        $sheet->setCellValue('P' . $rowCount, $data['surrogate_type']);
        $sheet->setCellValue('Q' . $rowCount, $data['ipa_status']);
        $sheet->setCellValue('R' . $rowCount, $data['pickup_remark']);
        $sheet->setCellValue('S' . $rowCount, $data['extra2']);
        $sheet->setCellValue('T' . $rowCount, $data['extra3']);

        $rowCount++;
    }

    // Define $final_filename before the if block
    $final_filename = 'customer_data_' . date('YmdHis') . '.xlsx';

    // Initialize $writer inside the if block
    $writer = new Xlsx($spreadsheet);
    $writer->save($final_filename);

    // Provide the download link
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $final_filename . '"');
    header('Cache-Control: max-age=0');
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}
