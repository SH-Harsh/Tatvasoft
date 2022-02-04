<?php include "../view/include/admin_header.php" ?>

<!-- Navigation bar  -->
<?php include "include/admin_navigation.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 left_menu_box">
            <div>
                <a href="#" class="active">
                    <p class="left_menu">Service Requests</p>
                </a>
            </div>
            <div>
                <a href="AdminUserManagement.php">
                    <p class="left_menu">User Management</p>
                </a>
            </div>
        </div>
        <div class="col-sm-10 border admin_right_section">
            <div>
                <p class="user_manage">Service Request</p>
            </div>

            <!-- Form  -->
            <div class="form_box">
                <form action="#" class="flex-container">


                    <div class="mr-2 mt-2" style="width: 121px;">
                        <input type="number" placeholder="Postal Code" class="postal_code">
                    </div>

                    <div class="mr-2 mt-2" style="width: 121px;">
                        <input type="number" placeholder="Service ID" class="postal_code">
                    </div>

                    <div class="mr-2 mt-2" style="width: 121px;">
                        <input type="email" placeholder="Email" class="postal_code">
                    </div>

                    <div class="mr-2 mt-2">
                        <select name="user_name" id="user_name" class="user_name_ser">
                            <option value="user_name" disabled selected>Select Customer</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <select name="user_type" id="user_type" class="user_name_ser">
                            <option value="user_type" disabled selected>Select Service Provider</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <select name="user_type" id="user_type" class="user_name_ser">
                            <option value="user_type" disabled selected>Select Status</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <select name="user_type" id="user_type" class="user_name_ser">
                            <option value="user_type" disabled selected>SP Payment Status</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>
                    <div class="mr-2 mt-2">
                        <select name="user_type" id="user_type" class="user_name_ser">
                            <option value="user_type" disabled selected>Select Status</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div style="padding: 20px;">
                        <div class="form-check">
                            <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Has issue
                            </label>
                        </div>
                    </div>


                    <div class="form-group mr-2 mt-2" style="width: 150px;">
                        <div class='input-group date' id='datetimepicker1' class="date">
                            <span class="input-group-addon calendra_box">
                                <span class="calendra_img"> <img src="../assets/images/admin-calendar-blue.png"></span>
                            </span>
                            <input type='text' class="form-control" placeholder="From date" />
                        </div>
                    </div>

                    <div class="form-group mr-2 mt-2" style="width: 140px;">
                        <div class='input-group date' id='datetimepicker2' class="date">
                            <span class="input-group-addon calendra_box">
                                <span class="calendra_img"> <img src="../assets/images/admin-calendar-blue.png"></span>
                            </span>
                            <input type='text' class="form-control" placeholder="To date" />
                        </div>
                    </div>

                    <div class="mr-2 mt-2">
                        <button type="button" class="Search">Search</button>
                    </div>

                    <div class="mr-2 mt-2">
                        <button type="button" class="clear">Clear</button>
                    </div>

                </form>
            </div>

            <div class="right_table">

                <table style="width:100%;">
                    <tr class="table_heading service_req_heading">
                        <th>Service ID</th>
                        <th>Service date</th>
                        <th>Customer Details</th>
                        <th>Service Provider</th>
                        <th>Net Amount</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <!-- <th>Payment Status</th> -->
                        <th>Action</th>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8472</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8471</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8470</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8467</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8466</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8479</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8479</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status_inactive">
                                <p class="active">Inactive</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8479</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8479</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status_inactive">
                                <p class="active">Inactive</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row service_req_row">
                        <td>8479</td>
                        <td>
                            <p style="font-weight: 500"><img src="../assets/images/calendar2.png"> 09/04/2018</p>
                            <p><img src="../assets/images/clock.png"> 12:00 - 18:00</p>
                        </td>
                        <td>
                            <p>David Bough</p>
                            <p><img src="../assets/images/home.png">Musterstrabe 5,12345 Bonn</p>
                        </td>
                        <td>
                            <div>
                                <img src="../assets/images/cap.png" class="cap_border">

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
                            <p class="net_amount">75,00 €</p>
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                        <td class="text-center status_box">
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group menu_option_dot">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item edit_reschedule" href="#">Edit and Reschedule</a>
                                    <a class="dropdown-item" href="#">Refund</a>
                                    <a class="dropdown-item" href="#">Cancel</a>
                                    <a class="dropdown-item" href="#">Change SP</a>
                                    <a class="dropdown-item" href="#">Escale</a>
                                    <a class="dropdown-item" href="#">History Log</a>
                                    <a class="dropdown-item" href="#">Download Invoice</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Pagination  -->
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

                <p class="show" style="margin-left: 5px;">Entries</p>

                <div class="pagination">
                    <a href="#"><img src="../assets/images/first-page.png"></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#"><img src="../assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                </div>
            </div>

            <div class="right_reserved">
                <p>©2018 Helperland. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>


