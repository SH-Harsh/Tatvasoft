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

function loadadminServiceRequest(validation) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=loadServiceRequestAdmin",
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

    loadCustomerOption();
    loadServiceProviderOption()
}

$(document).ready(function () {
    condition = 'S.Status >= 0';
    loadadminServiceRequest(condition);
});

$('.clear').click(function (e) {
    e.preventDefault();

    $('#adminServiceRequestForm').trigger('reset');
});

$('.Search').click(function (e) {
    e.preventDefault();

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
        if (count == 0) {
            condition += " S.ZipCode  = " + zipcode;
        } else {
            condition += " AND S.ZipCode  = " + zipcode;
        }
        count = 1;
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
        if (count == 0) {
            condition += " U.Email  = '" + email + "'";
        } else {
            condition += " AND U.Email  = '" + email + "'";
        }
        count = 1;
    }

    // console.log(condition);

    loadadminServiceRequest(condition);

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

            Swal.fire({
                icon: 'success',
                title: 'Updated Successfully',
            })
        }
    });

}

function sendMailbyAdmin(id,reason){
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=SendMailbyAdminEdit",
        data: {
            servicerequestid : id,
            body : reason
        },
        success: function (response) {
            console.log(response);
        }
    });
}

$('#update_editmodal').click(function (e) {
    e.preventDefault();

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
        loadadminServiceRequest('S.Status >= 0');
        sendMailbyAdmin(servicerequestid,$reason);
        $('#editModalForm').trigger('reset');
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
                            loadadminServiceRequest('S.Status >= 0');
                            sendMailbyAdmin(servicerequestid,$reason);

                            $('#editModalForm').trigger('reset');
                        }
                    });
                } else {
                    // $('#reschudele_error').css('display', 'block');
                    $('.bg-modal').css('display', 'none');
                    $('.bg-modal-fp').css('display', 'none');

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







// Admin User Management

function loadAdminUserManagement() {
    $.ajax({
        // type: "method",
        url: "http://localhost/helperland/index.php?function=loadUserManagAdmin",
        // data: "data",
        success: function (response) {
            $('#AdminUserManagementtable').html(response);
        }
    });
}

$(document).ready(function () {
    loadAdminUserManagement();
});

function UserActiveStatus(userstatus){
    idarr = userstatus.split("/");
    userid = parseInt(idarr[0]);
    isActive = parseInt(idarr[1]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=ChangeActiveStatus",
        data: {
           Userid : userid,
           ActiveStatus : isActive 
        },
        success: function (response) {
            loadAdminUserManagement();
        }
    });
}







// Navbar Change 

// function changeBg(){
//     var scrollValue = window.scrollY;
//     // console.log(scrollValue);

//     var navbar = document.getElementById("header");
//     $('#header').css('background-color','transparent');

//     if(scrollValue > 80){
//         navbar.classList.add('bgcolor');
//         $('.logo img').css('height', '74px');
//         $('.logo img').css('width', '100px');
//         $('.nav_option ul li').css('margin', '15px 10px 0px');
//         $('.arrow_down_nav').css('margin', '5px 20px 5px -22px');
//         // $('#header').css('background-color','#525252');
//         $('#header').css('background-color','rgba(82,82,82,0.9)');
//     }else{
//         navbar.classList.remove('bgcolor');
//         $('.logo img').css('height', '102px');
//         $('.logo img').css('width', '138px');
//         $('.nav_option ul li').css('margin', '43px 10px 0px');
//         $('#header').css('background-color','transparent');
//     }
// }

// window.addEventListener('scroll',changeBg);