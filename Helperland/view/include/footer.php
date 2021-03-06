<?php $base_url = "http://localhost/helperland/index.php";  ?>
<!-- Footer  -->
<footer>
    <div class="row flex-container footer_size">
        <div class="col-lg-2">
            <div class="white_logo_transparent_background-copy-4">
                <img src="assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </div>
        <div class="col-lg-8 footer_option_box">
            <div class="footer_option">
                <a href="<?php echo $base_url . "?function=home_page"  ?>">
                    HOME
                </a>
                <a href="<?php echo "$base_url?function=about_page"  ?>">
                    ABOUT
                </a>
                <a href="#">
                    TESTIMONIAL
                </a>
                <a href="<?php echo "$base_url?function=faq_page"  ?>">
                    FAQS
                </a>
                <a href="#">
                    INSURANCE POLICY
                </a>
                <a href="#">
                    IMPRESSUM
                </a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="social_media_box">
                <img src="assets/images/Facebook.png" class="social_media">
                <img src="assets/images/insta-1.png" class="social_media">
            </div>
        </div>
    </div>

    <div style="width: 100%; padding: 0px 100px;">
        <div class="Rectangle-12-copy-2"></div>
    </div>

    <div>
        <p class="rights_reserved">
            ©2018 Helperland All rights reserved.Terms and Conditions | Privacy Policy
        </p>
    </div>
</footer>



<script src="assets/js/faq.js"></script>
<script src="assets/js/responsive.js"></script>
<script src="assets/js/admin.js"></script>

<?php
if (isset($_SESSION["login_error"])) {
    echo "<script>
            login_error();
        </script>";
}
unset($_SESSION["login_error"]);

if (isset($_SESSION["fp_error"])) {
    echo "<script>
            fp_error();
        </script>";
}
unset($_SESSION["fp_error"]);
?>



</body>

</html>