<?php
require_once '../../../admin/database/dbcon.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = mysqli_query($con, "SELECT * from a where id=$id ");
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

<body>
  <div class="container-scroller">



    <?php foreach ($sql as $row) :  ?>
      <div class="content-wrapper">

        <div class="page-header">
          <img src="../../../img/<?php echo $row['shoplogo'];?>" alt="img" style="width: 50px; height: 50px; border: 2px solid gray; border-radius: 20px;">
          <h1 class="page-title text-primary"> <?php echo $row['name']; ?></h1>

          <a href="tel: +9112345677890" class="d-inline-block mb-2 text-decoration-none text-dark ">
            <i class="bi bi-telephone-plus"> </i>
          </a>

        </div>


        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card text-dark">
              <div class="card-body">
                <h4 class="card-title tex"> TIME</h4>
                <p class="card-description text-dark"> 9:00am T0 5:30pm </p>
              </div>
              <div class="card-body" style="margin-top: -10px; margin-bottom: -10px;">
                <h4 class="card-title text-danger"><?php echo $row['title']; ?></h4>
                <p class="text-lowercase"> <?php echo $row['imfromaction']; ?></p>
              </div>
              <div class="card-body" style="margin-top: -10px; margin-bottom: -10px;">
                <h4 class="card-title text-warning"><?php echo $row['title2']; ?></h4>
                <p class="text-lowercase"> <?php echo $row['imfromaction2']; ?> </p>
              </div>
              <div class="card-body">
                <a href="tel: <?php echo $row['mobile_no']; ?>" class="d-inline-block text-decoration-none text-dark">
                  <i class="bi bi-telephone"></i> <?php echo $row['mobile_no']; ?></a><br><br>
                <a href="<?php echo $row['link']; ?>" class="d-inline-block text-decoration-none text-dark">
                  <i class="bi bi-link"></i> <?php echo $row['link']; ?></a><br><br>

                  <a href="<?php echo $row['email']; ?>" class="d-inline-block text-decoration-none text-dark">
                  <i class="bi bi-envelope"></i> <?php echo $row['email']; ?></a>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
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
<?php endforeach; ?>

<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php
include '../../../links/footer.php';
?>
</body>

</html>