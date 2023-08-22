<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <img src="img/shlock.png">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <select class="form-control form-control-lg" name="floor_number" id="exampleFormControlSelect2">
                      <option>G-201</option>
                      <option>G-202</option>
                      <option>G-203</option>
                      <option>G-204</option>
                      <option>G-205</option>
                      <option>G-206</option>
                      <option>G-207</option>
                      <option>G-208</option>
                      <option>G-209</option>
                      <option>G-210</option>
                      <option>F-201</option>
                      <option>F-202</option>
                      <option>F-203</option>
                      <option>F-204</option>
                      <option>F-205</option>
                      <option>F-206</option>
                      <option>F-207</option>
                      <option>F-208</option>
                      <option>F-209</option>
                      <option>F-210</option>  
                      <option>S-201</option>
                      <option>S-202</option>
                      <option>S-203</option>
                      <option>S-204</option>
                      <option>S-205</option>
                      <option>S-206</option>
                      <option>S-207</option>
                      <option>S-208</option>
                      <option>S-209</option>
                      <option>S-210</option>   
                      <option>T-201</option>
                      <option>T-202</option>
                      <option>T-203</option>
                      <option>T-204</option>
                      <option>T-205</option>
                      <option>T-206</option>
                      <option>T-207</option>
                      <option>T-208</option>
                      <option>T-209</option>
                      <option>T-210</option>        
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                  <button type="submit" name="submit" value="Login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Ragister</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
<?php

include 'database/dbcon.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $floor_number = mysqli_real_escape_string($con, $_POST['floor_number']);
    $password = md5($_POST['password']);

    // Check
    $check_sql = "SELECT * FROM admin WHERE floor_number = '$floor_number'";
    $result = $con->query($check_sql);

    if ($result->num_rows > 0) {
        echo "Error: Floor number already registered.";
    } else {
        // Insert data 
        $insert_sql = "INSERT INTO admin (username, floor_number, password) VALUES ('$username', '$floor_number', '$password')";

        if ($con->query($insert_sql) === TRUE) {
            // header("Location: home.php");
            // exit(); 

        } else {
            echo "Error: ";
        }
    }

    $con->close();
}

?>
