$(function () {
    $('#datetimepicker1').datepicker({
        format: "yyyy/mm/dd",
    });
});

$(function () {
    $('#datetimepicker2').datepicker({
        format: "yyyy/mm/dd",
    });
});

$(function () {
    $('#datetimepicker3').datepicker({
        format: "yyyy-mm-dd",
    });
});

$('.edit_reschedule').click(function () {
    console.log("Show");
    $('.bg-modal').css('display', 'flex');
});

$('.modal_close').click(function () {
    $('.bg-modal').css('display', 'none');
    $('.bg-modal-fp').css('display', 'none');
});

$('#login').click(function () {
    $('.bg-modal').css('display', 'flex');
});

$('#login_fp').click(function () {
    $('.bg-modal').css('display', 'flex');
    $('.bg-modal-fp').css('display', 'none');
});

$('#forgot_password').click(function () {
    $('.bg-modal-fp').css('display', 'flex');
    $('.bg-modal').css('display', 'none');
});

$('#login_create').click(function () {
    $('.bg-modal').css('display', 'flex');
    $('.bg-modal-create').css('display', 'none');
});

$('#create_acc').click(function () {
    $('.bg-modal').css('display', 'none');
    $('.bg-modal-create').css('display', 'flex');
});

$('#become_a_helper').click(function () {
    $('.bg-modal-become-helper').css('display', 'flex');
});

$('.getting_started').click(function () {
    $('.bg-modal-become-helper').css('display', 'none');
});


//Integration ajax

function loadCustomerOption() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadCustomerOptionAdmin",
        success: function (response) {
            $('#CustomerOption').html(response);
        }
    });
}

function loadServiceProviderOption() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadHelpersOptionAdmin",
        success: function (response) {
            $('#serviceProviderOption').html(response);
        }
    });
}

function totalrecord_sm(condition) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=fetchtotalRecord_SM",
        data: {
            reason: condition
        },
        success: function (response) {
            $('#totalrecord_sm').html("Entries Total Record: " + response);
        }
    });
}

function loadadminServiceRequest(validation, offset, limit) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=loadServiceRequestAdmin&parameter=" + offset + "-" + limit,
        data: {
            condition: validation
        },
        success: function (response) {

            $('#admin_service_request').html(response);

            $(".rating_admin").rateYo({
                rating: 3.6,
                starWidth: "20px",
                readOnly: true
            });

            $('.rating_admin').each(function (index, element) {
                // element == this
                classarr = $(this).attr('class').split(' ');
                rating = classarr[1];

                $(this).rateYo("option", "rating", rating);
                // console.log(this);
            });
        }
    });


}

$(document).ready(function () {
    condition = 'S.Status >= 0';
    loadadminServiceRequest(condition, 0, 10);
    totalrecord_sm(condition);

    loadCustomerOption();
    loadServiceProviderOption();
});

$('#entries_sm').change(function (e) {
    e.preventDefault();

    limit = $('#entries_sm').val();

    condition = condition_sm();
    loadadminServiceRequest(condition, 0, limit);


});

$('.clear').click(function (e) {
    e.preventDefault();

    $('#adminServiceRequestForm').trigger('reset');
});

