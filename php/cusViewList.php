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
    <?php include("navbar.php") ?>

    <div class="container my-5">
        <h2> List of Customers </h2> <br />
        <a class="btn btn-outline-success" href="/ERP/ERP_SYSTEM/php/cusReg.php" role="button" style="font-weight: bold;"> + Add New Customer </a> <br />
        <br />
        <table class="table">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Title </th>
                    <th> First Name </th>
                    <th> Middle Name </th>
                    <th> Last Name </th>
                    <th> Contact Number </th>
                    <th> District </th>
                    <th> &nbsp Action </th>
                </tr>
            </thead>
            <tbody>

                <?php

                //read all records from customer table
                $sql = "SELECT * FROM customer";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($conn));
                }

                //output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[title] </td>
                    <td>$row[first_name]</td>
                    <td>$row[middle_name]</td>
                    <td>$row[last_name]</td>
                    <td>$row[contact_no]</td>
                    <td>$row[district]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='cusUpdate.php?updateid=$row[id]' role='button'> Edit </a>
                        <a class='btn btn-danger btn-sm' href='cusDelete.php?deleteid=$row[id]' role='button'> Delete </a>
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