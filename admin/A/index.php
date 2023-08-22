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
    include '../../links/headlink.php';
    ?>
</head>
<style>
  li{
    list-style-type: none;
  }
</style>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    <?php
    include '../inc/nevbar.php';
    ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
      include '../inc/sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Shlock Impire </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Back</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Buttons</li> -->
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buildings</h4>
                  <div class="template-demo text-center">
                    <ul>
                      <li><a href="ground/ground.php"><button type="button" class="btn btn-primary btn-rounded btn-fw m-2 ">Ground Floor </button></a></li>
                      <li><a href="first/first.php"><button type="button" class="btn btn-secondary btn-rounded btn-fw m-2"> First Floor</button></a></li>
                      <li><a href="second/second.php"><button type="button" class="btn btn-success btn-rounded btn-fw m-2">Second Floor</button></a></li>
                      <li><a href="third/third.php"><button type="button" class="btn btn-danger btn-rounded btn-fw m-2">Third Floor</button></a></li>
                    </ul>
                  </div>
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
  <!-- container-scroller -->
  <?php
    include '../../links/footer.php';
    ?>
</body>

</html>