function condition_sm() {

    $('#adminServiceRequest_error').css('display', 'none');

    status_type = $('#status_type').val();
    ServiceProvider = $('#serviceProviderOption').val();
    Customer = $('#CustomerOption').val();
    zipcode = $('#postalcode_adminServiceReq').val();
    serviceid = $('#serviceId_adminServiceReq').val();
    email = $('#email_adminServiceReq').val();
    fromdate = $('#fromdate_adminServiceReq').val();
    todate = $('#todate_adminServiceReq').val();

    // date = date('Y-m-D',strtotime(fromdate));

    // fromdate.format("YYYY-MM-DD");


    // console.log(status_type,ServiceProvider,Customer,zipcode,serviceid,email,fromdate,todate);

    condition = "";
    count = 0;

    if (status_type == null && ServiceProvider == null && Customer == null && zipcode == "" && serviceid == "" && email == "" &&
        fromdate == "" && todate == "") {
        condition += 'S.Status >= 0';
    }

    if (status_type != null) {
        condition += "S.Status = " + status_type;
        count = 1;
    }

    if (ServiceProvider != null) {
        if (count == 0) {
            condition += " S.ServiceProviderId = " + ServiceProvider;
        } else {
            condition += " AND S.ServiceProviderId = " + ServiceProvider;
        }
        count = 1;
    }

    if (Customer != null) {
        if (count == 0) {
            condition += " S.UserId  = " + Customer;
        } else {
            condition += " AND S.UserId  = " + Customer;
        }
        count = 1;
    }

    if (zipcode != "") {

        if (zipcode.toString().length == 6) {
            if (count == 0) {
                condition += " S.ZipCode  = " + zipcode;
            } else {
                condition += " AND S.ZipCode  = " + zipcode;
            }
            count = 1;
        } else {
            $('#adminServiceRequest_error').css('display', 'block');
            condition = 'S.Status >= 0';
            count = 1;
        }
        // console.log(zipcode.toString().length);
    }

    if (serviceid != "") {
        if (count == 0) {
            condition += " S.ServiceId  = " + serviceid;
        } else {
            condition += " AND S.ServiceId  = " + serviceid;
        }
        count = 1;
    }

    if (fromdate != "") {
        if (count == 0) {
            condition += " S.ServiceStartDate  >= '" + fromdate + "'";
        } else {
            condition += " AND S.ServiceStartDate  >= '" + fromdate + "'";
        }
        count = 1;
    }

    if (todate != "") {
        if (count == 0) {
            condition += " S.ServiceStartDate  <= '" + todate + "'";
        } else {
            condition += " AND S.ServiceStartDate  <= '" + todate + "'";
        }
        count = 1;
    }

    if (email != "") {

        if (String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            )) {
            if (count == 0) {
                condition += " U.Email  = '" + email + "'";
            } else {
                condition += " AND U.Email  = '" + email + "'";
            }
            count = 1;
        } else {
            $('#adminServiceRequest_error').css('display', 'block');
            condition = 'S.Status >= 0';
            count = 1;
        }


    }

    console.log(condition);

    return condition;
}

$('#search_sm').click(function (e) {
    e.preventDefault();

    condition = condition_sm();

    limit = $('#entries_sm').val();
    pagination_sm('min');

    loadadminServiceRequest(condition, 0, limit);
    totalrecord_sm(condition)

});

function ServiceDetails(id) {

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=loadEditServiceModalAdmin",
        data: {
            servicerequestid: id
        },
        success: function (response) {
            details = JSON.parse(response);

            $('#edittime_modal').val(details["starttime"]);
            $('#editdate_modal').val(details["date"]);
            $('#streetname_editmodal').val(details["Address2"]);
            $('#houseno_editmodal').val(details["Address1"]);
            $('#zipcode_editmodal').val(details["zipcode"]);
            $('#city_editmodal').val(details["City"]);

            //For further checking
            $('#time_check_editmodal').val(details["starttime"]);
            $('#date_check_editmodal').val(details["date"]);

            $('.requestid_editModal').attr('id', details["id"] + "-editModalId");

            $('.bg-modal').css('display', 'flex');
        }
    });
}

function updateServiceRequestAddress(id) {

    streetname = $('#streetname_editmodal').val();
    houseno = $('#houseno_editmodal').val();
    zipcode = $('#zipcode_editmodal').val();
    city = $('#city_editmodal').val();

    if (streetname == "" || houseno == "" || zipcode == "" || city == "") {
        $('#admin_edit_error').css('display', 'block');
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=updateServiceAddress_Modal",
            data: {
                streetName: streetname,
                houseNo: houseno,
                Zipcode: zipcode,
                City: city,
                serviceid: id
            },
            success: function (response) {

                $('.bg-modal').css('display', 'none');
                $('.bg-modal-fp').css('display', 'none');

                $('#admin_edit_error').css('display', 'none');
                $('#editModalForm').trigger('reset');

                Swal.fire({
                    icon: 'success',
                    title: 'Updated Successfully',
                })
            }
        });
    }



}

