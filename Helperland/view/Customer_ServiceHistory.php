<!-- Header  -->
<?php include "include/header_service.php"  ?>


<!-- <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar_bg">
            <a class="navbar-brand" href="#" class="helperland_text_logo"><img src="assets/white-logo-transparent-background-copy-4.png" width="73px"
                    height="54px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item space_nav">
                        <a class="nav-link book_now" href="#">Book now</a>
                    </li>
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


    <!-- Service History  -->

    <section style="margin-top: 31px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 left-menu">
                    <div style="background-color: #1d7a8c; height: 100%;">
                        <table class="menu_table">
                            <tr class="dashboard_tab">
                                <td><a href="#">Dashboard</a></td>
                            </tr>
                            <tr class="active_left service_history_tab">
                                <td><a href="#">Service History</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Service Schedule</a></td>
                            </tr>
                            <tr class="block_customer_tab">
                                <td><a href="#">Favourite Pros</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Invoices</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Notification</a></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="col-lg-10 col-md-12" style="padding-inline: 10px;">

                    <!-- Service History  -->
                    <section id="Service_history" style="display: block;">
                        <div class="history_section">
                            <p class="service_history">Service History</p>

                            <!-- <form action="view/include/downloadsheet.php" method="POST"> -->
                            <button class="export_btn" id="Export_table">Export</button>
                            <table id="ExportServiceHistory" style="display: none;">

                            </table>
                            <!-- </form> -->

                        </div>

                        <div class="right_service_list_section">
                            <table class="right_service_history" style="width: 100%;" id="ServiceHistory">
                                <!-- <tr>
                                    <th>
                                        <p>Service Id</p>
                                    </th>
                                    <th>
                                        <p>Service Date</p>
                                    </th>
                                    <th>
                                        <p>Service Provider &nbsp; <img src="assets/images/double_arrow.png"></p>
                                    </th>
                                    <th>
                                        <p class="text-center">Payment &nbsp; <img src="assets/images/double_arrow.png">
                                        </p>
                                    </th>
                                    <th>
                                        <p>Status &nbsp; <img src="assets/images/double_arrow.png"></p>
                                    </th>
                                    <th>
                                        <p class="text-center">Rate SP</p>
                                    </th>
                                </tr>

                                <tr>
                                    <td>
                                        <p>8475</p>
                                    </td>
                                    <td>
                                        <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                        <p class="time">12:00 - 18:00</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="assets/images/avatar-car.png" class="cap_border">

                                            <p>Lyum Watson</p>

                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span>4</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="euro_price"><img src="assets/images/euro-currency-symbol.png" class="euro_img">63
                                        </p>
                                    </td>
                                    <td>
                                        <div class="status">
                                            <p class="Completed">Completed</p>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="RateSp" data-toggle="modal" data-target="#rating_modal">Rate SP</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p>8477</p>
                                    </td>
                                    <td>
                                        <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                        <p class="time">12:00 - 18:00</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="assets/images/avatar-female.png" class="cap_border">

                                            <p>Lyum Watson</p>

                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span>4</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="euro_price"><img src="assets/images/euro-currency-symbol.png" class="euro_img">63
                                        </p>
                                    </td>
                                    <td>
                                        <div class="status" style="background-color:#ff6b6b;">
                                            <p class="Completed">Cancelled</p>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="RateSp" data-toggle="modal" data-target="#rating_modal">Rate SP</button>
                                    </td>
                                </tr> -->


                            </table>
                        </div>

                        <!-- Pagination  -->
                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_servicehistory" class="entries">
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
                            <p class="show" id="totalRecord_servicehistory"> Total Record: 55</p>

                            <div class="pagination pagejs">
                                <a onclick="pagination_serviceHistory('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="pagination_serviceHistory('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a onclick="pagination_serviceHistory(id)" class="active min-pagination" id="1-pagination">1</a>
                                <a onclick="pagination_serviceHistory(id)" class="mid1-pagination" id="2-pagination">2</a>
                                <a onclick="pagination_serviceHistory(id)" class="mid2-pagination" id="3-pagination">3</a>
                                <a onclick="pagination_serviceHistory(id)" id="4-pagination" class="max-pagination">4</a>
                                <a onclick="pagination_serviceHistory('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="pagination_serviceHistory('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>

                        <!-- Rate SP Modal -->
                        <div class="modal fade" id="rating_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-bottom: none;">
                                        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="position: relative;">



                                            <img src="assets/images/avatar-car.png" id="rating_logo" class="cap_border ml-2 avatar_logo">

                                            <p class="rating_name_modal">Lyum Watson</p>

                                            <div id="average_rating"></div>
                                            <div class="rating_serviceid">
                                                <span id="average_rating_value">1</span>
                                            </div>


                                            <!-- <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span> -->

                                            <!-- <div id="average_rating"></div> -->

                                        </div>

                                        <p class="rating_head_modal">Rate your Service Provider</p>

                                        <!-- <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                                        </div>
                                        <span class='result'>0</span> -->

                                        <!-- <div id="rateYo"></div> -->


                                        <hr>

                                        <div class="d-flex">
                                            <p class="rating_option">On time arrival</p>

                                            <div id="rateYo" class="m-2"></div>
                                            <div class="rating_value" style="display: none;">1</div>
                                            <!-- <span onmouseover="starmark(this)" onclick="starmark(this)" id="1one" class="fa fa-star checked rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="2one" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="3one" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="4one" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="5one" class="fa fa-star rating_star"></span> -->
                                            <br />
                                        </div>
                                        <div class="d-flex">
                                            <p class="rating_option">Friendly</p>

                                            <div id="rateYo1" class="m-2"></div>
                                            <div class="rating_value1" style="display: none;">1</div>
                                            <!-- <span onmouseover="starmark(this)" onclick="starmark(this)" id="1on" class="fa fa-star checked rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="2on" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="3on" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="4on" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="5on" class="fa fa-star rating_star"></span> -->
                                            <br />
                                        </div>
                                        <div class="d-flex">
                                            <p class="rating_option">Quality of Service</p>

                                            <div id="rateYo2" class="m-2"></div>
                                            <div class="rating_value2" style="display: none;">1</div>
                                            <!-- <span onmouseover="starmark(this)" onclick="starmark(this)" id="1o" class="fa fa-star checked rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="2o" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="3o" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="4o" class="fa fa-star rating_star"></span>
                                            <span onmouseover="starmark(this)" onclick="starmark(this)" id="5o" class="fa fa-star rating_star"></span> -->
                                            <br />
                                        </div>

                                        <p class="mt-3 mb-0">Feedback on service provider</p>
                                        <textarea class="form-control rounded-0 mb-2" id="rating_textarea" rows="4"></textarea>
                                        <button class="accept_btn" type="button" data-dismiss="modal" id="rating_submit">Submit</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>

                    <!-- Dashboard  -->
                    <section id="dashboard" style="display: none;">
                        <div class="history_section">
                            <p class="service_history">Current Service Request</p>
                            <a href="<?= "$base_url?function=bookService" ?>" type="button" class="export_btn">Add New Service Request</a>
                        </div>

                        <table class="dashboard_table">
                            <!-- <tr>
                                <th style="width: 10%;">
                                    <p>Service Id</p>
                                </th>
                                <th style="width: 15%;">
                                    <p>Service Date</p>
                                </th>
                                <th style="width: 40%;">
                                    <p>Service Provider</p>
                                </th>
                                <th>
                                    <p>Payment</p>
                                </th>
                                <th style="width: 20%;">
                                    <p style="margin: 0px 10px;">Action</p>
                                </th>
                            </tr>
                            <div id="currentservicerequesttable">
                                <tr>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <p>8485</p>
                                    </td>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 09/04/2018</p>
                                        <p><img src="assets/images/clock.png"> 12:00 - 18:00</p>
                                    </td>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <div>
                                            <img src="assets/images/cap.png" class="cap_border">

                                            <p>Lyum Watson</p>

                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span>4</span>
                                        </div>
                                    </td>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <p class="euro_price text-left">63€
                                        </p>
                                    </td>
                                    <td>
                                        <div class="flex-container mt-3">
                                            <button type="button" class="accept_btn mt-2" data-toggle="modal" data-target="#Reschudule">Reschedule</button>
                                            <button type="button" class="accept_btn mx-2 mt-2" style="background-color: #ff6b6b;" data-toggle="modal" data-target="#cancel_service">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <p>8485</p>
                                    </td>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <p style="font-weight: 500"><img src="assets/images/calendar2.png"> 09/04/2018</p>
                                        <p><img src="assets/images/clock.png"> 12:00 - 18:00</p>
                                    </td>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <div>
                                            <img src="assets/images/cap.png" class="cap_border">

                                            <p>Lyum Watson</p>

                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span>4</span>
                                        </div>
                                    </td>
                                    <td data-toggle="modal" data-target="#dashboard_modal">
                                        <p class="euro_price text-left">63€
                                        </p>
                                    </td>
                                    <td>
                                        <div class="flex-container mt-3">
                                            <button type="button" class="accept_btn mt-2" data-toggle="modal" data-target="#Reschudule">Reschedule</button>
                                            <button type="button" class="accept_btn mx-2 mt-2" style="background-color: #ff6b6b;" data-toggle="modal" data-target="#cancel_service">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </div> -->

                        </table>

                        <!--Dashboard Service Details Modal -->
                        <div class="modal fade" id="dashboard_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Service Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="service_details_left">
                                            <p class="date_service_details" id="servicedetailsdatetime">07/10/2021 08:00 - 11:00</p>
                                            <p id="servicedetails_duration">Duration: 3hr</p>

                                            <hr>

                                            <p id="dashboard_serviceid">Service Id: 8488</p>
                                            <p id="dashboard_extraservice">Extras</p>
                                            <p>Total Payment: <span class="amount_paid"> &nbsp; &nbsp; &nbsp; 56,25
                                                    €</span></p>

                                            <hr>

                                            <p id="dashboard_customername">Customer Name: Gaurang Patel</p>
                                            <p id="dashboard_serviceaddress">Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                            <!-- <p>Distance: 296,76km</p> -->

                                            <hr>

                                            <p id="servicedetails_comments">Comments:</p>
                                            <p id="servicedetails_pets"><img src="assets/images/not-included.png" style="width: 20px;height: 20px;">
                                                I don't have pets at home.</p>
                                            <hr>
                                            <div class="mt-2">
                                                <button class="accept_btn" id="dashboard_reschedule" data-toggle='modal' data-target='#Reschudule'>
                                                    <p class="reschudule_setid"> <i class="far fa-clock"></i> Reschedule</p>
                                                </button>
                                                <button class="Cancel_button" id="dashboard_cancel" data-toggle='modal' data-target='#cancel_service'>
                                                    <p> <i class="fas fa-times"></i> Cancel</p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reschudule Modal -->
                        <div class="modal fade" id="Reschudule" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="alert alert-danger m-2" id="reschudele_error" role="alert" style="display: none;">
                                        Another service request has been assigned to the service provider
                                    </div>
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Reschedule Service Request
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Select New Date & Time</p>
                                        <form id="rescheduleform">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group" style="width: 100%;">
                                                        <div class='input-group date' id='datetimepicker1' class="date">
                                                            <span class="input-group-addon calendra_box">
                                                                <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
                                                            </span>
                                                            <input type='text' id="rescheduledate" class="form-control" placeholder="From date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <select id="inputState" class="form-control">
                                                        <option value="8:00">8:00</option>
                                                        <option value="9:00">9:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="18:00">18:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="test">
                                                <!-- <button class="update" type="button" id="reschudele_update" data-dismiss="modal">Update</button> -->
                                                <button class="update" type="button" id="reschudele_update">Update</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cancel Service Request Modal -->
                        <div class="modal fade" id="cancel_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cancel Service Request
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Why you want to cancel the service request?</p>
                                        <textarea class="form-control rounded-0 mb-2" id="comment_textarea" rows="4"></textarea>
                                        <div class="cancelserviceid">
                                            <button class="update" id="cancelServiceRequest" type="button" data-dismiss="modal">Cancel
                                                Now</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pagination  -->
                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_dashboard" class="entries">
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
                            <p class="show" id="totalRecord_dashboard"> Total Record: 2</p>

                            <div class="pagination">
                                <a onclick="paginationno('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="paginationno('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a class="active" id="pageno">1</a>
                                <a onclick="paginationno('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="paginationno('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>


                    </section>

                    <!-- My Setting Customer  -->
                    <section id="My_settings_customer">

                        <div class="tab">
                            <div class="tablinks active_settings" onclick="mysettings(event, 'details')">
                                <p>My Details</p>
                            </div>
                            <div class="tablinks" onclick="mysettings(event, 'addresses')">
                                <p>My Addresses</p>
                            </div>
                            <div class="tablinks" onclick="mysettings(event, 'change_pass')">
                                <p>Change Password</p>
                            </div>
                        </div>

                        <!-- Details  -->
                        <div id="details" class="tabcontent" style="display: block;">

                            <form>

                                <div class="alert alert-danger login_error" role="alert" style="display: none;">

                                </div>

                                <div class="alert alert-success updated_success_alert" role="alert" style="display: none;">

                                </div>

                                <div class="form-row mt-5">
                                    <div class="col-md-4">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" id="mysetting_fname" class="form-control" placeholder="First name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="mysetting_lname" placeholder="Last name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email_address">Email Address</label>
                                        <input type="text" name="email_address" id="mysetting_email" class="form-control" placeholder="Email address" readonly>
                                    </div>
                                </div>

                                <div class="form-row mt-4">
                                    <div class="col-md-4">
                                        <label for="phone_number">Phone Number</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+49</div>
                                            </div>
                                            <input type="text" class="form-control" id="mysetting_phoneno" placeholder="Phone Number" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="date_of_birth">Date of Birth</label><br>
                                        <div class="form-row align-items-center">
                                            <div class="col-auto my-1">
                                                <select id="settings_date" class="form-control">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                </select>
                                            </div>
                                            <div class="col-auto my-1">
                                                <select id="settings_month" class="form-control">
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
                                                <select id="settings_year" class="form-control">
                                                    <option value="1982">1982</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2020">2020</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div>
                                    <label for="prederred_language">My Preferred Language</label><br>
                                    <select name="prederred_language" id="mysetting_language" class="form-control" style="width: 150px;">
                                        <option value="Enghlish">Enghlish</option>
                                        <option value="German">German</option>
                                    </select>
                                </div>


                                <button type="submit" class="submit_my_settings" id="updatedetails_submit">Submit</button>
                                <p id="details_sucess" style="color: green;"></p>
                                <p id="details_error" style="color: red;"></p>
                            </form>
                        </div>

                        <!-- Addresses  -->
                        <div id="addresses" class="tabcontent">
                            <table class="address_table">
                                <tr class="table_heading">
                                    <th class="address_th py-3 px-4">Addresses</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td class="address_td">
                                        <div>
                                            <p><b>Address:</b> Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                            <p><b>Phone Number:</b> 9955648797</p>
                                        </div>
                                    </td>
                                    <td class="action_row">
                                        <p>
                                            <i class="far fa-edit" data-target="#edit_address" data-toggle="modal"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="address_td">
                                        <div>
                                            <p><b>Address:</b> Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                            <p><b>Phone Number:</b> 9955648797</p>
                                        </div>
                                    </td>
                                    <td class="action_row">
                                        <p>
                                            <i class="far fa-edit" data-target="#edit_address" data-toggle="modal"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="address_td">
                                        <div>
                                            <p><b>Address:</b> Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                            <p><b>Phone Number:</b> 9955648797</p>
                                        </div>
                                    </td>
                                    <td class="action_row">
                                        <p>
                                            <i class="far fa-edit" data-target="#edit_address" data-toggle="modal"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="address_td">
                                        <div>
                                            <p><b>Address:</b> Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                            <p><b>Phone Number:</b> 9955648797</p>
                                        </div>
                                    </td>
                                    <td class="action_row">
                                        <p>
                                            <i class="far fa-edit" data-target="#edit_address" data-toggle="modal"></i>
                                            <i class="far fa-trash-alt"></i>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="submit_my_settings" data-target="#add_address" data-toggle="modal">Add new address</button>
                            <div class="setting_address_error text-danger"></div>
                            <div class="setting_address_sucess text-success"></div>


                            <!-- Edit Address Modal Section  -->
                            <div class="modal fade" id="edit_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom: none;">
                                            <p>Edit Address</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#">
                                                <div class="alert alert-danger edit_address_error" role="alert" style="display: none;">

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="street_name">Street Name</label>
                                                        <input type="text" name="street_name" class="form-control" id="streetname_setting" placeholder="Street name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="house_no">House Number</label>
                                                        <input type="text" class="form-control" id="streetname_houseno" placeholder="House number">
                                                    </div>
                                                </div>

                                                <div class="form-row mt-3">
                                                    <div class="col-md-6">
                                                        <label for="postal_code">Postal Code</label>
                                                        <input type="text" name="postal_code" class="form-control" id="postalcode_setting" placeholder="Postal Code">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city_setting" placeholder="City">
                                                    </div>
                                                </div>

                                                <div class="form-row mt-3">
                                                    <div class="col-md-6">
                                                        <label for="phone_number">Phone Number</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">+49</div>
                                                            </div>
                                                            <input type="text" class="form-control" id="phoneno_setting" placeholder="Phone Number" name="phone_number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="submit" id="submit_setting" class="submit_my_settings" style="width: 100%;">Edit</button>
                                                </div>
                                                <!-- <div class="edit_address_error text-danger"></div> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Address Modal Section  -->
                            <div class="modal fade" id="add_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom: none;">
                                            <p>Add New Address</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" id="addnewaddress_setting_form">
                                                <div class="alert alert-danger add_address_error" role="alert" style="display: none;">

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="street_name">Street Name</label>
                                                        <input type="text" name="street_name" class="form-control" id="streetname_add_setting" placeholder="Street name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="house_no">House Number</label>
                                                        <input type="text" class="form-control" id="houseno_add_setting" placeholder="House number">
                                                    </div>
                                                </div>

                                                <div class="form-row mt-3">
                                                    <div class="col-md-6">
                                                        <label for="postal_code">Postal Code</label>
                                                        <input type="text" name="postal_code" class="form-control" id="postalcode_add_setting" placeholder="Postal Code">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city_add_setting" placeholder="City">
                                                    </div>
                                                </div>

                                                <div class="form-row mt-3">
                                                    <div class="col-md-6">
                                                        <label for="phone_number">Phone Number</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">+49</div>
                                                            </div>
                                                            <input type="text" class="form-control" id="phoneno_add_setting" placeholder="Phone Number" name="phone_number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <button type="submit" id="submit_add_setting" class="submit_my_settings" style="width: 100%;">Add</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cancel Modal  -->
                            <div class="modal fade" id="cancel_address_setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete the address ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary delete_address_id" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="delete_address_setting" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Change Password  -->
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

                                <button type="submit" class="submit_my_settings" id="setting_update_password">Save</button>
                                <div id="update_password_sucess" class="text-success"></div>
                                <div id="update_password_error" class="text-danger"></div>
                            </form>
                        </div>

                    </section>

                    <!-- Favorite Pros  -->
                    <section id="block_customer" style="display:none">
                        <div class="d-flex flex-wrap" id="blockfav_Sp">
                            <div class="block_box">
                                <div class="block_logo">
                                    <img src="assets/images/cap.png">
                                </div>
                                <p class="block_name">Guarang Patel</p>

                                <div style="width: 100%; display: flex; justify-content: center;">

                                    <div class="rating_customer"></div>
                                    <span class="ml-2">4</span>
                                </div>

                                <p class="text-center">1 Cleanings</p>
                                <div style="width: 100%; display: flex; justify-content: center;">
                                    <button class="accept_btn">Remove</button>
                                    <button class="Cancel_button ml-2" style="margin: 0;">Block</button>
                                </div>

                            </div>

                            <div class="block_box">
                                <div class="block_logo">
                                    <img src="assets/images/cap.png">
                                </div>
                                <p class="block_name">Keyur Nakrani</p>

                                <div style="width: 100%; display: flex; justify-content: center;">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="ml-2" style="margin-top: -5px;">4</span>
                                </div>

                                <p class="text-center">10 Cleanings</p>
                                <div style="width: 100%; display: flex; justify-content: center;">
                                    <button class="accept_btn">Remove</button>
                                    <button class="Cancel_button ml-2" style="margin: 0;">Block</button>
                                </div>

                            </div>

                        </div>

                        <div class="pages">
                            <p class="show">Show</p>

                            <select name="entries" id="entries_favoritepros" class="entries">
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
                            <p class="show" id="totalRecord_favoritepros"> Total Record: 50</p>

                            <div class="pagination">
                                <a onclick="paginationno_favoritepros('min')"><img src="assets/images/first-page.png"></a>
                                <a onclick="paginationno_favoritepros('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                                <a class="active" id="pageno_favoritepros">1</a>
                                <a onclick="paginationno_favoritepros('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                                <a onclick="paginationno_favoritepros('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </section>
</section>

<!-- Footer  -->
<?php include "view/include/footer_service.php" ?>