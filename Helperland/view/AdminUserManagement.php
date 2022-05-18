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
                <div class="alert alert-danger" role="alert" id="adminUserManagment_error" style="display: none;">
                    Enter the details in correct format
                </div>
                <form action="#" class="flex-container" id="UserManagementFilterForm">
                    <div class="mr-2 mt-2">
                        <select name="user_name" id="user_name_admin" class="user_name">
                            <option value="user_name" disabled selected>Select User Name</option>
                            <option value="Harsh">Harsh</option>
                            <option value="Tatvasoft">Tatvasoft</option>
                            <option value="Sparsh">Sparsh</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <select name="user_type" id="user_type_um" class="user_name">
                            <option value="user_type" disabled selected>User Type</option>
                            <option value=0>Service Provider</option>
                            <option value=1>Customer</option>
                        </select>
                    </div>

                    <div class="mr-2 mt-2">
                        <span class="pre_no">
                            <span>+91</span>
                        </span>
                        <input type="number" placeholder="Phone Number" class="phone_no" id="phone_no_um" style="width: 160px;">
                    </div>

                    <div class="mr-2 mt-2" style="width: 121px;">
                        <input type="number" placeholder="Postal Code" class="postal_code" id="postalcode_um">
                    </div>



                    <div class="form-group mr-2 mt-2" style="width: 150px;">
                        <div class='input-group date' id='datetimepicker1' class="date">
                            <span class="input-group-addon calendra_box">
                                <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
                            </span>
                            <input type='text' class="form-control" id="fromdate_um" placeholder="From date" />
                        </div>
                    </div>

                    <div class="form-group mr-2 mt-2" style="width: 140px;">
                        <div class='input-group date' id='datetimepicker2' class="date">
                            <span class="input-group-addon calendra_box">
                                <span class="calendra_img"> <img src="assets/images/admin-calendar-blue.png"></span>
                            </span>
                            <input type='text' class="form-control" id="todate_um" placeholder="To date" />
                        </div>
                    </div>

                    <div class="mr-2 mt-2">
                        <button type="button" class="Search" id="search_um">Search</button>
                    </div>

                    <div class="mr-2 mt-2">
                        <button type="button" id="clear_um" class="clear">Clear</button>
                    </div>

                </form>
            </div>

            <div class="export">
                <button type="button" class="Search" id="export_um">Export</button>
            </div>

            <!-- Right Table  -->
            <div class="right_table">

                <table style="width:100%;" id="AdminUserManagementtable">
                    <!-- <tr class="table_heading">
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
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Deactive</a>
                                    <a class="dropdown-item" href="#">Service History</a>
                                </div>
                            </div>
                        </td>
                    </tr> -->
                </table>

                <!-- Paginatiion  -->
                <div class="pages">
                    <p class="show">Show</p>

                    <select name="entries" id="entries_um" class="entries">
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

                    <p class="show" style="margin-left: 5px;" id="totalrecord_um">Entries Total Record: 55</p>

                    <div class="pagination pagejs">
                        <a onclick="pagination_um('min')"><img src="assets/images/first-page.png"></a>
                        <a onclick="pagination_um('back')"><img src="assets/images/keyboard-right-arrow.png"></a>
                        <a onclick="pagination_um(id)" class="active min-pagination" id="1-pagination">1</a>
                        <a onclick="pagination_um(id)" class="mid1-pagination" id="2-pagination">2</a>
                        <a onclick="pagination_um(id)" class="mid2-pagination" id="3-pagination">3</a>
                        <a onclick="pagination_um(id)" id="4-pagination" class="max-pagination">4</a>
                        <a onclick="pagination_um('next')"><img src="assets/images/keyboard-right-arrow.png" style="transform: rotate(180deg);"></a>
                        <a onclick="pagination_um('max')"><img src="assets/images/first-page.png" style="transform: rotate(180deg);"></a>
                    </div>
                </div>

                <!-- Export table  -->
                <table id="exportusermanagementTable" style="display: none;">
                </table>
            </div>

            <div class="right_reserved">
                <p>©2018 Helperland. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>


<?php include "view/include/admin_footer.php"  ?>