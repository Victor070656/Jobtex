<?php
include "../config/db.php";

if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "candidate") {
  $userid = $_SESSION["user_id"];
} else {
  echo "<script>location.href = '../login.php'</script>";
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/candidates-my-applied.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:16 GMT -->
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
          <div class="col-lg-12 col-md-12 ">
            <div class="title-dashboard">
              <div class="title-dash flex2">My Applied</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="flat-dashboard-save flat-dashboard-candidates flat-dashboard-applicants">
      <div class="themes-container">
        <div class="row">
          <div class="col-lg-12 col-md-12 ">

            <div class="applicants bg-white">
              <div class="dash-search flex">
                <div class="widget search">
                  <div class="search-flat">
                    <form action="#" method="get" role="search" class="search-form">
                      <input type="search" class="search-field" placeholder="Search" value="" name="s"
                        title="Search for" required="">
                      <button class="search-icon search-submit" type="submit" title="Search"></button>
                    </form>
                  </div>
                </div>
                <div id="item_category2" class="dropdown titles-dropdown ">
                  <a class="btn-selector nolink "> Sort by (Defaut)</a>
                  <ul>
                    <li><span>UX/UI</span></li>
                    <li><span>Candidates</span></li>
                    <li><span>Days</span></li>
                  </ul>
                </div>
              </div>

              <div class="table-content">
                <div class="wrap-applicants table-responsive">
                  <table>
                    <thead>
                      <tr>
                        <th>JObs</th>
                        <th>Status</th>
                        <th class="center">date Applied</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- col 1 -->
                      <tr class="file-delete">
                        <td>
                          <div class="candidates-wrap flex2">
                            <div class="images">
                              <img src="../images/dashboard/logo-company-1.png" alt="">
                            </div>
                            <div class="content">
                              <h3>UI UX Designer</h3>
                              <div class="now-box flex2">
                                <div class="map color-4">Diamond Trading Estates</div>
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
                                  Design & Creative
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="status-wrap">
                            <div class="button-status style-2"> Seen </div>
                          </div>
                        </td>
                        <td class="center">
                          <div class="title-day color-1">December 18, 2023</div>
                        </td>
                        <td>
                          <div id="items_1" class="dropdown titles-dropdown">
                            <a class="btn-selector nolink flex">
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                            </a>
                            <ul>
                              <li><span class="icon-eye more-ic"></span> <span>View Job</span></li>
                              <li class="remove-file"><span class="icon-trash more-ic"></span><span>Remove Job</span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <!-- col 2 -->
                      <tr class="file-delete">
                        <td>
                          <div class="candidates-wrap flex2">
                            <div class="images">
                              <img src="../images/dashboard/profile-2.jpg" alt="">
                            </div>
                            <div class="content">
                              <h3>Human Resource</h3>
                              <div class="now-box flex2">
                                <div class="map color-4">Sun West Condominiums</div>
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
                                  Advertesting
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="status-wrap">
                            <div class="button-status color-3">Responded</div>
                          </div>
                        </td>
                        <td class="center">
                          <div class="title-day color-1">December 18, 2023</div>
                        </td>
                        <td>
                          <div id="items_2" class="dropdown titles-dropdown">
                            <a class="btn-selector nolink flex">
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                            </a>
                            <ul>
                              <li><span class="icon-eye more-ic"></span> <span>View Job</span></li>
                              <li class="remove-file"><span class="icon-trash more-ic"></span><span>Remove Job</span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <!-- col 3 -->
                      <tr class="file-delete">
                        <td>
                          <div class="candidates-wrap flex2">
                            <div class="images">
                              <img src="../images/dashboard/logo-company-2.png" alt="">
                            </div>
                            <div class="content">
                              <h3>Python Developer</h3>
                              <div class="now-box flex2">
                                <div class="map color-4">Eclipse Estates</div>
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
                                  IT & development
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="status-wrap">
                            <div class="button-status style">Pending</div>
                          </div>
                        </td>
                        <td class="center">
                          <div class="title-day color-1">December 18, 2023</div>
                        </td>
                        <td>
                          <div id="items_3" class="dropdown titles-dropdown">
                            <a class="btn-selector nolink flex">
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                            </a>
                            <ul>
                              <li><span class="icon-eye more-ic"></span> <span>View Job</span></li>
                              <li class="remove-file"><span class="icon-trash more-ic"></span><span>Remove Job</span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <!-- col 4 -->
                      <tr class="file-delete">
                        <td>
                          <div class="candidates-wrap flex2">
                            <div class="images">
                              <img src="../images/dashboard/logo-company-3.png" alt="">
                            </div>
                            <div class="content">
                              <h3>PHP Developer</h3>
                              <div class="now-box flex2">
                                <div class="map color-4">Southeastern Properties</div>
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
                                  Delivery Driver
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="status-wrap">
                            <div class="button-status style ">Pending</div>
                          </div>
                        </td>
                        <td class="center">
                          <div class="title-day color-1">December 18, 2023</div>
                        </td>
                        <td>
                          <div id="items_4" class="dropdown titles-dropdown">
                            <a class="btn-selector nolink flex">
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                            </a>
                            <ul>
                              <li><span class="icon-eye more-ic"></span> <span>View Job</span></li>
                              <li class="remove-file"><span class="icon-trash more-ic"></span><span>Remove Job</span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <!-- col 5 -->
                      <tr class="file-delete">
                        <td>
                          <div class="candidates-wrap flex2">
                            <div class="images">
                              <img src="../images/dashboard/logo-company-4.png" alt="">
                            </div>
                            <div class="content">
                              <h3>Project Manager</h3>
                              <div class="now-box flex2">
                                <div class="map color-4">Southeastern Properties</div>
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
                                  Sales & Marketing
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="status-wrap">
                            <div class="button-status style ">Pending</div>
                          </div>
                        </td>
                        <td class="center">
                          <div class="title-day color-1">December 18, 2023</div>
                        </td>
                        <td>
                          <div id="items_5" class="dropdown titles-dropdown">
                            <a class="btn-selector nolink flex">
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                            </a>
                            <ul>
                              <li><span class="icon-eye more-ic"></span> <span>View Job</span></li>
                              <li class="remove-file"><span class="icon-trash more-ic"></span><span>Remove Job</span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      <!-- col 6 -->
                      <tr class="file-delete">
                        <td>
                          <div class="candidates-wrap flex2">
                            <div class="images">
                              <img src="../images/dashboard/logo-company-1.png" alt="">
                            </div>
                            <div class="content">
                              <h3> Developer</h3>
                              <div class="now-box flex2">
                                <div class="map color-4">Southeastern Properties</div>
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
                                  Engineering
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="status-wrap">
                            <div class="button-status color-3 ">Responded</div>
                          </div>
                        </td>
                        <td class="center">
                          <div class="title-day color-1">December 18, 2023</div>
                        </td>
                        <td>
                          <div id="items_6" class="dropdown titles-dropdown">
                            <a class="btn-selector nolink flex">
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                              <span class="more-icon"></span>
                            </a>
                            <ul>
                              <li><span class="icon-eye more-ic"></span> <span>View Job</span></li>
                              <li class="remove-file"><span class="icon-trash more-ic"></span><span>Remove Job</span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>

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

  <script src="../javascript/jquery.min.js"></script>
  <script src="../javascript/jquery.cookie.js"></script>
  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/bootstrap.min.js"></script>
  <script src='../javascript/wow.min.js'></script>
  <script src="../javascript/main.js"></script>
  <script src="../javascript/countto.js"></script>
  <script src="../javascript/dropdown.js"></script>
  <script src="../javascript/dashboard-menu.min.js"></script>
  <script src="../javascript/dashboard-menu.js"></script>

</body>


<!-- Mirrored from themesflat.co/html/jobtex/dashboard/candidates-my-applied.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Nov 2025 15:36:17 GMT -->
</html>