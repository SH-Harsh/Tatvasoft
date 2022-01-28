<?php include "view/db.php" ?>

<section id="header" style="z-index: 100;">
    <nav class="navbar_home">
        <a href="index.php">
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </a>
        <div class="nav_option">
            <ul>
                <li class="navigation_border nav_hide"><a href="#">Book a Cleaner</a></li>
                <li class="nav_hide navigation_border_hover"><a href="view/Prices.php">Prices</a></li>
                <li class="nav_hide navigation_border_hover"><a href="#">Our Guarantee</a></li>
                <li class="nav_hide navigation_border_hover"><a href="#">Blog</a></li>
                <li class="nav_hide navigation_border_hover"><a href="view/Contact.php">Contact Us</a></li>
                <li class="navigation_border nav_hide"><a href="#" data-target="#exampleModalCenter" data-toggle="modal" id="login">Login</a></li>
                <li class="navigation_border nav_hide"><a href="#" id="become_a_helper">Become a Helper</a></li>
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
<?php include "view/side_navbar.php"  ?>

<!-- Login Modal  -->
<?php include "view/login_modal.php" ?>

<!-- Forgot Password Modal  -->
<?php include "view/forgot_password_modal.php" ?>

<!-- Create a account Modal  -->
<?php include "view/create_account_modal.php" ?>