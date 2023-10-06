<?php
// Database connection parameters
$host = '156.67.222.1';
$username = 'u443752012_niriadmin';
$password = 'Niriadmin@2023';
$database = 'u443752012_niridb';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
