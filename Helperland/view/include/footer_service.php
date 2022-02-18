<footer>
    <div class="row flex-container footer_size">
        <div class="col-lg-2">
            <div class="white_logo_transparent_background-copy-4">
                <img src="assets/images/white-logo-transparent-background-copy-4.png">
            </div>
        </div>
        <div class="col-lg-8 footer_option_box">
            <div class="footer_option">
                <a href="#">
                    HOME
                </a>
                <a href="#">
                    ABOUT
                </a>
                <a href="#">
                    TESTIMONIAL
                </a>
                <a href="#">
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

</section>

<!-- Bootstrap js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

<!-- javascript scripts and library  -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
</script>

<script src="assets/js/responsive.js"></script>
<script src="assets/js/admin.js"></script>
<script src="assets/js/faq.js"></script>
<script src="assets/js/ajax.js"></script>


<?php
// if (isset($_SESSION["postalcode"])) {
//     echo "<script>
//             postalvalidation();
//         </script>";
// }
// unset($_SESSION["postalcode"]);

if (isset($_SESSION["schedulePlan"])) {
    echo "<script>
            postalvalidation();
            schedulePlan();
        </script>";
}
unset($_SESSION["schedulePlan"]);

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