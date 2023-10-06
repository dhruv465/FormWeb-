<?php
header('Content-Type: application/json');

// Assuming you have a form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "156.67.222.1";
    $username = "u443752012_niriadmin";
    $password = "Niriadmin@2023";
    $dbname = "u443752012_niridb";

    try {
        // Create a new PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (customer_name, mobile_no, alternate_no, city, customer_pan, vkyc_link, application_no, application_status, account_incomplete_reason,
                                backend_name, caller_name, office_name, mgr_name, form_filed_date, surrogate_type, ipa_status, pickup_remark, extra2, extra3) 
                                VALUES (:customer_name, :mobile_no, :alternate_no, :city, :customer_pan, :vkyc_link, :application_no, :application_status, :account_incomplete_reason,
                                :backend_name, :caller_name, :office_name, :mgr_name, :form_filed_date, :surrogate_type, :ipa_status, :pickup_remark, :extra2, :extra3)");

        // Bind parameters
        $stmt->bindParam(':customer_name', $_POST['customer_name']);
        $stmt->bindParam(':mobile_no', $_POST['mobile_no']);
        $stmt->bindParam(':alternate_no', $_POST['alternate_no']);
        $stmt->bindParam(':city', $_POST['city']);
        $stmt->bindParam(':customer_pan', $_POST['customer_pan']);
        $stmt->bindParam(':vkyc_link', $_POST['customer_pan']);
        $stmt->bindParam(':application_no', $_POST['application_no']);
        $stmt->bindParam(':application_status', $_POST['application_status']);
        $stmt->bindParam(':account_incomplete_reason', $_POST['account_incomplete_reason']);

        // New columns
        $stmt->bindParam(':backend_name', $_POST['backend_name']);
        $stmt->bindParam(':caller_name', $_POST['caller_name']);
        $stmt->bindParam(':office_name', $_POST['office_name']);
        $stmt->bindParam(':mgr_name', $_POST['mgr_name']);
        $stmt->bindParam(':form_filed_date', $_POST['form_filed_date']);
        $stmt->bindParam(':surrogate_type', $_POST['surrogate_type']);
        $stmt->bindParam(':ipa_status', $_POST['ipa_status']);
        $stmt->bindParam(':pickup_remark', $_POST['pickup_remark']);
        $stmt->bindParam(':extra2', $_POST['extra2']);
        $stmt->bindParam(':extra3', $_POST['extra3']);

        // Execute the statement
        $stmt->execute();

        // Return success response
        echo json_encode(['success' => true, 'message' => 'New record created successfully']);
    } catch (PDOException $e) {
        // Return error response
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }

    // Close the connection
    $conn = null;
}