function sendMailbyAdmin(id, reason) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=SendMailbyAdminEdit",
        data: {
            servicerequestid: id,
            body: reason
        },
        success: function (response) {
            console.log(response);
        }
    });
}

$('#update_editmodal').click(function (e) {
    e.preventDefault();

    window.scrollTo(0, 0);

    $('#admin_spinner').css('display', 'block');

    id = $('.requestid_editModal').attr('id');
    idarr = id.split("-");
    servicerequestid = parseInt(idarr[0]);

    date1 = $('#editdate_modal').val();
    time1 = $('#edittime_modal').val();

    $reason = $('#reason_editmodal').val();



    timecheck = $('#time_check_editmodal').val();
    datecheck = $('#date_check_editmodal').val();

    if (date1 == datecheck && time1 == timecheck) {
        updateServiceRequestAddress(servicerequestid);
        loadadminServiceRequest('S.Status >= 0', 0, 10);
        sendMailbyAdmin(servicerequestid, $reason);

        $('#admin_spinner').css('display', 'none');
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=isserviceavailable",
            data: {
                date: date1,
                time: time1,
                serviceid: servicerequestid
            },
            success: function (response) {
                console.log(response);
                if (response == 0) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/helperland/index.php?function=setdatetimeservice",
                        data: {
                            date: date1,
                            time: time1,
                            serviceid: servicerequestid
                        },
                        success: function (response) {

                            

                            updateServiceRequestAddress(servicerequestid);
                            loadadminServiceRequest('S.Status >= 0', 0, 10);
                            sendMailbyAdmin(servicerequestid, $reason);

                            $('#editModalForm').trigger('reset');

                            $('#admin_spinner').css('display', 'none');
                        }
                    });
                } else {
                    // $('#reschudele_error').css('display', 'block');
                    $('.bg-modal').css('display', 'none');
                    $('.bg-modal-fp').css('display', 'none');

                    $('#admin_spinner').css('display', 'none');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Already Service is there'
                    })
                }
            }
        });

    }



});


