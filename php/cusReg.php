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

</head>

<body>
    <div class="container my-5">
        <h2> Customer Registration </h2>
        <form method="post">

            <div class="row mb-3">
                <label for="title" class="col-sm-3 col-form-label"> Title </label>
                <div class="col-sm-6">
                    <select class="form-select" name="title" id="title">
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
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="middlename" class="col-sm-3 col-form-label"> Middle Name </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="lastname" class="col-sm-3 col-form-label"> Last Name </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="number" class="col-sm-3 col-form-label"> Contact Number </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contactno" id="contactno" placeholder="Contact Number">
                </div>
            </div>

            <div class="row mb-3">
                <label for="district" class="col-sm-3 col-form-label"> District </label>
                <div class="col-sm-6">
                    <select class="form-select" name="district" id="district">
                        <?php

                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary"> Register </button>
                </div>
            </div>


        </form>

    </div>
</body>

</html>