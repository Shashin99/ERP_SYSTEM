<?php
include('conn.php'); // Include database connection

if (isset($_POST['search'])) {
    $date = $_POST['date'];

    // SQL query to retrieve invoice details based on date
    $sql = "SELECT * FROM invoice WHERE date = '$date'";
    $result = mysqli_query($conn, $sql); // Execute the SQL query
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Invoice Report </title>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!-- Invoice Report -->
    <div class="container my-5">
        <h2> Invoice Report </h2> <br />
        <table class="table">
            <thead>
                <tr>
                    <th> Invoice Number</th>
                    <th> Date </th>
                    <th> Customer </th>
                    <th> Item Count </th>
                    <th> Invoice Amount </th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display retrieved invoice details in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['invoice_no'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['customer'] . "</td>";
                    echo "<td>" . $row['item_count'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<!-- Footer -->
<?php include("footer.php") ?>

</html>