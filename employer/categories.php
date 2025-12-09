<?php
include "../config/db.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "employer") {
  $userid = $_SESSION["user_id"];
} else {
  echo "<script>location.href = '../login.php'</script>";
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-my-packages.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

<head>
  <!-- Basic Page Needs -->
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

  <title>Jobtex TF</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Font -->
  <link rel="stylesheet" href="../fonts/fonts.css">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../stylesheets/bootstrap.min.css">

  <!-- swiper slider -->
  <link rel="stylesheet" href="../stylesheets/swiper-bundle.min.css" />

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Theme Style -->
  <link rel="stylesheet" type="text/css" href="../stylesheets/shortcodes.css">
  <link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
  <link rel="stylesheet" type="text/css" href="../stylesheets/dashboard.css">

  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="../stylesheets/responsive.css">

  <!-- Favicon and Touch Icons  -->
  <link rel="shortcut icon" href="../images/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="../images/favicon.png">

</head>

<body class="dashboard show ">
  <a id="scroll-top"></a>

  <!-- preloade -->
  <!-- <div class="preload preload-container">
    <div class="preload-logo">
      <div class="spinner"></div>
    </div>
  </div> -->



  <?php include "partials/menu.php"; ?>
  <!-- left sidebar end -->



  <div class="dashboard__content">
    <section class="page-title-dashboard">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">
            <div class="title-dashboard">
              <div class="title-dash flex2">Categories</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=" p-3">
      <div class="themes-container bg-white p-4 mb-4">
        <form method="post">
          <div class="input-group">
            <input type="text" name="category" class="form-control">
            <input type="submit" class="btn btn-success position-relative top-0 w-auto" name="save" value="Save">
          </div>
          <?php
          if (isset($_POST["save"])) {
            $category = $_POST["category"];

            $insertCat = mysqli_query($conn, "INSERT INTO `categories` (`name`) VALUES ('$category')");
            if ($insertCat) {
              echo "<script>alert('Category added!')</script>";
            } else {
              echo "<script>alert('Failed to add category!')</script>";
            }
          }
          ?>
        </form>
      </div>
    </section>

    <section class="flat-dashboard-my-packages flat-dashboard-applicants">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">

            <div class="applicants bg-white">

              <div class="table-content">
                <div class="wrap-applicants table-responsive">
                  <table>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $getCat = mysqli_query($conn, "SELECT * FROM `categories` ORDER BY `id` DESC");
                      if (mysqli_num_rows($getCat) > 0) {
                        $categories = mysqli_fetch_all($getCat, MYSQLI_ASSOC);
                      }

                      if (isset($categories) && is_array($categories)) {
                        foreach ($categories as $category) {
                          ?>
                          <tr class="file-delete">
                            <td>
                              <div class="fs-16"><?= $category["id"] ?></div>
                            </td>
                            <td>
                              <div class="fs-16"><?= $category["name"] ?></div>
                            </td>
                            <td>
                              <div class="times-wrap">
                                <a href="#" class="fw-7 text-success fs-16"> Edit</a>
                                <a href="#" class="fw-7 text-danger fs-16"> Delete</a>
                              </div>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>




                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="flat-dashboard-bottom">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">
            <h5 class="center">©2023 Jobtex. All Rights Reserved.</h5>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/jquery.cookie.js"></script>
  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/bootstrap.min.js"></script>
  <script src='../javascript/wow.min.js'></script>
  <script src="../javascript/main.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>


</body>


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-my-packages.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

</html>