<?php
include('conn.php'); // Include database connection

// Check if deleteid is set in the URL parameters
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM item WHERE id = '$id' "; // SQL query to delete item with specified id

    // Execute the SQL query for item deletion
    if (mysqli_query($conn, $sql)) {
        echo '<script>';
        echo 'alert("Item deleted successfully");'; // Display success alert
        echo 'window.location.href = "itemViewList.php";'; // Redirect to item view list page
        echo '</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>'; // Display error alert on query failure
    }
}
