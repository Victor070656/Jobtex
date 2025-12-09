<?php
include "config/db.php";
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/create-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:06 GMT -->

<head>
 

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
  <!-- <div class="preload preload-container">
    <div class="preload-logo">
      <div class="spinner"></div>
    </div>
  </div> -->
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
                  <li><a href="#">Create Account</a></li>
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
            <h4>Create a free account</h4>
            <ul class="menu-tab">
              <li class="ct-tab active">Candidate</li>
              <li class="ct-tab">Employer</li>
            </ul>
            <div class="content-tab">
              <!-- candidate -->
              <div class="inner">
                <form method="post" >
                  <div class="ip">
                    <label>Full Name<span>*</span></label>
                    <input type="text" name="fullname" placeholder="Name">
                  </div>
                  <div class="ip">
                    <label>Email address<span>*</span></label>
                    <input type="email" name="email" placeholder="Email address">
                  </div>
                  <div class="ip">
                    <label>Password<span>*</span></label>
                    <div class="inputs-group auth-pass-inputgroup">
                      <input type="password" name="password" class="input-form password-input"
                        placeholder="Password" required="">
                      <a class="icon-eye-off password-addon"></a>
                    </div>
                  </div>
                  
                  <button name="candidate" type="submit">Register</button>
                  <div class="sign-up">Already have an account?<a href="login.php">Login Here</a></div>
                  

                  <?php 
                  if(isset($_POST["candidate"])){
                    $fullname = $_POST["fullname"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $sql = "INSERT INTO `candidates` (`fullname`, `email`, `password`) VALUES ('$fullname', '$email', '$password')";
                    $run = mysqli_query($conn, $sql);
                    if($run){
                      echo "<script>alert('Registered Successfully'); location.href = 'login.php'</script>";
                    }else{
                      echo "<script>alert('Failed to Register')</script>";
                    }
                  }
                  ?>
                </form>
              </div>
              <!-- employer -->
              <div class="inner">
                <form method="post" >
                  <div class="ip">
                    <label>Company Name<span>*</span></label>
                    <input type="text" name="company" placeholder="Company Name">
                  </div>
                  <div class="ip">
                    <label>Email address<span>*</span></label>
                    <input type="email" name="email" placeholder="Name">
                  </div>
                  <div class="ip">
                    <label>Password<span>*</span></label>
                    <div class="inputs-group auth-pass-inputgroup">
                      <input type="password" name="password" class="input-form password-input"
                        placeholder="Password" required="">
                      <a class="icon-eye-off password-addon"></a>
                    </div>
                  </div>
                 
                  <button name="employer" type="submit" >Register</button>
                  <div class="sign-up">Already have an account?<a href="login.php">Login Here</a></div>
                  
                  <?php
                  if (isset($_POST["employer"])) {
                    $company = $_POST["company"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    $sql = "INSERT INTO `employers` (`company_name`, `email`, `password`) VALUES ('$company', '$email', '$password')";
                    $run = mysqli_query($conn, $sql);
                    if ($run) {
                      echo "<script>alert('Registered Successfully'); location.href = 'login.php'</script>";
                    } else {
                      echo "<script>alert('Failed to Register')</script>";
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

<!-- Mirrored from themesflat.co/html/jobtex/create-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:06 GMT -->

</html>