<?php
/**
 * Database Configuration
 */

// Database credentials
$db_host = 'localhost';      // Database host
$db_user = 'root';           // Database username 
$db_password = '';           // Database password 
$db_name = 'garageweb_db';   // Name of the database

// Create database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set
$conn->set_charset("utf8mb4");

// echo "Database connected successfully";
?>