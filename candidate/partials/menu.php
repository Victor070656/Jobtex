<?php


$fetchUser = mysqli_query($conn, "SELECT * FROM `candidates` WHERE `id` = '$userid'");

$userInfo = mysqli_fetch_assoc($fetchUser);

?>
<header id="header" class="header header-default ">
    <div class="tf-container ct2">
      <div class="row">
        <div class="col-md-12">
          <div class="sticky-area-wrap">
            <div class="header-ct-left">
              <div id="logo" class="logo">
                <a href="../">
                  <img class="site-logo" src="../images/logo.png" alt="Image" />

                </a>
              </div>
            </div>
            <div class="header-ct-center">
              <div class="nav-wrap">
                
              </div>
            </div>
            <div class="header-ct-right">
              

              <div class="header-customize-item account">
                 <?php if (isset($userInfo["image"])): ?>
                                    <img src="../uploads/<?= $userInfo["image"] ?>" alt=""
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" />
                                <?php else: ?>
                                    <img src="../images/user.png" alt=""
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" />
                                <?php endif; ?>
                <div class="name">
                  <?= $userInfo["fullname"] ?><span class="icon-keyboard_arrow_down"></span>
                </div>
                <div class="sub-account">
                  <div class="sub-account-item">
                    <a href="index.php"><span class="icon-dashboard"></span>Dashboard</a>
                  </div>
                  <div class="sub-account-item">
                    <a href="profile.php"><span class="icon-profile"></span> Profile</a>
                  </div>
                  <div class="sub-account-item">
                    <a href="logout.php"><span class="icon-log-out"></span> Log Out</a>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- <div class="nav-filter">
              <div class="nav-mobile"><span></span></div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="btn header-item " id="left-menu-btn">
      <span class="hamburger-icon">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>
  </header>


  <!-- ========== Left Sidebar ========== -->
  <div class="left-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

      <ul class="downmenu list-unstyled" id="side-menu">

        <li>
          <a href="index.php" class="tf-effect">
            <span class="icon-dashboard dash-icon"></span>
            <span class="dash-titles">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="profile.php" class="tf-effect">
            <span class="icon-profile dash-icon"></span>
            <span class="dash-titles">Profile</span>
          </a>
        </li>

        <li>
          <a href="jobs-applied.php" class="tf-effect">
            <span class="icon-my-apply dash-icon"></span>
            <span class="dash-titles">Jobs Applied</span>
          </a>
        </li>

        <li>
          <a href="../find-jobs.php" class="tf-effect">
            <span class="icon-bell1 dash-icon"></span>
            <span class="dash-titles">Alerts Jobs</span>
          </a>
        </li>

        <li>
          <a href="logout.php" class="tf-effect">
            <span class="icon-log-out dash-icon"></span>
            <span class="dash-titles">Log out</span>
          </a>
        </li>

      </ul>
    </div>
  </div>