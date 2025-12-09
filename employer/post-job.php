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

<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-post-new-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Style -->

  <link rel="stylesheet" type="text/css" href="../stylesheets/shortcodes.css" />
  <link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
  <link rel="stylesheet" type="text/css" href="../stylesheets/dashboard.css" />

  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="../stylesheets/responsive.css" />

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
              <div class="title-dash flex2">Post A New Job</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="flat-dashboard-post flat-dashboard-setting">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <form method="post" class="post-new profile-setting bg-white">
              <div class="wrap-titles">
                <h3 class="title-img">
                  Job Title <span class="color-red">*</span>
                </h3>
                <fieldset class="info-wd">
                  <input type="text" class="form-control" name="title" required placeholder="UI UX Designer" />
                </fieldset>
              </div>
              <div class="text-editor-wrap">
                <h3 class="title-img">
                  Job Description <span class="color-red">*</span>
                </h3>
                <textarea name="desc" id="" required class="form-control form-textarea"></textarea>
              </div>
              <div class=" px-2">
                <div class="row">
                  <div id="item_category" class="col-md-6">
                    <label class="title-user fw-7">Category</label>
                    <select name="category" required id="" class="form-control form-select">
                      <option value="" selected hidden>
                        Select Category
                      </option>
                      <?php
                      $getCat = mysqli_query($conn, "SELECT * FROM `categories` ORDER BY `id` DESC");
                      if (mysqli_num_rows($getCat) > 0) {
                        $categories = mysqli_fetch_all($getCat, MYSQLI_ASSOC);
                      }

                      if (isset($categories) && is_array($categories)) {
                        foreach ($categories as $category) {
                          ?>
                          <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>

                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div id="item_1" class="col-md-6">
                    <label class="title-user fw-7">Type</label>
                    <select name="type" id="" class="form-control form-select">
                      <option>Remote</option>
                      <option>On-site</option>
                    </select>
                  </div>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Tags <small>(Comma seperated)</small></label>
                    <input type="text" name="tags" class="form-control" required />
                  </fieldset>
                  <div id="item_2" class="col-md-6">
                    <label class="title-user fw-7">Gender</label>
                    <select name="gender" id="" class="form-control form-select">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                  <div id="item_apply" class="col-md-6">
                    <label class="title-user fw-7">Job Apply Type</label>
                    <select name="apply_type" id="" class="form-control form-select">
                      <option>Internship</option>
                      <option>Junior</option>
                      <option>Mid Level</option>
                      <option>Senior</option>
                    </select>
                  </div>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">External URL for Apply Job</label>
                    <input type="url" name="url" class="form-control" required />
                  </fieldset>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Job Apply Email</label>
                    <input type="email" name="apply_email" class="form-control" required />
                  </fieldset>
                  <div id="item_3" class="col-md-6">
                    <label class="title-user fw-7">Salary Type</label>
                    <select name="salary_type" id="" class="form-control form-select">
                      <option>Month</option>
                      <option>Year</option>
                    </select>
                  </div>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Min. Salary</label>
                    <input type="number" name="min_sal" class="form-control" required />
                  </fieldset>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Max. Salary</label>
                    <input type="number" name="max_sal" class="form-control" required />
                  </fieldset>
                  <div id="item_date" class="col-md-6">
                    <label class="title-user fw-7">Years of Experience</label>
                    <input type="number" name="years" class="form-control" />
                  </div>
                  <div id="item_qualification" class="col-md-6">
                    <label class="title-user fw-7">Qualification</label>
                    <select name="qualification" id="" class="form-control form-select">
                      <option>OND</option>
                      <option>HND</option>
                      <option>BSC</option>
                      <option>MSC</option>
                      <option>PHD</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="wrap-date">
                <fieldset class="col-md-6">
                  <h5 class="title-url fw-7">Applicant Deadline Date</h5>
                  <input type="date" name="deadline" class="form-control" />
                </fieldset>
              </div>

              <div class="contact-wrap info-wd">
                <h3>Location</h3>
                <div class="">
                  <div class="row">
                    <fieldset class="col-md-6">
                      <label class="title-user fs-16"> Address</label>
                      <input type="text" class="form-control" name="address" required
                        value="Las Vegas, NV 89107, USA" />
                    </fieldset>
                    <div id="item_category2" class="col-md-6">
                      <label class="title-user fs-16">Country</label>
                      <input type="text" name="country" class="form-control" />
                    </div>
                  </div>

                </div>
              </div>
              <input type="submit" name="save" value="SAVE" class="btn btn-success position-relative w-auto">

              <?php
              if (isset($_POST["save"])) {
                $title = $_POST["title"];
                $desc = $_POST["desc"];
                $category = $_POST["category"];
                $type = $_POST["type"];
                $tags = $_POST["tags"];
                $gender = $_POST["gender"];
                $apply_type = $_POST["apply_type"];
                $url = $_POST["url"];
                $apply_email = $_POST["apply_email"];
                $salary_type = $_POST["salary_type"];
                $min_sal = $_POST["min_sal"];
                $max_sal = $_POST["max_sal"];
                $years = $_POST["years"];
                $qualification = $_POST["qualification"];
                $deadline = $_POST["deadline"];
                $address = $_POST["address"];
                $country = $_POST["country"];

                $insertJob = mysqli_query($conn, "INSERT INTO `jobs`(`employer_id`, `title`, `description`, `category_id`, `type`, `tags`, `gender`, `apply_type`, `external_url`, `apply_email`, `salary_type`, `years_of_exp`, `qualification`, `min_salary`, `max_salary`, `deadline`, `address`, `country`) VALUES ('$userid', '$title','$desc','$category','$type','$tags','$gender','$apply_type','$url','$apply_email','$salary_type','$years','$qualification','$min_sal','$max_sal','$deadline','$address','$country')");
                if ($insertJob) {
                  echo "<script>alert('Job added!')</script>";
                } else {
                  echo "<script>alert('Failed to add job!')</script>";
                }
              }
              ?>
            </form>
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

  <script src="../../../../kit.fontawesome.com/275e820b94.js" crossorigin="anonymous"></script>
  <script src="../javascript/text-editor.js"></script>
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/jquery.cookie.js"></script>
  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/bootstrap.min.js"></script>
  <script src="../javascript/wow.min.js"></script>
  <script src="../javascript/main.js"></script>
  <script src="../javascript/dropdown.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>
</body>

<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-post-new-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

</html>