<?php
require_once '../../database/dbcon.php'; // Include your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM a WHERE id='$id'");
    $row = mysqli_fetch_assoc($sql);


    if (isset($_POST['submit'])) {
        $record_id = $_POST['record_id'];
        $floor_number = $_POST['floor_number'];
        $imageupload = $_FILES['imageupload']['name'];
        $shopename = $_POST['shopename'];
        $mobile_no = $_POST['mobile_no'];
        $imfromaction = $_POST['imfromactiones'];
        $title = $_POST['title'];
        $imfromaction2 = $_POST['imfromactiones2'];
        $title2 = $_POST['title2'];
        $link = $_POST['link'];
        $email = $_POST['email'];
        $old_upload = mysqli_real_escape_string($con, $_POST['old_upload']);


        // $old_image_path = "img/";
        if ($imageupload != '') {
            $update_filename = $_FILES['imageupload']['name'];
            $filepath = ['jpg', 'jpeg', 'png', 'ico'];

            $fileExtension = strtolower(pathinfo($imageupload, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $filepath)) {
                echo "Invalid image file. Only JPG, JPEG, and PNG files are allowed.";
                exit(0);
            }
        } else {
            $update_filename = $old_upload;
        }

        // Update data in the database
        $update_sql = "UPDATE a SET floor_number='$floor_number', name='$shopename', mobile_no='$mobile_no', imfromaction='$imfromaction', title='$title', imfromaction2='$imfromaction2', title2='$title2', link='$link', email='$email', shoplogo='$update_filename' WHERE id='$record_id'";
        $update_result = mysqli_query($con, $update_sql);

        if ($update_result) {
            if ($imageupload != '') {
                // move_uploaded_file($image_tmp, "image/upload/" . $imageupload);
                move_uploaded_file($_FILES['imageupload']['tmp_name'], "../../../img/" . $update_filename);
                if (file_exists('../../../img/' . $old_upload)) {
                    unlink('../../../img/' . $old_upload);
                }
            }

            header("Location: third.php");
            echo "Data updated  successfully!!";

            exit();
        } else {
            echo "Error updating data: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>A first floor Edit </title>
    <?php
    include '../../../links//headlink.php';
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
                                        <input type="hidden" name="record_id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group">
                                            <label for="floor-number " class="col-form-label text-dark ">Floor Number:</label>
                                            <select class="form-control" id="floor-number" name="floor_number">
                                                <option value="T-31" <?php if ($row['floor_number'] === 'T-31') echo 'selected'; ?>> T-31 </option>
                                                <option value="T-32" <?php if ($row['floor_number'] === 'T-32') echo 'selected'; ?>>T-32</option>
                                                <option value="T-33" <?php if ($row['floor_number'] === 'T-33') echo 'selected'; ?>>T-33</option>
                                                <option value="T-34" <?php if ($row['floor_number'] === 'T-34') echo 'selected'; ?>>T-34</option>
                                                <option value="T-35" <?php if ($row['floor_number'] === 'T-35') echo 'selected'; ?>>T-35</option>
                                                <option value="T-36" <?php if ($row['floor_number'] === 'T-36') echo 'selected'; ?>>T-36</option>
                                                <option value="T-37" <?php if ($row['floor_number'] === 'T-37') echo 'selected'; ?>>T-37</option>
                                                <option value="T-38" <?php if ($row['floor_number'] === 'T-38') echo 'selected'; ?>>T-38</option>
                                                <option value="T-39" <?php if ($row['floor_number'] === 'T-39') echo 'selected'; ?>>T-39</option>
                                                <option value="T-40" <?php if ($row['floor_number'] === 'T-40') echo 'selected'; ?>>T-40</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Shope Name:</label>
                                            <input type="text" name="shopename" class="form-control" id="exampleInputEmail3" value="<?php echo $row['name']; ?>" placeholder="Shope Name">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image:</label>
                                            <input class="form-control" type="file" name="imageupload">
                                            <input type="hidden" name="old_upload" value="<?= $row['shoplogo']; ?>">
                                            <img src="<?php echo '../../../img/' . $row['shoplogo']; ?>" style="width: 100px; border: 2px solid gray; border-radius: 20px;" width="100px" alt="image">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Mobile Number:</label>
                                            <input type="number" name="mobile_no" class="form-control" id="exampleInputPassword4" value="<?php echo $row['mobile_no']; ?>" placeholder="Mobile Number:">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Title:</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputEmail3" value="<?php echo $row['title']; ?>" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1"> Add Imfromaction</label>
                                            <textarea name="imfromactiones" class="form-control" id="exampleTextarea1" rows="4"><?php echo $row['imfromaction']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Title2:</label>
                                            <input type="text" name="title2" class="form-control" id="exampleInputEmail3" value="<?php echo $row['title2']; ?>" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Imfromaction2</label>
                                            <textarea name="imfromactiones2" class="form-control" id="exampleTextarea1" rows="4">  <?php echo $row['imfromaction2']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Add link </label>
                                            <input type="text" name="link" class="form-control" id="exampleInputEmail3" value="<?php echo $row['link']; ?>" placeholder="link">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Add Email </label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail3" value="<?php echo $row['email']; ?>" placeholder="Email">
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Update </button>
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
    <!-- plugins:js -->
    <?php
    include '../../../links/footer.php';
    ?>
    <!-- End custom js for this page -->
</body>

</html>