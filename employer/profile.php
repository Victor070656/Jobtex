<?php
include "../config/db.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "employer") {
  $userid = $_SESSION["user_id"];
} else {
  echo "<script>location.href = '../login.php'</script>";
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <!--<![endif]-->

  <!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:32 GMT -->
  <head>
    <!-- Basic Page Needs -->
    <!--[if IE
      ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
    /><![endif]-->

    <title>Jobtex TF</title>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Font -->
    <link rel="stylesheet" href="../fonts/fonts.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../stylesheets/bootstrap.min.css" />

    <!-- swiper slider -->
    <link rel="stylesheet" href="../stylesheets/swiper-bundle.min.css" />

    <link rel="stylesheet" href="../stylesheets/jquery.fancybox.min.css" />

    <!-- Mobile Specific Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Theme Style -->

    <link
      rel="stylesheet"
      type="text/css"
      href="../stylesheets/shortcodes.css"
    />
    <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="../stylesheets/dashboard.css"
    />

    <!-- Responsive -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../stylesheets/responsive.css"
    />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="../images/favicon.png" />
  </head>

  <body class="dashboard show">
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
            <div class="col-lg-12 col-md-12">
              <div class="title-dashboard">
                <div class="title-dash flex2">Profile</div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="flat-dashboard-profile">
        <div class="themes-container">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="wrap-profile flex2 bg-white">
                <div class="box-profile flex2">
                  <div class="images">
                    <img src="<?= "../uploads/".$userInfo["image"] ?>" style="width: 100px; height: 100px; border-radius: 10px; object-fit: cover; " />
                  </div>
                  <div class="content">
                    <div class="check-box flex2">
                      <h3><?= $userInfo["company_name"] ?></h3>
                      <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10Z"
                          fill="#504CFE"
                        />
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M10.9099 3.73218C11.052 3.77687 11.1762 3.86573 11.2643 3.98583C11.3524 4.10593 11.3999 4.25102 11.3999 4.39998V7.89998H14.1999C14.328 7.89992 14.4536 7.93499 14.5631 8.00136C14.6726 8.06773 14.7618 8.16286 14.821 8.2764C14.8801 8.38994 14.9071 8.51754 14.8988 8.64532C14.8905 8.77309 14.8473 8.89614 14.7739 9.00108L9.87392 16.0011C9.78864 16.1233 9.6666 16.215 9.52556 16.2631C9.38452 16.3111 9.23183 16.3129 9.08971 16.2681C8.94759 16.2234 8.82345 16.1344 8.73537 16.0143C8.64728 15.8941 8.59983 15.749 8.59992 15.6V12.1H5.79992C5.67188 12.1 5.54627 12.065 5.43677 11.9986C5.32727 11.9322 5.23808 11.8371 5.17889 11.7236C5.1197 11.61 5.09279 11.4824 5.10108 11.3546C5.10937 11.2269 5.15255 11.1038 5.22592 10.9989L10.1259 3.99888C10.2113 3.87693 10.3334 3.78539 10.4744 3.73755C10.6154 3.68972 10.7679 3.68808 10.9099 3.73288V3.73218Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                    <div class="map color-4"><?= $userInfo["address"] ?></div>
                  </div>
                </div>
                <div class="tt-button">
                  <a href="profile-setting.php">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="flat-dashboard-about">
        <div class="themes-container">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="wrap-about flex">
                <div class="side-bar">
                  <div class="sidebar-map bg-white">
                    <div class="title-box flex">
                      <div class="p-16">Website</div>
                      <a href="<?= $userInfo["website"] ?>">
                        <h4 class="color-3"><?= $userInfo["website"] ?></h4>
                      </a>
                    </div>
                    <div class="title-box flex">
                      <div class="p-16">Email</div>
                      <h4>
                        <a href="mailto:<?= $userInfo["email"] ?>"
                          ><?= $userInfo["email"] ?></a
                        >
                      </h4>
                    </div>

                    <div class="title-box flex">
                      <div class="p-16">Company size</div>
                      <h4><?= $userInfo["company_size"] ?> Employees</h4>
                    </div>
                    <div class="title-box flex">
                      <div class="p-16">Headquarters</div>
                      <h4><?= $userInfo["address"] ?></h4>
                    </div>
                    <div class="title-box flex">
                      <div class="p-16">Founded</div>
                      <h4><?= date("Y",strtotime($userInfo["founded"])) ?></h4>
                    </div>
                    <div class="wrap-icon">
                      <h4>Socials:</h4>
                      <div class="box-icon flex">
                        <a href="<?= $userInfo["facebook"] ?>" class="icon-facebook"></a>
                        <a href="<?= $userInfo["linkedin"] ?>" class="icon-linkedin2"></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="post-about widget-dash-video bg-white">
                  <h3 class="title-about">About Company</h3>
                  <p class="text-1">
                    <?= $userInfo["about"] ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="flat-dashboard-bottom">
        <div class="themes-container">
          <div class="row">
            <div class="col-lg-12 col-md-12">
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
    <script src="../javascript/wow.min.js"></script>
    <script src="../javascript/main.js"></script>
    <script src="../javascript/countto.js"></script>
    <script src="../javascript/jquery.fancybox.js"></script>
    <script src="../javascript/dropdown.js"></script>
    <script src="../javascript/dashboard-menu.min.js"></script>
    <script src="../javascript/dashboard-menu.js"></script>
  </body>

  <!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:35 GMT -->
</html>