function pagination_sm(textno) {
    limit = $('#entries_sm').val();

    totalentriestext = $('#totalrecord_sm').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    maxpageno = Math.ceil(totalentries / limit);
    currentpageno = parseInt($('.pagejs .active').html());

    condition = condition_sm();

    if ($("#" + textno).length != 0) {
        noarr = textno.split("-");
        textno = parseInt(noarr[0]);
    }

    if ($.isNumeric(textno)) {

        $('.pagejs .active').removeClass('active');

        offset = (textno - 1) * limit;
        loadadminServiceRequest(condition, offset, limit);
        $('#' + textno + '-pagination').addClass('active');
    } else if (textno == "next") {

        if ($('.pagejs .active').hasClass('max-pagination')) {


            if (currentpageno < maxpageno) {
                $('.max-pagination').html(currentpageno + 1);
                $('.max-pagination').attr('id', (currentpageno + 1) + "-pagination");

                $('.min-pagination').html(currentpageno - 2);
                $('.min-pagination').attr('id', (currentpageno - 2) + "-pagination");

                $('.mid1-pagination').html(currentpageno - 1);
                $('.mid1-pagination').attr('id', (currentpageno - 1) + "-pagination");

                $('.mid2-pagination').html(currentpageno);
                $('.mid2-pagination').attr('id', (currentpageno) + "-pagination");

                currentpageno = parseInt($('.pagejs .active').html());
                currentpageno -= 1;
            }
        }

        if (currentpageno < maxpageno) {

            $('.pagejs .active').removeClass('active');
            currentpageno += 1;
            offset = (currentpageno - 1) * limit;
            loadadminServiceRequest(condition, offset, limit);
            $('#' + currentpageno + '-pagination').addClass('active');
        }


    } else if (textno == "back") {

        if ($('.pagejs .active').hasClass('min-pagination')) {
            if (currentpageno > 1) {
                console.log(currentpageno);

                $('.min-pagination').html(currentpageno - 1);
                $('.min-pagination').attr('id', (currentpageno - 1) + "-pagination");

                $('.max-pagination').html(currentpageno + 2);
                $('.max-pagination').attr('id', (currentpageno + 2) + "-pagination");

                $('.mid1-pagination').html(currentpageno);
                $('.mid1-pagination').attr('id', (currentpageno) + "-pagination");

                $('.mid2-pagination').html(currentpageno + 1);
                $('.mid2-pagination').attr('id', (currentpageno + 1) + "-pagination");
            }
        }


        if (currentpageno > 1) {
            $('.pagejs .active').removeClass('active');
            currentpageno -= 1;
            offset = (currentpageno - 1) * limit;
            loadadminServiceRequest(condition, offset, limit);
            $('#' + currentpageno + '-pagination').addClass('active');
        }
    } else if (textno == "max") {

        paginationmaxno = $('.max-pagination').html();

        if (paginationmaxno < maxpageno && currentpageno <= maxpageno) {

            console.log("Hello");
            $('.min-pagination').html(maxpageno - 3);
            $('.min-pagination').attr('id', (maxpageno - 3) + "-pagination");

            $('.max-pagination').html(maxpageno);
            $('.max-pagination').attr('id', (maxpageno) + "-pagination");

            $('.mid1-pagination').html(maxpageno - 2);
            $('.mid1-pagination').attr('id', (maxpageno - 2) + "-pagination");

            $('.mid2-pagination').html(maxpageno - 1);
            $('.mid2-pagination').attr('id', (maxpageno - 1) + "-pagination");

        }

        $('.pagejs .active').removeClass('active');
        offset = (maxpageno - 1) * limit;
        loadadminServiceRequest(condition, offset, limit);
        $('#' + maxpageno + '-pagination').addClass('active');

    } else if (textno == "min") {

        if (currentpageno > 1) {
            $('.min-pagination').html("1");
            $('.min-pagination').attr('id', 1 + "-pagination");

            $('.max-pagination').html("4");
            $('.max-pagination').attr('id', 4 + "-pagination");

            $('.mid1-pagination').html("2");
            $('.mid1-pagination').attr('id', 2 + "-pagination");

            $('.mid2-pagination').html("3");
            $('.mid2-pagination').attr('id', 3 + "-pagination");
        }

        $('.pagejs .active').removeClass('active');
        offset = 0;
        loadadminServiceRequest(condition, offset, limit);
        $('#1-pagination').addClass('active');

    } else {
        console.log("Pagination Error");
    }


}












// Admin User Management

function loadAdminUserManagement(condition, offset, limit) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=loadUserManagAdmin&parameter=" + offset + "-" + limit,
        data: {
            reason: condition
        },
        success: function (response) {
            $('#AdminUserManagementtable').html(response);
        }
    });
}

function loadCustomerNameList() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=fetchCustomerNameList",
        success: function (response) {
            $('#user_name_admin').html(response);
        }
    });
}

function totalrecord_um(condition) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=fetchtotalRecord_UM",
        data: {
            reason: condition
        },
        success: function (response) {
            $('#totalrecord_um').html("Entries Total Record: " + response);
        }
    });
}

//Export table

function loadExportUserManagementTable(condition) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=loadExportUserManagAdmin",
        data: {
            reason: condition
        },
        success: function (response) {
            $('#exportusermanagementTable').html(response);
        }
    });
}

