<?php

include('./dbconnection.php');

require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Initialize status variable
$status = '';

if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 0) {
                $customer_name = $row['0'];
                $mobile_no = $row['1'];
                $alternate_no = $row['2'];
                $customer_pan = $row['3'];
                $city = $row['4'];
                $vkyc_link = $row['5'];
                $application_no = $row['6'];
                $application_status = $row['7'];
                $account_incomplete_reason = $row['8'];
                $backend_name = $row['9'];
                $caller_name = $row['10'];
                $office_name = $row['11'];
                $mgr_name = $row['12'];
                $form_filed_date = $row['13'];
                $surrogate_type = $row['14'];
                $ipa_status = $row['15'];
                $pickup_remark = $row['16'];
                $extra2 = $row['17'];
                $extra3 = $row['18'];

                $userquery = "INSERT INTO users 
                    (customer_name, mobile_no, alternate_no, city, customer_pan, vkyc_link, 
                    application_no, application_status, account_incomplete_reason, backend_name, 
                    caller_name, office_name, mgr_name, form_filed_date, surrogate_type, 
                    ipa_status, pickup_remark, extra2, extra3) 
                    VALUES 
                    ('$customer_name', '$mobile_no', '$alternate_no', '$city', '$customer_pan', '$vkyc_link', 
                    '$application_no', '$application_status', '$account_incomplete_reason', '$backend_name', 
                    '$caller_name', '$office_name', '$mgr_name', '$form_filed_date', '$surrogate_type', 
                    '$ipa_status', '$pickup_remark', '$extra2', '$extra3')";


                $result = mysqli_query($conn, $userquery);
                if (!$result) {
                    die('Error: ' . mysqli_error($con));
                }
            } else {
                $count = "1";
            }
        }

        // Set status based on the result
        if ($result) {
            $status = 'success';
        } else {
            $status = 'error';
        }
    } else {
        $status = 'invalid';
    }

    sleep(3);
    // Redirect to a new page to avoid form resubmission
    header('Location: index.php');
    exit();
}
