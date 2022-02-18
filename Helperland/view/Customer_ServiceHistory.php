<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service History</title>

    <link rel="stylesheet" href="assets/css/style2.css">

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>


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

    <header>
        <nav>
            <div class="logo">
                <img src="assets/images/white-logo-transparent-background-copy-4.png" width="73px" height="54px">
            </div>
            <ul class="nav-links">
                <li><a class="book_now" href="#">Book now</a></li>
                <li><a href="#">Prices & Services</a></li>
                <li><a class="nav-link" href="#">Warranty</a></li>
                <li><a class="nav-link" href="#">Blog</a></li>
                <li><a class="nav-link" href="#">Contact</a></li>
                <li class="notifation_border"><a href="#"><img src="assets/images/icon-notification.png"
                            style="margin-bottom: 20px;"></a>
                    <div class="notify_no">
                        <span class="notification_no">2</span>
                    </div>
                </li>
                <li>
                    <img src="assets/images/person_logo.png" class="m-2">
                </li>
                <li style="position: relative;">
                    <img src="assets/images/forma-2.png" class="arrow_down_nav">

                    <div class="arrow_down_section border">
                        <h5>Welcome, <br> Sandip patel</h5>
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
                <img src="assets/menu.png" height="35px" width="45px">
            </div>
        </nav>
    </header>

    <!-- Side Navbar  -->
    <div class="side-nav" id="side-nav">

        <p class="side_menu_welcome">Welcome, <br> Sandip!</p>

        <hr>

        <a href="#">Dashboard</a>
        <a href="#">New Service Requests</a>
        <a href="#" class="dashboard_tab">Upcoming Services</a>
        <a href="#">Service Schedule</a>
        <a href="#" class="service_history_tab">Service History</a>
        <a href="#">My Ratings</a>
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
            <p class="welcome">Welcome, <span style="font-weight: bold;">Gaurang!</span></p>
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
                                    <td><a href="Customer_ServiceHistory.html">Service History</a></td>
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

                                <button type="button" class="export_btn">Export</button>
                            </div>

                            <div class="right_service_list_section">
                                <table class="right_service_history" style="width: 100%;">
                                    <tr>
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
                                            <p>8470</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status">
                                                <p class="Completed">Completed</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8453</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status">
                                                <p class="Completed">Completed</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8438</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status">
                                                <p class="Completed">Completed</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8471</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status" style="background-color:#ff6b6b;">
                                                <p class="Completed">Cancelled</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8472</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status">
                                                <p class="Completed">Completed</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8473</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status" style="background-color:#ff6b6b;">
                                                <p class="Completed">Cancelled</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8474</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status">
                                                <p class="Completed">Completed</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status">
                                                <p class="Completed">Completed</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>8476</p>
                                        </td>
                                        <td>
                                            <p style="font-weight: 500;"><img src="assets/images/calendar.png"> 31/03/2018</p>
                                            <p class="time">12:00 - 18:00</p>
                                        </td>
                                        <td>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status" style="background-color:#ff6b6b;">
                                                <p class="Completed">Cancelled</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
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
                                        <td>
                                            <p class="euro_price"><img src="assets/images/euro-currency-symbol.png"
                                                    class="euro_img">63
                                            </p>
                                        </td>
                                        <td>
                                            <div class="status" style="background-color:#ff6b6b;">
                                                <p class="Completed">Cancelled</p>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="RateSp" data-toggle="modal"
                                                data-target="#rating_modal">Rate SP</button>
                                        </td>
                                    </tr>


                                </table>
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

                            <!-- Rate SP Modal -->
                            <div class="modal fade" id="rating_modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom: none;">
                                            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <img src="assets/images/cap.png" class="cap_border ml-2" width="70px"
                                                    height="70px">

                                                <p class="rating_name_modal">Lyum Watson</p>

                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span>4</span>
                                            </div>

                                            <p class="rating_head_modal">Rate your Service Provider</p>

                                            <hr>

                                            <div class="d-flex">
                                                <p class="rating_option">On time arrival</p>

                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="1one"
                                                    class="fa fa-star checked rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="2one"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="3one"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="4one"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="5one"
                                                    class="fa fa-star rating_star"></span>
                                                <br />
                                            </div>
                                            <div class="d-flex">
                                                <p class="rating_option">Friendly</p>

                                                <span onmouseover="starmark(this)" onclick="starmark2(this)" id="1on"
                                                    class="fa fa-star checked rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark2(this)" id="2on"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark2(this)" id="3on"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark2(this)" id="4on"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark2(this)" id="5on"
                                                    class="fa fa-star rating_star"></span>
                                                <br />
                                            </div>
                                            <div class="d-flex">
                                                <p class="rating_option">Quality of Service</p>

                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="1o"
                                                    class="fa fa-star checked rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="2o"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="3o"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="4o"
                                                    class="fa fa-star rating_star"></span>
                                                <span onmouseover="starmark(this)" onclick="starmark(this)" id="5o"
                                                    class="fa fa-star rating_star"></span>
                                                <br />
                                            </div>

                                            <p class="mt-3 mb-0">Feedback on service provider</p>
                                            <textarea class="form-control rounded-0 mb-2" id="cancel_textarea"
                                                rows="4"></textarea>
                                            <button class="accept_btn" type="button"
                                                data-dismiss="modal">Submit</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>


                        <!-- Dashboard  -->
                        <section id="dashboard" style="display: none;">
                            <div class="history_section">
                                <p class="service_history">Current Service Request</p>

                                <button type="button" class="export_btn">Add New Service Request</button>
                            </div>

                            <table class="dashboard_table">
                                <tr>
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
                                            <button type="button" class="accept_btn mt-2" data-toggle="modal"
                                                data-target="#Reschudule">Reschedule</button>
                                            <button type="button" class="accept_btn mx-2 mt-2"
                                                style="background-color: #ff6b6b;" data-toggle="modal"
                                                data-target="#cancel_service">Cancel</button>
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
                                            <button type="button" class="accept_btn mt-2" data-toggle="modal"
                                                data-target="#Reschudule">Reschedule</button>
                                            <button type="button" class="accept_btn mx-2 mt-2"
                                                style="background-color: #ff6b6b;" data-toggle="modal"
                                                data-target="#cancel_service">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!--Dashboard Service Details Modal -->
                            <div class="modal fade" id="dashboard_modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
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
                                                <p class="date_service_details">07/10/2021 08:00 - 11:00</p>
                                                <p>Duration: 3hr</p>

                                                <hr>

                                                <p>Service Id: 8488</p>
                                                <p>Extras</p>
                                                <p>Total Payment: <span class="amount_paid"> &nbsp; &nbsp; &nbsp; 56,25
                                                        €</span></p>

                                                <hr>

                                                <p>Customer Name: Gaurang Patel</p>
                                                <p>Service Address: Koenigstrasse 112,99897 Tambach-Dietharz</p>
                                                <p>Distance: 296,76km</p>

                                                <hr>

                                                <p>Comments</p>
                                                <p><span class="cross">x</span> I don't have pets at home.</p>

                                                <hr>
                                                <div class="mt-2">
                                                    <button class="accept_btn">
                                                        <p> <i class="far fa-clock"></i> Reschedule</p>
                                                    </button>
                                                    <button class="Cancel_button">
                                                        <p> <i class="fas fa-times"></i> Cancel</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reschudule Modal -->
                            <div class="modal fade" id="Reschudule" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reschedule Service Request
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Select New Date & Time</p>
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group" style="width: 100%;">
                                                            <div class='input-group date' id='datetimepicker1'
                                                                class="date">
                                                                <span class="input-group-addon calendra_box">
                                                                    <span class="calendra_img"> <img
                                                                            src="assets/images/admin-calendar-blue.png"></span>
                                                                </span>
                                                                <input type='text' class="form-control"
                                                                    placeholder="From date" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <select id="inputState" class="form-control">
                                                            <option selected>8:00</option>
                                                            <option>9:00</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <button class="update" type="button" data-dismiss="modal">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cancel Service Request Modal -->
                            <div class="modal fade" id="cancel_service" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <textarea class="form-control rounded-0 mb-2" id="cancel_textarea"
                                                rows="4"></textarea>
                                            <button class="update" type="button" data-dismiss="modal">Cancel
                                                Now</button>
                                        </div>
                                    </div>
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

                            <div id="details" class="tabcontent" style="display: block;">

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
                                                <input type="text" class="form-control" placeholder="Phone Number"
                                                    name="phone_number">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
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
                                    </div>

                                    <hr>

                                    <div>
                                        <label for="prederred_language">My Preferred Language</label><br>
                                        <select name="prederred_language" class="form-control" style="width: 150px;">
                                            <option value="Enghlish">Enghlish</option>
                                            <option value="German">German</option>
                                        </select>
                                    </div>


                                    <button type="submit" class="submit_my_settings">Submit</button>
                                </form>
                            </div>

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
                                                <i class="far fa-edit" data-target="#edit_address"
                                                    data-toggle="modal"></i>
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
                                                <i class="far fa-edit" data-target="#edit_address"
                                                    data-toggle="modal"></i>
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
                                                <i class="far fa-edit" data-target="#edit_address"
                                                    data-toggle="modal"></i>
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
                                                <i class="far fa-edit" data-target="#edit_address"
                                                    data-toggle="modal"></i>
                                                <i class="far fa-trash-alt"></i>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" class="submit_my_settings">Add new address</button>


                                <!-- Edit Address Modal Section  -->
                                <div class="modal fade" id="edit_address" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom: none;">
                                                <p>Edit Address</p>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <label for="street_name">Street Name</label>
                                                            <input type="text" name="street_name" class="form-control"
                                                                placeholder="Street name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="house_no">House Number</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="House number">
                                                        </div>
                                                    </div>

                                                    <div class="form-row mt-3">
                                                        <div class="col-md-6">
                                                            <label for="postal_code">Postal Code</label>
                                                            <input type="text" name="postal_code" class="form-control"
                                                                placeholder="Postal Code">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" placeholder="City">
                                                        </div>
                                                    </div>

                                                    <div class="form-row mt-3">
                                                        <div class="col-md-6">
                                                            <label for="phone_number">Phone Number</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">+49</div>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Phone Number" name="phone_number">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <button type="submit" data-dismiss="modal"
                                                            class="submit_my_settings"
                                                            style="width: 100%;">Edit</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

                        <!-- Favorite Pros  -->
                        <section id="block_customer" style="display:none">
                            <div class="d-flex flex-wrap">
                                <div class="block_box">
                                    <div class="block_logo">
                                        <img src="assets/images/cap.png">
                                    </div>
                                    <p class="block_name">Guarang Patel</p>

                                    <div style="width: 100%; display: flex; justify-content: center;">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="ml-2" style="margin-top: -5px;">4</span>
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


                    </div>
                </div>
            </div>
        </section>
    </section>

    <footer>
        <div class="row flex-container footer_size">
            <div class="col-lg-2 col-sm-2">
                <div class="white_logo_transparent_background-copy-4">
                    <img src="assets/images/white-logo-transparent-background-copy-4.png">
                </div>
            </div>
            <div class="col-lg-8 col-sm-8 footer_option_box">
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
            <div class="col-lg-2 col-sm-2">
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


    <!-- Date Picker  -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>



    <script src="assets/js/responsive.js"></script>

</body>

</html>