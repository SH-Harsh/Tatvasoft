$('#check_availability').click(function (e) {
    e.preventDefault();

    var postalcode = $('#postalcode_aj').val().trim();

    if (postalcode == "") {
        $('#postalerror').html("Please Enter Value");
    } else if (postalcode.length != 6) {
        $('#postalerror').html("Postal Code must have six numbers");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=postalcodevalidation",
            data: {
                code: postalcode
            },
            success: function (response) {
                if (response == 1) {
                    $('#postalform').trigger("reset");
                    $('#postalerror').html("We are not providing service in this area. Well notify you if any helper would start working near your area.");
                } else {
                    postalvalidation();
                    var splitted = response.split("|");
                    $('#postalcode_yd').val(splitted[0]);
                    $('#city_yd').val(splitted[1]);
                }
            }
        });
    }
});

$('#continue_schedulePlan').click(function (e) {
    e.preventDefault();

    schedulePlan();

    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadaddress",
        success: function (response) {
            $('#user_address_aj').html(response);
        }
    });

    $.ajax({
        url: "http://localhost/helperland/index.php?function=favourite_service_provider",
        success: function (response) {
            $('#fav_service_provider_box').html(response);
        }
    });

});

$('#save_address_btn').click(function (e) {
    e.preventDefault();

    var streetname = $('#street_name_yd').val().trim();
    var houseno = $('#house_no_yd').val().trim();
    var postalcode = $('#postalcode_yd').val().trim();
    var city = $('#city_yd').val().trim();
    var phone_no = $('#phoneno_yd').val().trim();

    if (streetname == "" || houseno == "" || postalcode == "" || city == "" || phone_no == "") {
        $('#add_new_address_error').html("Please Enter all Value");
    } else if (postalcode.length != 6) {
        $('#add_new_address_error').html("Postal Code must have 6 numbers");
    } else if (phone_no.length != 10) {
        $('#add_new_address_error').html("Phone No must have 10 numbers");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=insertaddress",
            data: {
                street_name_yd: streetname,
                house_no_yd: houseno,
                postalcode_yd: postalcode,
                city_yd: city,
                phoneno_yd: phone_no
            },
            success: function (response) {
                console.log(response);
                $('#addnewaddress_form').trigger("reset");
                $('.add_new_address').css('display', 'none');
                $('.add_address').css('display', 'block');

                $('#user_address_aj').html(response);
            }
        });
    }



});

$('#continue_details').click(function (e) {
    e.preventDefault();

    addressid = $("input:radio[name=address]:checked").attr('id');

    console.log(addressid);
    if (addressid == undefined) {
        // alert("Please select the address");
        $('#address_alert').css('display', 'block');
        window.scrollTo(0, 300);
    } else {
        $('#address_alert').css('display', 'none');
        yoursdetails();
    }


});

$('#complete_booking').click(function (e) {
    e.preventDefault();

    creditcardno = $('#creditcardno').val().trim();
    creditcardexpiry = $('#creditcardexpiry').val().trim();
    creditcardcvc = $('#creditcardcvc').val().trim();
    promo_code = $('#promo_code').val().trim();

    if (creditcardno == "" || creditcardexpiry == "" || creditcardcvc == "") {
        alert("Please Enter all details")
    } else if (creditcardno.length != 16 || creditcardexpiry.length != 4 ||
        creditcardcvc.length != 3) {
        alert("Please Enter all the details properly");
    } else {

        var date = $('#date_sr').val();
        var time = $('#service_time').val();
        var duration = $('#service_duration').val();
        var comments = $('#comments').val();
        if ($("#pets").is(":checked")) {
            pets = 1;
        } else {
            pets = 0;
        }
        var extraservice = [];
        $("input:checkbox[name=extraservice]:checked").each(function () {
            extraservice.push($(this).val());
        });

        if (extraservice.length == 0) {
            extraservice.push(0);
        }

        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=schedule_plan",
            data: {
                date_sr: date,
                time_sr: time,
                duration_sr: duration,
                pets: pets,
                comments: comments,
                extraservice: extraservice
            },
            success: function (response) {

                console.log(response);

                addressid = $("input:radio[name=address]:checked").attr('id');

                id_arr = addressid.split("-");

                $.ajax({
                    type: "POST",
                    url: "http://localhost/helperland/index.php?function=insertServiceRequestAddress",
                    data: {
                        addressid: id_arr[0]
                    },
                    success: function (response) {
                        $('.request_id').html("Service Request Id: ".concat(response));
                        $('#complete_booking_modal').modal('show');
                    }
                });
            }
        });

        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=sendEmailtoProvider",
            success: function (response) {

            }
        });

    }

});


