<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reports </title>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #AED6F1;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 25px;
        }

        .fluid-container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form {
            margin-left: 150px;
        }

        .btn-outline-primary,
        .btn-outline-danger {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include("navbar.php") ?>
    <!-- Invoice Report-->
    <div class="container">
        <h3 class="text-center mb-3" style="font-weight: bold;"> Invoice Report </h3>
        <div class="fluid-container">
            <form method="post" action="invoiceReport.php" onsubmit="return validateForm('date')" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date" class="mr-2 text-dark"> Select Date:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-success w-100" style="margin-top:25px;" name="search">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Invoice Item Report-->
    <div class="container">
        <h3 class="text-center mb-3" style="font-weight: bold;"> Invoice Item Report </h3>
        <div class="fluid-container">
            <form method="post" action="invoiceItemRepot.php" onsubmit="return validateForm('date')" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <label for="date" class="mr-2 text-dark"> Select Date:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-success w-100" style="margin-top:25px;" name="search">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Item Report-->
    <div class="container" style="margin-bottom: 25px;">
        <h3 class="text-center mb-3" style="font-weight: bold;"> Item Report </h3>
        <div class="fluid-container">
            <form method="post" action="itemReport.php" class="form">
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-outline-primary w-100" style="margin-left: 250px;" name="search"> View Report </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm(date) {
            var dateValue = document.getElementById(date).value;

            if (dateValue === "") {
                alert("Please select a date");
                return false;
            }

            return true;
        }
    </script>

</body>

<?php include("footer.php") ?>

</html>