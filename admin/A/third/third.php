<?php
require_once '../../database/dbcon.php';




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> first Floot List </title>

  <!-- plugins:css -->
  <?php include '../../../links/headlink.php'; ?>
  <!-- End layout styles -->

</head>
<style>
  li {
    list-style-type: none;
  }

  .form-group {
    margin-bottom: -0.5rem;

  }

  .form-group label {
    margin-bottom: -0.5rem;
  }


  @media (max-width: 768px) {

    /* Adjust the font size and padding for smaller screens */
    #floor-number {
      font-size: 14px;
      padding: 0.25rem 0.5rem;
    }
  }
</style>

<body>

  <div class="container-scroller">
    <?php
    include '../../inc/nevbar.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php
      include '../../inc/sidebar.php';
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin ">
              <div class="">
                <div class="body">
                  <!-- <h4 class="card-title">button</h4> -->
                  <div class="template-demo d-flex justify-content-center">
                    <a href="add.php">
                      <button type="button" class="btn btn-primary btn-rounded btn-fw fs-6 pl-5 pr-5 m-2">Add Floor </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $sql = mysqli_query($con, "SELECT * FROM a WHERE floor='third' ORDER BY floor_number ASC");

          if (mysqli_num_rows($sql) > 0) :

            foreach ($sql as $row) :  ?>
              <div class="container">
                <div class="card mb-3">
                  <div class="card border border-primary rounded-4">
                    <div class="d-flex justify-content-between">
                      <div>
                        <a href="shop/detail.php?id=<?php echo $row['id'] ?>" class="col-sm-6">
                          <div class="card pl-4 pt-4 pb-2 m-0 ">
                            <h4 class="text-primary"><?php echo $row['floor_number']; ?> </h4>
                            <span class="text-dark"> <?php echo $row['name']; ?></span>
                          </div>
                        </a>
                      </div>
                      <div class="d-inline align-items-center mt-4">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="mr-2">
                          <button type="button" class="btn btn-success btn-sm edit-button mt-2   " data-record-id="<?php echo $row['id'] ?>">
                            <i class="mdi mdi-update fw-medium text-center "></i> Edit..
                          </button>
                        </a>
                        <div class="vl mx-2"></div>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">
                          <button type="button" class="btn btn-danger btn-sm delete-button mt-2 mr-3" data-record-id="<?php echo $row['id'] ?>">
                            <i class="mdi mdi-delete fw-medium btn-fw"></i> Delete
                          </button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../../../partials/_footer.html -->
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
  <!-- footer -script links  -->
  <?php
            include '../../../links/footer.php';
  ?>

</body>

</html>

<?php else : ?>
  <h1>ADD more Floor</h1>
<?php endif; ?>