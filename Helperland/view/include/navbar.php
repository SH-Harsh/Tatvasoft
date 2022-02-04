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
                <li class="nav_hide"><a href="#" class="nav_option_border">Book Now</a></li>
                <li class="nav_hide"><a href="<?php echo "$base_url?function=prices_page"  ?>" class="nav_option_border_only">Prices & Services</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border_only">Warrenty</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border_only">Blog</a></li>
                <li class="nav_hide"><a href="<?php echo "$base_url?function=contactus_page"  ?>" class="nav_option_border_only">Contact</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border" data-toggle="modal" id="login">Login</a>
                </li>
                <li class="nav_hide"><a href="<?php echo "$base_url?function=becomeHelper_page" ?>" class="nav_option_border">Become a Helper</a></li>
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