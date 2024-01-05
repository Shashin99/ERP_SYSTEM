<?php
include('conn.php'); // Include database connection

// Check if 'deleteid' is set in the GET parameters
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid']; // Get 'deleteid' from GET parameters
    $sql = "DELETE FROM customer WHERE id = '$id' "; // SQL query to delete a customer with the specified id

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // If deletion is successful, display success alert and redirect to 'cusViewList.php'
        echo '<script>';
        echo 'alert("Customer deleted successfully");';
        echo 'window.location.href = "cusViewList.php";';
        echo '</script>';
        exit; // Exit the script
    } else {
        // If there's an error, display an alert with the specific error message
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}
