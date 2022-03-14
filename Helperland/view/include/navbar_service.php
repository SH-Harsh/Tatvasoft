<?php $base_url = "http://localhost/helperland"; ?>

<header>
    <nav>
        <a href="<?php echo $base_url; ?>">
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png" width="73px" height="54px">
            </div>
        </a>
        <ul class="nav-links">

            <?php if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] == 1) { ?>
                <li><a class="book_now" href="<?php echo "$base_url?function=bookService"  ?>">Book now</a></li>
            <?php } ?>
            <li><a href="<?= "$base_url?function=prices_page"  ?>">Prices & Services</a></li>
            <li><a class="nav-link" href="#">Warranty</a></li>
            <li><a class="nav-link" href="#">Blog</a></li>
            <li><a class="nav-link" href="<?= "$base_url?function=contactus_page"  ?>">Contact</a></li>
            <li class="notifation_border"><a href="#"><img src="assets/images/icon-notification.png" style="margin-bottom: 20px;"></a>
                <div class="notify_no">
                    <span class="notification_no">2</span>
                </div>
            </li>
            <li>
                <img src="assets/images/person_logo.png" class="m-2">
            </li>
            <li style="position: relative;">
                <img src="assets/images/forma-2.png" class="arrow_down_nav">

                <div class="arrow_down_section border">
                    <h5>Welcome, <br> <?php $name = $_SESSION["name"];
                                        echo $name; ?></h5>
                    <hr>

                    <a>My Dashboard</a>
                    <a id="MySettings">My Settings</a>
                    <a href="<?= "$base_url?function=logout"; ?>" id="Logout">Logout</a>


                    <div class="arrow_up">

                    </div>
                </div>

            </li>

        </ul>

        <li class="notifation_border_mv"><a href="#"><img src="assets/images/icon-notification.png" style="margin-bottom: 20px;"></a>
            <div class="notify_no">
                <span class="notification_no">2</span>
            </div>
        </li>

        <div class="burger" onclick="openSideMenu()">
            <img src="assets/images/menu.png" height="35px" width="45px">
        </div>
    </nav>
</header>

<!-- Side Navbar  -->
<?php include "view/include/Side_nav_service.php" ?>