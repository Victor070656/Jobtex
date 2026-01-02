<?php
include "config/db.php";
if (!empty($_GET["s"])) {
  $s = $_GET["s"];
}
if (!empty($_GET["cat"])) {
  $cat = $_GET["cat"];
}
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/find-jobs-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:29:57 GMT -->

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
  <div class="sidebar-popup">
    <div class="modal-menu__backdrop"></div>
    <div class="widget-filter">
      <form action="https://themesflat.co/html/jobtex/GET">
        <div class="group-form">
          <label class="title">Search Company</label>
          <div class="group-input search-ip">
            <button><i class="icon-search"></i></button>
            <input type="text" placeholder="Keywork" required>
          </div>
        </div>
        <div class="group-form">
          <label class="title">Location</label>
          <div class="group-input has-icon">
            <i class="icon-map-pin"></i>
            <select>
              <option value="0">All Location</option>
              <option value="0">India</option>
              <option value="0">Singapore</option>
              <option value="0">French</option>
            </select>
          </div>
        </div>
        <div class="group-form">
          <label class="title">Job Title</label>
          <div class="group-input">
            <select>
              <option value="0">Design & Creative </option>
              <option value="0">Design</option>
              <option value="0">Ux/Ui</option>
            </select>
          </div>
        </div>
        <div class="group-form">
          <label class="title">On-site/Remote</label>
          <div class="group-input">
            <select>
              <option value="0">On-site </option>
              <option value="0">Remote</option>
              <option value="0">Freelancer</option>
            </select>
          </div>
        </div>
        <div class="group-form">
          <label class="title">Job Types</label>
          <div class="group-input">
            <select>
              <option value="0">SoftWere </option>
              <option value="0">Website</option>
            </select>
          </div>
        </div>
        <div class="group-form">
          <label class="title">Salaries</label>
          <div class="group-input">
            <select>
              <option value="0">All Salaries </option>
              <option value="0">Website</option>
            </select>
          </div>
        </div>
        <div class="group-form">

          <div class="group-range-title">
            <label>Radius: </label>
            <input class="one-range" type="text" id="amount" readonly>
          </div>

          <div id="slider-range-min"></div>

        </div>
        <div class="group-form">
          <label class="title">Posted Anytime</label>
          <div class="group-input">
            <select>
              <option value="0">Posted Anytime </option>
              <option value="0">Website</option>
            </select>
          </div>
        </div>
        <div class="group-form">
          <label class="title">All Seniority Levels</label>
          <div class="group-input">
            <select>
              <option value="0">All Seniority Levels </option>
              <option value="0">Website</option>
            </select>
          </div>
        </div>
        <div class="group-form">
          <label class="title">Company</label>
          <div class="group-input">
            <select>
              <option value="0">Company </option>
              <option value="0">Website</option>
            </select>
          </div>
        </div>
        <button type="submit">Find Jobs</button>
      </form>
    </div>
  </div>

  <!-- popup nav menu-mobile-->
  <?php include "partials/mobile-menu.php"; ?>
  <!-- /end -->

  <!-- Boxed -->
  <div class="boxed">
    <!-- HEADER -->
    <?php include "partials/header.php"; ?>
    <!-- END HEADER -->

    <section class="bg-f5 breadcrumb-section">
      <div class="tf-container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title">
              <div class="widget-menu-link">
                <ul>
                  <li><a href="home-01.html">Home</a></li>
                  <li><a href="#">Find Jobs</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="form-sticky stc1">
      <div class="tf-container">
        <div class="job-search-form inner-form-map st1">
          <form method="get">
            <div class="row-group-search">
              <div class="form-group-1">
                <input type="text" name="s" class="input-filter-search" placeholder="Job title, key words or company">
                <span class="icon-search search-job"></span>
              </div>
              <div class="form-group-4">
                <button type="submit" class="btn btn-find">Find Jobs</button>
              </div>
            </div>

          </form>
          <!-- End Job  Search Form-->
        </div>
      </div>
    </section>

    <section class="inner-jobs-section">
      <div class="tf-container">
        <div class="row">
          <div class="col-lg-12 tf-tab">

            <div class="content-tab">
              <div class="inner">
                <div class="group-col-2">

                  <?php
                  if (isset($s)) {
                    $getJobs = mysqli_query($conn, "SELECT j.*, e.company_name, e.image FROM `jobs` j JOIN `employers` e ON j.employer_id = e.id WHERE (j.title LIKE '%$s%') OR (j.description LIKE '%$s%') OR (j.type LIKE '%$s%') OR (j.tags LIKE '%$s%') OR (j.apply_type LIKE '%$s%') OR (j.country LIKE '%$s%') OR (e.company_name LIKE '%$s%') ORDER BY j.created_at DESC");
                  } elseif (isset($cat)) {
                    $getJobs = mysqli_query($conn, "SELECT j.*, e.company_name, e.image FROM `jobs` j JOIN `employers` e ON j.employer_id = e.id WHERE j.category_id = '$cat' ORDER BY j.created_at DESC");
                  } else {
                    $getJobs = mysqli_query($conn, "SELECT j.*, e.company_name, e.image FROM `jobs` j JOIN `employers` e ON j.employer_id = e.id ORDER BY j.created_at DESC");
                  }
                  if (mysqli_num_rows($getJobs) > 0) {
                    $jobs = mysqli_fetch_all($getJobs, MYSQLI_ASSOC);
                    foreach ($jobs as $job) {
                      ?>
                      <!-- job -->
                      <div class="features-job cl2">
                        <div class="job-archive-header">
                          <div class="inner-box">
                            <div class="logo-company">
                              <img src="uploads/<?= $job["image"] ?>" alt="images/logo-company/cty1.png">
                            </div>
                            <div class="box-content">
                              <h4>
                                <a href="jobs-single.php?id=<?= $job["id"] ?>"><?= $job["company_name"] ?></a>
                              </h4>
                              <h3>
                                <a href="jobs-single.php?id=<?= $job["id"] ?>"><?= $job["title"] ?></a>
                                <span class="icon-bolt"></span>
                              </h3>
                              <ul>
                                <li>
                                  <span class="icon-map-pin"></span>
                                  <?= $job["address"] ?>
                                </li>
                                <li>
                                  <span class="icon-calendar"></span>
                                  <?= date("M d, Y", strtotime($job['created_at'])) ?>
                                </li>
                                <li>
                                  <span class="ms-2"><small>Deadline: </small></span>
                                  <?= date("M d, Y", strtotime($job['deadline'])) ?>
                                </li>
                              </ul>
                              <span class="icon-heart"></span>
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
                              <p><?= "$" . number_format($job['min_salary']) . " - $" . number_format($job['max_salary']) ?>
                                <span class="year">/<?= $job["salary_type"] ?></span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  } else {
                    ?>
                    <p class="text-center text-success p-4">No Jobs Yet</p>
                    <?php
                  }
                  ?>



                </div>


              </div>
              <!-- <div class="inner">
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty8.png" alt="images/logo-company/cty8.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Senior UI/UX Designer</a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty11.png" alt="images/logo-company/cty11.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Project manager</a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty7.png" alt="images/logo-company/cty7.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Senior UI/UX Designer</a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty4.png" alt="images/logo-company/cty4.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Full Stack Development</a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty3.png" alt="images/logo-company/cty9.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Full Stack Development</a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty7.png" alt="images/logo-company/cty2.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Social Media Marketing </a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty9.png" alt="images/logo-company/cty2.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Senior UI/UX Designer </a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty7.png" alt="images/logo-company/cty2.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">Senior DevOps Engineer</a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>
              <div class="features-job style-3 mb1">
                <div class="inner-box">
                  <div class="company">
                    <div class="logo-company">
                      <img src="images/logo-company/cty2.png" alt="images/logo-company/cty2.png">
                    </div>
                    <div class="box-content">
                      <h4>
                        <a href="jobs-single.html">Rockstar Games New York</a>
                      </h4>
                      <h3>
                        <a href="jobs-single.html">HR Administration </a>
                        <span class="icon-bolt"></span>
                      </h3>
                      <div class="star">
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                        <span class="icon-star-full"></span>
                      </div>
                    </div>
                  </div>
                  <ul class="info">
                    <li>
                      <span class="icon-map-pin"></span>
                      Las Vegas, NV 89107, USA
                    </li>
                    <li>22 days left to apply</li>
                  </ul>
                  <div class="category">
                    <ul class="job-tag">
                      <li><a href="#"> Full-time</a></li>
                      <li><a href="#"> Hybrid</a></li>
                    </ul>
                  </div>
                  <div class="salary">
                    <span class="icon-dolar1"></span>
                    <p>$83,000 - $110,000 <span class="year">/year</span></p>
                  </div>
                  <div class="group-btn">
                    <span class="icon-heart"></span>
                    <button>Apply</button>
                  </div>
                </div>
              </div>

              
            </div> -->

            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include "partials/footer.php"; ?>
  </div><!-- /.boxed -->

  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/bootstrap.min.js"></script>
  <script src="javascript/boostrap-select.min.js"></script>
  <script src="javascript/jquery.fancybox.js"></script>
  <script src="javascript/plugin.min.js"></script>
  <script src='javascript/wow.min.js'></script>
  <script src='javascript/swiper.js'></script>
  <script src='javascript/jquery.nice-select.min.js'></script>
  <script src="javascript/main.js"></script>
  <script src="javascript/jquery.cookie.js"></script>
  <!-- <script src="javascript/switcher.js"></script> -->

  <script src="javascript/jquery-ui.min.js"></script>


</body>


<!-- Mirrored from themesflat.co/html/jobtex/find-jobs-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:29:58 GMT -->

</html>