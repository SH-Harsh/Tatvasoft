<!-- Header  -->
<?php include "include/header.php"  ?>

<!-- <header>
    <nav>
        <div class="logo">
            <img src="assets/images/white-logo-transparent-background-copy-4.png" width="73px" height="54px">
        </div>
        <ul class="nav-links">
            <li><a class="book_now" href="#">Book now</a></li>
            <li><a href="#" class="book_now_border">Prices & Services</a></li>
            <li><a class="nav-link" href="#">Warranty</a></li>
            <li><a class="nav-link" href="#">Blog</a></li>
            <li><a class="nav-link" href="#">Contact</a></li>
            <li><a class="book_now" href="#">Login</a></li>
            <li><a class="book_now" href="#">Become a Helper</a></li>

        </ul>

        <div class="burger" onclick="openSideMenu()" style="width: 100%;">
            <img src="assets/images/menu.png" height="35px" width="45px">
        </div>
    </nav>
</header> -->

<!-- Navbar  -->
<?php include "view/include/navbar.php" ?>

<!-- Side Navbar  -->
<?php
// include "include/Side_nav_service.php" 
?>

<div style="width: 100%; height: 60px;">

</div>

<div class="home_image">
    <img src="assets/images/book-service-banner.jpg">
</div>

<section onclick="closeSideMenu()" id="background_body">

    <section id="set_cleaning_service">

        <div>
            <h1 class="set_cleaning_service_heading">Set up your cleaning service</h1>

            <div style="text-align: center;">
                <div class="star_side_line"></div>
                <img src="assets/images/separator.png" class="separator_img">
                <div class="star_side_line"></div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-3 book_tabs book_tab_click" id="tab1">
                            <p>
                                <img src="assets/images/setup-service-white.png">
                                <span>Setup Service</span>
                            </p>
                            <div class="box arrow_rotate">

                            </div>
                        </div>
                        <div class="col-3  book_tabs" id="tab2">
                            <p>
                                <img src="assets/images/schedule-white.png">
                                <span>Schedule & Plan</span>
                            </p>
                            <div class="box">

                            </div>
                        </div>
                        <div class="col-3 book_tabs" id="tab3">
                            <p>
                                <img src="assets/images/details-white.png" style="margin-top: -5px;">
                                <span>Your Details</span>
                            </p>
                            <div class="box">

                            </div>
                        </div>
                        <div class="col-3 book_tabs" id="tab4">
                            <p>
                                <img src="assets/images/payment-white.png">
                                <span>Make Payment</span>
                            </p>
                            <div class="box">

                            </div>
                        </div>
                    </div>

                    <!-- SetUp Service  -->
                    <section id="setup_service">
                        <p class="postal_code_hd">Postal Code</p>

                        <!-- Postal Code Without Ajax  -->
                        <!-- <form action="<?php
                                            //  echo "$base_url?function=postalcodevalidation" 
                                            ?>" method="POST">
                            <div class="postal_input">
                                <input type="number" name="postalcode" placeholder="Postal Code" required>
                                <button type="submit" class="accept_btn" name="checkAvailability" id="check_availability">Check
                                    Availability</button>
                            </div>
                        </form> -->

                        <?php
                        // if (isset($_SESSION["postalcodeerror"])) {
                        ?>
                        <!-- <p style="color: red;"><?= $_SESSION["postalcodeerror"] ?></p> -->
                        <?php
                        // unset($_SESSION["postalcodeerror"]);
                        // }
                        ?>

                        <!-- Postal Code With Ajax  -->
                        <form id="postalform">
                            <div class="postal_input">
                                <input type="number" name="postalcode" placeholder="Postal Code" id="postalcode_aj" required>
                                <button type="submit" class="accept_btn" name="checkAvailability" id="check_availability">Check
                                    Availability</button>
                            </div>

                            <p style="color: red;" id="postalerror"></p>
                        </form>
                    </section>

                    <!-- Schedule & Plan without ajax -->
                    <!-- <section id="schedule_plan" style="display: none;">
                        <form action="<?php
                                        // echo "$base_url?function=schedule_plan" 
                                        ?>" method="POST">
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="need_cleaner">When do you need the cleaner?</p>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group" style="width: 100%;">
                                                <div class='input-group date' id='datetimepicker1' class="date">
                                                    <span class="input-group-addon calendra_box">
                                                        <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
                                                    </span>
                                                    <input type='text' class="form-control" name="date_sr" placeholder="From date" value="<?= date("d/m/Y") ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 p-0">
                                            <select id="service_time" class="form-control" name="time_sr">
                                                <option selected>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-6">
                                    <p class="need_cleaner">How long do you need cleaner to stay?</p>

                                    <select id="service_duration" class="form-control" name="duration_sr" style="width: 100px;">
                                        <option selected>3 hrs</option>
                                        <option>4 hrs</option>
                                        <option>5 hrs</option>
                                        <option>6 hrs</option>
                                        <option>7 hrs</option>
                                        <option>8 hrs</option>
                                    </select>
                                </div>
                            </div>

                            <hr> -->

                    <!-- Extra Service Option  -->
                    <!-- <div class="extra_service">
                                <p class="need_cleaner">Extra Service</p>

                                <div class="services">
                                    <input type="checkbox" id="1_service" name="extraservice[]" value=1 style="display: none;">
                                    <label for="1_service">
                                        <div class="extra_service_option" id="3" onclick="changeimg('3-green')">
                                            <div>
                                                <img src="assets/images/3.png" id="3-green">
                                            </div>
                                            <p class="text-center">Inside Cabinet</p>
                                        </div>
                                    </label>

                                    <input type="checkbox" id="2_service" name="extraservice[]" value=2 style="display: none;">
                                    <label for="2_service">
                                        <div class="extra_service_option" id="5" onclick="changeimg('5-green')">
                                            <div>
                                                <img src="assets/images/5.png" id="5-green">
                                            </div>
                                            <p class="text-center">Inside fridge</p>
                                        </div>
                                    </label>

                                    <input type="checkbox" id="3_service" name="extraservice[]" value=3 style="display: none;">
                                    <label for="3_service">
                                        <div class="extra_service_option" id="4" onclick="changeimg('4-green')">
                                            <div>
                                                <img src="assets/images/4.png" width="60px" height="50px" id="4-green">
                                            </div>
                                            <p class="text-center">Inside oven</p>
                                        </div>
                                    </label>

                                    <input type="checkbox" id="4_service" name="extraservice[]" value=4 style="display: none;">
                                    <label for="4_service">
                                        <div class="extra_service_option" id="2" onclick="changeimg('2-green')">
                                            <div>
                                                <img src="assets/images/2.png" id="2-green">
                                            </div>
                                            <p class="text-center">Laundry wash & dry</p>
                                        </div>
                                    </label>

                                    <input type="checkbox" id="5_service" name="extraservice[]" value=5 style="display: none;">
                                    <label for="5_service">
                                        <div class="extra_service_option" id="1" onclick="changeimg('1-green')">
                                            <div>
                                                <img src="assets/images/1.png" id="1-green">
                                            </div>
                                            <p class="text-center">Inferior window</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <p class="need_cleaner">Comments</p>

                            <textarea id="comments" name="comments" class="comment_textbox" rows="3" style="width: 100%; resize: none;" placeholder="Comments"></textarea>

                            <div class="my-2">
                                <input type="checkbox" id="pets" name="pets">
                                <label for="pets">I have pets at home</label>
                            </div>

                            <hr>

                            <div>
                                <?php if (isset($_SESSION["userid"])) { ?>

                                    <button type="submit" class="accept_btn float-right" id="continue_schedulePlan">Continue</button>
                                <?php } else { ?>
                                    <button type="button" class="accept_btn float-right" id="continue_withoutlogin">Continue</button>
                                <?php } ?>
                            </div>

                        </form>
                    </section> -->

                    <!-- Schedule & Plan with ajax -->
                    <section id="schedule_plan" style="display: none;">
                        <!-- <form id="schedule_plan_form"> -->
                        <div class="row">
                            <div class="col-md-5">
                                <p class="need_cleaner">When do you need the cleaner?</p>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group" style="width: 100%;">
                                            <div class='input-group date' id='datetimepicker1' class="date">
                                                <span class="input-group-addon calendra_box">
                                                    <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
                                                </span>
                                                <input type='text' class="form-control" name="date_sr" id="date_sr" placeholder="From date" value="<?= date("d/m/Y") ?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 p-0">
                                        <select id="service_time" class="form-control" name="time_sr">
                                            <option selected>8:00</option>
                                            <option>9:00</option>
                                            <option>10:00</option>
                                            <option>11:00</option>
                                            <option>12:00</option>
                                            <option>13:00</option>
                                            <option>14:00</option>
                                            <option>15:00</option>
                                            <option>16:00</option>
                                            <option>17:00</option>
                                            <option>18:00</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-6">
                                <p class="need_cleaner">How long do you need cleaner to stay?</p>

                                <select id="service_duration" class="form-control" name="duration_sr" style="width: 100px;">
                                    <option selected>3 hrs</option>
                                    <option>4 hrs</option>
                                    <option>5 hrs</option>
                                    <option>6 hrs</option>
                                    <option>7 hrs</option>
                                    <option>8 hrs</option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <!-- Extra Service Option  -->
                        <div class="extra_service">
                            <p class="need_cleaner">Extra Service</p>

                            <div class="services">
                                <input type="checkbox" id="1_service" name="extraservice" value=1 style="display: none;">
                                <label for="1_service">
                                    <div class="extra_service_option" id="3" onclick="changeimg('3-green')">
                                        <div>
                                            <img src="assets/images/3.png" id="3-green">
                                        </div>
                                        <p class="text-center">Inside Cabinet</p>
                                    </div>
                                </label>

                                <input type="checkbox" id="2_service" name="extraservice" value=2 style="display: none;">
                                <label for="2_service">
                                    <div class="extra_service_option" id="5" onclick="changeimg('5-green')">
                                        <div>
                                            <img src="assets/images/5.png" id="5-green">
                                        </div>
                                        <p class="text-center">Inside fridge</p>
                                    </div>
                                </label>

                                <input type="checkbox" id="3_service" name="extraservice" value=3 style="display: none;">
                                <label for="3_service">
                                    <div class="extra_service_option" id="4" onclick="changeimg('4-green')">
                                        <div>
                                            <img src="assets/images/4.png" width="60px" height="50px" id="4-green">
                                        </div>
                                        <p class="text-center">Inside oven</p>
                                    </div>
                                </label>

                                <input type="checkbox" id="4_service" name="extraservice" value=4 style="display: none;">
                                <label for="4_service">
                                    <div class="extra_service_option" id="2" onclick="changeimg('2-green')">
                                        <div>
                                            <img src="assets/images/2.png" id="2-green">
                                        </div>
                                        <p class="text-center">Laundry wash & dry</p>
                                    </div>
                                </label>

                                <input type="checkbox" id="5_service" name="extraservice" value=5 style="display: none;">
                                <label for="5_service">
                                    <div class="extra_service_option" id="1" onclick="changeimg('1-green')">
                                        <div>
                                            <img src="assets/images/1.png" id="1-green">
                                        </div>
                                        <p class="text-center">Inferior window</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <hr>

                        <p class="need_cleaner">Comments</p>

                        <textarea id="comments" name="comments" class="comment_textbox" rows="3" style="width: 100%; resize: none;" placeholder="Comments"></textarea>

                        <div class="my-2">
                            <input type="checkbox" id="pets" name="pets">
                            <label for="pets">I have pets at home</label>
                        </div>

                        <hr>

                        <div>
                            <?php if (isset($_SESSION["userid"])) { ?>

                                <button type="submit" class="accept_btn float-right" id="continue_schedulePlan">Continue</button>
                            <?php } else { ?>
                                <button type="button" class="accept_btn float-right" id="continue_withoutlogin">Continue</button>
                            <?php } ?>
                        </div>

                        <!-- </form> -->
                    </section>

                    <!-- Your Details  -->
                    <section id="your_details" style="display: none;">

                        <div class="alert alert-danger mb-0 mt-4" role="alert" style="display: none;" id="address_alert">
                            Please select the address.
                        </div>

                        <p class="need_cleaner">Enter your contact details, so we can serve you in better way!</p>

                        <div id="user_address_aj">
                            <!-- <div class="radio_address">
                                <div class="row">
                                    <div class="col-1" style="margin: auto;width: 100%;">
                                        <input type="radio" id="address_ckbox" name="address" value="address1" style="margin: 0 auto;">
                                    </div>
                                    <div class="col-11">
                                        <label for="address1">
                                            <p style="margin-bottom: 0px;"><b>Address:</b> Koenigstrasse 112,
                                                Tambach-Dietharz
                                                99897</p>
                                            <p style="margin-bottom: 0px;"><b>Phone number:</b> 9955648797</p>
                                        </label>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                        <button class="add_address"> + Add New Address</button>

                        <!-- Add New Address Form  -->

                        <div class="add_new_address" style="display: none;">
                            <form id="addnewaddress_form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="street_name" class="m-1">Street Name</label>
                                        <input type="text" class="form-control" name="street_name_yd" id="street_name_yd" placeholder="Street name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="house_no" class="m-1">House No</label>
                                        <input type="number" class="form-control" name="house_no_yd" id="house_no_yd" placeholder="House No">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="postal_code" class="m-1">Postal Code</label>
                                        <input type="number" class="form-control" name="postalcode_yd" id="postalcode_yd" placeholder="Postal_code" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="m-1">City</label>
                                        <input type="text" class="form-control" name="city_yd" id="city_yd" placeholder="City" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="postal_code" class="m-1">Phone number</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+91</div>
                                            </div>
                                            <input type="nu" class="form-control" name="phoneno_yd" id="phoneno_yd" placeholder="Phone number">
                                        </div>
                                    </div>
                                </div>

                                <button class="accept_btn" id="save_address_btn" type="submit" style="padding: 5px 15px;">Save</button>
                                <button class="cancel_btn" type="button">Cancel</button>

                                <p style="color: red;" class="mt-2 ml-2" id="add_new_address_error"></p>
                            </form>

                        </div>

                        <p class="need_cleaner">Your Favourite Service Provider</p>
                        <hr style="margin: 2px;">
                        <p>You can choose your favourite service provider from the below list</p>

                        <!-- Block Customer  -->
                        <div class="block_customer">
                            <div class="d-flex flex-wrap" id="fav_service_provider_box">
                                <!-- <div class="block_box" style="width: 200px;">
                                    <div class="block_logo">
                                        <img src="assets/images/cap.png">
                                    </div>
                                    <p class="block_name">Guarang Patel</p>
                                    <button class="select_btn">Select</button>
                                </div> -->
                            </div>
                        </div>

                        <hr>

                        <div>
                            <button class="accept_btn float-right" id="continue_details">Continue</button>
                        </div>


                    </section>

                    <!-- Make Payment  -->
                    <section id="make_payment" style="display: none;">
                        <p class="need_cleaner">Pay securely with Helperland payment gateway!</p>

                        <p class="mb-0 mt-3 mx-1">Promo Code (Optional)</p>

                        <div class="postal_input">
                            <input type="number" id="promo_code" placeholder="Promo Code (Optional)">
                            <button type="button" class="add_address ml-2 d-inline">Apply</button>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-8 card_input">
                                <i class="far fa-credit-card"></i>
                                <input type="number" id="creditcardno" placeholder="Card Number" name="card_number">
                            </div>
                            <div class="col-sm-2 card_input">
                                <input type="number" id="creditcardexpiry" placeholder="MM/YY" name="mmyy">
                            </div>
                            <div class="col-sm-2 card_input">
                                <input type="password" id="creditcardcvc" maxlength="3" placeholder="CVC" name="cvc" style="width: 100%;">
                            </div>
                        </div>

                        <hr style="margin: 2px 0px 16px;">

                        <p class="accpted_card">Accepted Card</p>
                        <div class="card_accepted">
                            <img src="assets/images/america_express.png">
                            <img src="assets/images/mastercard.png">
                            <img src="assets/images/visa.png">
                        </div>

                        <hr style="clear: both;">
                        <div style="clear: both;" class="terms">

                            <div class="row">
                                <div class="col-1">
                                    <input type="checkbox" name="terms" style="margin: auto;">
                                </div>
                                <div class="col-11 pl-2">
                                    <label for="terms">I accepted terms and condition, the cancellation policy and
                                        the
                                        privacy
                                        policy. I confirm that helperland start to execute the contract before the
                                        expiry of the
                                        withdrawal period and I lose my right of withdrawal as a consumer with full
                                        performance of the contract.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- data-target="#complete_booking_modal" -->
                        <div>
                            <button class="accept_btn float-right" id="complete_booking" data-toggle="modal">Complete Booking</button>
                        </div>


                        <!-- Complete Booking Modal -->

                        <div class="modal fade" id="complete_booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-bottom:none ;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="complete_box">
                                            <img src="assets/images/included.png" alt="">
                                            <p>Booking has been successfully submitted</p>
                                            <p class="request_id"></p>
                                            <a href="<?= $base_url ?>" class="accept_btn text-center" style="width: 80px; margin: 0 auto;">Ok</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>


                </div>
                <div class="col-lg-4 margin-top">

                    <!-- Payment Summary  -->
                    <div class="payment_summary">
                        <div class="heading_ps">
                            <p>Payment Summary</p>
                        </div>

                        <div class="datetime_ps">
                            <span id="date_ps"><?= date("d/m/Y") ?></span>
                            <span id="servicetime_ps">8:00</span>
                        </div>

                        <div class="duration" id="basic_hr">
                            <p>Duration</p>
                            <p>Basic <span>3 Hrs</span></p>
                        </div>

                        <!-- Schedule extra price  -->
                        <div class="schedule_price">
                            <div class="duration">
                                <p>Extras</p>
                                <p class="inside_cabinet">Inside Cabinet <span>30 min</span></p>
                                <p class="inside_fridge">Inside fridge <span>30 min</span></p>
                                <p class="inside_oven">Inside oven <span>30 min</span></p>
                                <p class="laundry_wash">Laundry wash & dry <span>30 min</span></p>
                                <p class="inferior_window">Inferior Window <span>30 min</span></p>
                            </div>
                        </div>

                        <hr>

                        <div class="duration pt-0" id="totalservicetime">
                            <p>Total Service Time <span>3 Hrs</span></p>
                        </div>

                        <hr>

                        <div class="duration pt-0">
                            <p>Per Cleaning <span>100 €</span></p>
                        </div>

                        <hr>

                        <div class="total_payment" id="totalpayment">
                            <p>Total Payment <span>3,00 €</span></p>
                        </div>

                        <div class="what_included">
                            <p>
                                <i class="far fa-smile"></i>
                                See what is always included
                            </p>
                        </div>

                    </div>

                    <!-- Question  -->
                    <div class="question">
                        <p class="question_heading">Question?</p>

                        <p class="accordion" onclick="faqpara('answer1','que_arrow1')">
                            <img src="assets/images/keyboard-right-arrow.png" class="question_arrow" id="que_arrow1">&nbsp;
                            What's included in training?
                        </p>
                        <div class="service_answer" id="answer1">
                            <p>Lorem</p>
                        </div>

                        <hr>
                        <p class="accordion" onclick="faqpara('answer2','que_arrow2')">
                            <img src="assets/images/keyboard-right-arrow.png" class="question_arrow" id="que_arrow2">&nbsp;
                            Which helperland profession will come to my place?
                        </p>
                        <div class="service_answer" id="answer2">
                            <p>Lorem</p>
                        </div>

                        <hr>
                        <p class="accordion" onclick="faqpara('answer3','que_arrow3')">
                            <img src="assets/images/keyboard-right-arrow.png" class="question_arrow" id="que_arrow3">&nbsp;
                            Can I skip or Reschedule booking?
                        </p>
                        <div class="service_answer" id="answer3">
                            <p>Lorem</p>
                        </div>

                        <hr>

                        <a class="more_help" href="<?= "$base_url?function=faq_page" ?>">For more help</a>
                    </div>

                </div>
            </div>
        </div>

    </section>




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

    <!-- Footer  -->
    <?php include "view/include/footer_service.php" ?>