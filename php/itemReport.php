<?php
include('conn.php');

$sql = "SELECT item_name, item_category, item_subcategory, quantity
        FROM item
        GROUP BY item_name";

$result = mysqli_query($conn, $sql);
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
    <?php include("navbar.php") ?>

    <div class="container my-5">
        <h2> Invoice Report </h2> <br />
        <table class="table">
            <thead>
                <tr>
                    <th> Item Name</th>
                    <th> Item Category </th>
                    <th> Item SubCategory </th>
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

</html>