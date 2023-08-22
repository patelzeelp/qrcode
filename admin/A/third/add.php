<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <?php
    include '../../../links/headlink.php';
    ?>
</head>
<style>
    li {
        list-style-type: none;
    }
</style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        <?php
        include '../../inc/nevbar.php';
        ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php
            include '../../inc/sidebar.php';
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Form elements </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Basic form elements</h4>
                                    <p class="card-description"> Basic form elements </p>
                                    <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="floor-number" class="col-form-label text-dark">Floor Number:</label>
                                            <select class="form-control" id="floor-number" name="floor_number">
                                                <?php
                                                // Connect to your database (replace these with your actual database credentials)
                                                require_once '../../database/dbcon.php';


                                                // Fetch existing floor numbers from the database
                                                $existingFloorNumbers = array();
                                                $query = "SELECT DISTINCT floor_number FROM a";
                                                $result = mysqli_query($con, $query);

                                                if ($result) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $existingFloorNumbers[] = $row['floor_number'];
                                                    }
                                                }

                                                // Define the available floor options
                                                $floorOptions = array("T-31", "T-32", "T-33", "T-34", "T-35", "T-36", "T-37", "T-38", "T-39", "T-40");

                                                // Loop throuFh the options and generate <option> elements
                                                foreach ($floorOptions as $option) {
                                                    if (!in_array($option, $existingFloorNumbers)) {
                                                        echo "<option value='$option'>$option</option>";
                                                    }
                                                }


                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Shope Name:</label>
                                            <input type="text" name="shopename" class="form-control" id="exampleInputEmail3" placeholder="Shope Name">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="file" name="imageupload" />
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Mobile Number:</label>
                                            <input type="number" name="mobile_no" class="form-control" id="exampleInputPassword4" placeholder="Mobile Number:">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Title:</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputEmail3" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1"> Add Imfromaction</label>
                                            <textarea name="imfromactiones" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Title2:</label>
                                            <input type="text" name="title2" class="form-control" id="exampleInputEmail3" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Imfromaction2</label>
                                            <textarea name="imfromactiones2" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Add link </label>
                                            <input type="text" name="link" class="form-control" id="exampleInputEmail3" placeholder="link">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Add Email </label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                        </div>



                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light"><a href="first.php">Cancel</a></button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-inner-wraper">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Crate by inspire </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://inspiresoftware.co.in/" target="_blank">Software & Mobile App
                                    Development Company</a> </span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>



    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- End custom js for this page -->
    <?php
    include '../../../links/footer.php';
    ?>
</body>

</html>


<?php
require_once '../../database/dbcon.php'; // Include your database connection

if (isset($_POST['submit'])) {
    // Process form submission here

    $floor_number = mysqli_real_escape_string($con, $_POST['floor_number']);
    $shopename = mysqli_real_escape_string($con, $_POST['shopename']);
    $mobile_no = mysqli_real_escape_string($con, $_POST['mobile_no']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $imfromactiones = mysqli_real_escape_string($con, $_POST['imfromactiones']);
    $title2 = mysqli_real_escape_string($con, $_POST['title2']);
    $imfromactiones2 = mysqli_real_escape_string($con, $_POST['imfromactiones2']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $email = mysqli_real_escape_string($con, $_POST['email']);


    if (isset($_FILES['imageupload']) && $_FILES['imageupload']['error'] === UPLOAD_ERR_OK) {
        // Retrieve the uploaded imageupload file
        $imageupload = $_FILES['imageupload']['name'];
        $image_tmp = $_FILES['imageupload']['tmp_name'];

        // Check if the file is an image (JPG, PNG, etc.)
        // $filepath = ['jpg', 'jpeg', 'png','svg', 'ico'];
        // $fileExtension = strtolower(pathinfo($imageupload, PATHINFO_EXTENSION));
        // if (!in_array($fileExtension, $filepath)) {
        //     echo "Invalid image file. Only JPG, JPEG, and PNG files are allowed.";
        //     exit();
        // }   

        // Move the uploaded image to a directory on the server
        move_uploaded_file($image_tmp, "../../../img/" . $imageupload);

        // Insert the data into the database
        $sql = "INSERT INTO a (`floor`,floor_number, name, mobile_no, title, imfromaction, title2, imfromaction2, link, email, shoplogo)
                      VALUES ('third','$floor_number', '$shopename', '$mobile_no', '$title', '$imfromactiones', '$title2', '$imfromactiones2', '$link', '$email','$imageupload')";

        if (mysqli_query($con, $sql)) {
            echo "Record inserted successfully.";
?>
            <script>
                window.location.href = "third.php";
            </script>
<?php


        } else {
            echo "Error .";
        }
    } else {
        echo "Error uploading the image. Please try again.";
    }
}

?>