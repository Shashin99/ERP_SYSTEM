<?php
include('conn.php');

$id = $_GET['updateid'];
$sql = "SELECT * FROM customer WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$firstname = $row['first_name'];
$middlename = $row['middle_name'];
$lastname = $row['last_name'];
$contactno = $row['contact_no'];
$selecteddistrict = $row['district'];

$sql = "SELECT district FROM district";
$result_districts = mysqli_query($conn, $sql);
$district_list = array();

if ($result_districts) {
    while ($row_districts = mysqli_fetch_assoc($result_districts)) {
        $district_list[] = $row_districts['district'];
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $contactno = $_POST['contactno'];
    $district = $_POST['district'];

    $sql = "UPDATE customer SET title='$title', first_name='$firstname', middle_name='$middlename', last_name='$lastname', contact_no='$contactno', district='$district' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: cusViewList.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Customer </title>

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
    <div class="container my-5">
        <h2 class="text-center mb-3"> Update Customer Information </h2>
        <div class="fluid-container">
            <form method="post" onsubmit="return validateForm()" class="form">
                <div class="row mb-3">
                    <label for="title" class="col-sm-3 col-form-label"> Title </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="title" id="title">
                            <option <?php if ($title === 'Mr') echo 'selected'; ?>>Mr</option>
                            <option <?php if ($title === 'Mrs') echo 'selected'; ?>>Mrs</option>
                            <option <?php if ($title === 'Miss') echo 'selected'; ?>>Miss</option>
                            <option <?php if ($title === 'Dr') echo 'selected'; ?>>Dr</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="firstname" class="col-sm-3 col-form-label"> First Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $firstname; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="middlename" class="col-sm-3 col-form-label"> Middle Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $middlename; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname" class="col-sm-3 col-form-label"> Last Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>">
                    </div>
                </div>

                <div class=" row mb-3">
                    <label for="contactno" class="col-sm-3 col-form-label"> Contact Number </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="contactno" id="contactno" placeholder="Contact Number" value="<?php echo $contactno; ?>">
                    </div>
                </div>

                <div class=" row mb-3">
                    <label for="district" class="col-sm-3 col-form-label"> District </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="district" id="district" required>
                            <option value="" disabled selected>Choose Your District</option>
                            <?php foreach ($district_list as $district_name) { ?>
                                <option value="<?php echo $district_name; ?>" <?php if ($selecteddistrict === $district_name) echo 'selected'; ?>>
                                    <?php echo $district_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-outline-primary" name="submit">Update</button>
                    </div>

                    <div class="col-sm-3 d-grid">
                        <button type="reset" class="btn btn-outline-danger"> Clear </button>
                    </div>
            </form>
        </div>


    </div>

    <script>
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
                alert("Customer information updated successfully");
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