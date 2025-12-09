<?php
$isLoggedIn = false;
$userType = null;
$userId = null;

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_type"])) {
    $isLoggedIn = true;
    $userType = $_SESSION["user_type"];
    $userId = $_SESSION["user_id"];

    if ($userType == "employer") {
        $fetchUser = mysqli_query($conn, "SELECT * FROM `employers` WHERE `id` = '$userId'");
    } else {
        $fetchUser = mysqli_query($conn, "SELECT * FROM `candidates` WHERE `id` = '$userId'");
    }

    $userInfo = mysqli_fetch_assoc($fetchUser);
}
?>
<header id="header" class="header header-default">
    <div class="tf-container ct2">
        <div class="row">
            <div class="col-md-12">
                <div class="sticky-area-wrap">
                    <div class="header-ct-left">
                        <div id="logo" class="logo">
                            <a href="index.php">
                                <img class="site-logo" id="trans-logo" src="images/logo-white.png" alt="Image" />
                            </a>
                        </div>
                        <div class="categories">
                            <a href="#"><span class="icon-grid"></span>Categories</a>
                            <div class="sub-categorie">
                                <ul class="pop-up">
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-1"></span>Design &
                                            Creative
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-8"></span>Digital
                                            Marketing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-2"></span>Development &
                                            IT
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-3"></span>Music & Audio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-4"></span>Finance &
                                            Accounting
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-5"></span>Programming &
                                            Tech
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-6"></span>Video &
                                            Animation
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="icon-categorie-7"></span>Writing &
                                            translation
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-ct-center">
                        <div class="nav-wrap">
                            <nav id="main-nav" class="main-nav">
                                <ul id="menu-primary-menu" class="menu">
                                    <li class="menu-item current-item">
                                        <a href="index.php">Home </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="find-jobs.php">Find jobs </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-ct-right">
                        <?php if ($isLoggedIn): ?>
                            <div class="header-customize-item account">
                                <?php if (isset($userInfo["image"])): ?>
                                    <img src="uploads/<?= $userInfo["image"] ?>" alt=""
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" />
                                <?php else: ?>
                                    <img src="images/user.png" alt=""
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" />
                                <?php endif; ?>
                                <div class="name">
                                    <?= $userInfo["fullname"] ?? $userInfo["company_name"] ?><span
                                        class="icon-keyboard_arrow_down"></span>
                                </div>
                                <div class="sub-account">
                                    <div class="sub-account-item">
                                        <?php if ($userType == "employer"): ?>
                                            <a href="employer"><span class="icon-dashboard"></span>Dashboard</a>
                                        <?php else: ?>
                                            <a href="candidate"><span class="icon-dashboard"></span>Dashboard</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="sub-account-item">
                                        <?php if ($userType == "employer"): ?>
                                            <a href="employer/profile-setting.php"><span class="icon-profile"></span>
                                                Profile</a>
                                        <?php else: ?>
                                            <a href="candidate/profile.php"><span class="icon-profile"></span> Profile</a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="sub-account-item">
                                        <?php if ($userType == "employer"): ?>
                                            <a href="employer/logout.php"><span class="icon-log-out"></span> Log Out</a>
                                        <?php else: ?>
                                            <a href="employer/logout.php"><span class="icon-log-out"></span> Log Out</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="header-customize-item button">
                                <a href="login.php">Login / Register</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="nav-filter">
                        <div class="nav-mobile"><span></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>