// Customer Service History 

//Average Rating Function

function setAvgRating(id, className) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=averageRating",
        data: {
            serviceProviderId: id
        },
        success: function (response) {
            console.log(className, response);
            $("." + className).rateYo("option", "rating", response);
        }
    });
}



//Load dashboard

function loaddashboard(offset, limit) {
    $.ajax({
        // type: "method",
        url: "http://localhost/helperland/index.php?function=fetchcurrentservicerequest&parameter=" + offset + "-" + limit,
        success: function (response) {
            // console.log(response);
            $('.dashboard_table').html(response);
            $('.avg_rating_serprovider').rateYo({
                rating: 1,
                starWidth: "20px",
                readOnly: true
            });

            $('.avg_rating_serprovider').each(function (i, obj) {

                class_str = $(this).attr('class');
                class_arr = class_str.split(" ");
                id_arr = class_arr[1].split("-");
                id = parseInt(id_arr[0]);
                console.log(class_arr[1]);

                setAvgRating(id, class_arr[1]);
            });
        },
        error: function (e) {
            console.log(e);
        }
    });
}

function dashboardtotalentries() {

    $.ajax({
        url: "http://localhost/helperland/index.php?function=fetchtotalentriesdashboard",
        success: function (response) {
            $('#totalRecord_dashboard').html("Total Record: " + response);
        }
    });

}

$('.dashboard_tab').click(function (e) {
    e.preventDefault();

    $('#entries_dashboard').val(2);
    loaddashboard(0, 2);
    dashboardtotalentries();

});


function rescheduleclick(id) {
    // console.log(id);
    $('#reschudele_error').css('display', 'none');

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=fetchdatetimeservice",
        data: {
            serviceid: id
        },
        success: function (response) {

            datetime = response.split("|");
            $('#rescheduledate').val(datetime[0]);
            $('#inputState').val(datetime[1]);
        },
        error: function (e) {
            console.log(e);
        }
    });

    $('.test').attr('id', id);
}

$('#reschudele_update').click(function () {

    id = $('.test').attr('id');

    date1 = $('#rescheduledate').val();
    time1 = $('#inputState').val();

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=isserviceavailable",
        data: {
            date: date1,
            time: time1,
            serviceid: id
        },
        success: function (response) {
            if (response == 0) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/helperland/index.php?function=setdatetimeservice",
                    data: {
                        date: date1,
                        time: time1,
                        serviceid: id
                    },
                    success: function (response) {
                        $('#reschudele_error').css('display', 'none');

                        $('#Reschudule').modal('hide');
                        $('.show').remove('.modal-backdrop');
                        loaddashboard(0, 2);
                        console.log(response);
                    }
                });
            } else {
                $('#reschudele_error').css('display', 'block');
            }
        }
    });

});

function cancelservice($servicerequestid) {
    $('.cancelserviceid').attr('id', $servicerequestid);
}

$('#cancelServiceRequest').click(function () {
    id = $('.cancelserviceid').attr('id');
    comments = $('#comment_textarea').val();

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=deleteservicerequest",
        data: {
            serviceid: id,
            comment: comments
        },
        success: function (response) {
            console.log(response);
        }
    });

    dashboardtotalentries();
    $('#pageno').html(1)
    loaddashboard(0, 2);



});

// Dashboard Modal 

function dashboardmodal(servicerequestid) {


    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=servicerequestdetails",
        data: {
            id: servicerequestid
        },
        success: function (response) {
            var servicedetails = JSON.parse(response);
            console.log(servicedetails);

            $('#dashboard_serviceid').html("Service Id: " + servicedetails["ServiceId"]);
            $('#servicedetailsdatetime').html(servicedetails["date"] + " " + servicedetails["starttime"] + "-" + servicedetails["endtime"]);
            $('#servicedetails_duration').html("Duration: " + servicedetails["duration"]);

            $('.amount_paid').html("&nbsp; &nbsp; &nbsp;" + servicedetails["TotalCost"] + "€");

            $('#servicedetails_comments').html("Comment: " + servicedetails["Comments"]);

            if (servicedetails["HasPets"] == 0) {
                $('#servicedetails_pets').html("<img  src='assets/images/not-included.png' style='width: 20px;height: 20px;'>  I don't have pets at home.");
            } else {
                $('#servicedetails_pets').html("<img  src='assets/images/included.png' style='width: 20px;height: 20px;'> I have pets at home.");
            }

            extraservice = "Extras: ";
            if (servicedetails["ExtraService"][0] == 0) {
                $('#dashboard_extraservice').html(extraservice);
            } else {
                servicedetails["ExtraService"].forEach(element => {
                    extraservice += element + ", ";
                });
                $('#dashboard_extraservice').html(extraservice);
            }

            $('#dashboard_serviceaddress').html("Service Address: " + servicedetails["AddressLine1"] + " " + servicedetails["AddressLine2"] +
                ", " + servicedetails["City"] + " " + servicedetails["State"] + ", " + servicedetails["PostalCode"]);

            $('#dashboard_customername').html("Customer Name: " + servicedetails["customername"]);

            $('#dashboard_modal').modal('show');

            $('.reschudule_setid').attr('id', servicedetails["servicerequestid"]);
        }
    });
}