$(document).ready(function () {

    condition = 'UserTypeId < 2';
    loadAdminUserManagement(condition, 0, 10);
    loadCustomerNameList()
    totalrecord_um(condition);
    loadExportUserManagementTable(condition)
});

function UserActiveStatus(userstatus) {
    idarr = userstatus.split("/");
    userid = parseInt(idarr[0]);
    isActive = parseInt(idarr[1]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=ChangeActiveStatus",
        data: {
            Userid: userid,
            ActiveStatus: isActive
        },
        success: function (response) {
            loadAdminUserManagement('UserTypeId < 2', 0, 10);

            pagination_um('min');
        }
    });
}

$('#clear_um').click(function (e) {
    e.preventDefault();

    $('#UserManagementFilterForm').trigger('reset');

});

function condition_um() {

    $('#adminUserManagment_error').css('display', 'none');
    username = $('#user_name_admin').val();
    usertype = $('#user_type_um').val();
    mobile = $('#phone_no_um').val();
    zipcode = $('#postalcode_um').val();
    fromdate = $('#fromdate_um').val();
    todate = $('#todate_um').val();

    console.log(username, usertype, mobile, zipcode, fromdate, todate);

    condition = "";
    count = 0;

    if (username == null && usertype == null && mobile == "" && zipcode == "" && fromdate == "" && todate == "") {
        condition = 'UserTypeId < 2';
    }

    if (username != null) {
        if (count == 0) {
            condition += " UserId = " + username;
        } else {
            condition += " AND UserId = " + username;
        }
        count = 1;
    }

    if (usertype != null) {
        if (count == 0) {
            condition += " UserTypeId = " + usertype;
        } else {
            condition += " AND UserTypeId = " + usertype;
        }
        count = 1;
    }

    if (mobile != "") {

        if (mobile.toString().length == 10) {
            if (count == 0) {
                condition += " Mobile = '" + mobile + "'";
            } else {
                condition += " AND Mobile = '" + mobile + "'";
            }
            count = 1;
        } else {
            $('#adminUserManagment_error').css('display', 'block');
            condition = 'UserTypeId < 2';
            count = 1;
        }

    }

    if (zipcode != "") {

        if (zipcode.toString().length == 6) {
            if (count == 0) {
                condition += " ZipCode = '" + zipcode + "'";
            } else {
                condition += " AND ZipCode = '" + zipcode + "'";
            }
            count = 1;
        } else {
            $('#adminUserManagment_error').css('display', 'block');
            condition = 'UserTypeId < 2';
            count = 1;
        }

    }

    if (fromdate != "") {
        if (count == 0) {
            condition += " CreatedDate >= '" + fromdate + "'";
        } else {
            condition += " AND CreatedDate >= '" + fromdate + "'";
        }
        count = 1;
    }

    if (todate != "") {
        if (count == 0) {
            condition += " CreatedDate <= '" + todate + "'";
        } else {
            condition += " AND CreatedDate <= '" + todate + "'";
        }
        count = 1;
    }

    console.log(condition);

    return condition;
}

$('#search_um').click(function (e) {
    e.preventDefault();

    condition = condition_um();

    limit = $('#entries_um').val();
    pagination_um('min');

    loadAdminUserManagement(condition, 0, limit);
    totalrecord_um(condition);
    loadExportUserManagementTable(condition)

});

$('#entries_um').change(function (e) {
    e.preventDefault();

    limit = $('#entries_um').val();
    loadAdminUserManagement('UserTypeId < 2', 0, limit);

});

