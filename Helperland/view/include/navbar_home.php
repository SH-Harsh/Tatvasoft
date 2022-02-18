<?php $base_url = "http://localhost/helperland/index.php"; ?>
<section id="header" style="z-index: 100;">
    <nav class="navbar_home">
        <a href="<?php echo "$base_url?function=home_page"  ?>">
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </a>
        <div class="nav_option">
            <ul>
                <?php if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] == 1) { ?>
                    <li class="navigation_border nav_hide"><a href="<?php echo "$base_url?function=bookService"  ?>">Book a Cleaner</a></li>
                <?php } ?>
                <li class="nav_hide navigation_border_hover"><a href="<?php echo "$base_url?function=prices_page"  ?>">Prices</a></li>
                <li class="nav_hide navigation_border_hover"><a href="#">Our Guarantee</a></li>
                <li class="nav_hide navigation_border_hover"><a href="#">Blog</a></li>
                <li class="nav_hide navigation_border_hover"><a href="<?php echo "$base_url?function=contactus_page"  ?>">Contact Us</a></li>

                <?php

                if (isset($_COOKIE["userid"])) {
                    $_SESSION["userid"] = $_COOKIE["userid"];
                }

                if (!isset($_SESSION["userid"])) {   ?>

                    <li class="navigation_border nav_hide"><a href="#" data-target="#exampleModalCenter" data-toggle="modal" id="login">Login</a></li>
                    <li class="navigation_border nav_hide"><a href="<?php echo "$base_url?function=becomeHelper_page" ?>" id="become_a_helper">Become a Helper</a></li>

                <?php } ?>
                <!-- Cookies data Test  -->
                <?php
                if (isset($_COOKIE["userid"]) || isset($_SESSION["name"])) {
                ?>
                    <li class="notification_border nav_hide"><a href="#"><img src="assets/images/icon-notification.png"></a>
                        <div class="notify_no">
                            <span class="notification_no">2</span>
                        </div>
                    </li>

                    <li class="nav_hide">
                        <img src="assets/images/person_logo.png" class="m-2">
                    </li>

                    <li class="nav_hide" style="position: relative;">
                        <img src="assets/images/forma-2.png" class="arrow_down_nav">

                        <div class="arrow_down_section border">
                            <div>
                                <h5>Welcome,<br><?php $name = $_SESSION["name"];
                                                echo $name; ?></h5>
                            </div>
                            <hr>
                            <a>My Dashboard</a>
                            <a id="MySettings">My Settings</a>
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

<!-- Side navbar  -->
<?php include "view/include/side_navbar.php"  ?>

<!-- Login Modal  -->
<?php include "view/include/login_modal.php" ?>

<!-- Forgot Password Modal  -->
<?php include "view/include/forgot_password_modal.php" ?>

<!-- Create a account Modal  -->
<?php include "view/include/create_account_modal.php" ?>