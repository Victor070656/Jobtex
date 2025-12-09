<?php
include "config/db.php";
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:03 GMT -->

<head>
  <!-- Basic Page Needs -->
  <!--[if IE
      ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
    /><![endif]-->

  <title>Jobtex TF</title>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Font -->
  <link rel="stylesheet" href="fonts/fonts.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="stylesheets/bootstrap.min.css" />
  <link rel="stylesheet" href="stylesheets/boostrap-select.min.css" />


  <!-- swiper slider -->
  <link rel="stylesheet" href="stylesheets/swiper-bundle.min.css" />

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Style -->
  <link rel="stylesheet" type="text/css" href="stylesheets/shortcodes.css" />
  <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />

  <!-- Favicon and Touch Icons  -->
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="images/favicon.png">
  <!-- Colors -->
  <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors">
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css" />

</head>

<body>
  <a id="scroll-top"></a>

  <!-- preloade -->
  <div class="preload preload-container">
    <div class="preload-logo">
      <div class="spinner"></div>
    </div>
  </div>
  <!-- /preload -->
  <?php include "partials/mobile-menu.php"; ?>
  <!-- Boxed -->
  <div class="boxed">
    <!-- HEADER -->
    <?php include "partials/header.php"; ?>
    <!-- END HEADER -->

    <section class="bg-f5">
      <div class="tf-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title">
              <div class="widget-menu-link">
                <ul>
                  <li><a href="home-01.html">Home</a></li>
                  <li><a href="#">Login</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="account-section">
      <div class="tf-container">
        <div class="row">
          <div class="wd-form-login tf-tab">
            <h4>Login</h4>
            <ul class="menu-tab">
              <li class="ct-tab active">Candidate</li>
              <li class="ct-tab">Employer</li>
            </ul>
            <div class="content-tab">
              <!-- candidate -->
              <div class="inner">
                <form method="post">
                  <div class="ip">
                    <label>Email address<span>*</span></label>
                    <input type="text" name="email" placeholder="Name">
                  </div>
                  <div class="ip">
                    <label>Password<span>*</span></label>
                    <div class="inputs-group auth-pass-inputgroup">
                      <input type="password" class="input-form password-input" name="password" placeholder="Password"
                        required="">
                      <a class="icon-eye-off password-addon"></a>
                    </div>
                  </div>

                  <button name="candidate" type="submit">Login</button>
                  <div class="sign-up">Don't have an account?<a href="register.php">Register Here</a></div>

                  <?php
                  if (isset($_POST["candidate"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $sql = "SELECT * FROM `candidates` WHERE `email` = '$email' AND `password` = '$password'";
                    $run = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($run) > 0) {
                      $user = mysqli_fetch_assoc($run);
                      $_SESSION["user_id"] = $user["id"];
                      $_SESSION["user_type"] = "candidate";
                      echo "<script>alert('Logged in successfully'); location.href = 'index.php'</script>";
                    } else {
                      echo "<script>alert('Wrong credentials')</script>";
                    }
                  }
                  ?>
                </form>
              </div>
              <!-- employer -->
              <div class="inner">
                <form method="post">
                  <div class="ip">
                    <label>Company Email address<span>*</span></label>
                    <input type="text" name="email" placeholder="Name">
                  </div>
                  <div class="ip">
                    <label>Password<span>*</span></label>
                    <div class="inputs-group auth-pass-inputgroup">
                      <input type="password" class="input-form password-input" name="password" placeholder="Password"
                        required="">
                      <a class="icon-eye-off password-addon"></a>
                    </div>
                  </div>
                  <button type="submit" name="employer">Login</button>
                  <div class="sign-up">Don't have an account?<a href="register.php">Register Here</a></div>

                  <?php
                  if (isset($_POST["employer"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $sql = "SELECT * FROM `employers` WHERE `email` = '$email' AND `password` = '$password'";
                    $run = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($run) > 0) {
                      $user = mysqli_fetch_assoc($run);
                      $_SESSION["user_id"] = $user["id"];
                      $_SESSION["user_type"] = "employer";
                      echo "<script>alert('Logged in successfully'); location.href = 'employer/index.php'</script>";
                    } else {
                      echo "<script>alert('Wrong credentials')</script>";
                    }
                  }
                  ?>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


  </div><!-- /.boxed -->





  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/swiper-bundle.min.js"></script>
  <script src="javascript/bootstrap.min.js"></script>
  <script src="javascript/boostrap-select.min.js"></script>
  <script src="javascript/jquery.fancybox.js"></script>
  <script src="javascript/plugin.min.js"></script>
  <script src='javascript/wow.min.js'></script>
  <script src="javascript/password-addon.js"></script>
  <script src='javascript/swiper.js'></script>
  <script src='javascript/jquery.nice-select.min.js'></script>
  <script src="javascript/jquery.cookie.js"></script>
  <script src="javascript/switcher.js"></script>
  <script src="javascript/main.js"></script>
</body>


<!-- Mirrored from themesflat.co/html/jobtex/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:06 GMT -->

</html>