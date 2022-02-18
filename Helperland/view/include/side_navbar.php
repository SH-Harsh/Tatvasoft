<div class="side-nav" id="side-nav" style="z-index: 200;">

    <?php 
        if(isset($_SESSION["userid"])){
    ?>
    <p class="mx-2 mb-0 mt-5">Warm Welcome</p>
    <p class="mx-2 mb-2"><?= $_SESSION["name"] ?></p>

    <a href="#">overview</a>
    <a href="#">calendra view</a>
    <a href="#">My favorites</a>
    <a href="#">Bills</a>
    <a href="#">My Setting</a>
    <a href="<?= "$base_url?function=logout"; ?>" id="Logout">Log out</a>

    <hr>

    <?php } ?>
    <a href="#" style="margin-top: 50px;">Book a Cleaner</a>
    <a href="<?php echo "$base_url?function=prices_page"  ?>">Prices</a>
    <a href="#">Our Guarantee</a>
    <a href="#">Blog</a>
    <a href="<?php echo "$base_url?function=contactus_page"  ?>">Contact Us</a>

    <?php 
        if(!isset($_SESSION["userid"])){
    ?>
    <a href="#" data-toggle="modal" id="side_nav_login">Login</a>
    <?php } ?>

    <a href="<?php echo "$base_url?function=becomeHelper_page" ?>">Become a Helper</a>

    <hr>

    <div class="social_media_box">
        <img src="assets/images/Facebook.png" class="social_media">
        <img src="assets/images/insta-1.png" class="social_media">
    </div>

</div>