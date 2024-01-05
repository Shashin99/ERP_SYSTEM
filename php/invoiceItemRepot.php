<?php
include('conn.php');

if (isset($_POST['search'])) {
    $date = $_POST['date'];

    $sql = "SELECT
        invoice.invoice_no,
        invoice.date AS invoiced_date,
        customer.first_name AS customer_name,
        item.item_name,
        item.item_code,
        item.item_category,
        item.unit_price
    FROM
        invoice
    INNER JOIN
        invoice_master ON invoice.invoice_no = invoice_master.invoice_no
    INNER JOIN
        customer ON invoice.customer= customer.id
    INNER JOIN
        item ON invoice_master.item_id = item.id
    WHERE
        invoice.date = '$date'";

    $result = mysqli_query($conn, $sql);
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
    <?php include("navbar.php") ?>

    <div class="container my-5">
        <h2> Invoice Report </h2> <br />
        <table class="table">
            <thead>
                <tr>
                    <th> Invoice Number</th>
                    <th> Invoiced Date </th>
                    <th> Customer Name </th>
                    <th> Item Name</th>
                    <th> Item Code</th>
                    <th> Item Category </th>
                    <th> Unit Price </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['invoice_no'] . "</td>";
                    echo "<td>" . $row['invoiced_date'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_code'] . "</td>";
                    echo "<td>" . $row['item_category'] . "</td>";
                    echo "<td>" . $row['unit_price'] . "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>

        </table>
    </div>
</body>

</html>