<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> View Customer List </title>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <h2> List of Customers </h2>
        <a class="btn btn-primary" href="/ERP/ERP_SYSTEM/php/cusReg.php" role="button"> Add New Customer </a>
        <br />
        <table class="table">
            <thead>
                <tr>
                    <th> Title </th>
                    <th> First Name </th>
                    <th> Middle Name </th>
                    <th> Last Name </th>
                    <th> Contact Number </th>
                    <th> District </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>

                <?php

                //read all records from customer table
                $sql = "SELECT * FROM customer";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                //output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[title] </td>
                    <td>$row[first_name]</td>
                    <td>$row[last_name]</td>
                    <td>$row[contact_no]</td>
                    <td>$row[district]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/php/cusEdit.php?id=$row[id]' role='button'> Edit </a>
                        <a class='btn btn-danger btn-sm' href='/php/cusDelete.php?id=$row[id]' role='button'> Delete </a>
                    </td>
                    ";
                }
                ?>

                <!-- <tr>
                    <td> Mr. </td>
                    <td> John </td>
                    <td> Doe </td>
                    <td> 0712345678 </td>
                    <td> Colombo </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/php/cusEdit.php" role="button"> Edit </a>
                        <a class="btn btn-danger btn-sm" href="/php/cusDelete.php" role="button"> Delete </a>
                </tr> -->
            </tbody>

        </table>
    </div>
</body>


</html>