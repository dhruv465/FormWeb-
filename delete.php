<?php
include('dbconnection.php');

// Code for deletion
if (isset($_GET['delid'])) {
    // Sanitize the input
    $rid = intval($_GET['delid']);
    
    // Execute DELETE query
    $sql = $conn->prepare('DELETE FROM users WHERE id = ?');
    $sql->bind_param('i', $rid);
    $sql->execute();

    // Check if the record was deleted successfully
    if ($sql->affected_rows > 0) {
        echo '<script>x-data().isOpen = true;</script>';
    } else {
        echo '<script>alert("Record not found or could not be deleted");</script>';
    }

    // Close the prepared statement
    $sql->close();

    echo "<script>window.location.href = 'index.php'</script>";
}
