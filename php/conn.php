<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "erp_system";

// create db connecction
$conn = new mysqli($servername, $username, $password, $database);

// check connecction
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>