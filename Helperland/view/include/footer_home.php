<?php $base_url = "http://localhost/helperland/index.php";  ?>
<footer>
    <div class="row flex-container footer_size">
        <div class="col-lg-2">
            <div class="white_logo_transparent_background-copy-4 flex_footer">
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
            <div class="social_media_box flex_footer">
                <img src="assets/images/Facebook.png" class="social_media">
                <img src="assets/images/insta-1.png" class="social_media">
            </div>
        </div>
    </div>

    <div class="privacy_policy">
        <p>©2018 Helperland. All rights reserved. Terms and Conditions | Privacy Policy</p>

        <button type="button" class="ok">OK</button>
    </div>
</footer>




<!-- JS Script  -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/responsive.js"></script>
<!-- <script src="assets/js/index.js"></script> -->


<?php
if (isset($_SESSION["login_error"])) {
    echo "<script>
            login_error();
        </script>";
}
unset($_SESSION["login_error"]);
// unset($_SESSION["fp_email_sucess"]);

if (isset($_SESSION["fp_error"])) {
    echo "<script>
                fpass_error();
        </script>";
}
unset($_SESSION["fp_error"]);

if (isset($_SESSION["fp_email_sucess"])) {
    echo "<script>
                fpass_error();
        </script>";
}
unset($_SESSION["fp_email_sucess"]);

if(isset($_SESSION["Logout"])){
    echo "<script>
            logoutalert();
        </script>";
}
unset($_SESSION["Logout"]);

if (isset($_SESSION["error_message"])) {
    echo "<script>
            accounterror();
        </script>";
}
unset($_SESSION["error_message"]);
?>

</body>

</html>