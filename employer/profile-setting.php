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

<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-profile-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

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

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <link rel="stylesheet" href="../../../../unicons.iconscout.com/release/v4.0.0/css/thinline.css" />

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
              <div class="title-dash flex2">Profile Setting</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="flat-dashboard-setting">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <form method="post" enctype="multipart/form-data" class="profile-setting bg-white">
              <div class="author-profile d-flex border-bt">
                <div class="wrap-img flex2">
                  <div class="img-box relative">
                    <img class="avatar" id="profileimg"
                      src="<?= $userInfo['image'] ? '../uploads/' . $userInfo['image'] : '../images/dashboard/image-up.jpg' ?>"
                      alt="" />
                  </div>
                  <div id="upload-profile">
                    <h5 class="fw-6">Upload a Logo:</h5>
                    <h6>JPG 80x80px</h6>
                    <input class="up-file" id="tf-upload-img" type="file" name="image" />
                  </div>
                </div>
                <!-- <div class="wrap-img flex2">
                  <div class="img-box relative">
                    <img class="avatar " id="profileimg2" src="../images/dashboard/image-up.jpg" alt="">
                  </div>
                  <div id="upload-profile2">
                    <h5 class="fw-6">Upload a new cover:</h5>
                    <h6>JPG 1920x460px</h6>
                    <input class="up-file" id="tf-upload-img2" type="file" name="profile" required="">

                  </div>
                </div> -->
                <!-- <div class="">
                </div> -->
              </div>

              <div class="form-infor-profile">
                <h3 class="title-info">Information</h3>
                <div class="form-infor flex flat-form px-3">
                  <div class="row">
                    <fieldset class="col-md-6">
                      <label class="title-user fw-7">Company Name</label>
                      <input type="text" class="form-control" name="company_name"
                        value="<?= $userInfo['company_name'] ?>" required />
                    </fieldset>
                    <fieldset class="col-md-6">
                      <label class="title-user fw-7">Phone Number</label>
                      <input type="tel" class="form-control" value="<?= $userInfo['phone'] ?>" name="phone" />
                    </fieldset>
                    <fieldset class="col-md-6" id="item_date" class="dropdown titles-dropdown">
                      <label class="title-user fw-7">Founded Date</label>
                      <input type="date" name="founded" value="<?= $userInfo['founded'] ?>" class="form-control"
                        required>
                    </fieldset>
                    <fieldset class="col-md-6">
                      <label class="title-user fw-7">Email</label>
                      <input type="email" class="form-control" value="<?= $userInfo['email'] ?>" name="email"
                        required />
                    </fieldset>
                    <fieldset class="col-md-6">
                      <label class="title-user fw-7">Password</label>
                      <input type="text" class="form-control" value="<?= $userInfo['password'] ?>" name="password"
                        required />
                    </fieldset>
                    <fieldset class="col-md-6">
                      <label class="title-user fw-7">Website</label>
                      <input type="url" name="website" class="form-control" value="<?= $userInfo['website'] ?>" />
                    </fieldset>
                    <fieldset class="col-md-6" id="item_size">
                      <label class="title-user fw-7">Company Size</label>
                      <select name="size" id="" class="form-control form-select">
                        <option <?= $userInfo['company_size'] == "Less than 10" ? "selected" : "" ?>>Less than 10</option>
                        <option <?= $userInfo['company_size'] == "10 - 50" ? "selected" : "" ?>>10 - 50</option>
                        <option <?= $userInfo['company_size'] == "51 - 200" ? "selected" : "" ?>>51 - 200</option>
                        <option <?= $userInfo['company_size'] == "201 - 500" ? "selected" : "" ?>>201 - 500</option>
                        <option <?= $userInfo['company_size'] == "Above 500" ? "selected" : "" ?>>Above 500</option>
                      </select>

                    </fieldset>
                  </div>
                </div>


                <div class="text-editor-wrap border-bt">
                  <h3>About Company</h3>
                  <textarea name="about" class="form-control form-textarea"><?= $userInfo['about'] ?></textarea>
                </div>

                <div class="social-wrap border-bt">
                  <h3>Social Network</h3>
                  <div class="form-social ">
                    <div class="row">
                      <fieldset class="col-md-6 flex gap-2">
                        <span class="icon-facebook"></span>
                        <input type="url" value="<?= $userInfo['facebook'] ?>" class="form-control" name="fb" />
                      </fieldset>
                      <fieldset class="col-md-6 flex gap-2">
                        <span class="icon-linkedin2"></span>
                        <input type="url" value="<?= $userInfo['linkedin'] ?>" class="form-control2" name="ln" />
                      </fieldset>

                    </div>
                  </div>
                </div>
                <div class="contact-wrap row">
                  <h3>Contact Information</h3>

                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Address</label>
                    <input type="text" class="form-control input-style" value="<?= $userInfo['address'] ?>"
                      name="address" />
                  </fieldset>
                  <fieldset id="item_category2" class="col-md-6">
                    <label class="title-user color-1 fw-7">Country</label>
                    <input type="text" name="country" value="<?= $userInfo['country'] ?>" class="form-control">

                  </fieldset>

                </div>
                <input type="submit" name="save" class="position-relative btn btn-success px-3 w-auto" value="Save Profile">
              </div>
              <?php
              if (isset($_POST["save"])) {
                $company_name = $_POST["company_name"];
                $phone = $_POST["phone"];
                $founded = $_POST["founded"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $website = $_POST["website"];
                $size = $_POST["size"];
                $about = $_POST["about"];
                $fb = $_POST["fb"];
                $ln = $_POST["ln"];
                $address = $_POST["address"];
                $country = $_POST["country"];
                $image = $_FILES["image"]["name"];
                $tmp_name = $_FILES["image"]["tmp_name"];

                // var_dump($_POST, $_FILES);
                $location = "../uploads/";

                if (!empty($image)) {
                  if (move_uploaded_file($tmp_name, $location . $image)) {
                    $updateProfile = mysqli_query($conn, "UPDATE `employers` SET `company_name` = '$company_name', `phone`='$phone', `founded`='$founded', `website`='$website', `email`='$email', `password`='$password', `about`='$about', `company_size`='$size', `facebook`='$fb', `linkedin`='$ln', `address`='$address', `country`='$country', `image`='$image' WHERE `id` = '$userid'");
                    if ($updateProfile) {
                      echo "<script>alert('Updated successfully!'); location.href = 'profile.php'</script>";
                    } else {
                      echo "<script>alert('Update failed!')</script>";
                    }
                  } else {
                    echo "<script>alert('Upload failed!')</script>";
                  }
                } else {
                  $updateProfile = mysqli_query($conn, "UPDATE `employers` SET `company_name` = '$company_name', `phone`='$phone', `founded`='$founded', `website`='$website', `email`='$email', `password`='$password', `about`='$about', `company_size`='$size', `facebook`='$fb', `linkedin`='$ln', `address`='$address', `country`='$country' WHERE `id` = '$userid'");
                  if ($updateProfile) {
                    echo "<script>alert('Updated successfully!'); location.href = 'profile.php'</script>";
                  } else {
                    echo "<script>alert('Update failed!')</script>";
                  }
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

  <script src="../javascript/tag-input.js"></script>
  <script src="../../../../kit.fontawesome.com/275e820b94.js" crossorigin="anonymous"></script>
  <script src="../javascript/text-editor.js"></script>
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/jquery.cookie.js"></script>
  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/bootstrap.min.js"></script>
  <script src="../javascript/wow.min.js"></script>
  <script src="../javascript/main.js"></script>
  <script src="../javascript/countto.js"></script>
  <script src="../javascript/dropdown.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>
</body>

<!-- Mirrored from themesflat.co/html/jobtex/dashboard/employer-profile-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:38:38 GMT -->

</html>