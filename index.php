<?php
include "config/db.php";
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<!-- Mirrored from themesflat.co/html/jobtex/home-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:22:58 GMT -->

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
  <!-- Colors -->
  <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors" />

  <!-- Favicon and Touch Icons  -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon-precomposed" href="images/favicon.png" />

  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css" />
</head>

<body class="tf-popup-auto">
  <a id="scroll-top"></a>



  <?php include "partials/mobile-menu.php"; ?>

  <!-- Boxed -->
  <div class="boxed">
    <!-- HEADER -->
    <?php include "partials/header.php"; ?>
    <!-- END HEADER -->
    <!-- SLIDER-->
    <section class="tf-slider sl1 parallax">
      <div class="tf-container">
        <div class="row">
          <div class="col-xl-8">
            <div class="content">
              <div class="heading">
                <h2 class="text-white">Find the job that fits your life</h2>
                <p class="text-white">
                  Resume-Library is a true performance-based job board. Enjoy
                  custom hiring products and access to up to 10,000 new resume
                  registrations daily, with no subscriptions or user licences.
                </p>
              </div>
              <div class="form-sl">
                <form action="find-jobs.php" method="get">
                  <div class="row-group-search home1">
                    <div class="form-group-2 border-0">
                      <input type="text" name="s" class="input-filter-search border-0"
                        placeholder="Job title, key words or company" />
                    </div>
                    <div class="form-group-4">
                      <button type="submit" class="btn btn-find">
                        Find Jobs
                      </button>
                    </div>
                  </div>
                </form>
                <!-- End Job  Search Form-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
    </section>
    <!-- END SILDER -->
    <!-- Job-category -->
    <section class="job-category-section">
      <div class="tf-container">
        <div class="row">
          <div class="col-md-12">
            <div class="tf-title">
              <div class="group-title">
                <h1>Browse by category</h1>
                <p>Recruitment Made Easy in 100 seconds</p>
              </div>

            </div>
          </div>
          <!-- wd-job-category -->
          <div class="col-md-12">
            <div class="group-category-job wow fadeInUp">
              <?php
              $getCategories = mysqli_query($conn, "SELECT * FROM `categories`");
              if (mysqli_num_rows($getCategories) > 0) {
                $categories = mysqli_fetch_all($getCategories, MYSQLI_ASSOC);
                // var_dump($categories);
                foreach ($categories as $category) {
                  $catId = $category["id"];
                  $getCatJobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE `category_id` = '$catId'");
                  ?>
                  <div class="job-category-box">
                    <div class="job-category-header">
                      <h1><a href="find-jobs.php?cat=<?= $catId ?>"><?= $category["name"] ?></a></h1>
                      <p><?= $getCatJobs->num_rows; ?> Jobs available</p>
                    </div>
                    <a href="find-jobs.php?cat=<?= $catId ?>" class="btn-category-job">Explore Jobs <span
                        class="icon-keyboard_arrow_right"></span></a>
                  </div>
                  <?php
                }
              } else {

                ?>
                <p class="text-center py-5">To Categories yet</p>
                <?php

              }
              ?>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Job-category -->
    <!-- WD-JOB -->
    <section class="jobs-section-three">
      <div class="tf-container">
        <div class="tf-title style-2">
          <div class="group-title">
            <h1>Recent Jobs</h1>
            <p>
              Find the job that’s perfect for you. about 800+ new jobs
              everyday
            </p>
          </div>
        </div>
        <div class="row wow fadeInUp">
          <?php
          $fetchRecentJobs = mysqli_query($conn, "SELECT j.*, e.company_name, e.image FROM `jobs` j JOIN `employers` e ORDER BY j.created_at DESC LIMIT 6");
          if (mysqli_num_rows($fetchRecentJobs) > 0) {
            $recentJobs = mysqli_fetch_all($fetchRecentJobs, MYSQLI_ASSOC);
            foreach ($recentJobs as $job) {
              ?>
              <!-- job -->
              <div class="col-lg-6">
                <div class="features-job">
                  <div class="job-archive-header">
                    <div class="inner-box">
                      <div class="logo-company">
                        <img src="uploads/<?= $job['image'] ?>" alt="images/logo-company/cty8.png" />
                      </div>
                      <div class="box-content">
                        <h4>
                          <a href="jobs-single.php?id=<?= $job['id'] ?>"><?= $job['company_name'] ?></a>
                        </h4>
                        <h3>
                          <a href="jobs-single.php?id=<?= $job['id'] ?>"> <?= $job['title'] ?> </a>
                          <span class="icon-bolt"></span>
                        </h3>
                        <ul>
                          <li>
                            <span class="icon-map-pin"></span>
                            <?= $job['address'] ?>
                          </li>
                          <li>
                            <span class="icon-calendar"></span>
                            <?= date("M d, Y",strtotime($job['deadline'])) ?>
                          </li>
                        </ul>
                        <!-- <span class="icon-heart"></span> -->
                      </div>
                    </div>
                  </div>
                  <div class="job-archive-footer">
                    <div class="job-footer-left">
                      <ul class="job-tag">
                        <li><a href="#"><?= $job['apply_type'] ?></a></li>
                        <li><a href="#"><?= $job['type'] ?></a></li>
                      </ul>
                      
                    </div>
                    <div class="job-footer-right">
                      <div class="price">
                        <span class="icon-dolar1"></span>
                        
                        <p><?= "$".number_format($job['min_salary']) . " - $" . number_format($job['max_salary']) ?> <span class="year">/<?= $job["salary_type"] ?></span></p><!-- <p class="days">22 days left to apply</p> -->
                      </div>
                    </div>
                  </div>
                  <a href="jobs-single.php?id=<?= $job['id'] ?>" class="jobtex-link-item" tabindex="0"></a>
                </div>
              </div>
              <?php
            }
          } else {
          }
          ?>


          <div class="col-md-12">
            <div class="wrap-button">
              <a href="find-jobs.php" class="tf-button style-1">
                See more Jobs
                <span class="icon-keyboard_arrow_right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--END WD-JOB -->
    <!-- WD-icon-box  -->
    <section class="wd-iconbox flat-row background1">
      <div class="tf-container">
        <div class="title-iconbox">
          <h1>What can I do with Jobtex?</h1>
          <p>
            Streamline your hiring process with strategic channels to reach
            qualified candidates
          </p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-6 wow fadeInUp">
            <!-- tf-iconbox -->
            <div class="tf-iconbox">
              <div class="box-header">
                <div class="icon">
                  <svg width="42" height="43" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M10.1242 26.6601C12.2169 26.6601 13.9133 24.9714 13.9133 22.8883C13.9133 20.8052 12.2169 19.1165 10.1242 19.1165C8.03144 19.1165 6.33496 20.8052 6.33496 22.8883C6.33496 24.9714 8.03144 26.6601 10.1242 26.6601Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M8.59724 31.9404L10.1242 35.9951C10.5767 37.1832 11.7078 37.9753 12.9897 37.9753H18.3624C19.2484 37.9753 19.9648 37.2586 19.9648 36.3723C19.9648 35.5613 19.3616 34.8824 18.5509 34.7881L14.4036 34.2789C14.1019 34.2412 13.838 34.0337 13.7626 33.732C13.5175 32.8079 12.952 30.8277 12.3676 29.6962C11.6135 28.1874 10.8594 26.6787 8.20135 26.6787C4.78919 26.6787 4.03512 28.9418 3.28106 31.9592C2.52699 34.9767 1 41.0116 1 41.0116"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M10.8778 37.221L10.1426 40.9928" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15.4209 37.9753H39.5511" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M24.452 8.55534C25.7117 8.55534 26.733 7.54212 26.733 6.29226C26.733 5.04239 25.7117 4.02917 24.452 4.02917C23.1922 4.02917 22.1709 5.04239 22.1709 6.29226C22.1709 7.54212 23.1922 8.55534 24.452 8.55534Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M20.7002 13.8358V12.9871C20.7002 9.66792 22.4346 8.55524 24.0935 8.55524H24.8476C26.5065 8.55524 28.2409 9.66792 28.2409 12.9871V13.8358"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M11.6504 10.0641V3.2748C11.6504 2.03011 12.6684 1.01172 13.9126 1.01172H23.7155"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M11.6504 10.0641V14.5902C11.6504 15.8349 12.6684 16.8533 13.9126 16.8533H28.2399L32.7643 21.3795V16.8533H35.7806C37.0248 16.8533 38.0428 15.8349 38.0428 14.5902V3.2748C38.0428 2.03011 37.0248 1.01172 35.7806 1.01172H23.7155"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M22.208 34.2035L25.9783 24.3969H40.3056L36.5353 34.2035H22.208Z" stroke="#14A077"
                      stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M28.9951 37.9753V34.2035" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </div>
              </div>
              <div class="box-content">
                <h1 class="box-title">
                  <a href="about-us.html">Reduce Hiring bias</a>
                </h1>
                <p>
                  Structured digital interviews increase the predictive
                  validity of your hires by 65%.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
            <!-- tf-iconbox -->
            <div class="tf-iconbox">
              <div class="box-header">
                <div class="icon">
                  <svg width="38" height="43" viewBox="0 0 38 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M18.7024 27.3992C20.2963 27.3992 21.5883 26.1138 21.5883 24.5282C21.5883 22.9426 20.2963 21.6572 18.7024 21.6572C17.1085 21.6572 15.8164 22.9426 15.8164 24.5282C15.8164 26.1138 17.1085 27.3992 18.7024 27.3992Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M21.959 31.334V41.0114" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15.5098 41.0114V31.334" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.77148 41.0114V31.334" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M18.7358 27.415H17.2848C15.2856 27.415 12.9316 28.1086 12.9316 31.3344V36.157C12.9316 37.2054 13.8023 38.0602 14.8664 38.0602H15.3501"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M10.6907 27.3992C12.2845 27.3992 13.5766 26.1138 13.5766 24.5282C13.5766 22.9426 12.2845 21.6572 10.6907 21.6572C9.09679 21.6572 7.80469 22.9426 7.80469 24.5282C7.80469 26.1138 9.09679 27.3992 10.6907 27.3992Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M10.9472 27.415H9.51231C7.52921 27.415 5.19141 28.1086 5.19141 31.3344V36.157C5.19141 37.2054 6.04592 38.0602 7.11002 38.0602H7.5937"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M29.6992 41.0114V31.334" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M26.8118 27.3992C28.4056 27.3992 29.6977 26.1138 29.6977 24.5282C29.6977 22.9426 28.4056 21.6572 26.8118 21.6572C25.2179 21.6572 23.9258 22.9426 23.9258 24.5282C23.9258 26.1138 25.2179 27.3992 26.8118 27.3992Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M26.5215 27.415H27.9564C29.9395 27.415 32.2773 28.1086 32.2773 31.3344V36.157C32.2773 37.2054 31.4228 38.0602 30.3587 38.0602H29.875"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M18.7344 27.415H20.1854C22.1846 27.415 24.5386 28.1086 24.5386 31.3344V36.157C24.5386 37.2054 23.6679 38.0602 22.6038 38.0602H22.1202"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M18.7344 41.0112V38.0596" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M27.7642 10.6895L18.7355 19.0765L13.5762 15.2056" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.7344 3.59277V4.8831" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M26.475 5.67285L25.8301 6.78576" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M32.134 11.334L31.0215 11.9791" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M34.2136 19.0762H32.9238" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3.25781 19.0762H4.54763" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M5.33789 11.334L6.45037 11.9791" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M10.9961 5.673L11.641 6.78591" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M34.745 26.3827C35.8413 24.0762 36.4701 21.4956 36.4701 18.7537C36.4701 8.9472 28.5377 1.01172 18.735 1.01172C8.9324 1.01172 1 8.9472 1 18.7537C1 21.4795 1.61266 24.0601 2.72513 26.3827"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </div>
              </div>
              <div class="box-content">
                <h1 class="box-title">
                  <a href="about-us.html">Save time & headspace</a>
                </h1>
                <p>
                  Reduce your time-to-hire by up to 75% and free up headspace
                  for other HR
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
            <!-- tf-iconbox -->
            <div class="tf-iconbox">
              <div class="box-header">
                <div class="icon">
                  <svg width="40" height="43" viewBox="0 0 40 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M19.6145 4.3812C16.8264 4.33283 14.5863 6.49325 14.5218 9.21796C14.4896 10.6206 15.0697 11.6363 15.8433 12.6843C16.5202 13.6033 17.0198 13.7 17.3099 15.0704"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M19.6143 4.3812C22.4024 4.33283 24.6425 6.49325 24.707 9.21796C24.7392 10.6206 24.159 11.6363 23.3855 12.6843C22.7086 13.6033 22.0962 13.7 21.8222 15.0704"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M21.8226 15.0545H21.8065H17.3906" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M19.6143 18.4241H20.8069L21.8222 16.7312V15.0545" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21.1943 7.0412C21.8873 7.42814 22.3869 8.07304 22.532 8.8308" stroke="#14A077"
                      stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M17.3105 15.0543V16.731L18.4387 18.4239H19.5668" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M19.5654 1.01172V2.1403" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.6035 3.47858L14.3932 4.26858" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.1211 9.44366H12.2492" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.6035 15.3929L14.3932 14.6029" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M25.5451 15.3929L24.7393 14.6029" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M28.011 9.44366H26.8828" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M25.5451 3.47858L24.7393 4.26858" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M8.73595 28.7426C10.5161 28.7426 11.9592 27.2989 11.9592 25.5181C11.9592 23.7372 10.5161 22.2935 8.73595 22.2935C6.95579 22.2935 5.5127 23.7372 5.5127 25.5181C5.5127 27.2989 6.95579 28.7426 8.73595 28.7426Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M7.44651 33.2568L8.75192 36.7231C9.13872 37.7388 10.1057 38.416 11.1855 38.416H15.7464C16.5038 38.416 17.1163 37.8033 17.1163 37.0456C17.1163 36.3523 16.6005 35.7719 15.9237 35.6913L12.3942 35.256C12.1363 35.2237 11.9268 35.0464 11.8462 34.7884C11.6367 33.9984 11.1532 32.2894 10.6698 31.3221C10.0251 30.0323 9.38046 28.7425 7.12418 28.7425C4.22325 28.7425 3.5786 30.6772 2.93395 33.2568C2.2893 35.8364 1 40.9956 1 40.9956"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M8.73645 37.1262L8.0918 40.9956" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.5088 37.1262L31.2985 40.9956" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13.249 38.4161H19.6955" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M30.6539 28.7426C32.4341 28.7426 33.8772 27.2989 33.8772 25.5181C33.8772 23.7372 32.4341 22.2935 30.6539 22.2935C28.8738 22.2935 27.4307 23.7372 27.4307 25.5181C27.4307 27.2989 28.8738 28.7426 30.6539 28.7426Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M19.6949 28.7426C21.4751 28.7426 22.9182 27.2989 22.9182 25.5181C22.9182 23.7372 21.4751 22.2935 19.6949 22.2935C17.9148 22.2935 16.4717 23.7372 16.4717 25.5181C16.4717 27.2989 17.9148 28.7426 19.6949 28.7426Z"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M31.9432 33.2569L30.6378 36.7233C30.251 37.739 29.284 38.4161 28.2042 38.4161H23.6433C22.8859 38.4161 22.2734 37.8035 22.2734 37.0457C22.2734 36.3524 22.7892 35.772 23.466 35.6914L26.9955 35.2561C27.2534 35.2239 27.4629 35.0465 27.5435 34.7886C27.753 33.9986 28.2365 32.3057 28.7199 31.3383C29.3646 30.0485 30.0092 28.7587 32.2655 28.7587C35.1665 28.7587 35.8111 30.6934 36.4558 33.273C37.1004 35.8526 38.3897 41.0119 38.3897 41.0119"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M26.1418 38.4161H19.6953" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M14.5381 35.1915V33.2568C14.5381 30.7578 16.8427 28.7425 19.6953 28.7425C22.5479 28.7425 24.8525 30.7578 24.8525 33.2568V35.1915"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </div>
              </div>
              <div class="box-content">
                <h1 class="box-title">
                  <a href="about-us.html">Minimize environmental impact</a>
                </h1>
                <p>
                  Did you know? U.S. office workers use ~10,000 sheets of
                  paper every year.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
            <!-- tf-iconbox -->
            <div class="tf-iconbox">
              <div class="box-header">
                <div class="icon">
                  <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M24.6022 17.3248C26.8874 19.5926 26.8874 23.2869 24.6022 25.5547C22.317 27.8224 18.6241 27.8224 16.3389 25.5547C14.0537 23.2869 14.0537 19.5926 16.3389 17.3248C17.8563 15.8068 20.0135 15.313 21.9514 15.8251"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M29.4277 12.5338C34.3637 17.4535 34.3637 25.4273 29.4277 30.347C24.4917 35.2666 16.4661 35.2666 11.5301 30.347C6.59412 25.4273 6.59412 17.4535 11.5301 12.5338C15.7532 8.32746 22.2248 7.72393 27.106 10.7233"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path
                      d="M28.7514 3.88295C21.5302 0.517835 12.6636 1.79804 6.70384 7.72356C-0.901279 15.2951 -0.901279 27.5667 6.70384 35.1382C14.309 42.7097 26.649 42.7097 34.2541 35.1382C40.9634 28.4446 41.7496 18.0932 36.6124 10.5583"
                      stroke="#14A077" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M30.6152 11.3447L31.2368 10.7412" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M29.4279 12.5332L24.6016 17.3248" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M24.6005 17.3252L20.2129 21.6962" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M31.2383 10.7418L33.2127 8.7666" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M29.4277 12.5337L30.616 11.3449" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.5254 10.6494L30.6169 11.3444" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M35.8086 6.18795V5.14551" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M32.6816 4.10248L35.8078 1.01172V5.14495" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M31.4023 5.40093L32.6821 4.10242" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M31.4022 5.40039L30.0859 6.69888L30.5247 10.6492" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.6152 11.345L35.277 11.8754L36.5933 10.5586" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M36.8507 6.1875H35.8086" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M36.5938 10.5585L40.9996 6.1875H36.8497" stroke="#14A077" stroke-width="2"
                      stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.5254 10.6494L31.2384 10.7409" stroke="#14A077" stroke-width="2" stroke-miterlimit="10"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </div>
              </div>
              <div class="box-content">
                <h1 class="box-title">
                  <a href="about-us.html">Reduce Hiring bias</a>
                </h1>
                <p>
                  Structured digital interviews increase the predictive
                  validity of your hires by 65%.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End wd-icon-box  -->

    <!-- WD-testimonials -->
    <section class="testimonials-section">
      <div class="wrap-testimonials over-flow-hidden">
        <div class="tf-container">
          <div class="row">
            <div class="col-lg-12">
              <div class="tf-title style-2">
                <div class="group-title pt-5">
                  <h1>What our clients are saying</h1>
                  <p>
                    Showing companies based on reviews and recent job openings
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-12 wow fadeInUp">
              <div class="swiper-container tes-slider">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="wd-testimonials">
                      <p class="description">
                        “Jobtex is allowing us to go through a large number of
                        candidates with internal limited resources. We are
                        able to do a first screening of candidates so much
                        easier than if we had to meet everyone. We can truly
                        identify and assess a talent pool more efficiently and
                        have our talent ready to start in their new role
                        faster.”
                      </p>
                      <div class="author-group">
                        <div class="avatar">
                          <img src="images/review/testimonials.jpg" alt="images" />
                        </div>
                        <div class="infor">
                          <h6>Pete Jones</h6>
                          <div class="position">Head of Marketing Build</div>
                          <ul class="rating">
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li class="inactive">
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="wd-testimonials">
                      <p class="description">
                        “Jobtex is allowing us to go through a large number of
                        candidates with internal limited resources. We are
                        able to do a first screening of candidates so much
                        easier than if we had to meet everyone. We can truly
                        identify and assess a talent pool more efficiently and
                        have our talent ready to start in their new role
                        faster.”
                      </p>
                      <div class="author-group">
                        <div class="avatar">
                          <img src="images/review/testimonials.jpg" alt="images" />
                        </div>
                        <div class="infor">
                          <h6>Pete Jones</h6>
                          <div class="position">Head of Marketing Build</div>
                          <ul class="rating">
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li class="inactive">
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="wd-testimonials">
                      <p class="description">
                        “Jobtex is allowing us to go through a large number of
                        candidates with internal limited resources. We are
                        able to do a first screening of candidates so much
                        easier than if we had to meet everyone. We can truly
                        identify and assess a talent pool more efficiently and
                        have our talent ready to start in their new role
                        faster.”
                      </p>
                      <div class="author-group">
                        <div class="avatar">
                          <img src="images/review/testimonials.jpg" alt="images" />
                        </div>
                        <div class="infor">
                          <h6>Pete Jones</h6>
                          <div class="position">Head of Marketing Build</div>
                          <ul class="rating">
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li class="inactive">
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="wd-testimonials">
                      <p class="description">
                        “Jobtex is allowing us to go through a large number of
                        candidates with internal limited resources. We are
                        able to do a first screening of candidates so much
                        easier than if we had to meet everyone. We can truly
                        identify and assess a talent pool more efficiently and
                        have our talent ready to start in their new role
                        faster.”
                      </p>
                      <div class="author-group">
                        <div class="avatar">
                          <img src="images/review/testimonials.jpg" alt="images" />
                        </div>
                        <div class="infor">
                          <h6>Pete Jones</h6>
                          <div class="position">Head of Marketing Build</div>
                          <ul class="rating">
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                            <li class="inactive">
                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.94418 8.42155L0.367213 6.2883C-0.11917 5.89933 0.094156 5.11714 0.711378 5.02896L4.36635 4.86612L5.92719 0.953019C6.03598 0.736138 6.25713 0.599609 6.49961 0.599609C6.74209 0.599609 6.96324 0.736849 7.07203 0.953019L8.63286 4.86612L12.2878 5.02896C12.9051 5.11714 13.1184 5.89933 12.632 6.2883L10.055 8.42155L10.7583 12.5864C10.8394 13.1545 10.2492 13.5798 9.73647 13.3231L6.49961 11.2659L3.26275 13.3224C2.74935 13.5791 2.15986 13.1538 2.24092 12.5857L2.94418 8.42155Z"
                                  fill="#FFB321" />
                              </svg>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination tes-bullet"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End testimonials -->
    <!-- wd-partner -->
    <section>
      <div class="wd-partner">
        <div class="tf-container">
          <h1 class="title-partner">
            Over 100,000 recruiters use Jobtex to modernize their hiring
          </h1>
          <div class="swiper partner-type-6">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <a class="logo-partner" href="#">
                  <img src="images/partners/Logo.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-1.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-2.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-3.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-4.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-5.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-1.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-2.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-3.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-4.png" alt="images/partners/Logo.png" />
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="logo-partner">
                  <img src="images/partners/Logo-5.png" alt="images/partners/Logo.png" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End wd-partner -->
    <?php include "partials/footer.php"; ?>
  </div>
  <!-- /.boxed -->

  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/swiper-bundle.min.js"></script>
  <script src="javascript/bootstrap.min.js"></script>
  <script src="javascript/boostrap-select.min.js"></script>
  <script src="javascript/parallax.js"></script>
  <script src="javascript/jquery.nice-select.min.js"></script>
  <script src="javascript/countto.js"></script>
  <script src="javascript/wow.min.js"></script>
  <script src="javascript/swiper.js"></script>
  <script src="javascript/plugin.min.js"></script>
  <script src="javascript/jquery.cookie.js"></script>
  <!-- <script src="javascript/switcher.js"></script> -->
  <script src="javascript/main.js"></script>
</body>

<!-- Mirrored from themesflat.co/html/jobtex/home-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:26:16 GMT -->

</html>