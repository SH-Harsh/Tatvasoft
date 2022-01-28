<?php include "header.php" ?>

<!-- Custom Navbar  -->
<?php include "navbar.php" ?>

<!-- Controller  -->
<?php include "../controllers/controller.php"  ?>

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

<section onclick="closeSideMenu()" id="background_body">
    <div>
        <img src="../assets/images/group-20.png" class="faq_img" style="width:100%">
        <h1 class="faq_title">A Few words about us</h1>
    </div>

    <div style="text-align: center;">
        <div class="star_side_line"></div>
        <img src="../assets/images/separator.png" class="separator_img">
        <div class="star_side_line"></div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <p class="about_contain">
                    We are providers of professional home cleaning services, offering hourly basis house cleaning
                    opportunities; which means you don't have to worry about getting your house cleaned anymore.
                    We'll
                    take care of everything for you so you can focus on spending your quality time with your
                    family.<br><br>

                    We have a range of experienced cleaners to help you shift your home or make a simple cleaning
                    out
                    matter.
                </p>
            </div>
            <div class="col-2"></div>
        </div>


        <div>
            <h1 class="faq_title">Our Story</h1>
        </div>

        <div style="text-align: center;">
            <div class="star_side_line"></div>
            <img src="../assets/images/separator.png" class="separator_img">
            <div class="star_side_line"></div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <p class="about_contain">
                        A cleaner is a type of industrial or domestic worker who cleans homes or commercial spaces
                        for
                        payment. Cleaners can specialize in cleaning specific things or places, such as window
                        cleaners.
                        Cleaners often work when the people who otherwise occupy the space are not there. You can
                        clean
                        offices at night or houses during the working day.
                    </p>
                </div>
                <div class="col-2"></div>
            </div>

        </div>
    </div>

    <div class="container">

        <p class="GET-OUR-NEWSLETTER">
            GET OUR NEWSLETTER
        </P>

        <div class="email_box">

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

    <!-- Footer      -->
    <?php include "footer.php" ?>