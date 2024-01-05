<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> View Item List </title>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="container my-5">
        <h2> List of Items </h2> <br />
        <a class="btn btn-outline-success" href="/ERP/ERP_SYSTEM/php/itemAdd.php" role="button" style="font-weight: bold;"> + Add New Item </a> <br />
        <br />
        <table class="table">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Item Code </th>
                    <th> Item Name </th>
                    <th> Item Category </th>
                    <th> Item Sub Category </th>
                    <th> Quantity </th>
                    <th> Unit Price </th>
                    <th> &nbsp Action </th>
                </tr>
            </thead>
            <tbody>

                <?php

                //read all records from item table
                $sql = "SELECT * FROM item";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($conn));
                }

                //output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[item_code] </td>
                    <td>$row[item_name]</td>
                    <td>$row[item_category]</td>
                    <td>$row[item_subcategory]</td>
                    <td>$row[item_name]</td>
                    <td>$row[quantity]</td>
                    <td>$row[unit_price]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='itemUpdate.php?updateid=$row[id]' role='button'> Edit </a>
                        <a class='btn btn-danger btn-sm' href='itemDelete.php?deleteid=$row[id]' role='button'> Delete </a>
                    </td>
                    ";
                }
                ?>
            </tbody>

        </table>
    </div>

</body>

<?php include("footer.php") ?>

</html>