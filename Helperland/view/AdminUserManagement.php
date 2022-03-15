<?php include "view/include/admin_header.php" ?>

<!-- Navigation bar  -->
<?php include "view/include/admin_navigation.php" ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 left_menu_box">
            <div>
                <a href="http://localhost/helperland/?function=adminServiceRequest">
                    <p class="left_menu">Service Requests</p>
                </a>
            </div>
            <div>
                <a href="#" class="active">
                    <p class="left_menu">User Management</p>
                </a>
            </div>
        </div>
        <div class="col-sm-10 border admin_right_section">
            <div>
                <p class="user_manage">User Management</p>
                <button type="button" class="new_user_btn">
                    <img src="assets/images/add.png">
                    <span class="add_user">Add New User</span>
                </button>
            </div>

            <!-- Form  -->
            <div class="form_box">
                <form action="#" class="flex-container">
                    <div class="mr-2 mt-2">
                        <select name="user_name" id="user_name" class="user_name">
                            <option value="user_name" disabled selected>Select User Name</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <select name="user_type" id="user_type" class="user_name">
                            <option value="user_type" disabled selected>User Type</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <span class="pre_no">
                            <span>+49</span>
                        </span>
                        <input type="number" placeholder="Phone Number" class="phone_no" style="width: 160px;">
                    </div>

                    <div class="mr-2 mt-2" style="width: 121px;">
                        <input type="number" placeholder="Postal Code" class="postal_code">
                    </div>



                    <div class="form-group mr-2 mt-2" style="width: 150px;">
                        <div class='input-group date' id='datetimepicker1' class="date">
                            <span class="input-group-addon calendra_box">
                                <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
                            </span>
                            <input type='text' class="form-control" placeholder="From date" />
                        </div>
                    </div>

                    <div class="form-group mr-2 mt-2" style="width: 140px;">
                        <div class='input-group date' id='datetimepicker2' class="date">
                            <span class="input-group-addon calendra_box">
                                <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
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

            <div class="export">
                <button type="button" class="Search">Export</button>
            </div>

            <!-- Right Table  -->
            <div class="right_table">

                <table style="width:100%;">
                    <tr class="table_heading">
                        <th>UserName</th>
                        <th>Role</th>
                        <th>Date of Registration</th>
                        <th>User Type</th>
                        <th>Phone</th>
                        <th>Postal Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr class="table_row">
                        <td>Lyum watson</td>
                        <td>Inquiry Manager</td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Customer</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>Vishal Shah</td>
                        <td></td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Customer</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>John Smith</td>
                        <td>Inquiry Manager</td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Service Provider</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>John Smith</td>
                        <td>Content Manager</td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Service Provider</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>John Smith</td>
                        <td></td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Service Provider</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status_inactive">
                                <p class="active">Inactive</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>John Smith</td>
                        <td>Finance Manager</td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Customer</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>John Smith</td>
                        <td></td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Service Provider</td>
                        <td>1234567890</td>
                        <td>123456</td>
                        <td>
                            <div class="status_inactive">
                                <p class="active">Inactive</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="table_row">
                        <td>John Smith</td>
                        <td>Inquiry Manager</td>
                        <td class="status_box">
                            <p>
                                <img src="assets/images/calendar2.png">
                                <span>13/03/2020</span>
                            </p>
                        </td>
                        <td>Customer</td>
                        <td>1234567890</td>
                        <td></td>
                        <td>
                            <div class="status">
                                <p class="active">Active</p>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/show-more-button-with-three-dots.png" width="20px" height="20px">
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Paginatiion  -->
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
                        <a href="#"><img src="assets/images/first-page.png"></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                    </div>
                </div>
            </div>

            <div class="right_reserved">
                <p>©2018 Helperland. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>


<?php include "view/include/admin_footer.php"  ?>