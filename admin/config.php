<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "cakedb";

// Create database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set
mysqli_set_charset($conn, "utf8");

// Set timezone


// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>