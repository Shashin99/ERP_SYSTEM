<?php
include('conn.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM customer WHERE id = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo '<script>';
        echo 'alert("Customer deleted successfully");';
        echo 'window.location.href = "cusViewList.php";';
        echo '</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}