<!-- Modal Section  -->

<div class="bg-modal">
    <div class="modal-content_not">
        <p class="edit_service">Edit Service Requests</p>

        <form action="#">

            <div class="row">
                <div class="col-sm-6">
                    <label for="date">Date</label>
                    <div class='input-group date' id='datetimepicker3'>
                        <span class="input-group-addon calendra_box">
                            <span class="calendra_img"> <img src="../assets/images/admin-calendar-blue.png"></span>
                        </span>
                        <input type='text' class="form-control" name="date" placeholder="From date" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="time">Time</label>
                    <div class="mt-2 ml-2">
                        <select name="time" id="time" class="time">
                            <option value="user_type" disabled selected>Select Time</option>
                            <option value="Harsh">10:00</option>
                            <option value="Tatvasoft">12:00</option>
                            <option value="Sparsh">2:00</option>
                        </select>
                    </div>
                </div>
            </div>


            <p class="service_address">Service Address</p>

            <div class="row">
                <div class="col-sm-6 modal_form_address">
                    <label for="street_name">Street Name</label><br>
                    <input type="text" name="street_name" placeholder="Enter your street name">
                </div>
                <div class="col-sm-6 modal_form_address">
                    <label for="house_no">House No</label><br>
                    <input type="text" name="house_no" placeholder="Enter your house no">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 modal_form_address">
                    <label for="postal_code">Postal_code</label><br>
                    <input type="number" name="postal_code" placeholder="Enter your postal code">
                </div>
                <div class="col-sm-6 modal_form_address">
                    <label for="city">City</label><br>
                    <select name="city" id="city">
                        <option value="city" selected disabled>Enter your city</option>
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Vadodara">Vadodara</option>
                        <option value="Surat">Surat</option>
                    </select>
                </div>
            </div>

            <p class="service_address">Invoice Address</p>

            <div class="row">
                <div class="col-sm-6 modal_form_address">
                    <label for="street_name">Street Name</label><br>
                    <input type="text" name="street_name" placeholder="Enter your street name">
                </div>
                <div class="col-sm-6 modal_form_address">
                    <label for="house_no">House No</label><br>
                    <input type="text" name="house_no" placeholder="Enter your house no">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 modal_form_address">
                    <label for="postal_code">Postal_code</label><br>
                    <input type="number" name="postal_code" placeholder="Enter your postal code">
                </div>
                <div class="col-sm-6 modal_form_address">
                    <label for="city">City</label><br>
                    <select name="city" id="city">
                        <option value="city" selected disabled>Enter your city</option>
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Vadodara">Vadodara</option>
                        <option value="Surat">Surat</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="reschedule">Why do you want to reschedule a service request?</label>
                <textarea name="reschedule" id="" rows="2" placeholder="Why do you want to reschedule a service request?" class="modal_textarea"></textarea>
            </div>
            <div>
                <label for="reschedule">Why do you want to reschedule a service request?</label>
                <textarea name="reschedule" id="" rows="2" placeholder="Why do you want to reschedule a service request?" class="modal_textarea"></textarea>
            </div>

            <button type="button" class="modal_btn">Update</button>

            <p class="modal_close">+</p>

        </form>
    </div>
</div>

<?php include "../view/include/admin_footer.php"  ?>