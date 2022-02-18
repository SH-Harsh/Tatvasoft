<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Service</title>

    <link rel="stylesheet" href="assets/css/style2.css">

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome  -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>


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


    <header>
        <nav>
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png" width="73px" height="54px">
            </div>
            <ul class="nav-links">
                <li><a class="book_now" href="#">Book now</a></li>
                <li><a href="#">Prices & Services</a></li>
                <li><a href="#">Warranty</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
                <li class="notifation_border"><a href="#"><img src="assets/images/icon-notification.png"
                            style="margin-bottom: 20px;"></a>
                    <div class="notify_no">
                        <span class="notification_no">2</span>
                    </div>
                </li>
                <!-- <li class="nav-item dropdown space_user">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/person_logo.png">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Harsh</a>
                        <a class="dropdown-item" href="#">Ram</a>
                    </div>
                </li> -->

                <li>
                    <img src="assets/images/person_logo.png" class="m-2">
                </li>
                <li style="position: relative;">
                    <img src="assets/images/forma-2.png" class="arrow_down_nav">

                    <div class="arrow_down_section border">
                        <div>
                            <h5>Welcome,<br> Sandip patel</h5>
                        </div>
                        <hr>
                        <p>My Dashboard</p>
                        <p id="MySettings">My Settings</p>
                        <p>Logout</p>

                        <div class="arrow_up">

                        </div>
                    </div>

                </li>

            </ul>

            <li class="notifation_border_mv"><a href="#"><img src="assets/images/icon-notification.png"
                        style="margin-bottom: 20px;"></a>
                <div class="notify_no">
                    <span class="notification_no">2</span>
                </div>
            </li>

            <div class="burger" onclick="openSideMenu()">
                <img src="assets/images/menu.png" height="35px" width="45px">
            </div>
        </nav>
    </header>

    <!-- Side Navbar  -->
    <div class="side-nav" id="side-nav">

        <p class="side_menu_welcome">Welcome, <br> Sandip!</p>

        <hr>

        <a href="#">Dashboard</a>
        <a href="#" class="new_service_request">New Service Requests</a>
        <a href="ServiceProvider_UpcomingService.html">Upcoming Services</a>
        <a href="#" class="service_schedule">Service Schedule</a>
        <a href="#" class="service_history_tab">Service History</a>
        <a href="#" class="my_ratings_tab">My Ratings</a>
        <a href="#" class="block_customer_tab">Block Customer</a>

        <hr>

        <a>Prices & Services</a>
        <a>Warranty</a>
        <a>Blog</a>
        <a>Contact</a>

        <hr>

        <div class="social_media_box">
            <img src="assets/images/Facebook.png" class="social_media">
            <img src="assets/images/insta-1.png" class="social_media">
        </div>

    </div>

    <section onclick="closeSideMenu()" id="background_body">

        <section class="welcome_user">
            <p class="welcome">Welcome, <span style="font-weight: bold;">Sandip!</span></p>
        </section>

        <!-- Upcoming Service  -->

        <section style="margin-top: 31px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 left-menu">
                        <div style="background-color: #1d7a8c; height: 100%;">
                            <table class="menu_table">
                                <tr>
                                    <td><a href="#">Dashboard</a></td>
                                </tr>
                                <tr class="new_service_request">
                                    <td><a href="#">New Service Requests</a></td>
                                </tr>
                                <tr class="active_left upcoming_service">
                                    <td><a href="#">Upcoming Services</a></td>
                                </tr>
                                <tr>
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
                        <section>

                            <table class="right_service_list border" id="upcoming_service_list">
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
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323437</p>
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
                                        <p>10km</p>
                                    </td>
                                    <td>
                                        <p class="text-right_cancel">
                                            <button type="button" class="Cancel_button">Cancel</button>
                                        </p>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323438</p>
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
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323439</p>
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
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323440</p>
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
                                        <p>10km</p>
                                    </td>
                                    <td>
                                        <p class="text-right_cancel">
                                            <button type="button" class="Cancel_button">Cancel</button>
                                        </p>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323441</p>
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
                                        <p>25km</p>
                                    </td>
                                    <td>
                                        <p class="text-right_cancel">
                                            <button type="button" class="Cancel_button">Cancel</button>
                                        </p>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323442</p>
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
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323443</p>
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
                                        <p>05km</p>
                                    </td>
                                    <td>
                                        <p class="text-right_cancel">
                                            <button type="button" class="Cancel_button">Cancel</button>
                                        </p>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323444</p>
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
                                        <p class="text-right_cancel ">
                                            <button type="button" class="Cancel_button">Cancel</button>
                                        </p>
                                    </td>
                                </tr>
                                <tr data-toggle="modal" data-target="#upcoming_service_details">
                                    <td>
                                        <p>323445</p>
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
                                        <p>56,25 €</p>
                                    </td>
                                    <td>
                                        <p>05km</p>
                                    </td>
                                    <td>
                                        <p class="text-right_cancel">
                                            <button type="button" class="Cancel_button">Cancel</button>
                                        </p>
                                    </td>
                                </tr>
                            </table>


                            <!--Upcoming Service Modal -->
                            <div class="modal fade" id="upcoming_service_details" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
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
                                                    <p class="date_service_details">07/10/2021 08:00 - 11:00</p>
                                                    <p>Duration: 3hr</p>

                                                    <hr>

                                                    <p>Service Id: 8488</p>
                                                    <p>Extras</p>
                                                    <p>Total Payment: <span class="amount_paid">56,25 €</span></p>

                                                    <hr>

                                                    <p>Customer Name: Gaurang Patel</p>
                                                    <p>Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                                    <p>Distance: 296,76km</p>

                                                    <hr>

                                                    <p>Comments</p>
                                                    <p><span class="cross">x</span> I don't have pets at home.</p>

                                                    <hr>
                                                    <div class="mt-2">
                                                        <button class="Cancel_button">
                                                            <p> <i class="fas fa-times"></i> Cancel</p>
                                                        </button>
                                                        <button class="accept_btn">
                                                            <p> <i class="fas fa-check"></i> Complete</p>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931
                                                        298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d
                                                        4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1641905145251!5m2!1sen!2sin"
                                                        width="100%" height="100%" style="border:0;" allowfullscreen=""
                                                        loading="lazy"></iframe>
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
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="First name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email_address">Email Address</label>
                                            <input type="text" name="email_address" class="form-control"
                                                placeholder="Email address">
                                        </div>
                                    </div>

                                    <div class="form-row mt-4">
                                        <div class="col-md-4">
                                            <label for="phone_number">Phone Number</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+49</div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroup"
                                                    placeholder="Phone Number" name="phone_number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date_of_birth">Date of Birth</label><br>
                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <select id="date" class="form-control">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto my-1">
                                                    <select id="month" class="form-control">
                                                        <option value="1">January</option>
                                                        <option value="2">Februrary</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto my-1">
                                                    <select id="year" class="form-control">
                                                        <option value="1982">1982</option>
                                                        <option value="2000">2000</option>
                                                        <option value="2020">2020</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nationality">Nationality</label><br>
                                            <select name="nationality" class="form-control">
                                                <option value="German">German</option>
                                                <option value="Enghlish">India</option>
                                            </select>
                                        </div>
                                    </div>

                                    <p class="account_status">Gender</p>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="male" name="gender"
                                            value="male">
                                        <label class="male mb-0" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="Female" name="gender"
                                            value="Female">
                                        <label class="form-check-label" for="Female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="not_to_say" name="gender"
                                            value="not_to_say">
                                        <label class="form-check-label" for="not_to_say">Rather not to say</label>
                                    </div>

                                    <p class="account_status mt-2">Select Avatar</p>

                                    <div class="d-flex flex-wrap">
                                        <div class="avatar_box">
                                            <img src="assets/images/avatar-car.png" class="avatar_img select"
                                                onclick="change_avatar('assets/images/avatar-car.png')">
                                        </div>
                                        <div class="avatar_box">
                                            <img src="assets/images/avatar-female.png" class="avatar_img"
                                                onclick="change_avatar('assets/images/avatar-female.png')">
                                        </div>
                                        <div class="avatar_box">
                                            <img src="assets/images/avatar-hat.png" class="avatar_img"
                                                onclick="change_avatar('assets/images/avatar-hat.png')">
                                        </div>
                                        <div class="avatar_box">
                                            <img src="assets/images/avatar-iron.png" class="avatar_img"
                                                onclick="change_avatar('assets/images/avatar-iron.png')">
                                        </div>
                                        <div class="avatar_box">
                                            <img src="assets/images/avatar-male.png" class="avatar_img"
                                                onclick="change_avatar('assets/images/avatar-male.png')">
                                        </div>
                                        <div class="avatar_box">
                                            <img src="assets/images/avatar-ship.png" class="avatar_img"
                                                onclick="change_avatar('assets/images/avatar-ship.png')">
                                        </div>
                                    </div>

                                    <p class="account_status mt-3">My Address</p>


                                    <hr>

                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label for="Street Name">Street Name</label>
                                            <input type="text" name="Street Name" class="form-control"
                                                placeholder="Street name">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="House number">House number</label>
                                            <input type="number" class="form-control" placeholder="House number">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Postal Code">Postal Code</label>
                                            <input type="number" name="Postal Code" class="form-control"
                                                placeholder="Postal Code">
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="col-md-4">
                                            <label for="City">City</label>
                                            <input type="text" name="City" class="form-control" placeholder="City">

                                            <hr>
                                        </div>
                                    </div>

                                    <button type="submit" class="submit_my_settings">Save</button>

                                </form>
                            </div>

                            <div id="change_pass" class="tabcontent">
                                <form>
                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                        <input type="password" class="form-control" id="old_password"
                                            placeholder="Current Password" style="width: 200px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Password" style="width: 200px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Confirm Password" style="width: 200px;">
                                    </div>

                                    <button type="submit" class="submit_my_settings">Save</button>
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
                                    <input class="form-check-input" type="checkbox" value="" id="pet_home">
                                    <label class="form-check-label" for="pet_home">
                                        Include Pet at home
                                    </label>
                                </div>
                            </div>

                            <table class="new_request_table">
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
                            <div class="modal fade" id="new_service_details" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
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
                                                    <p class="date_service_details">07/10/2021 08:00 - 11:00</p>
                                                    <p>Duration: 3hr</p>

                                                    <hr>

                                                    <p>Service Id: 8488</p>
                                                    <p>Extras</p>
                                                    <p>Total Payment: <span class="amount_paid">56,25 €</span></p>

                                                    <hr>

                                                    <p>Customer Name: Gaurang Patel</p>
                                                    <p>Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                                    <p>Distance: 296,76km</p>

                                                    <hr>

                                                    <p>Comments</p>
                                                    <p><span class="cross">x</span> I don't have pets at home.</p>

                                                    <hr>
                                                    <div class="mt-2">
                                                        <button class="accept_btn"
                                                            style="background-color: rgb(29, 223, 29);">
                                                            <p> <i class="fas fa-check"></i> Accept</p>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14686.79219931
                                                        298!2d72.5004358!3d23.0348564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdc9d
                                                        4dae36889fb9!2sTatvaSoft!5e0!3m2!1sen!2sin!4v1641905145251!5m2!1sen!2sin"
                                                        width="100%" height="100%" style="border:0;" allowfullscreen=""
                                                        loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Pages  -->
                            <div class="pages">
                                <p class="show">Show</p>

                                <select name="entries" id="entries" class="entries">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10" selected>10</option>
                                </select>

                                <p class="show">entries</p>
                                <p class="show"> Total Record: 55</p>

                                <div class="pagination">
                                    <a href="#"><img src="assets/images/first-page.png"></a>
                                    <a href="#"><img src="assets/images/keyboard-right-arrow.png"></a>
                                    <a href="#" class="active">1</a>
                                    <a href="#"><img src="assets/images/keyboard-right-arrow.png"
                                            style="transform: rotate(180deg);"></a>
                                    <a href="#"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
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

                                <button type="button" class="export_btn mt-3">Export</button>
                            </div>

                            <table class="new_request_table">
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
                                <tr>
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
                                <tr>
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
                                <tr>
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
                                <tr>
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
                                <tr>
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

                                <select name="entries" id="entries" class="entries">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10" selected>10</option>
                                </select>

                                <p class="show">entries</p>
                                <p class="show"> Total Record: 55</p>

                                <div class="pagination">
                                    <a href="#"><img src="assets/images/first-page.png"></a>
                                    <a href="#"><img src="assets/images/keyboard-right-arrow.png"></a>
                                    <a href="#" class="active">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#"><img src="assets/images/keyboard-right-arrow.png"
                                            style="transform: rotate(180deg);"></a>
                                    <a href="#"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                                </div>
                            </div>

                        </section>

                        <!-- Block Customer  -->
                        <section id="block_customer" style="display:none">
                            <div class="d-flex flex-wrap">
                                <div class="block_box">
                                    <div class="block_logo">
                                        <img src="assets/images/cap.png">
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

                                <select name="entries" id="entries" class="entries">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10" selected>10</option>
                                </select>

                                <p class="show">entries</p>
                                <p class="show"> Total Record: 2</p>

                                <div class="pagination">
                                    <a href="#"><img src="assets/images/first-page.png"></a>
                                    <a href="#"><img src="assets/images/keyboard-right-arrow.png"></a>
                                    <a href="#" class="active">1</a>
                                    <a href="#"><img src="assets/images/keyboard-right-arrow.png"
                                            style="transform: rotate(180deg);"></a>
                                    <a href="#"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                                </div>
                            </div>
                        </section>

                        <!-- My Ratings  -->

                        <section id="my_ratings" style="display: none;">

                            <div class="pages">
                                <p class="show">Ratings</p>

                                <select name="entries" id="entries" class="entries">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                                <div class="sort">
                                    <p>Sorting <img src="assets/images/double_arrow.png"></p>
                                </div>
                            </div>

                            <div class="rating_box">
                                <div class="row">
                                    <div class="col-md-3 rating_name">
                                        <p>8318</p>
                                        <p class="name">Gaurang Patel</p>
                                    </div>
                                    <div class="col-md-6 rating_date">
                                        <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 27/06/2019</p>
                                        <p><img src="assets/images/clock.png"> 08:00 - 11:00</p>
                                    </div>
                                    <div class="col-md-3 rating_star">
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
                                    <p>Customer Comments</p>
                                </div>
                            </div>

                            <div class="rating_box">
                                <div class="row">
                                    <div class="col-md-3 rating_name">
                                        <p>8318</p>
                                        <p class="name">Gaurang Patel</p>
                                    </div>
                                    <div class="col-md-6 rating_date">
                                        <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 27/06/2019</p>
                                        <p><img src="assets/images/clock.png"> 08:00 - 11:00</p>
                                    </div>
                                    <div class="col-md-3 rating_star">
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



                        </section>

                    </div>

                </div>

        </section>
        </div>
        </div>
    </section>

    </section>




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
            <p class="-Helperland-All-rights-reserved-Terms-and-Conditions">
                ©2018 Helperland All rights reserved.Terms and Conditions | Privacy Policy
            </p>
        </div>
    </footer>


    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="assets/js/responsive.js"></script>

</body>

</html>