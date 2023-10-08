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

// Include the PhpSpreadsheet classes
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['export_data_btn'])) {
    // Get selected file type and filter values from the form
    $selectedFileType = $_POST['export_file_type'];
    $filterValue = isset($_POST['filter_value']) ? $_POST['filter_value'] : null;

    // Your SQL query with or without filter condition
    if ($filterValue) {
        $query = "SELECT * FROM users WHERE office_name = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 's', $filterValue);
        mysqli_stmt_execute($stmt);
        $query_run = mysqli_stmt_get_result($stmt);
    } else {
        $query = "SELECT * FROM users";
        $query_run = mysqli_query($connection, $query);
    }

    if (mysqli_num_rows($query_run) > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Customer Name');
        $sheet->setCellValue('C1', 'Mobile No');
        $sheet->setCellValue('D1', 'Alternate No');
        $sheet->setCellValue('E1', 'City');
        $sheet->setCellValue('F1', 'Customer Pan');
        $sheet->setCellValue('G1', 'Vkyc Link');
        $sheet->setCellValue('H1', 'Application No');
        $sheet->setCellValue('I1', 'Application Status');
        $sheet->setCellValue('J1', 'Application Incomplete Reason');
        $sheet->setCellValue('K1', 'Backend Name');
        $sheet->setCellValue('L1', 'Caller Name');
        $sheet->setCellValue('M1', 'Office Name');
        $sheet->setCellValue('N1', 'Mgr Name');
        $sheet->setCellValue('O1', 'Created At');
        $sheet->setCellValue('P1', 'Surrogate Type');
        $sheet->setCellValue('Q1', 'IPA Status');
        $sheet->setCellValue('R1', 'PickUp Remark');
        $sheet->setCellValue('S1', 'Extra 2');
        $sheet->setCellValue('T1', 'Extra 3');  // Update this line

        $rowCount = 2;
        while ($data = mysqli_fetch_assoc($query_run)) {
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
            $sheet->setCellValue('N' . $rowCount, $data['mgr_name']);
            $sheet->setCellValue('O' . $rowCount, $data['form_filed_date']);
            $sheet->setCellValue('P' . $rowCount, $data['surrogate_type']);
            $sheet->setCellValue('Q' . $rowCount, $data['ipa_status']);
            $sheet->setCellValue('R' . $rowCount, $data['pickup_remark']);
            $sheet->setCellValue('S' . $rowCount, $data['extra2']);
            $sheet->setCellValue('T' . $rowCount, $data['extra3']);  // Update this line

            $rowCount++;
        }


        // Define $final_filename based on selected file type
        $final_filename = 'customer_data_' . date('YmdHis') . '.' . $selectedFileType;

        // Initialize $writer based on selected file type
        switch ($selectedFileType) {
            case 'xlsx':
                $writer = new Xlsx($spreadsheet);
                break;
            case 'xls':
                $writer = new Xls($spreadsheet);
                break;
            case 'csv':
                $writer = new Csv($spreadsheet);
                break;
            default:
                die("Invalid file type selected");
        }

        // Save the file to a temporary location
        $tempFile = tempnam(sys_get_temp_dir(), 'export_');
        $writer->save($tempFile);

        // Send headers for file download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $final_filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // Output the file to the browser
        readfile($tempFile);

        // Remove the temporary file
        unlink($tempFile);

        exit;
    } else {
        // If no data is available, display a message
        echo "No data available for the selected filter.";
    }
}

// Close the database connection
mysqli_close($connection);
