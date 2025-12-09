<?php
include "../config/db.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "candidate") {
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

<!-- Mirrored from themesflat.co/html/jobtex/dashboard/candidates-profile-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:15 GMT -->

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
    <section class="flat-dashboard-setting flat-dashboard-setting2">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <form method="post" enctype="multipart/form-data" class="profile-setting bg-white">
              <div class="author-profile flex border-bt">
                <div class="wrap-img flex2">
                  <div class="img-box relative">
                    <img class="avatar" id="profileimg" src="<?= $userInfo['image'] ? '../uploads/'. $userInfo['image'] : '../images/dashboard/image-up.jpg' ?>" alt="" />
                  </div>
                  <div id="upload-profile">
                    <h5 class="fw-6">Upload a new avatar:</h5>
                    <h6>JPG 80x80px</h6>
                    <input class="up-file" id="tf-upload-img" type="file" name="image" />
                  </div>
                </div>

                <div class="tt-button button-style">
                  <input type="submit" name="save" class="btn btn-success btn-3" value="Save Profile">
                </div>
              </div>

              <div class="form-infor-profile">
                <h3 class="title-info">Information</h3>
                <div class="row flex">
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Full Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $userInfo['fullname'] ?>" required />
                  </fieldset>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" value="<?= $userInfo['phone'] ?>" />
                  </fieldset>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Gender</label>
                    <select name="gender" id="" class="form-control form-select">
                      <option <?= $userInfo['gender'] == "Male" ? "selected" : "" ?>>Male</option>
                      <option <?= $userInfo['gender'] == "Female" ? "selected" : "" ?>>Female</option>
                    </select>
                  </fieldset>

                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Years of Experience</label>
                    <input type="number" value="<?= $userInfo['years_of_exp'] ?>" name="years" class="form-control" />
                  </fieldset>


                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Date Of Birth</label>
                    <input type="date" class="form-control" placeholder="" required name="dob" value="<?= $userInfo['dob'] ?>" />
                  </fieldset>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $userInfo['email'] ?>" required />
                  </fieldset>
                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Password</label>
                    <input type="text" class="form-control" value="<?= $userInfo['password'] ?>" name="password"
                      required />
                  </fieldset>

                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Qualification</label>
                    <select name="qualification" id="" class="form-control form-select">
                      <option <?= $userInfo['qualification'] == "OND" ? "selected" : "" ?> value="OND">OND</option>
                      <option <?= $userInfo['qualification'] == "HND" ? "selected" : "" ?> value="HND">HND</option>
                      <option <?= $userInfo['qualification'] == "BSC" ? "selected" : "" ?> value="BSC">
                        Bachelors Degree
                      </option>
                      <option <?= $userInfo['qualification'] == "MSC" ? "selected" : "" ?> value="MSC">Master Degree
                      </option>
                      <option <?= $userInfo['qualification'] == "PHD" ? "selected" : "" ?> value="PHD">PHD</option>
                    </select>
                  </fieldset>
                </div>

                <div class="text-editor-wrap border-bt">
                  <h3>About Company</h3>
                  <textarea name="about_company" id="about_company"
                    class="form-control form-textarea"><?= $userInfo['about'] ?></textarea>
                </div>

                <div class="social-wrap border-bt">
                  <h3>Social Network</h3>
                  <div class="row">
                    <fieldset class="col-md-6 flex">
                      <span class="icon-facebook"></span>
                      <input type="url" class="form-control" name="fb" value="<?= $userInfo['facebook'] ?>" />
                    </fieldset>
                    <fieldset class="col-md-6 flex">
                      <span class="icon-linkedin2"></span>
                      <input type="url" name="ln" value="<?= $userInfo['linkedin'] ?>" class="form-control" />
                    </fieldset>

                  </div>

                </div>

                <div class="contact-wrap row">
                  <h3>Contact Information</h3>

                  <fieldset class="col-md-6">
                    <label class="title-user fw-7">Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $userInfo['address'] ?>" />
                  </fieldset>
                  <fieldset id="item_category2" class="col-md-6">
                    <label class="title-user color-1 fw-7">Country</label>
                    <input type="text" name="country" value="<?= $userInfo['country'] ?>" class="form-control" />
                  </fieldset>

                </div>
              </div>

              <?php
              if (isset($_POST["save"])) {
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $gender = $_POST["gender"];
                $years = $_POST["years"];
                $dob = $_POST["dob"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $qualification = $_POST["qualification"];
                $about_company = $_POST["about_company"];
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
                    $updateProfile = mysqli_query($conn, "UPDATE `candidates` SET `fullname` = '$name', `phone`='$phone', `gender`='$gender', `years_of_exp`='$years', `dob`='$dob', `email`='$email', `password`='$password', `qualification`='$qualification', `about`='$about_company', `facebook`='$fb', `linkedin`='$ln', `address`='$address', `country`='$country', `image`='$image' WHERE `id` = '$userid'");
                    if ($updateProfile) {
                      echo "<script>alert('Updated successfully!'); location.href = 'profile.php'</script>";
                    } else {
                      echo "<script>alert('Update failed!')</script>";
                    }
                  }else{
                    echo "<script>alert('Upload failed!')</script>";
                  }
                } else {
                  $updateProfile = mysqli_query($conn, "UPDATE `candidates` SET `fullname` = '$name', `phone`='$phone', `gender`='$gender', `years_of_exp`='$years', `dob`='$dob', `email`='$email', `password`='$password', `qualification`='$qualification', `about`='$about_company', `facebook`='$fb', `linkedin`='$ln', `address`='$address', `country`='$country' WHERE `id` = '$userid'");
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

<!-- Mirrored from themesflat.co/html/jobtex/dashboard/candidates-profile-setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:16 GMT -->

</html>