$('#dashboard_reschedule').click(function (e) {
    e.preventDefault();

    id = $('.reschudule_setid').attr('id');
    $('#dashboard_modal').modal('hide');

    rescheduleclick(id);

});

$('#dashboard_cancel').click(function (e) {
    e.preventDefault();

    id = $('.reschudule_setid').attr('id');
    $('#dashboard_modal').modal('hide');

    cancelservice(id);

});

$('#entries_dashboard').change(function () {
    limit = $('#entries_dashboard').val();
    loaddashboard(0, limit);
    $('#pageno').html(1);
});

function paginationno(textno) {
    limit = $('#entries_dashboard').val();

    totalentriestext = $('#totalRecord_dashboard').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    currentpageno = parseInt($('#pageno').html());

    maxpageno = Math.ceil(totalentries / limit);
    if (textno == 'next') {
        currentpageno += 1;

        if (currentpageno <= maxpageno) {
            $('#pageno').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loaddashboard(offset, limit);
        }
    } else if (textno == 'back') {
        currentpageno -= 1;

        if (currentpageno > 0) {
            $('#pageno').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loaddashboard(offset, limit);
        }
    } else if (textno == 'max') {
        $('#pageno').html(maxpageno);

        offset = (currentpageno - 1) * limit;
        loaddashboard(offset, limit);

    } else if (textno == 'min') {
        $('#pageno').html(1);

        offset = (currentpageno - 1) * limit;
        loaddashboard(offset, limit);
    } else {
        console.log("Error in Pagination");
    }
}


// Service History 

function loadserviceHistory(offset, limit) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=fetchServiceHistory&parameter=" + offset + "-" + limit,
        success: function (response) {
            // console.log(response);
            $('#ServiceHistory').html(response);

            $('.servicehistory_rating').rateYo({
                rating: 1,
                starWidth: "15px",
                readOnly: true
            });

            $('.servicehistory_rating').each(function (i, obj) {

                id = $(this).attr('id');
                servicerequestid_arr = id.split('-');
                servicerequestid = servicerequestid_arr[0];

                $.ajax({
                    type: "POST",
                    url: "http://localhost/helperland/index.php?function=getrating",
                    data: {
                        serviceRequestId: servicerequestid
                    },
                    success: function (response) {
                        id_rating_arr = response.split('|');
                        rating = id_rating_arr[0];
                        id = id_rating_arr[1];
                        $('#' + id + '-ratings').rateYo("option", "rating", rating);
                    }
                });
            });
        }
    });
}

function servicehistorytotalentries() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=fetchtotalentriesservicehistory",
        success: function (response) {
            $('#totalRecord_servicehistory').html("Total Record: " + response);
        }
    });
}

$(document).ready(function () {
    loadserviceHistory(0, 2);
    servicehistorytotalentries()
});

$('.service_history_tab').click(function (e) {
    e.preventDefault();

    loadserviceHistory(0, 2);
});



function pagination_serviceHistory(textno) {
    limit = $('#entries_servicehistory').val();

    totalentriestext = $('#totalRecord_servicehistory').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    maxpageno = Math.ceil(totalentries / limit);
    currentpageno = parseInt($('.pagejs .active').html());

    if ($("#" + textno).length != 0) {
        noarr = textno.split("-");
        textno = parseInt(noarr[0]);
    }

    if ($.isNumeric(textno)) {

        $('.pagejs .active').removeClass('active');

        offset = (textno - 1) * limit;
        loadserviceHistory(offset, limit);
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
            loadserviceHistory(offset, limit);
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
            loadserviceHistory(offset, limit);
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
        loadserviceHistory(offset, limit);
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
        loadserviceHistory(offset, limit);
        $('#1-pagination').addClass('active');

    } else {
        console.log("Pagination Error");
    }


}

