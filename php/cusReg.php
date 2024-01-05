<?php
include('conn.php'); // Include database connection

// Fetch districts from the database
$sql = "SELECT district FROM district";
$result = mysqli_query($conn, $sql);
$district = array();

// Populate the district array with data from the query result
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $district[] = $row;
    }
} else {
    die("Invalid query: " . mysqli_error($conn));
}

// Check if the registration form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $contactno = $_POST['contactno'];
    $district = $_POST['district'];

    // Insert customer data into the database
    $sql = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district) 
            VALUES ('$title', '$firstname', '$middlename', '$lastname', '$contactno', '$district')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        header("Location: cusViewList.php"); // Redirect on successful registration
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Display error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Customer Registration </title>

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
            margin-top: 50px;
        }

        .fluid-container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            margin-left: 30px;
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
    <!-- Navbar -->
    <?php include("navbar.php") ?>

    <!-- Customer Registration Form -->
    <div class="container my-5">
        <h2 class="text-center"> Customer Registration </h2>
        <div class="fluid-container">
            <form method="post" onsubmit="return validateForm()" class="form">
                <div class="row mb-3">
                    <label for="title" class="col-sm-3 col-form-label"> Title </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="title" id="title">
                            <option value="" disabled selected>Choose Your Title</option>
                            <option value="Mr."> Mr </option>
                            <option value="Mrs."> Mrs </option>
                            <option value="Miss."> Miss </option>
                            <option value="Dr."> Dr </option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label"> First Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="middlename" class="col-sm-3 col-form-label"> Middle Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname" class="col-sm-3 col-form-label"> Last Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contactno" class="col-sm-3 col-form-label"> Contact Number </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="contactno" id="contactno" placeholder="Contact Number" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="district" class="col-sm-3 col-form-label"> District </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="district" id="district" required>
                            <option value="" disabled selected>Choose Your District</option>
                            <?php foreach ($district as $key => $value) { ?>
                                <option value="<?php echo $value['district']; ?>"><?php echo $value['district']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-outline-primary" name="submit"> Register </button>
                    </div>

                    <div class="col-sm-3 d-grid">
                        <button type="reset" class="btn btn-outline-danger"> Cancle </button>
                    </div>


            </form>
        </div>
    </div>

    <script>
        // Form validation
        function validateForm() {
            var title = document.getElementById('title').value;
            var firstname = document.getElementById('firstname').value;
            var middlename = document.getElementById('middlename').value;
            var lastname = document.getElementById('lastname').value;
            var contactno = document.getElementById('contactno').value;
            var district = document.getElementById('district').value;

            // Phone number validation regular expression
            var phoneRegex = /^\d{10}$/;

            if (title === "" || firstname === "" || middlename === "" || lastname === "" || contactno === "" || district === "") {
                alert("All fields must be filled out");
                return false;
            } else {
                alert("Customer registered successfully");
            }

            if (!phoneRegex.test(contactno)) {
                alert("Please enter a valid 10-digit phone number");
                return false;
            }

            return true;
        }
    </script>

</body>
</html>