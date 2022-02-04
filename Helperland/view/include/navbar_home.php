<?php
// include "db.php"; 
?>
<?php $base_url = "http://localhost/helperland/index.php";  ?>
<section id="header" style="z-index: 100;">
    <nav class="navbar_home">
        <a href="<?php echo "$base_url?function=home_page"  ?>">
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </a>
        <div class="nav_option">
            <ul>
                <li class="navigation_border nav_hide"><a href="#">Book a Cleaner</a></li>
                <li class="nav_hide navigation_border_hover"><a href="<?php echo "$base_url?function=prices_page"  ?>">Prices</a></li>
                <li class="nav_hide navigation_border_hover"><a href="#">Our Guarantee</a></li>
                <li class="nav_hide navigation_border_hover"><a href="#">Blog</a></li>
                <li class="nav_hide navigation_border_hover"><a href="<?php echo "$base_url?function=contactus_page"  ?>">Contact Us</a></li>
                <li class="navigation_border nav_hide"><a href="#" data-target="#exampleModalCenter" data-toggle="modal" id="login">Login</a></li>
                <li class="navigation_border nav_hide"><a href="<?php echo "$base_url?function=becomeHelper_page" ?>" id="become_a_helper">Become a Helper</a></li>

                <!-- Cookies data Test  -->
                <?php
                if (isset($_COOKIE["userid"])) {
                ?>
                    <li class="nav_hide navigation_border_hover"><a href="#"><?= $_COOKIE["userid"]  ?></a></li>
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