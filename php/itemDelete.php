<?php
include('conn.php');

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM item WHERE id = '$id' ";

    if (mysqli_query($conn, $sql)) {
        echo '<script>';
        echo 'alert("Item deleted successfully");';
        echo 'window.location.href = "itemViewList.php";';
        echo '</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}