$('#entries_servicehistory').change(function (e) {
    e.preventDefault();

    // limit = $('#entries_servicehistory').val();
    // loadserviceHistory(0, limit);

    pagination_serviceHistory("min");
});



// Export Into Sheet 

$(document).ready(function () {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=fetchfullservicehistory",
        success: function (response) {
            $('#ExportServiceHistory').html(response);
        }
    });
});


$('#Export_table').click(function (e) {
    e.preventDefault();

    let data = document.getElementById('ExportServiceHistory');
    var fp = XLSX.utils.table_to_book(data, {
        sheet: 'Sheet1'
    });
    XLSX.write(fp, {
        bookType: 'xlsx',
        type: 'base64'
    });
    XLSX.writeFile(fp, 'Service History.xlsx');
});

//Star Rating

function ratingclick(servicerequestid, serviceproviderid) {

    $.ajax({
        method: "POST",
        url: "http://localhost/helperland/index.php?function=setratingmodal",
        data: {
            serviceProviderId: serviceproviderid
        },
        success: function (response) {
            arr = response.split("|");
            $('.rating_name_modal').html(arr[0]);
            $('#rating_logo').attr('src', 'assets/images/' + arr[1]);
        }
    });

    $('.rating_serviceid').attr('id', servicerequestid + "/" + serviceproviderid);
}

$('#rating_submit').click(function (e) {
    e.preventDefault();

    idarr = $('.rating_serviceid').attr('id').split("/");
    serviceid = idarr[0];
    serviceproviderid = idarr[1];
    feedback = $('#rating_textarea').val();
    timeArrivalRating = parseFloat($('.rating_value').html());
    friendlyRating = parseFloat($('.rating_value1').html());
    QualityRating = parseFloat($('.rating_value2').html());
    rating = parseFloat($('#average_rating_value').html());

    if (serviceproviderid != undefined) {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=setrating",
            data: {
                id: serviceid,
                serviceprovider_id: serviceproviderid,
                service_feedback: feedback,
                timeArrival: timeArrivalRating,
                friendly: friendlyRating,
                quality: QualityRating,
                rating_service: rating
            },
            success: function (response) {
                ratings_id_arr = response.split("|");
                $("#" + ratings_id_arr[0] + "-ratings").rateYo("option", "rating", ratings_id_arr[1]);
            }
        });
    }
});


// My Setting of Customer 

function setting_load_address() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadsettingaddress",
        success: function (response) {
            $('.address_table').html(response);
        }
    });
}

function setting_set_details() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=getdetails",
        success: function (response) {
            var userdetails = JSON.parse(response);
            console.log(userdetails);

            $('#mysetting_fname').val(userdetails['FirstName']);
            $('#mysetting_lname').val(userdetails['LastName']);
            $('#mysetting_email').val(userdetails['Email']);
            $('#mysetting_phoneno').val(userdetails['Mobile']);
            // $('#mysetting_email').val(userdetails['Email']);
        }
    });
}


$('#MySettings').click(function () {

    setting_set_details();
    setting_load_address();
});

$('#updatedetails_submit').click(function (e) {
    e.preventDefault();

    fname = $('#mysetting_fname').val();
    lname = $('#mysetting_lname').val();
    Email = $('#mysetting_email').val();
    Mobile = $('#mysetting_phoneno').val();
    language = $('#mysetting_language').val();
    date = $('#settings_date').val();
    month = $('#settings_month').val();
    year = $('#settings_year').val();
    birthdate = year + "/" + month + "/" + date;

    if (fname == "" || lname == "" || Email == "" || Mobile == "") {
        $('#details_error').html("Please Enter all the values");
        $('#details_sucess').html(' ');
    } else if (Mobile.length != 10) {
        $('#details_error').html("Please Enter correct mobile no");
        $('#details_sucess').html(' ');
    } else if (!String(Email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
        $('#details_error').html("Please Enter correct email Address");
        $('#details_sucess').html(' ');
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=updateuserdetails",
            data: {
                firstname: fname,
                lastname: lname,
                email: Email,
                MobileNo: Mobile,
                Language: language,
                date: birthdate
            },
            success: function (response) {
                $('#details_error').html(" ");
                $('#details_sucess').html('Updated Successfully');
            }
        });
    }


});

// My Setting Password Update 