function pagination_um(textno) {
    limit = $('#entries_um').val();

    totalentriestext = $('#totalrecord_um').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    maxpageno = Math.ceil(totalentries / limit);
    currentpageno = parseInt($('.pagejs .active').html());

    condition = condition_um();

    if ($("#" + textno).length != 0) {
        noarr = textno.split("-");
        textno = parseInt(noarr[0]);
    }

    if ($.isNumeric(textno)) {

        $('.pagejs .active').removeClass('active');

        offset = (textno - 1) * limit;
        loadAdminUserManagement(condition, offset, limit);
        $('#' + textno + '-pagination').addClass('active');
    } else if (textno == "next") {

        if ($('.pagejs .active').hasClass('max-pagination')) {


            if (currentpageno < maxpageno) {
                $('.max-pagination').html(currentpageno + 1);
                $('.max-pagination').attr('id', (currentpageno + 1) + "-pagination");

                $('.min-pagination').html(currentpageno - 2);
                $('.min-pagination').attr('id', (currentpageno - 2) + "-pagination");

                $('.mid1-pagination').html(currentpageno - 1);
                $('.mid1-pagination').attr('id', (currentpageno - 1) + "-pagination");

                $('.mid2-pagination').html(currentpageno);
                $('.mid2-pagination').attr('id', (currentpageno) + "-pagination");

                currentpageno = parseInt($('.pagejs .active').html());
                currentpageno -= 1;
            }
        }

        if (currentpageno < maxpageno) {

            $('.pagejs .active').removeClass('active');
            currentpageno += 1;
            offset = (currentpageno - 1) * limit;
            loadAdminUserManagement(condition, offset, limit);
            $('#' + currentpageno + '-pagination').addClass('active');
        }


    } else if (textno == "back") {

        if ($('.pagejs .active').hasClass('min-pagination')) {
            if (currentpageno > 1) {
                console.log(currentpageno);

                $('.min-pagination').html(currentpageno - 1);
                $('.min-pagination').attr('id', (currentpageno - 1) + "-pagination");

                $('.max-pagination').html(currentpageno + 2);
                $('.max-pagination').attr('id', (currentpageno + 2) + "-pagination");

                $('.mid1-pagination').html(currentpageno);
                $('.mid1-pagination').attr('id', (currentpageno) + "-pagination");

                $('.mid2-pagination').html(currentpageno + 1);
                $('.mid2-pagination').attr('id', (currentpageno + 1) + "-pagination");
            }
        }


        if (currentpageno > 1) {
            $('.pagejs .active').removeClass('active');
            currentpageno -= 1;
            offset = (currentpageno - 1) * limit;
            loadAdminUserManagement(condition, offset, limit);
            $('#' + currentpageno + '-pagination').addClass('active');
        }
    } else if (textno == "max") {

        paginationmaxno = $('.max-pagination').html();

        if (paginationmaxno < maxpageno && currentpageno <= maxpageno) {

            console.log("Hello");
            $('.min-pagination').html(maxpageno - 3);
            $('.min-pagination').attr('id', (maxpageno - 3) + "-pagination");

            $('.max-pagination').html(maxpageno);
            $('.max-pagination').attr('id', (maxpageno) + "-pagination");

            $('.mid1-pagination').html(maxpageno - 2);
            $('.mid1-pagination').attr('id', (maxpageno - 2) + "-pagination");

            $('.mid2-pagination').html(maxpageno - 1);
            $('.mid2-pagination').attr('id', (maxpageno - 1) + "-pagination");

        }

        $('.pagejs .active').removeClass('active');
        offset = (maxpageno - 1) * limit;
        loadAdminUserManagement(condition, offset, limit);
        $('#' + maxpageno + '-pagination').addClass('active');

    } else if (textno == "min") {

        if (currentpageno > 1) {
            $('.min-pagination').html("1");
            $('.min-pagination').attr('id', 1 + "-pagination");

            $('.max-pagination').html("4");
            $('.max-pagination').attr('id', 4 + "-pagination");

            $('.mid1-pagination').html("2");
            $('.mid1-pagination').attr('id', 2 + "-pagination");

            $('.mid2-pagination').html("3");
            $('.mid2-pagination').attr('id', 3 + "-pagination");
        }

        $('.pagejs .active').removeClass('active');
        offset = 0;
        loadAdminUserManagement(condition, offset, limit);
        $('#1-pagination').addClass('active');

    } else {
        console.log("Pagination Error");
    }


}

