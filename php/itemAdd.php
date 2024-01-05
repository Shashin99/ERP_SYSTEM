<?php
include('conn.php');


$sql = "SELECT category from item_category";
$result = mysqli_query($conn, $sql);
$categories = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
} else {
    die("Invalid query: " . mysqli_error($conn));
}

$sql = "SELECT sub_category FROM item_subcategory";
$result = mysqli_query($conn, $sql);
$sub_categories = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sub_categories[] = $row;
    }
} else {
    die("Invalid query: " . mysqli_error($conn));
}

if (isset($_POST['submit'])) {
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    $sql = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price)
    VALUES ('$itemcode', '$category', '$subcategory', '$itemname', '$qty', '$price')";

    if (mysqli_query($conn, $sql)) {
        header("Location: itemViewList.php");
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
    <title> Add New Item </title>

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

<body>
    <div class="container my-5">
        <h2 class="text-center"> Add New Item </h2>
        <div class="fluid-container">
            <form method="post" onsubmit="return validateForm()" class="form">

                <div class="row mb-3">
                    <label for="itemcode" class="col-sm-3 col-form-label"> Item Code </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="itemcode" id="itemcode" placeholder="Item Code" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemname" class="col-sm-3 col-form-label"> Item Name </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="itemname" id="itemname" placeholder="Item Name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-sm-3 col-form-label"> Item Category </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="category" id="category" required>
                            <option value="" disabled selected>Choose Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="subcategory" class="col-sm-3 col-form-label"> Item Sub Category </label>
                    <div class="col-sm-6">
                        <select class="form-select" name="subcategory" id="subcategory" required>
                            <option value="" disabled selected>Choose Sub Category</option>
                            <?php foreach ($sub_categories as $sub_category) { ?>
                                <option value="<?php echo $sub_category['sub_category']; ?>"><?php echo $sub_category['sub_category']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="qty" class="col-sm-3 col-form-label"> Quantity </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label"> Unit Price </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Unit Price" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-outline-primary" name="submit"> Submit </button>
                    </div>

                    <div class="col-sm-3 d-grid">
                        <button type="reset" class="btn btn-outline-danger"> Clear </button>
                    </div>


            </form>
        </div>
    </div>

    <script>
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