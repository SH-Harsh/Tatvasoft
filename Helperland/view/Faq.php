<?php include "include/header.php" ?>

<!-- Custom Navbar  -->
<?php include "include/navbar.php" ?>

<!-- Controller  -->
<?php 
// include "../controllers/controller.php"  
?>

<!-- Become a Helper Modal Section  -->

<div class="bg-modal-become-helper">
    <div class="modal-become-helper">
        <p class="login text-center mb-5">Register as Helper!</p>

        <form action="#">
            <input type="text" class="form-control mb-2" id="first_name_bh" placeholder="First given name">

            <input type="text" class="form-control mb-2" id="surname_bh" placeholder="Surname">

            <input type="email" class="form-control mb-2" id="email_bh" placeholder="Email Address">

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">+49</div>
                </div>
                <input type="number" class="form-control" id="phone_no_bh" placeholder="Phone Number">
            </div>

            <input type="password" class="form-control my-2" id="email_bh" placeholder="Password">

            <input type="password" class="form-control mb-2" id="email_bh" placeholder="Repeat Password">

            <div class="remember_me ml-2 my-3">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="font-size: 14px;">I accept <span>terms and conditions</span> &
                    <span>privacy policy</span></label>
            </div>
        </form>

        <div class="getting_started">
            <button type="submit">Getting Started <img src="assets/arrow-white.png"></button>
        </div>

    </div>
</div>


<div style="width: 100%; height: 62px;">

</div>



<section onclick="closeSideMenu()" id="background_body">
    <div>
        <img src="assets/images/group-16.png" class="faq_img">
        <h1 class="faq_title">FAQs</h1>
    </div>

    <div>
        <div class="text-center">
            <div class="star_side_line"></div>
            <img src="assets/images/separator.png" class="separator_img">
            <div class="star_side_line"></div>
        </div>

    </div>

    <div class="container">
        <div class="Layer-0">
            <p class="faq_contain">
                Whether you are Customer or Service provider,
                We have tried our best to solve all your queries and questions.
            </p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">



            </div>
            <div class="col-md-4 tab_box active tablinks" style="padding: 0;" onclick="openService(event,'for_customer')">
                <div class="tab_option" style="cursor: pointer;">
                    <p>For Customer</p>
                </div>
            </div>
            <div class="col-md-4 tab_box tablinks" style="padding: 0;" onclick="openService(event,'service_provider')">
                <div class="tab_option" style="cursor: pointer;">
                    <p>For Service Provider</p>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>


    </div>

    <div class="container tabcontent  mt-5" id="for_customer">

        <!-- 1st content -->
        <div class="row">
            <div class="col-2">
                <img src="assets/images/side arrow.png" class="arrow" id="arrow1">
            </div>
            <div class="col-10">
                <p class="for_customer_heading" onclick='faqpara("faq_para_1","arrow1");'>
                    What is included in the basic cleaning?
                </p>


                <p class="faq_customer_body" id="faq_para_1">
                    Living room, bedroom and bathroom, kitchen and common areas
                </p>

            </div>
        </div>

        <!-- 2nd content -->
        <div class="row">
            <div class="col-2">
                <img src="assets/images/side arrow.png" class="arrow" id="arrow2">
            </div>
            <div class="col-10">
                <p class="for_customer_heading" onclick="faqpara('faq_para_2','arrow2')">
                    Which helper comes to me?
                </p>

                <p class="faq_customer_body" id="faq_para_2">
                    Helperland has an extensive network of experienced cleaners. Depending on the location, date and
                    duration, we will try to assign you the best available helper. If a cleaner accepts your order,
                    you will receive an email with the helper's profile. If you use our service more often, you can
                    save a cleaner as a favorite. For future bookings, your favorite will be requested first.
                </p>
            </div>
        </div>

        <!-- 3nd content -->
        <div class="row">
            <div class="col-2">
                <img src="assets/images/side arrow.png" class="arrow" id="arrow3">
            </div>
            <div class="col-10">
                <p class="for_customer_heading" onclick="faqpara('faq_para_3','arrow3')">
                    Can I skip or move booking?
                </p>

                <p class="faq_customer_body" id="faq_para_3">
                    Living room, bedroom and bathroom, kitchen and common areas
                </p>
            </div>
        </div>

        <!-- 4nd content -->
        <div class="row">
            <div class="col-2">
                <img src="assets/images/side arrow.png" class="arrow" id="arrow4">
            </div>
            <div class="col-10">
                <p class="for_customer_heading" onclick="faqpara('faq_para_4','arrow4')">
                    Do I have to be at home during the cleaning?
                </p>

                <p class="faq_customer_body" id="faq_para_4">
                    Living room, bedroom and bathroom, kitchen and common areas
                </p>
            </div>
        </div>

    </div>


    <div id="service_provider" class="tabcontent">

    </div>

    <!-- Get Our Newsletter Email  -->
    <div class="container">

        <p class="GET-OUR-NEWSLETTER">
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
</section>

<!-- Footer      -->
<?php include "include/footer.php" ?>