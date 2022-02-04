<!-- Header  -->
<?php include "include/header_home.php" ?>


<!-- Navigation Bar -->
<?php include "include/navbar_home.php"  ?>

<section onclick="closeSideMenu()" id="background_body">
<!-- Banner Section  -->
<section class="banner_section border">

    <div class="container">
        <div class="Register_Now_Box border">
            <div>
                <p class="Register-Now">Register Now!</p>
            </div>

            <form onsubmit="return checkPassword(this)" method="POST" action="<?php echo "$base_url?function=insertaccountdetails"  ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-md form col-auto" id="fname" placeholder="First Name" name="fname" required>

                    <input type="text" class="form-control form col-auto" id="lname" placeholder="Last Name" name="lname" required>

                    <input type="email" class="form-control form col-auto" id="email" placeholder="Email Address" name="email" required>

                    <div class="input-group form">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+91</div>
                        </div>
                        <input type="text" class="form-control" id="phone_no" placeholder="Phone Number" name="phone_no" 
                        required maxlength="10" pattern="[7-9]{1}[0-9]{9}"  title="Enter valid 10 digit number"required>
                    </div>

                    <input type="password" class="form-control form col-auto" id="password" name="password1" placeholder="Password" required>
                    <input type="password" class="form-control form col-auto" id="cpassword" name="password2" placeholder="Confirm Password" required>

                    <div class="form-check form_checkbox col-auto">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                        <label class="form-check-label" for="defaultCheck1">
                            Send me newsletters from Helperland
                        </label>
                    </div>

                    <div class="form-check form_checkbox col-auto">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                        <label class="form-check-label" for="defaultCheck1">
                            I accept <span style="color: blue;">terms and conditions</span> & <span style="color: blue;">privacy policy</span>
                        </label>
                    </div>

                    <div class="get_started">
                        <button type="submit" class="get_started_btn" name="provider_register">Get Started <img src="assets/images/arrow-white.png"></button>
                    </div>

                </div>

            </form>
        </div>

        <div class="arrow_down">
            <a href="#How it works">
                <img src="assets/images/shape-1.png" class="Shape-1">
            </a>
        </div>

    </div>
</section>

<!-- How it Works -->
<section id="How it works" style="position: relative;">
    <div class="container">
        <p class="How-it-works">How it works</p>

        <div class="row">
            <div class="col-lg-6">
                <p class="hiw_para_heading">Register yourself</p>
                <p class="hiw_para">
                    Provide your basic information to register
                    yourself as a service provider.
                </p>

                <div>
                    <p class="Read_more">Read More <img src="assets/images/shape-2.png" class="shape_2"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/how_it_works(1).png" class="hiw_img">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 order_1">

                <img src="assets/images/how_it_works(2).png" class="hiw_img_2">

            </div>
            <div class="col-lg-6 order_2">
                <p class="hiw_para_heading_2">Get service requests</p>
                <p class="hiw_para_2">
                    Provide your basic information to register
                    yourself as a service provider.
                </p>

                <div>
                    <p class="Read_more_2">Read More <img src="assets/images/shape-2.png" class="shape_2"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <p class="hiw_para_heading">Complete Service</p>
                <p class="hiw_para">
                    Accept service requests from your customers
                    and complete your work.
                </p>

                <div>
                    <p class="Read_more">Read More <img src="assets/images/shape-2.png" class="shape_2"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/how_it_work(3).png" class="hiw_img">
            </div>
        </div>

        <div class="blog_left">
            <img src="assets/images/blog-left-bg.png">
        </div>

        <div class="blog_right">
            <img src="assets/images/blog-right-bg.png">
        </div>

        <div class="container mb-5">

            <p class="GET-OUR-NEWSLETTER1">
                GET OUR NEWSLETTER
            </P>

            <form action="#" class="email_form_box">
                <div>
                    <input type="email" placeholder="Your Email" class="email_about">
                </div>
                <div>
                    <button type="submit" class="submit_hiw">Submit</button>
                </div>
            </form>
        </div>

    </div>
</section>

</section>

<!-- Footer  -->
<?php include "include/footer_home.php" ?>