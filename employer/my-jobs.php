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


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-my-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:32 GMT -->

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
              <div class="title-dash flex2">My Job</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="flat-dashboard-myjob flat-dashboard-applicants">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">

            <div class="applicants bg-white">
              <div class="dash-search flex">
                <div class="widget search">
                  <div class="search-flat">
                    <form action="#" method="get" role="search" class="search-form">
                      <input type="search" class="search-field" placeholder="Search" value="" name="s"
                        title="Search for" required="">
                      <button class="search-icon search-submit" type="submit" title="Search"></button>
                    </form>
                  </div>
                </div>
                <div id="item_category2" class="dropdown titles-dropdown ">
                  <a class="btn-selector nolink "> Sort by (Defaut)</a>
                  <ul>
                    <li><span>UX/UI</span></li>
                    <li><span>Candidates</span></li>
                    <li><span>Days</span></li>
                  </ul>
                </div>
              </div>

              <div class="table-content">
                <div class="wrap-applicants table-responsive">
                  <table>
                    <thead>
                      <tr>
                        <th>My jobs</th>
                        <th>Applicants</th>
                        <th>Created & expiry</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $getJobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `employer_id` = '$userid' ORDER BY created_at DESC");
                      if (mysqli_num_rows($getJobs) > 0) {
                        $jobs = mysqli_fetch_all($getJobs, MYSQLI_ASSOC);
                        foreach ($jobs as $job) {
                          ?>
                          <tr class="file-delete">
                            <td>
                              <div class="candidates-wrap flex2">
                                <div class="content">
                                  <div class="title-box flex2">
                                    <h3><?= $job["title"]; ?></h3>
                                    
                                  </div>
                                  <div class="now-box flex2">
                                    <div class="map color-4"><?= $job["address"]; ?></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <h5>213 Applicants</h5>
                            </td>
                            <td>
                              <h6 class="fw-5">Created: <?= date("M d, Y", strtotime($job["created_at"])) ?></h6>
                              <h6 class="fw-5">Expiry date: <?= date("M d, Y", strtotime($job["deadline"])) ?></h6>
                            </td>
                            
                            <td>
                              <div class="action-wrap">
                                <ul class="flex2">
                                  <li class="hv-tool" data-tooltip="Write"><a class="action-icon icon-write1"></a></li>
                                  <li><a class="button-cancel btn-danger fw-7 remove-file">Delete</a></li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                      <!-- col 1 -->



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
  <script src="../javascript/countto.js"></script>
  <script src="../javascript/dropdown.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>


</body>


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-my-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:32 GMT -->

</html>