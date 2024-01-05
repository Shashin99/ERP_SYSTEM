<?php
// Database connection parameters
$servername = "localhost"; // Set the server name
$username = "root";        // Set the database username
$password = "";            // Set the database password
$database = "erp_system";  // Set the database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Terminate with an error message if the connection fails
}
