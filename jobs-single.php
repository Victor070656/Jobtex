<?php
include "config/db.php";
if (empty($_GET["id"])) {
  echo "<script>location.href = 'find-jobs.php'</script>";
} else {
  $job_id = $_GET["id"];
  $fetchJob = mysqli_query($conn, "SELECT j.*, e.company_name, e.image, e.website, e.email, e.phone, e.founded, e.company_size, e.facebook, e.linkedin FROM `jobs` j JOIN `employers` e ON j.employer_id = e.id WHERE j.id = '$job_id'");
  if (mysqli_num_rows($fetchJob) == 0) {
    echo "<script>alert('Job not found');location.href = 'find-jobs.php'</script>";
  } else {
    $job = mysqli_fetch_assoc($fetchJob);
  }
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/jobs-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:29:58 GMT -->

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
  <link rel="stylesheet" type="text/css" href="stylesheets/jquery.fancybox.min.css">

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

    <!-- popup apply job -->
    <div class="wd-popup-job-apply">
      <div class="modal-menu__backdrop"></div>
      <div class="content">
        <h6>Apply For This Job</h6>
        <form method="post">
          <p>Are you sure you want to apply for this job?</p>

          <button type="submit" name="apply">Apply</button>
          <?php

          if (isset($_POST["apply"])) {
            if ($isLoggedIn && $userType == "candidate") {

              $eid = $job["employer_id"];
              $apply = mysqli_query($conn, "INSERT INTO `applicants` (`userid`, `jobid`, `employer_id`) VALUES ('$userId', '$job_id', '$eid')");
              if ($apply) {
                echo "<script>alert('Applied successfully!')</script>";
              } else {
                echo "<script>alert('Something went wrong!')</script>";
              }
            } else {
              echo "<script>alert('You need to be logged in first!'); location.href = 'login.php'</script>";
            }
          }
          ?>
        </form>
      </div>
    </div>
    <!-- end -->

    <section class="single-job-thumb">
      <img src="images/review/singlejob.jpg" alt="images">
    </section>

    <section class="form-sticky fixed-space">
      <div class="tf-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="wd-job-author2">
              <div class="content-left">
                <div class="thumb">
                  <img src="uploads/<?= $job['image'] ?>" alt="logo">
                </div>
                <div class="content">
                  <a href="#" class="category"><?= $job["company_name"] ?></a>
                  <h6><a href="#"><?= $job["title"]; ?> <span class="icon-bolt"></span></a></h6>
                  <ul class="job-info">
                    <li><span class="icon-map-pin"></span>
                      <span><?= $job["address"]; ?></span>
                    </li>
                    <li><span class="icon-calendar"></span>
                      <span><?= date("M d, Y", strtotime($job['created_at'])) ?></span>
                    </li>
                  </ul>
                  <ul class="tags">
                    <li><a href="#"><?= $job["apply_type"]; ?></a></li>
                    <li><a href="#"><?= $job["type"]; ?></a></li>
                  </ul>
                </div>
              </div>
              <div class="content-right">
                <div class="top">
                  <a class="btn btn-popup"><i class="icon-send"></i>Apply Now</a>
                </div>
                <div class="bottom">

                  <div class="gr-rating">
                    <p><?= date("M d, Y", strtotime($job['deadline'])) ?></p>

                  </div>
                  <div class="price">
                    <span class="icon-dollar"></span>
                    <p><?= "$" . number_format($job['min_salary']) . " - $" . number_format($job['max_salary']) ?> <span
                        class="year">/<?= $job["salary_type"] ?></span></p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="inner-jobs-section">
      <div class="tf-container">
        <div class="row">
          <div class="col-lg-8">
            <article class="job-article tf-tab single-job">
              <ul class="menu-tab">
                <li class="ct-tab active">About</li>
              </ul>
              <div class="content-tab">
                <div class="inner-content">
                  <h5>Full Job Description</h5>
                  <p>
                    <?= $job["description"]; ?>
                  </p>


                </div>
              </div>
            </article>
          </div>
          <div class="col-lg-4">
            <div class="cv-form-details po-sticky job-sg">

              <ul class="list-infor">
                <li>
                  <div class="category">Website</div>
                  <div class="detail"><a href="<?= $job["website"]; ?>"><?= $job["website"]; ?></a></div>
                </li>
                <li>
                  <div class="category">Email</div>
                  <div class="detail"><?= $job["email"]; ?></div>
                </li>
                <li>
                  <div class="category">Company size</div>
                  <div class="detail"><?= $job["company_size"]; ?> employees</div>
                </li>
                <li>
                  <div class="category">Headquarters</div>
                  <div class="detail"><?= $job["address"]; ?></div>
                </li>
                <li>
                  <div class="category">Founded</div>
                  <div class="detail"><?= date("Y", strtotime($job["founded"])); ?></div>
                </li>
              </ul>

              <div class="wd-social d-flex aln-center">
                <span>Socials:</span>
                <ul class="list-social d-flex aln-center">
                  <li><a href="<?= $job["facebook"]; ?>"><i class="icon-facebook"></i></a></li>
                  <li><a href="<?= $job["linkedin"]; ?>"><i class="icon-linkedin2"></i></a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include "partials/footer.php"; ?>

  </div><!-- /.boxed -->



  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/swiper-bundle.min.js"></script>
  <script src="javascript/bootstrap.min.js"></script>
  <script src="javascript/boostrap-select.min.js"></script>
  <script src="javascript/jquery.fancybox.js"></script>
  <script src="javascript/plugin.min.js"></script>
  <script src='javascript/wow.min.js'></script>
  <script src='javascript/swiper.js'></script>
  <script src='javascript/jquery.nice-select.min.js'></script>
  <script src="javascript/jquery.cookie.js"></script>
  <script src="javascript/switcher.js"></script>
  <script src="javascript/main.js"></script>
</body>

<!-- Mirrored from themesflat.co/html/jobtex/jobs-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:31:02 GMT -->

</html>