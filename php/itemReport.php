<?php
include('conn.php'); // Include database connection

$sql = "SELECT item_name, item_category, item_subcategory, quantity
        FROM item
        GROUP BY item_name"; // SQL query to retrieve item details grouped by item name

$result = mysqli_query($conn, $sql); // Execute the SQL query
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Item Report </title>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!-- Item Report -->
    <div class="container my-5">
        <h2> Item Report </h2> <br />
        <table class="table">
            <thead>
                <tr>
                    <th> Item Name</th>
                    <th> Item Category </th>
                    <th> Item Subcategory </th>
                    <th> Quantity </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_category'] . "</td>";
                    echo "<td>" . $row['item_subcategory'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
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