$('#setting_update_password').click(function (e) {
    e.preventDefault();

    old_password = $('#old_password').val();
    new_password = $('#new_password').val();
    confirm_password = $('#confirm_password').val();

    if (old_password == "" || new_password == "" || confirm_password == "") {
        $('#update_password_sucess').html(" ");
        $('#update_password_error').html("Please Enter all the values");
    } else if (new_password != confirm_password) {
        $('#update_password_sucess').html(" ");
        $('#update_password_error').html("Please enter the same password");
    } else if (!new_password.match(/^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/)) {
        $('#update_password_sucess').html(" ");
        $('#update_password_error').html("Password must be minimum eight characters, at least one letter, one number and one special character");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=oldpasswordcheck",
            data: {
                oldPassword: old_password
            },
            success: function (response) {
                if (old_password == response) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/helperland/index.php?function=updatePassword",
                        data: {
                            password: new_password
                        },
                        success: function (response) {
                            $('#update_password_error').html(" ");
                            $('#update_password_sucess').html("Password Updated");
                        }
                    });
                } else {
                    $('#update_password_sucess').html(" ");
                    $('#update_password_error').html("Incorrect old password");
                }
            }
        });
    }

});

// My Setting Address 

function edit_address(id) {

    $('.setting_address_error').attr('id', id + '-addressid');

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=setAddressModal",
        data: {
            addressId: id
        },
        success: function (response) {
            var address = JSON.parse(response);

            $('#streetname_setting').val(address["AddressLine2"]);
            $('#streetname_houseno').val(address["AddressLine1"]);
            $('#postalcode_setting').val(address["PostalCode"]);
            $('#city_setting').val(address["City"]);
            $('#phoneno_setting').val(address["Mobile"]);

        }
    });


}

$('#submit_setting').click(function (e) {
    e.preventDefault();

    StreetName = $('#streetname_setting').val().trim();
    HouseNo = $('#streetname_houseno').val().trim();
    PostalCode = $('#postalcode_setting').val().trim();
    City = $('#city_setting').val().trim();
    PhoneNo = $('#phoneno_setting').val().trim();
    AddressId = $('.setting_address_error').attr('id');
    idarr = AddressId.split('-');
    id = parseInt(idarr[0]);

    if (StreetName == "" || HouseNo == "" || PostalCode == "" || City == "" || PhoneNo == "") {
        $('.setting_address_error').html("Please Enter all Value");
    } else if (PostalCode.length != 6) {
        $('.setting_address_error').html("Postal Code must have 6 numbers");
    } else if (PhoneNo.length != 10) {
        $('.setting_address_error').html("Phone No must have 10 numbers");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=updateAddress",
            data: {
                streetName: StreetName,
                houseno: HouseNo,
                postalcode: PostalCode,
                city: City,
                Mobile: PhoneNo,
                AddressId: id
            },
            success: function (response) {
                setting_load_address();
                $('.setting_address_error').html(" ");
                $('.setting_address_sucess').html('Address Updated Successfully');
            }
        });
    }

    
});

// Add New Address 

$('#submit_add_setting').click(function (e) {
    e.preventDefault();

    var streetname = $('#streetname_add_setting').val().trim();
    var houseno = $('#houseno_add_setting').val().trim();
    var postalcode = $('#postalcode_add_setting').val().trim();
    var city = $('#city_add_setting').val().trim();
    var phone_no = $('#phoneno_add_setting').val().trim();

    console.log(streetname, houseno, postalcode, city, phone_no);

    if (streetname == "" || houseno == "" || postalcode == "" || city == "" || phone_no == "") {
        $('#add_new_address_error').html("Please Enter all Value");
    } else if (postalcode.length != 6) {
        $('#add_new_address_error').html("Postal Code must have 6 numbers");
    } else if (phone_no.length != 10) {
        $('#add_new_address_error').html("Phone No must have 10 numbers");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=insertaddress",
            data: {
                street_name_yd: streetname,
                house_no_yd: houseno,
                postalcode_yd: postalcode,
                city_yd: city,
                phoneno_yd: phone_no
            },
            success: function (response) {
                setting_load_address();
                $('#addnewaddress_setting_form').trigger("reset");
            }
        });
    }

});

// Delete Address 

function delete_address(addressid) {
    $('.delete_address_id').attr('id', addressid + '-delete_addr');
}

$('#delete_address_setting').click(function (e) {
    e.preventDefault();

    id_str = $('.delete_address_id').attr('id');
    id_arr = id_str.split('-');
    id = parseInt(id_arr[0]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=deleteaddress_setting",
        data: {
            addressId: id,
        },
        success: function (response) {
            setting_load_address();
        }
    });

});