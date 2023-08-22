<?php
require_once '../../admin/database/dbcon.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shlock emoire </title>
    <!-- plugins:css -->
    <?php
  include '../../links/headlink.php';
  ?>
</head>
<style>
    li {
        list-style-type: none;
    }
</style>

<body>
    <div class="container-scroller">

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header ">
                        <h2 class="page-title"> Shlock Impire </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../A/index.php  ">Back</a></li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">Buttons</li> -->
                            </ol>
                        </nav>
                    </div>
                    <?php $sql = mysqli_query($con, "SELECT  *  FROM a where floor='first'");
                    if (mysqli_num_rows($sql) > 0) :
                        foreach ($sql as $row) :  ?>
                            <div class="row">
                                <div class="col-12 grid-margin  rounded-4">
                                    <div class="card rounded-4">
                                        <a href="shop/detail.php?id=<?php echo $row['id'] ?>">
                                            <div class="card pl-4 pt-4 pb-2 m-0 rounded-4 hover">
                                                <h4 class="text-primary"><?php echo $row['floor_number']; ?></h4>
                                                <span class="text-dark"> <?php echo $row['name']; ?></span>
                                            </div>
                                        </a>

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
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">© Inspire Software co. 2021 All Rights Reserved</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <?php
  include '../../links/footer.php';
  ?>
</body>

</html>

<?php else : ?>
    <h1>Noo MORE Floor</h1>
<?php endif; ?>