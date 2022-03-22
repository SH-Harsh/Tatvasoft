<?php
if (isset($_SESSION["error_message"])) {
?>

    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Danger!</strong> Some values are invalid please register with proper details
    </div>

<?php
}
unset($_SESSION["error_message"]);
?>

<?php
if (isset($_COOKIE["userid"])) {
    //Cookie is stored and now login and user id stored in this information.
}
?>

<!-- Header  -->
<?php include "include/header_home.php" ?>

<!-- Navigation Bar -->
<?php include "include/navbar_home.php"  ?>


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
            <button type="submit">Getting Started <img src="assets/images/arrow-white.png"></button>
        </div>

    </div>
</div>



<section onclick="closeSideMenu()" id="background_body">

    <!-- Spinner  -->
    <!-- <div id="spinner_loading"></div> -->
    <!-- <div class="spinner-border docreadyspinner"></div> -->

    <!-- Banner Section  -->
    <section id="banner">
        <div class="first_content">
            <h1>Don't feel like doing <br> housework?</h1>
            <p><img src="assets/images/forma-1-copy-10.png">
                tested & insured helpers</p>
            <p><img src="assets/images/forma-1-copy-10.png">
                easy booking process</p>
            <p><img src="assets/images/forma-1-copy-10.png">
                friendly customer service</p>
        </div>

        <?php if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] == 1) { ?>
            <div class="book_cleaner">
                <a href="<?php echo "$base_url?function=bookService"  ?>">Let's Book a Cleaner</a>
            </div>
        <?php } ?>

        <div class="cleaner_check">
            <div class="container flex-container">
                <div class="postcode">
                    <img src="assets/images/forma-1-copy.png">
                    <p>Enter zip code</p>
                </div>
                <div>
                    <img src="assets/images/step-arrow-1.png" class="step-arrow1">
                </div>
                <div class="postcode">
                    <img src="assets/images/group-22.png">
                    <p>Select desired date</p>
                </div>
                <div>
                    <img src="assets/images/step-arrow-1-copy.png" class="step-arrow1">
                </div>
                <div class="postcode">
                    <img src="assets/images/forma-1-copy.png">
                    <p>Pay securely online</p>
                </div>
                <div>
                    <img src="assets/images/step-arrow-1.png" class="step-arrow1">
                </div>
                <div class="postcode">
                    <img src="assets/images/forma-1.png">
                    <p style="margin-top: 37px;">
                        feel good at home
                    </p>
                </div>
            </div>
        </div>

        <a href="#home_section_close" id="arrow-down">
            <div class="arrow_down">
                <img src="assets/images/shape-1.png">
            </div>
        </a>
    </section>

    <div id="home_section_close">

    </div>

    <!-- Why helperLand  -->
    <section class="why_helperland">
        <p class="Why-Helperland">
            Why Helperland
        </p>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="why_section">
                        <img src="assets/images/group-21.png" class="friendly_img">

                        <p class="why_helperland_heading">Friendly & verified helpers</p>

                        <p class="why_helperland_contain">
                            We want you to be completely satisfied with our service and to feel comfortable at home.
                            In
                            order for us to be able to guarantee this, our helpers go through a test procedure. The
                            cleaning staff can only call themselves helpers if they meet our high standards.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="why_section">
                        <img src="assets/images/group-23.png" class="friendly_img">

                        <p class="why_helperland_heading">
                            Pay transparently & securely
                        </p>

                        <p class="why_helperland_contain">
                            We have transparent prices! You don't have to scrape together small change or leave
                            money on
                            the sideboard: Pay your helper simply and securely using the online payment method. You
                            will
                            also receive an invoice for each completed cleaning.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="why_section">
                        <img src="assets/images/group-24.png" class="friendly_img">

                        <p class="why_helperland_heading" style="margin-bottom: 70px;">
                            We're here for you
                        </p>

                        <p class="why_helperland_contain">
                            Do you have a question or need assistance with the booking process? Our customer service
                            will be happy to help you with words and deeds. You can find out how to contact us by
                            looking under "Contact". We look forward to hearing or reading from you.
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>



    <div style="position: relative;">

        <!-- Why HelperLand After Section  -->
        <section id="why_helperland_2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 pr-5">
                        <p class="why_helperland_heading text-left">
                            We don't know what makes you happy, but...
                        </p>

                        <p class="why_helperland_contain text-left">
                            if it's not dusting, our friendly helpers will relieve you of this burden. Don't fret
                            anymore that valuable time is wasted on housework, but enjoy life to the full. You are
                            worth
                            filling your time with beautiful experiences. Finally free yourself and enjoy the time
                            you
                            have gained: go partying, unwind, play with your children, meet up with friends or dare
                            a
                            bungee jump. You can find more leisure ideas and exclusive events in our blog -
                            guaranteed
                            free of dust and cleaning tips!
                        </p>
                    </div>
                    <div class="col-md-4 ">
                        <img src="assets/images/group-36.png" class="group_36">
                    </div>
                </div>
            </div>
        </section>





        <!-- Our Blog -->
        <div class="container-fluid">
            <div class="Our-Blog">Our Blog</div>
            <div class="flex-container flex-container-center">
                <div class="blog_box">

                    <img src="assets/images/group-28.png" class="blog_img">

                    <div class="blog_contain_box">
                        <p class="blog_heading">
                            Lorem ipsum dolor sit amet
                        </p>
                        <p class="blog_date">
                            January 28, 2019
                        </p>

                        <p class="blog_contain">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar
                            aliquet.
                        </p>

                        <p class="Read-the-Post">
                            Read the Post
                            <img src="assets/images/shape-2.png" class="arrow_right">
                        </p>
                    </div>


                </div>
                <div class="blog_box">

                    <img src="assets/images/group-29.png" class="blog_img">

                    <div class="blog_contain_box">
                        <p class="blog_heading">
                            Lorem ipsum dolor sit amet
                        </p>
                        <p class="blog_date">
                            January 28, 2019
                        </p>

                        <p class="blog_contain">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar
                            aliquet.
                        </p>

                        <p class="Read-the-Post">
                            Read the Post
                            <img src="assets/images/shape-2.png" class="arrow_right">
                        </p>
                    </div>

                </div>
                <div class="blog_box">

                    <img src="assets/images/group-30.png" class="blog_img">

                    <div class="blog_contain_box">
                        <p class="blog_heading">
                            Lorem ipsum dolor sit amet
                        </p>
                        <p class="blog_date">
                            January 28, 2019
                        </p>

                        <p class="blog_contain">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar
                            aliquet.
                        </p>

                        <p class="Read-the-Post">
                            Read the Post
                            <img src="assets/images/shape-2.png" class="arrow_right">
                        </p>
                    </div>


                </div>

            </div>
        </div>

        <div class="blog_left_img">
            <img src="assets/images/blog-left-bg.png">
        </div>

        <div class="blog_right_img">
            <img src="assets/images/blog-right-bg.png">
        </div>

    </div>




    <!-- What Our Customer Say  -->
    <section class="customer_say" style="background-color: #f4f5f8;">
        <div class="container-fluid">

            <p class="What-Our-Customers-Say">What Our Customers Say</p>
            <div class="flex-container flex-container-center">

                <div class="customer_say_box">
                    <img src="assets/images/message.png" class="message_img">

                    <div style="clear: both;">
                        <img src="assets/images/group-31.png" class="logo_img">
                        <p class="logo_name">Lary Watson</p>
                        <p class="logo_city">Manchester</p>
                    </div>

                    <p class="customer_say_contain">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar
                        aliquet consequat. Praesent nec malesuada nibh.<br><br>

                        Nullam et metus congue, auctor augue sit amet, consectetur tortor.
                    </p>

                    <p class="Read-the-Post">
                        Read more
                        <img src="assets/images/shape-2.png" class="arrow_right">
                    </p>

                </div>

                <div class="customer_say_box">
                    <img src="assets/images/message.png" class="message_img">

                    <div style="clear: both;">
                        <img src="assets/images/group-32.png" class="logo_img">
                        <p class="logo_name">John Smith</p>
                        <p class="logo_city">Manchester</p>
                    </div>

                    <p class="customer_say_contain">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar
                        aliquet consequat. Praesent nec malesuada nibh.<br><br>

                        Nullam et metus congue, auctor augue sit amet, consectetur tortor.
                    </p>

                    <p class="Read-the-Post">
                        Read more
                        <img src="assets/images/shape-2.png" class="arrow_right">
                    </p>
                </div>

                <div class="customer_say_box">
                    <img src="assets/images/message.png" class="message_img">

                    <div style="clear: both;">
                        <img src="assets/images/group-33.png" class="logo_img">
                        <p class="logo_name">Lars Johnson</p>
                        <p class="logo_city">Manchester</p>
                    </div>

                    <p class="customer_say_contain">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar
                        aliquet consequat. Praesent nec malesuada nibh.<br><br>

                        Nullam et metus congue, auctor augue sit amet, consectetur tortor.
                    </p>

                    <p class="Read-the-Post">
                        Read more
                        <img src="assets/images/shape-2.png" class="arrow_right">
                    </p>
                </div>
            </div>

            <div class="flex-container flex-container-center flex-resp">
                <div>
                    <a href="#background_body">
                        <div class="arrow-up-box">
                            <img src="assets/images/forma-2.png" class="Forma-arrow">
                        </div>
                    </a>
                </div>
                <div class="container">

                    <p class="GET-OUR-NEWSLETTER">
                        GET OUR NEWSLETTER
                    </P>

                    <div class="email_box">
                        <form action="" class="form-box">
                            <input type="email" placeholder="Your Email" class="email_input">
                            <button type="submit" class="submit_hiw">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="clock">
                    <img src="assets/images/layer-598.png">
                </div>
            </div>
    </section>

</section>

<!-- Footer  -->
<?php include "include/footer_home.php" ?>