<?php 
include "../config/db.php";

if(isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "candidate"){
    $userid = $_SESSION["user_id"];
}else{
  echo "<script>location.href = '../login.php'</script>";
}

$stats = [
  "jobs" => 0,
  "applied" => 0
];


$getJobs = mysqli_query($conn, "SELECT * FROM `jobs`");
$stats["jobs"] = $getJobs->num_rows;

$getApplied = mysqli_query($conn, "SELECT * FROM `applicants` WHERE `userid` = '$userid'");
$stats["applied"] = $getApplied->num_rows;



$getAppliedJobs = mysqli_query($conn, "SELECT a.*, j.title, j.country, e.company_name, e.image FROM applicants a JOIN jobs j ON j.id = a.jobid JOIN employers e ON e.id = a.employer_id WHERE a.userid = '$userid' ORDER BY a.id DESC LIMIT 3");
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/candidates-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:34:49 GMT -->
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

 
  <?php include "partials/menu.php"; ?>
  <!-- left sidebar end -->



  <div class="dashboard__content">
    <section class="page-title-dashboard">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">
            <div class="title-dashboard">
              <div class="title-dash flex2">Dashboard</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="flat-icon-dashboard">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">
            <div class="row">

              <div class="col-md-6 flex">
                <div class="p-4 align-items-center rounded flex gap-2 bg-white w-100">

                  <div class="icon style1">
                    <span class="icon-bag">
                      <svg width="49" height="43" viewBox="0 0 49 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M25.6562 29.5312C26.4328 29.5312 27.0625 28.9016 27.0625 28.125V22.5C27.0625 21.7235 26.4331 21.0938 25.6562 21.0938H22.8438C22.0672 21.0938 21.4375 21.7232 21.4375 22.5V28.125C21.4375 28.9015 22.0671 29.5312 22.8438 29.5312H25.6562Z"
                          fill="#504CFE" />
                        <path
                          d="M44.0312 5.625H34.0938C34.0938 5.34178 34.0938 3.93553 34.0938 4.21875C34.0938 1.89244 32.2014 0 29.875 0C29.5697 0 18.2073 0 18.625 0C16.2987 0 14.4062 1.89234 14.4062 4.21875C14.4062 4.50197 14.4062 5.90822 14.4062 5.625H4.46875C2.14244 5.625 0.25 7.51734 0.25 9.84375C0.25 12.5978 0.5875 15.0097 1.25763 17.0652C1.92775 19.1207 2.93059 20.8198 4.26137 22.1484C6.50078 24.3848 9.35322 25.3125 12.5561 25.3125H18.625C18.625 25.0293 18.625 22.2168 18.625 22.5C18.625 20.1737 20.5173 18.2812 22.8438 18.2812C23.127 18.2812 25.9395 18.2812 25.6562 18.2812C27.9826 18.2812 29.875 20.1736 29.875 22.5C29.875 22.7832 29.875 25.5957 29.875 25.3125H32.9996C35.799 25.1962 40.378 26.0474 44.2372 22.2061C45.5687 20.8808 46.5718 19.1787 47.2422 17.1136C47.9126 15.0485 48.25 12.6205 48.25 9.84375C48.25 7.51744 46.3577 5.625 44.0312 5.625ZM17.2188 4.21875C17.2188 3.44287 17.849 2.8125 18.625 2.8125H29.875C30.6509 2.8125 31.2812 3.44278 31.2812 4.21875C31.2812 4.50197 31.2812 5.90822 31.2812 5.625H17.2188C17.2188 5.34178 17.2188 3.93553 17.2188 4.21875Z"
                          fill="#504CFE" />
                        <path
                          d="M33.038 28.1219H29.875C29.875 30.4482 27.9827 32.3406 25.6562 32.3406C25.373 32.3406 22.5605 32.3406 22.8438 32.3406C20.5174 32.3406 18.625 30.4483 18.625 28.1219C18.3037 28.1219 12.2211 28.1219 12.5684 28.1219C8.55737 28.1219 5.03434 26.8911 2.27416 24.1353C1.49444 23.3568 0.828625 22.4804 0.25 21.543V40.7781C0.25 41.5554 0.878969 42.1844 1.65625 42.1844H46.8438C47.621 42.1844 48.25 41.5554 48.25 40.7781V21.6008C47.6636 22.5525 46.9951 23.4269 46.2216 24.197C41.7843 28.6111 37.0588 27.9319 33.038 28.1219Z"
                          fill="#504CFE" />
                      </svg>
                    </span>
                  </div>
                  <div class="content">
                    <div class="display-6"><?= $stats["jobs"] ?></div>
                    <h4 class="title-count">Posted Jobs</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 flex">
                <div class="p-4 align-items-center rounded flex gap-2 bg-white w-100">

                  <div class="icon style2">
                    <span class="icon-bag">
                      <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M27.3902 35.2336C32.1362 35.2336 35.9836 31.3862 35.9836 26.6402C35.9836 21.8943 32.1362 18.0469 27.3902 18.0469C22.6443 18.0469 18.7969 21.8943 18.7969 26.6402C18.7969 31.3862 22.6443 35.2336 27.3902 35.2336Z"
                          fill="#EB4D4D" />
                        <path
                          d="M43.9986 39.6008L36.9017 32.5039C35.9862 33.9834 34.7354 35.2343 33.2559 36.1498L40.3528 43.2467C41.3596 44.2535 42.9919 44.2535 43.9986 43.2467C45.0054 42.2399 45.0054 40.6076 43.9986 39.6008Z"
                          fill="#EB4D4D" />
                        <path
                          d="M9.34021 3.17984C9.34021 2.28893 8.26307 1.84277 7.6331 2.47273L3.20906 6.89677C2.5791 7.52674 3.02526 8.60388 3.91617 8.60388H8.34021C8.89249 8.60388 9.34021 8.15617 9.34021 7.60388V3.17984Z"
                          fill="#EB4D4D" />
                        <path
                          d="M8.48438 22.3436H17.0782C17.7802 20.6653 18.8801 19.1935 20.2597 18.0469H8.48438V22.3436Z"
                          fill="#EB4D4D" />
                        <path
                          d="M16.3503 24.9207H7.19502C6.48314 24.9207 5.90601 24.3436 5.90601 23.6317V16.757C5.90601 16.0452 6.48314 15.468 7.19502 15.468H27.3894C29.98 15.468 32.3671 16.3545 34.2641 17.8398V3.86701C34.2641 1.73474 32.5293 0 30.3971 0H11.9214V9.88236C11.9214 10.5942 11.3442 11.1714 10.6324 11.1714H0.75V40.131C0.75 42.2632 2.48474 43.998 4.61701 43.998H30.3971C32.317 43.998 33.9138 42.5913 34.213 40.7548L30.7516 37.2933C29.6899 37.629 28.5606 37.8108 27.3894 37.8108C24.6812 37.8108 22.1952 36.8418 20.2593 35.2328H7.19502C6.48314 35.2328 5.90601 34.6556 5.90601 33.9437C5.90601 33.2319 6.48314 32.6547 7.19502 32.6547H17.9795C17.4687 31.8585 17.0569 30.9932 16.7599 30.0767H7.19502C6.48314 30.0767 5.90601 29.4996 5.90601 28.7877C5.90601 28.0759 6.48314 27.4987 7.19502 27.4987H16.2508C16.1331 26.2121 16.3503 24.9207 16.3503 24.9207ZM27.8191 12.89H15.7884C15.0765 12.89 14.4994 12.3129 14.4994 11.601C14.4994 10.8892 15.0765 10.312 15.7884 10.312H27.8191C28.5309 10.312 29.1081 10.8892 29.1081 11.601C29.1081 12.3129 28.5309 12.89 27.8191 12.89ZM27.8191 7.73402H15.7884C15.0765 7.73402 14.4994 7.15689 14.4994 6.44502C14.4994 5.73314 15.0765 5.15601 15.7884 5.15601H27.8191C28.5309 5.15601 29.1081 5.73314 29.1081 6.44502C29.1081 7.15689 28.5309 7.73402 27.8191 7.73402Z"
                          fill="#EB4D4D" />
                      </svg>
                    </span>
                  </div>
                  <div class="content">
                    <div class="display-6"><?= $stats["applied"] ?></div>
                    <h4 class="title-count">Applications</h4>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </section>

    <section class="flat-dashboard-candidates flat-dashboard-applicants">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">

            <div class="applicants bg-white">

              <h3 class="title-appli">Job Applied Recently</h3>
              <div class="table-content">
                <div class="wrap-applicants table-responsive">
                  <table>
                    <thead>
                      <tr>
                        <th>JObs</th>
                        <th class="center">date Applied</th>
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
                                  <h3><?= $job["title"] ?> </h3>
                                  <div class="now-box flex2">
                                    <div class="map color-4"><?= $job["country"] ?></div>
                                    <div class="briefcase flex2 color-4">
                                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                          d="M13.334 4.66797H2.66732C1.93094 4.66797 1.33398 5.26492 1.33398 6.0013V12.668C1.33398 13.4043 1.93094 14.0013 2.66732 14.0013H13.334C14.0704 14.0013 14.6673 13.4043 14.6673 12.668V6.0013C14.6673 5.26492 14.0704 4.66797 13.334 4.66797Z"
                                          stroke="#64666C" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                          d="M10.6673 14V3.33333C10.6673 2.97971 10.5268 2.64057 10.2768 2.39052C10.0267 2.14048 9.68761 2 9.33398 2H6.66732C6.3137 2 5.97456 2.14048 5.72451 2.39052C5.47446 2.64057 5.33398 2.97971 5.33398 3.33333V14"
                                          stroke="#64666C" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                      <?= $job["company_name"] ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>

                            <td class="center">
                              <div class="title-day color-1"><?= date("F d, Y",strtotime($job["created_at"])) ?> </div>
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


  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/jquery.cookie.js"></script>
  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/bootstrap.min.js"></script>
  <script src='../javascript/wow.min.js'></script>
  <script src="../javascript/main.js"></script>
  <script src="../javascript/countto.js"></script>
  <script src="../javascript/area-datetime.js"></script>
  <script src="../javascript/dropdown.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/candidates-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:34:55 GMT -->
</html>