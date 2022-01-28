<section id="navigation_bar">
    <nav class="navbar_home">
        <a href="../index.php">
            <div class="logo">
                <img src="../assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </a>
        <div class="nav_option">
            <ul>
                <li class="nav_hide"><a href="#" class="nav_option_border">Book Now</a></li>
                <li class="nav_hide"><a href="Prices.php" class="nav_option_border_only">Prices & Services</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border_only">Warrenty</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border_only">Blog</a></li>
                <li class="nav_hide"><a href="Contact.php" class="nav_option_border_only">Contact</a></li>
                <li class="nav_hide"><a href="#" class="nav_option_border" data-toggle="modal" id="login">Login</a>
                </li>
                <li class="nav_hide"><a href="#" class="nav_option_border">Become a Helper</a></li>
                <li>
                    <div class="burger" onclick="openSideMenu()">
                        <img src="../assets/images/menu.png" height="35px" width="45px">
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</section>

<!-- Side Navbar  -->
<?php include "side_navbar.php" ?>

<!-- Login Modal  -->
<?php include "login_modal.php" ?>

<!-- Forgot Password Modal  -->
<?php include "forgot_password_modal.php" ?>

<!-- Create a account Modal  -->
<?php include "create_account_modal.php" ?>