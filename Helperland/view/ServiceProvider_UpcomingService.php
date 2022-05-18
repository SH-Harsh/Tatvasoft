<!-- Header  -->
<?php include "include/header_service.php"  ?>


<!-- <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar_bg">
            <a class="navbar-brand" href="#"><img src="assets/white-logo-transparent-background-copy-4.png" width="73px"
                    height="54px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item space_nav">
                        <a class="nav-link" href="#">Prices & Services</a>
                    </li>
                    <li class="nav-item space_nav">
                        <a class="nav-link" href="#">Warranty</a>
                    </li>
                    <li class="nav-item space_nav">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item space_nav">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item space_notify">
                        <a class="nav-link" href="#"><img src="assets/icon-notification.png"></a>
                        <div class="notify_no">
                            <span class="notification_no">2</span>
                        </div>
                    </li>
                    <li class="nav-item dropdown space_user">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="assets/person_logo.png">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Harsh</a>
                            <a class="dropdown-item" href="#">Ram</a>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    </header> -->


<!-- Navbar  -->
<?php include "view/include/navbar_service.php" ?>

<section onclick="closeSideMenu()" id="background_body">

    <section class="welcome_user">
        <p class="welcome">Welcome, <span style="font-weight: bold;"><?= $name; ?></span></p>
    </section>

    <!-- Upcoming Service  -->

    <section style="margin-top: 31px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 left-menu">
                    <div style="background-color: #1d7a8c; height: 100%;">
                        <table class="menu_table">
                            <!-- <tr>
                                <td><a href="#">Dashboard</a></td>
                            </tr> -->
                            <tr class="new_service_request">
                                <td><a href="#">New Service Requests</a></td>
                            </tr>
                            <tr class="active_left upcoming_service">
                                <td><a href="#">Upcoming Services</a></td>
                            </tr>
                            <tr class="service_schedule_tab">
                                <td><a href="#">Service Schedule</a></td>
                            </tr>
                            <tr class="service_history_tab">
                                <td><a href="#">Service History</a></td>
                            </tr>
                            <tr class="my_ratings_tab">
                                <td><a href="#">My Ratings</a></td>
                            </tr>
                            <tr class="block_customer_tab">
                                <td><a href="#">Block Customer</a></td>
                            </tr>
                        </table>


                        <!-- <div class="select_option">

                                <div class="selector">
                                    <div id="selectField">
                                        <p id="selectText">Upcoming Service </p>
                                        <img src="assets/forma-2.png" alt="arrow" id="arrowIcon">
                                    </div>

                                    <ul id="list" class="hide">
                                        <li class="option">Dashboard</li>
                                        <li class="option">New Service Requests</li>
                                        <li class="option">Upcoming Services</li>
                                        <li class="option">Service Schedule</li>
                                        <li class="option">Service History</li>
                                        <li class="option">My Ratings</li>
                                        <li class="option">Block Customer</li>
                                    </ul>
                                </div>
                            </div> -->
                    </div>
                </div>
                <div class="col-lg-10 col-md-12  px-3 right_service_list_section">

                    <!-- Upcoming Service  -->
                    <section id="upcoming_service_list">

                        <table class="right_service_list border">
                            <tr>
                                <th>
                                    <p>Service ID <img src="assets/images/double_arrow.png"></p>
                                </th>
                                <th>
                                    <p>Service date <img src="assets/images/double_arrow.png"></p>
                                </th>
                                <th>
                                    <p>Customer details <img src="assets/images/double_arrow.png"></p>
                                </th>
                                <th>
                                    <p>Payment</p>
                                </th>
                                <th>
                                    <p>Distance <img src="assets/images/double_arrow.png"></p>
                                </th>
                                <th>
                                    <p class="text-center">Actions</p>
                                </th>
                            </tr>
                            <tr data-toggle="modal" data-target="#upcoming_service_details">
                                <td>
                                    <p>323436</p>
                                </td>
                                <td>
                                    <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 09/04/2018</p>
                                    <p><img src="assets/images/clock.png"> 12:00 - 18:00</p>
                                </td>
                                <td>
                                    <p>David Bough</p>
                                    <p><img src="assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                                </td>
                                <td>
                                    <p>56,25 €</p>
                                </td>
                                <td>
                                    <p>15km</p>
                                </td>
                                <td>
                                    <p class="text-right_cancel">
                                        <button type="button" class="Cancel_button">Cancel</button>
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Pages  -->
                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_us" class="entries">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <p class="show">entries</p>
                            <p class="show" id="totalentries_us"> Total Record: 4</p>

                            <div class="pagination">
                                <a onclick="paginationno_us('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="paginationno_us('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a class="active" id="pageno_us">1</a>
                                <a onclick="paginationno_us('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="paginationno_us('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>



                        <!--Upcoming Service Modal -->
                        <div class="modal fade" id="upcoming_service_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Service Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-7 service_details_left">
                                                <p class="date_service_details" id="date_upcoming_service">07/10/2021 08:00 - 11:00</p>
                                                <p id="duration_us">Duration: 3hr</p>

                                                <hr>

                                                <p id="serviceid_us">Service Id: 8488</p>
                                                <p id="extras_us">Extras</p>
                                                <p>Total Payment: <span class="amount_paid" id="amount_us">56,25 €</span></p>

                                                <hr>

                                                <p id="name_us">Customer Name: Gaurang Patel</p>
                                                <p id="address_us">Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                                <!-- <p>Distance: 296,76km</p> -->

                                                <hr>

                                                <p id="comment_us">Comments</p>
                                                <p id="pets_us"> I don't have pets at home.</p>

                                                <hr>
                                                <div class="mt-2 serviceRequestId_us">
                                                    <button class="Cancel_button">
                                                        <p id="cancelService_us" data-dismiss="modal"> <i class="fas fa-times"></i> Cancel</p>
                                                    </button>
                                                    <button class="accept_btn complete_us">
                                                        <p id="completeService_us" data-dismiss="modal"> <i class="fas fa-check"></i> Complete</p>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931
                                                        298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d
                                                        4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1641905145251!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>


                    <!-- My Setting Service Provider  -->
                    <section id="My_settings_service" style="display: none;">

                        <div class="tab">
                            <div class="tablinks active_settings" onclick="mysettings(event, 'details')">
                                <p>My Details</p>
                            </div>
                            <div class="tablinks" onclick="mysettings(event, 'change_pass')">
                                <p>Change Password</p>
                            </div>
                            <div style="width: 100%; border-bottom: 1px solid #1d7a8c">

                            </div>
                        </div>



                        <div id="details" class="tabcontent" style="display: block;">

                            <div class="alert alert-danger account_details_error mt-2" role="alert" style="display: none;">

                            </div>

                            <div class="alert alert-success account_details_success_alert mt-2" role="alert" style="display: none;">

                            </div>
                            
                            <p class="account_status">Account Status: <span>Active</span></p>

                            <p class="account_status">Basic details</p>

                            <div class="avatar_selected">
                                <img src="assets/images/avatar-car.png" class="avatar_img" id="avatar_selected">
                            </div>

                            <hr>

                            <form>
                                <div class="form-row mt-5">
                                    <div class="col-md-4">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First name" id="first_name_sp">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name" id="last_name_sp">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email_address">Email Address</label>
                                        <input type="text" name="email_address" class="form-control" placeholder="Email address" id="email_sp" readonly>
                                    </div>
                                </div>

                                <div class="form-row mt-4">
                                    <div class="col-md-4">
                                        <label for="phone_number">Phone Number</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+91</div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Phone Number" id="phoneNo_sp" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_of_birth">Date of Birth</label><br>
                                        <div class="form-row align-items-center">
                                            <div class="col-auto my-1">
                                                <select id="date_sp" class="form-control">
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                            <div class="col-auto my-1">
                                                <select id="month_sp" class="form-control">
                                                    <option value="01">January</option>
                                                    <option value="02">Februrary</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-auto my-1">
                                                <select id="year_sp" class="form-control">
                                                    <option value="1982">1982</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2020">2020</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nationality">Nationality</label><br>
                                        <select name="nationality" class="form-control" id="nationality_sp">
                                            <option value=1>India</option>
                                            <option value=2>German</option>
                                        </select>
                                    </div>
                                </div>

                                <p class="account_status">Gender</p>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="male" name="gender" value="male">
                                    <label class="male mb-0" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="Female" name="gender" value="Female">
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="not_to_say" name="gender" value="not_to_say">
                                    <label class="form-check-label" for="not_to_say">Rather not to say</label>
                                </div>

                                <p class="account_status mt-2">Select Avatar</p>

                                <div class="d-flex flex-wrap">
                                    <div class="avatar_box">
                                        <img src="assets/images/avatar-car.png" class="avatar_img select" onclick="change_avatar('assets/images/avatar-car.png')">
                                    </div>
                                    <div class="avatar_box">
                                        <img src="assets/images/avatar-female.png" class="avatar_img" onclick="change_avatar('assets/images/avatar-female.png')">
                                    </div>
                                    <div class="avatar_box">
                                        <img src="assets/images/avatar-hat.png" class="avatar_img" onclick="change_avatar('assets/images/avatar-hat.png')">
                                    </div>
                                    <div class="avatar_box">
                                        <img src="assets/images/avatar-iron.png" class="avatar_img" onclick="change_avatar('assets/images/avatar-iron.png')">
                                    </div>
                                    <div class="avatar_box">
                                        <img src="assets/images/avatar-male.png" class="avatar_img" onclick="change_avatar('assets/images/avatar-male.png')">
                                    </div>
                                    <div class="avatar_box">
                                        <img src="assets/images/avatar-ship.png" class="avatar_img" onclick="change_avatar('assets/images/avatar-ship.png')">
                                    </div>
                                </div>

                                <p class="account_status mt-3">My Address</p>


                                <hr>

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="Street Name">Street Name</label>
                                        <input type="text" name="Street Name" class="form-control" id="streetName_sp" placeholder="Street name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="House number">House number</label>
                                        <input type="number" class="form-control" placeholder="House number" id="houseno_sp">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Postal Code">Postal Code</label>
                                        <input type="number" name="Postal Code" class="form-control" placeholder="Postal Code" id="postalcode_sp">
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="col-md-4">
                                        <label for="City">City</label>
                                        <input type="text" name="City" class="form-control" placeholder="City" id="city_sp">

                                        <hr>
                                    </div>
                                </div>

                                <button type="button" class="submit_my_settings" id="save_details_sp">Save</button>
                                <div class="save_details_sucess_sp text-success"></div>
                                <div class="save_details_error_sp text-danger"></div>
                            </form>
                        </div>

                        <div id="change_pass" class="tabcontent">
                            <form id="password_change_form">

                                <div class="alert alert-danger password_error" role="alert" style="display: none;">

                                </div>

                                <div class="alert alert-success pass_updated_success_alert" role="alert" style="display: none;">

                                </div>

                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" placeholder="Current Password" style="width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" placeholder="Password" style="width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" style="width: 200px;">
                                </div>

                                <button type="button" class="submit_my_settings" id="setting_update_password">Save</button>
                                <!-- <div id="update_password_sucess" class="text-success"></div>
                                <div id="update_password_error" class="text-danger"></div> -->
                            </form>
                        </div>

                    </section>


                    <!-- New Service Request  -->
                    <section id="new_service_request" style="display: none;">

                        <div class="pages">
                            <p class="show">Service area</p>

                            <select name="entries" id="entries" class="entries">
                                <option value="25">25km</option>
                                <option value="50">50km</option>
                            </select>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="pet_home">
                                <label class="form-check-label" for="pet_home">
                                    Include Pet at home
                                </label>
                            </div>
                        </div>

                        <table class="new_request_table" id="new_request_table_sp">
                            <tr>
                                <th>
                                    <p>Service ID <img src="assets/images/double_arrow.png"></p>
                                </th>
                                <th>
                                    <p>Service date</p>
                                </th>
                                <th>
                                    <p>Customer details </p>
                                </th>
                                <th>
                                    <p>Payment</p>
                                </th>
                                <th>
                                    <p>Time Conflict</p>
                                </th>
                                <th>
                                    <p class="text-center">Actions</p>
                                </th>
                            </tr>
                            <tr data-toggle="modal" data-target="#new_service_details">
                                <td>
                                    <p>8488</p>
                                </td>
                                <td>
                                    <p style="font-weight: 500;"><img src="assets/images/calendar2.png"> 09/04/2018</p>
                                    <p><img src="assets/images/clock.png"> 12:00 - 18:00</p>
                                </td>
                                <td>
                                    <p>David Bough</p>
                                    <p><img src="assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                                </td>
                                <td>
                                    <p>56.25 €</p>
                                </td>
                                <td></td>
                                <td>
                                    <p class="text-center">
                                        <button type="button" class="accept_btn">Accept</button>
                                    </p>

                                </td>
                            </tr>
                        </table>



                        <!--New Service Request Modal -->
                        <div class="modal fade" id="new_service_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Service Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-7 service_details_left">
                                                <p class="date_service_details" id="accept_service_sp">07/10/2021 08:00 - 11:00</p>
                                                <p id="duration_accept_sp">Duration: 3hr</p>

                                                <hr>

                                                <p id="serviceid_accept_sp">Service Id: 8488</p>
                                                <p id="extras_accept_sp">Extras</p>
                                                <p>Total Payment: <span class="amount_paid" id="total_payment_accept_sp">56,25 €</span></p>

                                                <hr>

                                                <p id="customer_name_accept">Customer Name: Gaurang Patel</p>
                                                <p id="customer_address_accept">Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                                <p>Distance: 296,76km</p>

                                                <hr>

                                                <p id="comment_accept_sp">Comments</p>
                                                <p id="pets_accept_sp"><img src="assets/images/not-included.png" style="width: 20px;height: 20px;">
                                                    I don't have pets at home.</p>

                                                <hr>
                                                <div class="mt-2">
                                                    <button class="accept_btn accept_id" style="background-color: rgb(29, 223, 29);" data-dismiss="modal">
                                                        <p> <i class="fas fa-check"></i> Accept</p>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931
                                                        298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d
                                                        4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1641905145251!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pages  -->
                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_newService" class="entries">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <p class="show">entries</p>
                            <p class="show" id="totalentries_accept"> Total Record: 55</p>

                            <div class="pagination">
                                <a onclick="paginationno_newService('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="paginationno_newService('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a class="active" id="pageno">1</a>
                                <a onclick="paginationno_newService('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="paginationno_newService('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>

                    </section>

                    <!-- Service History  -->
                    <section id="service_history" style="display: none;">
                        <div class="pages">
                            <p class="show">Payment Status</p>

                            <select name="entries" id="entries" class="entries">
                                <option value="all">All</option>
                                <option value="complete">Complete</option>
                                <option value="incomplete">Incomplete</option>
                            </select>

                            <button type="button" class="export_btn mt-3" id="export_servicehistory">Export</button>
                        </div>

                        <table id="export_serviceHistoryTable" style="display: none;">

                        </table>

                        <table class="new_request_table serviceHistory">
                            <tr class="table_heading">
                                <th>
                                    <p>Service ID</p>
                                </th>
                                <th>
                                    <p>Service date</p>
                                </th>
                                <th>
                                    <p>Customer details </p>
                                </th>
                            </tr>
                            <tr data-toggle="modal" data-target="#service_history_details">
                                <td>
                                    <p>8488</p>
                                </td>
                                <td>
                                    <p style="font-weight: 500;"><img src="assets/images/calendar2.png"> 09/04/2018</p>
                                    <p><img src="assets/images/clock.png"> 12:00 - 18:00</p>
                                </td>
                                <td>
                                    <p>David Bough</p>
                                    <p><img src="assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                                </td>
                            </tr>
                        </table>

                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_serhis" class="entries">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <p class="show">entries</p>
                            <p class="show totalentries_serhis"> Total Record: 55</p>

                            <div class="pagination pagejs">
                                <a onclick="ServiceHistoryPag_Sp('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="ServiceHistoryPag_Sp('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a onclick="ServiceHistoryPag_Sp(id)" class="active min-pagination" id="1-pagination">1</a>
                                <a onclick="ServiceHistoryPag_Sp(id)" class="mid1-pagination" id="2-pagination">2</a>
                                <a onclick="ServiceHistoryPag_Sp(id)" class="mid2-pagination" id="3-pagination">3</a>
                                <a onclick="ServiceHistoryPag_Sp(id)" class="max-pagination" id="4-pagination">4</a>
                                <a onclick="ServiceHistoryPag_Sp('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="ServiceHistoryPag_Sp('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>

                        <!--Service History Modal -->
                        <div class="modal fade" id="service_history_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Service Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-7 service_details_left">
                                                <p class="date_service_details" id="date_serhis">07/10/2021 08:00 - 11:00</p>
                                                <p id="duration_serhis">Duration: 3hr</p>

                                                <hr>

                                                <p id="serviceid_serhis">Service Id: 8488</p>
                                                <p id="extras_serhis">Extras</p>
                                                <p>Total Payment: <span class="amount_paid" id="amount_serhis">56,25 €</span></p>

                                                <hr>

                                                <p id="name_serhis">Customer Name: Gaurang Patel</p>
                                                <p id="address_serhis">Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                                <!-- <p>Distance: 296,76km</p> -->

                                                <hr>

                                                <p id="comment_serhis">Comments</p>
                                                <p id="pets_serhis"> I don't have pets at home.</p>

                                                <hr>
                                                <!-- <div class="mt-2 serviceRequestId_serhis">
                                                    <button class="Cancel_button">
                                                        <p id="cancelService_serhis" data-dismiss="modal"> <i class="fas fa-times"></i> Cancel</p>
                                                    </button>
                                                    <button class="accept_btn complete_us">
                                                        <p id="completeService_serhis" data-dismiss="modal"> <i class="fas fa-check"></i> Complete</p>
                                                    </button>
                                                </div> -->
                                            </div>
                                            <div class="col-md-5">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931
                                                        298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d
                                                        4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1641905145251!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>

                    <!-- Block Customer  -->
                    <section id="block_customer" style="display:none">
                        <div class="d-flex flex-wrap" id="favorite_blocked_cust">
                            <div class="block_box">
                                <div class="block_logo">
                                    <img src="assets/images/avatar-car.png">
                                </div>
                                <p class="block_name">Guarang Patel</p>
                                <button class="Cancel_button">Block</button>
                            </div>

                            <div class="block_box">
                                <div class="block_logo">
                                    <img src="assets/images/cap.png">
                                </div>
                                <p class="block_name">Keyur Nakrani</p>
                                <button class="Cancel_button">Block</button>
                            </div>
                        </div>

                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_fb_Sp" class="entries">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <p class="show">entries</p>
                            <p class="show" id="totalentries_fb_Sp"> Total Record: 1</p>

                            <div class="pagination">
                                <a onclick="paginationno_favblock_Sp('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="paginationno_favblock_Sp('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a class="active" id="pageno_fp_Sp">1</a>
                                <a onclick="paginationno_favblock_Sp('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="paginationno_favblock_Sp('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>
                    </section>

                    <!-- My Ratings  -->

                    <section id="my_ratings" style="display: none;">

                        <div class="pages">
                            <p class="show">Ratings</p>

                            <select name="entries" id="star_value" class="entries">
                                <option value="6">All</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                            <div class="sort">

                                <p class="sorting_click">Sorting <img src="assets/images/double_arrow.png"></p>

                                <div class="sorting_option">
                                    <input type="radio" name="rating_Sp" value="FirstName Asc">
                                    <label for="cust_as">Customer Ascending</label><br>
                                    <input type="radio" name="rating_Sp" value="FirstName Desc">
                                    <label for="cust_de">Customer Descending</label><br>
                                    <input type="radio" name="rating_Sp" value="ServiceStartDate Desc" checked>
                                    <label for="serdate_as">Service Date: Latest</label><br>
                                    <input type="radio" name="rating_Sp" value="ServiceStartDate Asc">
                                    <label for="serdate_de">Service Date: Oldest</label><br>
                                    <input type="radio" name="rating_Sp" value="Ratings Desc">
                                    <label for="rating_as">Rating: High to low</label><br>
                                    <input type="radio" name="rating_Sp" value="Ratings Asc">
                                    <label for="rating_de">Rating: Low to High</label><br>
                                </div>
                            </div>
                        </div>

                        <div class="rating_list">
                            <div class="rating_box">
                                <div class="row">
                                    <div class="col-md-3 rating_name">
                                        <p>8318</p>
                                        <p class="name">Gaurang Patel</p>
                                    </div>
                                    <div class="col-md-5 rating_date">
                                        <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 27/06/2019</p>
                                        <p><img src="assets/images/clock.png"> 08:00 - 11:00</p>
                                    </div>
                                    <div class="col-md-4 rating_star">
                                        <p>ratings</p>

                                        <span class="mr-4 ml-2">4</span>
                                        <span>very good</span>
                                        <span class="rating_Sp"></span>

                                    </div>
                                </div>

                                <hr>

                                <div class="comments">
                                    <p class="comment_heading">Customer Comments</p>
                                    <p>Nice Work</p>
                                </div>
                            </div>

                            <div class="rating_box">
                                <div class="row">
                                    <div class="col-md-3 rating_name">
                                        <p>8318</p>
                                        <p class="name">Gaurang Patel</p>
                                    </div>
                                    <div class="col-md-5 rating_date">
                                        <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 27/06/2019</p>
                                        <p><img src="assets/images/clock.png"> 08:00 - 11:00</p>
                                    </div>
                                    <div class="col-md-4 rating_star">
                                        <p>ratings</p>

                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span>4</span>
                                        <span>very good</span>
                                    </div>
                                </div>

                                <hr>

                                <div class="comments">
                                    <p class="comment_heading">Customer Comments</p>
                                    <p>Excellent work done by provider. I am a very happy and would like to receive the
                                        service of same provider.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pages  -->
                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_rating_Sp" class="entries">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                            <p class="show">entries</p>
                            <p class="show" id="totalentries_rating_Sp"> Total Record: 55</p>

                            <div class="pagination">
                                <a onclick="paginationno_rating_Sp('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="paginationno_rating_Sp('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a class="active" id="pageno_rating_Sp">1</a>
                                <a onclick="paginationno_rating_Sp('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="paginationno_rating_Sp('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>


                    </section>

                    <!-- Service Schedule -->
                    <section id="service_schedule" style="display: none;">
                        <div id="calendra_display"></div>
                    </section>

                </div>

            </div>

    </section>
    </div>
    </div>
</section>

</section>




<!-- Footer  -->
<?php include "view/include/footer_service.php" ?>