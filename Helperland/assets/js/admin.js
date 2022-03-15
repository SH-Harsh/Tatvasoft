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
    $('#datetimepicker3').datepicker();
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

function ServiceDetails(){
    $('.bg-modal').css('display', 'flex');
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