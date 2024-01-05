<?php
include('conn.php');

$id = $_GET['updateid'];
$sql = "SELECT * FROM item WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$itemcode = $row['item_code'];
$itemname = $row['item_name'];
$selectedcategory = $row['item_category'];
$selectedsubcategory = $row['item_subcategory'];
$qty = $row['quantity'];
$price = $row['unit_price'];

$sql = "SELECT category FROM item_category";
$result_categories = mysqli_query($conn, $sql);
$category_list = array();

if ($result_categories) {
    while ($row_categories = mysqli_fetch_assoc($result_categories)) {
        $category_list[] = $row_categories['category'];
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "SELECT sub_category FROM item_subcategory";
$result_subcategories = mysqli_query($conn, $sql);
$subcategory_list = array();

if ($result_subcategories) {
    while ($row_subcategories = mysqli_fetch_assoc($result_subcategories)) {
        $subcategory_list[] = $row_subcategories['sub_category'];
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


if (isset($_POST['submit'])) {
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    $sql = "UPDATE item SET item_code='$itemcode', item_name='$itemname', item_category='$category', item_subcategory='$subcategory', quantity='$qty', unit_price='$price' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: itemViewList.php");
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
    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!-- Update Item -->
    <div class="container my-5">
        <h2 class="text-center mb-3"> Update Item Information </h2>
        <div class="fluid-container">
            <form method="post" onsubmit="return validateForm()" class="form">

                <div class="row mb-3">
                    <label for="itemcode" class="col-sm-3 col-form-label"> Item Code </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="itemcode" id="itemcode" placeholder="Item Code" value="<?php echo $itemcode ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemname" class="col-sm-3 col-form-label"> Item Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="itemname" id="itemname" placeholder="Item Name" value="<?php echo $itemname ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-sm-3 col-form-label"> Item Category </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="category" id="category" required>
                            <option value="" disabled selected>Choose Category</option>
                            <?php foreach ($category_list as $category_name) { ?>
                                <option value="<?php echo $category_name; ?>" <?php if ($selectedcategory === $category_name) echo 'selected'; ?>>
                                    <?php echo $category_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="subcategory" class="col-sm-3 col-form-label"> Item Sub Category </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="subcategory" id="subcategory" required>
                            <option value="" disabled selected>Choose Sub Category</option>
                            <?php foreach ($subcategory_list as $subcategory_name) { ?>
                                <option value="<?php echo $subcategory_name; ?>" <?php if ($selectedsubcategory === $subcategory_name) echo 'selected'; ?>>
                                    <?php echo $subcategory_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="qty" class="col-sm-3 col-form-label"> Quantity </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity" value="<?php echo $qty ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label"> Unit Price </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Unit Price" value="<?php echo $price ?>" required>
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
        //validate form
        function validateForm() {
            var itemcode = document.getElementById('itemcode').value;
            var itemname = document.getElementById('itemname').value;
            var itemcategory = document.getElementById('category').value;
            var itemsubcategory = document.getElementById('subcategory').value;
            var quantity = document.getElementById('qty').value;
            var unitprice = document.getElementById('price').value;

            // Regular expression to check for a floating-point number
            var floatRegex = /^-?\d*(\.\d+)?$/;

            if (itemcode === "" || itemname === "" || itemcategory === "" || itemsubcategory === "" || quantity === "") {
                alert("All fields must be filled out");
                return false;
            }

            if (unitprice === "") {
                alert("Unit Price must be filled out");
                return false;
            } else if (!floatRegex.test(unitprice)) {
                alert("Unit Price must be a valid number");
                return false;
            }

            alert("Item Added successfully");
            return true;
        }
    </script>

</body>

</html>