//Export in Admin User Management

$('#export_um').click(function (e) {
    e.preventDefault();

    let data = document.getElementById('exportusermanagementTable');
    var fp = XLSX.utils.table_to_book(data, {
        sheet: 'Sheet1'
    });

    XLSX.write(fp, {
        bookType: 'xlsx',
        type: 'base64'
    });
    XLSX.writeFile(fp, 'Service History(Admin).xlsx');

});

//Refund Amount

function RefundDetails(id) {
    // console.log(id);

    $('#refund_amount_error').css('display', 'none');

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=fetchrefundmodaldetails",
        data: {
            serviceRequestId: id
        },
        success: function (response) {
            Refunddetails = JSON.parse(response);

            console.log(Refunddetails);

            $('#totalAmount_RM').html(Refunddetails["totalcost"] + "€");

            if (Refunddetails["refundAmount"] == null) {
                $('#refundedAmount_RM').html(0 + "€");
            } else {
                $('#refundedAmount_RM').html(Refunddetails["refundAmount"] + "€");
            }



            availablebalance = Refunddetails["totalcost"] - Refunddetails["refundAmount"];
            $('#AvailableBalance_RM').html(availablebalance + "€");

            $('.refund_id').attr('id', id + "-refundid")
        }
    });
}

$('#amount_enter').change(function (e) {
    e.preventDefault();

    amount = $('#amount_enter').val();
    format = $('#format_amount_enter').val();
    if (format == 2) {
        $('#calculate_value').val(amount);
    } else {
        availablebalance = $('#AvailableBalance_RM').html();
        availablebalance_arr = availablebalance.split('€');
        calculatevalue_per = parseFloat(availablebalance_arr[0]);

        calculatevalue = (amount / 100) * calculatevalue_per;

        $('#calculate_value').val(calculatevalue);
    }

});

$('#refund_modal').click(function (e) {
    e.preventDefault();


    id = $('.refund_id').attr('id');
    id_arr = id.split("-");
    refundid = parseInt(id_arr[0]);

    refundAmount = parseFloat($('#calculate_value').val());

    refundedAmount = $('#refundedAmount_RM').html();
    refundedAmount_arr = refundedAmount.split("€");
    refundNo = parseFloat(refundedAmount_arr[0]);

    totalrefund = refundAmount + refundNo;

    totalAmount = $('#totalAmount_RM').html();
    totalAmount_arr = totalAmount.split("€");
    totalNo = parseFloat(totalAmount_arr[0]);

    if (totalrefund < totalNo) {

        $('#refund_amount_error').css('display', 'none');

        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=updaterefundvalue",
            data: {
                serviceRequestId: refundid,
                refunded_amount: totalrefund
            },
            success: function (response) {
                $('#redund_modal').modal('hide');
                $('#refund_form').trigger('reset');
            }
        });

    } else {
        $('#refund_amount_error').css('display', 'block');
    }


});




// Navbar Change 

function changeBg() {
    var scrollValue = window.scrollY;
    // console.log(scrollValue);

    var navbar = document.getElementById("header");
    $('#header').css('background-color', 'transparent');

    if (scrollValue > 80) {
        navbar.classList.add('bgcolor');
        $('.logo img').css('height', '74px');
        $('.logo img').css('width', '100px');
        $('.nav_option ul li').css('margin', '15px 10px 0px');
        $('.arrow_down_nav').css('margin', '5px 20px 5px -22px');
        // $('#header').css('background-color','#525252');
        $('#header').css('background-color', 'rgba(82,82,82,0.9)');
    } else {
        navbar.classList.remove('bgcolor');
        $('.logo img').css('height', '102px');
        $('.logo img').css('width', '138px');
        $('.nav_option ul li').css('margin', '43px 10px 0px');
        $('#header').css('background-color', 'transparent');
    }
}

window.addEventListener('scroll', changeBg);