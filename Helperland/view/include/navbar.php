<?php $base_url = "http://localhost/helperland"; ?>

<section id="navigation_bar" style="z-index: 100;">
    <nav class="navbar_home">
        <a href="<?php echo $base_url; ?>">
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </a>
        <div class="nav_option">
            <ul>
                <?php if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] == 1) { ?>
                    <li class="nav_hide"><a href="<?php echo "$base_url?function=bookService"  ?>" class="nav_option_border">Book Now</a></li>
                <?php } ?>
                <li class="nav_hide"><a href="<?php echo "$base_url?function=prices_page"  ?>" class="nav_option_border_only">Prices & Services</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border_only">Warrenty</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border_only">Blog</a></li>
                <li class="nav_hide"><a href="<?php echo "$base_url?function=contactus_page"  ?>" class="nav_option_border_only">Contact</a></li>

                <?php

                if (isset($_COOKIE["userid"])) {
                    $_SESSION["userid"] = $_COOKIE["userid"];
                }

                if (!isset($_SESSION["userid"])) {   ?>

                    <li class="nav_hide"><a href="#" data-target="#exampleModalCenter" data-toggle="modal" id="login" class="nav_option_border">Login</a></li>
                    <li class="nav_hide"><a href="<?php echo "$base_url?function=becomeHelper_page" ?>" id="become_a_helper" class="nav_option_border">Become a Helper</a></li>

                <?php } ?>

                <?php
                if (isset($_COOKIE["userid"]) || isset($_SESSION["name"])) {
                ?>
                    <li class="notification_border"><a href="#"><img src="assets/images/icon-notification.png"></a>
                        <div class="notify_no">
                            <span class="notification_no">2</span>
                        </div>
                    </li>

                    <li class="nav_hide">
                        <img src="assets/images/person_logo.png" id="person_logo">
                    </li>

                    <li class="nav_hide" style="position: relative;">
                        <img src="assets/images/forma-2.png" class="arrow_down_nav">

                        <div class="arrow_down_section border">
                            <div>
                                <h5>Welcome,<br> <?php $name = $_SESSION["name"];
                                                    echo $name; ?></h5>
                            </div>
                            <hr>
                            <?php if ($_SESSION["usertype"] == 1) { ?>

                                <a href="<?= "$base_url?function=servicehistory&parameter=0"; ?>">My Dashboard</a>
                                <a id="MySettings" href="<?= "$base_url?function=servicehistory&parameter=1"; ?>">My Settings</a>

                            <?php } else { ?>

                                <a href="<?= "$base_url?function=upcomingService"; ?>">My Dashboard</a>
                                <a id="MySettings" href="<?= "$base_url?function=upcomingService&parameter=1"; ?>">My Settings</a>

                            <?php } ?>
                            <a href="<?= "$base_url?function=logout"; ?>" id="Logout">Logout</a>

                            <div class="arrow_up">

                            </div>
                        </div>

                    </li>


                <?php } ?>

                <li>
                    <div class="burger" onclick="openSideMenu()">
                        <img src="assets/images/menu.png" height="35px" width="45px">
                    </div>
                </li>



            </ul>
        </div>
    </nav>
</section>

<!-- Side Navbar  -->
<?php include "view/include/side_navbar.php" ?>

<!-- Login Modal  -->
<?php include "view/include/login_modal.php" ?>

<!-- Forgot Password Modal  -->
<?php include "view/include/forgot_password_modal.php" ?>

<!-- Create a account Modal  -->
<?php include "view/include/create_account_modal.php" ?>