
<?php 
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo text-white " href="index.php">  <?php echo $_SESSION['complex_name'];?></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-xl-block">
          <form class="d-flex align-items-center h-100" action="#">
           
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
         

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="fs-5 bg-black ">
               <!-- jeel patel  --> <?php echo $_SESSION['username'];?>
                <!-- <img src="assets/images/faces/face28.png" alt="image"> -->
              </div>
              <!-- <div class="nav-profile-text fw-bold fs-1 ">
                <p class="mb-1 fw-bold fs-lg-1"></p>

              </div> -->
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
              <div class="p-3 text-center bg-primary">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/faces/face28.png" alt="">
              </div>
              <div class="p-2">

                <div role="separator" class="dropdown-divider"></div>
                <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">User</h5>
                <p class="text-uppercase  pl-2 text-dark mt-2"> jeel patel</p>
                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                  <a href="././logout.php  " class="text-black fw-bold fs-1">Logout</a>
                  <i class="mdi mdi-logout ml-1"></i>
                </a>
              </div>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
</body>
</html>



