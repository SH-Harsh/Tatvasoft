<?php include "view/include/header.php" ?>

<?php if (isset($_SESSION["contactus"])) { ?>

    <div class="alert alert-primary alert-dismissible mb-0" role="alert">
        <?= $_SESSION["contactus"] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


<?php }
unset($_SESSION["contactus"]);
?>


<!-- Custom Navbar  -->
<?php include "view/include/navbar.php" ?>

<!-- Controller  -->
<?php
//  include "../controllers/controller.php" 
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


<div style="width: 100%; height: 60px;">

</div>
<section onclick="closeSideMenu()" id="background_body">

    <div>
        <img src="assets/images/group-21_2.png" class="faq_img">
        <h1 class="faq_title">Contact Us</h1>

        <div class="text-center">
            <div class="star_side_line"></div>
            <img src="assets/images/separator.png" class="separator_img">
            <div class="star_side_line"></div>
        </div>
    </div>

    <!-- Contact Info  -->
    <div class="container-fluid">
        <div class="flex-container flex-container-center">
            <div>
                <img src="assets/images/forma-1_2.png" class="forma-1_2">

                <p class="contact_info">
                    1111 Lorem ipsum text 100, Lorem ipsum AB
                </p>
            </div>
            <div>
                <img src="assets/images/phone-call.png" class="forma-1_2">

                <p class="contact_info">
                    +49 (40) 123 56 7890<br>+49 (40) 123 56 7890
                </p>
            </div>
            <div>
                <img src="assets/images/vector-smart-object.png" class="forma-1_2">

                <p class="contact_info">
                    info@helperland.com
                </p>
            </div>
        </div>
    </div>

    <!-- Get In touch with us -->
    <section>
        <div class="container-fluid">
            <p class="Get-in-touch-with-us">
                Get in touch with us
            </p>


            <div class="flex-container flex-container-center">
                <form action="<?= "$base_url?function=contactus"   ?>" method="POST" onsubmit="return contactvalidation(this)" enctype="multipart/form-data">
                    <div class="alert alert-danger login_error" role="alert" style="display: none;">

                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" name="first_name" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
                        </div>
                    </div>
                    <div class="form-row align-items-center">

                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+49</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Mobile_number" name="phone_no" required maxlength="10" pattern="[7-9]{1}[0-9]{9}" title="Enter valid 10 digit number" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Email Address" name="email" required>
                        </div>
                    </div>
                    <div style="padding: 0px 5px;">
                        <select name="subject" class="select_form" name="subject" required>
                            <option value="" disabled selected hidden class="subject_opt">Subject</option>
                            <option value="Service">Service</option>
                            <option value="Complain">Complain</option>
                            <option value="Inquiry">Inquiry</option>
                        </select>
                    </div>
                    <div class="form-group" style="padding: 0px 5px;">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message" name="message" style="resize: none;"></textarea>
                    </div>
                    <div>
                        <span class="attachment_label">Attachment</span>
                        <label for="attachment" class="attachment">Upload</label>
                        <input type="file" id="attachment" name="attachment">
                        <span id="file_name">No file chosen,yet</span>
                    </div>
                    <div class="flex-container flex-container-center">
                        <button type="submit" class="submit_btn" name="contact_submit">Submit</button>
                    </div>
                </form>
            </div>


        </div>

    </section>


    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5050.5752519013!2d7.1323170000000005!3d50.733154000000006!3
        m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bee13f0afebfb1%3A0x7caeb94f4c104
        2fc!2sK%C3%B6nigswinterer%20Str.%20116%2C%2053227%20Bonn%2C%20Germany!5e0!3m2!1sen!2sus!4v1641284021876!5m2!1sen!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


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
<?php include "view/include/footer.php" ?>