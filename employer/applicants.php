<?php
include "../config/db.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "employer") {
  $userid = $_SESSION["user_id"];
} else {
  echo "<script>location.href = '../login.php'</script>";
}

if (!empty($_GET["s"])) {
  $s = $_GET["s"];
  $getAppliedJobs = mysqli_query($conn, "SELECT c.*, j.title, e.company_name FROM candidates c JOIN applicants a ON a.userid = c.id JOIN jobs j ON j.id = a.jobid JOIN employers e ON e.id = a.employer_id WHERE ((c.fullname LIKE '%$s%') OR (j.title LIKE '%$s%') OR (j.description LIKE '%$s%') OR (j.tags LIKE '%$s%') OR (j.type LIKE '%$s%') OR (j.country LIKE '%$s%') OR (e.company_name LIKE '%$s%')) AND a.userid = '$userid' ORDER BY a.id DESC");
} else {
  $getAppliedJobs = mysqli_query($conn, "SELECT c.*, j.title, e.company_name FROM candidates c JOIN applicants a ON a.userid = c.id JOIN jobs j ON j.id = a.jobid JOIN employers e ON e.id = a.employer_id WHERE a.userid = '$userid' ORDER BY a.id DESC");
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-applicants-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

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
              <div class="title-dash flex2">Applicants Jobs</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="flat-dashboard-applicants">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">

            <div class="applicants bg-white">
              <div class="dash-search flex">
                <div class="widget search">
                  <div class="search-flat">
                    <form method="get" role="search" class="search-form">
                      <input type="search" class="search-field" placeholder="Search" value="" name="s"
                        title="Search for" required="">
                      <button class="search-icon search-submit" type="submit" title="Search"></button>
                    </form>
                  </div>
                </div>

              </div>
              <h3 class="title-appli">Recent Applicants</h3>
              <div class="table-content">
                <div class="wrap-applicants table-responsive">
                  <table>
                    <thead>
                      <tr>
                        <th>Candidates</th>
                        <th>Applied date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (mysqli_num_rows($getAppliedJobs) > 0):
                        $appliedJobs = mysqli_fetch_all($getAppliedJobs, MYSQLI_ASSOC);
                        foreach ($appliedJobs as $job):
                          ?>
                          <!-- col 1 -->
                          <tr class="file-delete">
                            <td>
                              <div class="candidates-wrap flex2">
                                <div class="images">
                                  <img src="../uploads/<?= $job["image"] ?>" alt="">
                                </div>
                                <div class="content">
                                  <h5 class="fw-6 color-3"><?= $job["title"] ?></h5>
                                  <h3><?= $job["fullname"] ?></h3>
                                  <div class="now-box flex2">
                                    <div class="button-now"><a class="#"> <?= $job["email"] ?> </a></div>
                                    <div class="map color-4"><?= $job["country"] ?></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="title-day color-1"><?= date("F d, Y", strtotime($job["created_at"])) ?></div>
                            </td>
                          </tr>
                          <?php
                        endforeach;
                      else:
                        ?>
                        <tr>
                          <td colspan="2" class="text-center p-3">No jobs found</td>
                        </tr>
                        <?php
                      endif;
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
  <script src="../javascript/jquery.nice-select.min.js"></script>
  <script src='../javascript/wow.min.js'></script>
  <script src="../javascript/main.js"></script>
  <script src="../javascript/dropdown.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>


</body>


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-applicants-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

</html>