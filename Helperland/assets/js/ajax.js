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

                    $('#postalerror').html(" ");
                }
            }
        });
    }
});

$('#continue_schedulePlan').click(function (e) {
    e.preventDefault();

    var date = $('#date_sr').val();
    var parts = date.split("/");
    var conditiondate = new Date(parts[0], parts[1] - 1, parts[2]);

    var today = new Date();

    var currentdate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var checkdate = conditiondate.getFullYear() + '-' + (conditiondate.getMonth() + 1) + '-' + conditiondate.getDate();

    var postalcode = $('#postalcode_yd').val().trim();

    if (checkdate > currentdate) {
        // console.log("Allow");
        $('#date_error_alert').css('display', 'none');

        schedulePlan();

        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=loadaddress",
            data: {
                zipcode: postalcode
            },
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

    } else {
        // console.log("Not Allow");

        $('#date_error_alert').css('display', 'block');
        window.scrollTo({
            top: 300,
            behavior: 'smooth'
        });

    }



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
                $('#add_new_address_error').html(" ");

                $('#user_address_aj').html(response);

                $('#postalcode_yd').val(postalcode);
                $('#city_yd').val(city);

                $.ajax({
                    type: "POST",
                    url: "http://localhost/helperland/index.php?function=loadaddress",
                    data: {
                        zipcode: postalcode
                    },
                    success: function (response) {
                        $('#user_address_aj').html(response);
                    }
                });


            }
        });
    }
});

// $(".select_btn").on("click", function () {
//     id = $(this).attr('id');
//     console.log(id);
// });

$(document).on("click", ".select_btn", function (e) {

    id = $(this).attr('id');

    $('.serviceproviderid').attr('id', id);

    checkclass = $(this).attr('class');

    checkclass_str = checkclass.split(" ");
    // console.log(checkclass_str[1]);

    if (checkclass_str[1] == undefined) {
        $('.select_btn_selected').removeClass('select_btn_selected');
        $(this).addClass('select_btn_selected');
    } else {
        $(this).removeClass('select_btn_selected');
        $('.serviceproviderid').removeAttr('id');
    }

    // console.log($('.serviceproviderid').attr('id'));
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

    spinner = '<div class="spinner-border"></div>';
    $('#complete_booking').html(spinner);

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

        //Firstly Chosen Service Provider
        idstr = $('.serviceproviderid').attr('id');
        if (idstr != undefined) {
            id_arr = idstr.split('-');
            ServiceProviderid = parseInt(id_arr[0]);
        } else {
            ServiceProviderid = 0;
        }

        console.log(duration);

        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=schedule_plan",
            data: {
                date_sr: date,
                time_sr: time,
                duration_sr: duration,
                pets: pets,
                comments: comments,
                extraservice: extraservice,
                providerid: ServiceProviderid
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

                        $('#complete_booking').html("Complete Booking");
                        $('.request_id').html("Service Request Id: ".concat(response));
                        $('#complete_booking_modal').modal('show');

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/helperland/index.php?function=sendEmailtoProvider",
                            success: function (response) {
                                console.log(response);
                            }
                        });
                    }
                });
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

    $('#reschdule_spinner').css('display', 'block');


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
            console.log(response);
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

                        $('#reschdule_spinner').css('display', 'none');
                        $('#Reschudule').modal('hide');
                        $('.show').remove('.modal-backdrop');
                        loaddashboard(0, 2);
                        // console.log(response);


                    }
                });
            } else {
                $('#reschudele_error').css('display', 'block');
                $('#reschdule_spinner').css('display', 'none');
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

    $.ajax({
        url: "http://localhost/helperland/index.php?function=fetchfullservicehistory_SP",
        success: function (response) {
            $('#export_serviceHistoryTable').html(response);
            // console.log(response);
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

// Export Service History Table




$('#export_servicehistory').click(function (e) {
    e.preventDefault();

    let data = document.getElementById('export_serviceHistoryTable');
    var fp = XLSX.utils.table_to_book(data, {
        sheet: 'Sheet1'
    });
    XLSX.write(fp, {
        bookType: 'xlsx',
        type: 'base64'
    });
    XLSX.writeFile(fp, 'Service History SP.xlsx');
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
            // console.log(userdetails);

            $('#mysetting_fname').val(userdetails['FirstName']);
            $('#mysetting_lname').val(userdetails['LastName']);
            $('#mysetting_email').val(userdetails['Email']);
            $('#mysetting_phoneno').val(userdetails['Mobile']);
            // $('#mysetting_email').val(userdetails['Email']);
        }
    });
}

function setting_set_details_sp() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=getdetails",
        success: function (response) {
            var userdetails = JSON.parse(response);
            // console.log(userdetails);

            $('#first_name_sp').val(userdetails['FirstName']);
            $('#last_name_sp').val(userdetails['LastName']);
            $('#email_sp').val(userdetails['Email']);
            $('#phoneNo_sp').val(userdetails['Mobile']);
            $('#avatar_selected').attr('src', 'assets/images/' + userdetails['UserProfilePicture']);

            gender_val = parseInt(userdetails["Gender"]);
            if (gender_val == 0) {
                $("input[value='male']").attr('checked', 'checked');
            } else if (gender_val == 1) {
                $("input[value='Female']").attr('checked', 'checked');
            } else {
                $("input[value='not_to_say']").attr('checked', 'checked');
            }

            nationality_val = parseInt(userdetails["NationalityId"]);
            $('#nationality_sp').val(nationality_val);

            birthdate_arr = userdetails["DateOfBirth"].split(" ");
            birthdate = birthdate_arr[0];
            date_arr = birthdate.split("-");
            // console.log(date_arr);
            $('#date_sp').val(date_arr[2]);
            $('#month_sp').val(date_arr[1]);
            $('#year_sp').val(date_arr[0]);

        }
    });

    //Set Address 
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=setAdress_sp",
        success: function (response) {
            var userdetails = JSON.parse(response);
            // console.log(response);

            $('#streetName_sp').val(userdetails["AddressLine2"]);
            $('#houseno_sp').val(userdetails["AddressLine1"]);
            $('#postalcode_sp').val(userdetails["PostalCode"]);
            $('#city_sp').val(userdetails["City"]);

        }
    });
}


$('#MySettings').click(function () {

    setting_set_details();
    setting_load_address();
    setting_set_details_sp();
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

    $('.login_error').css('display', 'none');
    $('.updated_success_alert').css('display', 'none');

    if (fname == "" || lname == "" || Email == "" || Mobile == "") {
        // $('#details_error').html("Please Enter all the values");
        // $('#details_sucess').html(' ');

        $('.login_error').css('display', 'block');
        $('.login_error').html('Please Enter all the values');
    } else if (Mobile.length != 10) {
        // $('#details_error').html("Please Enter correct mobile no");
        // $('#details_sucess').html(' ');

        $('.login_error').css('display', 'block');
        $('.login_error').html('Please Enter correct mobile no');
    } else if (!String(Email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
        // $('#details_error').html("Please Enter correct email Address");
        // $('#details_sucess').html(' ');

        $('.login_error').css('display', 'block');
        $('.login_error').html('Please Enter correct email Address');
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
                // $('#details_error').html(" ");
                // $('#details_sucess').html('Updated Successfully');

                $('.login_error').css('display', 'none');

                $('.updated_success_alert').css('display', 'block');
                $('.updated_success_alert').html('Updated Successfully');
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

    $('.password_error').css('display', 'none');
    $('.pass_updated_success_alert').css('display', 'none');

    if (old_password == "" || new_password == "" || confirm_password == "") {
        // $('#update_password_sucess').html(" ");
        // $('#update_password_error').html("Please Enter all the values");

        $('.password_error').css('display', 'block');
        $('.password_error').html('Please Enter all details');
    } else if (new_password != confirm_password) {
        // $('#update_password_sucess').html(" ");
        // $('#update_password_error').html("Please enter the same password");

        $('.password_error').css('display', 'block');
        $('.password_error').html('Please enter the same password');
    } else if (!new_password.match(/^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/)) {
        // $('#update_password_sucess').html(" ");
        // $('#update_password_error').html("Password must be minimum eight characters, at least one letter, one number and one special character");

        $('.password_error').css('display', 'block');
        $('.password_error').html('Password must be minimum eight characters, at least one letter, one number and one special character');
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

                            $('.password_error').css('display', 'none');
                            $('.pass_updated_success_alert').css('display', 'block');
                            $('.pass_updated_success_alert').html('Updated Successfully');

                            $('#password_change_form').trigger("reset");
                        }
                    });
                } else {
                    // $('#update_password_sucess').html(" ");
                    // $('#update_password_error').html("Incorrect old password");

                    $('.password_error').css('display', 'block');
                    $('.password_error').html('Incorrect old password');
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
        // $('.setting_address_error').html("Please Enter all Value");
        $('.edit_address_error').css('display', 'block');
        $('.edit_address_error').html('Please Enter all value');
    } else if (PostalCode.length != 6) {
        // $('.setting_address_error').html("Postal Code must have 6 numbers");
        $('.edit_address_error').css('display', 'block');
        $('.edit_address_error').html('Postal Code must have 6 numbers');
    } else if (PhoneNo.length != 10) {
        // $('.setting_address_error').html("Phone No must have 10 numbers");
        $('.edit_address_error').css('display', 'block');
        $('.edit_address_error').html('Phone No must have 10 numbers');
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
                // $('.setting_address_error').html(" ");
                // $('.setting_address_sucess').html('Address Updated Successfully');

                $("#edit_address").modal("hide");
                $(".modal-backdrop").remove();

                $('.edit_address_error').css('display', 'none');
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
        // $('#add_new_address_error').html("Please Enter all Value");
        $('.add_address_error').css('display', 'block');
        $('.add_address_error').html('Please Enter all value');
    } else if (postalcode.length != 6) {
        // $('#add_new_address_error').html("Postal Code must have 6 numbers");
        $('.add_address_error').css('display', 'block');
        $('.add_address_error').html('Postal Code must have 6 numbers');
    } else if (phone_no.length != 10) {
        // $('#add_new_address_error').html("Phone No must have 10 numbers");

        $('.add_address_error').css('display', 'block');
        $('.add_address_error').html('Phone No must have 10 numbers');
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
                // $('.add_address_error').css('display', 'block');
                $('.add_address_error').css('display', 'none');
                // $('#add_address').modal('toggle');
                $("#add_address").modal("hide");
                $(".modal-backdrop").remove();

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




// Upcoming Service For Service Provider 

$('#save_details_sp').click(function (e) {
    e.preventDefault();

    src = $('#avatar_selected').attr('src');
    avatar_name_arr = src.split('/');
    avatar_name = avatar_name_arr[2];

    fname = $('#first_name_sp').val().trim();
    lname = $('#last_name_sp').val().trim();
    email = $('#email_sp').val().trim();
    phoneNo = $('#phoneNo_sp').val().trim();
    date = $('#date_sp').val();
    month = $('#month_sp').val();
    year = $('#year_sp').val();
    birthdate = year + "/" + month + "/" + date;
    nationality = $('#nationality_sp').val();
    gender_val = $("input[name='gender']:checked").val();
    if (gender_val == 'male') {
        gender = 0;
    } else if (gender_val == 'Female') {
        gender = 1;
    } else {
        gender = 2;
    }


    //Address
    StreetName = $('#streetName_sp').val().trim();
    HouseNo = $('#houseno_sp').val().trim();
    PostalCode = $('#postalcode_sp').val().trim();
    City = $('#city_sp').val().trim();

    if (fname == "" || lname == "" || email == "" || phoneNo == "" || StreetName == "" || HouseNo == "" || PostalCode == "" || City == "") {
        // $('.save_details_error_sp').html("Please enter all details");
        // $('.save_details_sucess_sp').html("");

        $('.account_details_error').css('display', 'block');
        $('.account_details_error').html("Please enter all details");
    } else if (phoneNo.length != 10) {
        // $('.save_details_error_sp').html("Please enter correct mobile no");
        // $('.save_details_sucess_sp').html("");

        $('.account_details_error').css('display', 'block');
        $('.account_details_error').html("Please enter correct mobile no");
    } else if (PostalCode.length != 6) {
        // $('.save_details_error_sp').html("Please enter correct postal code");
        // $('.save_details_sucess_sp').html("");

        $('.account_details_error').css('display', 'block');
        $('.account_details_error').html("Please enter correct postal code");
    } else if (!String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
        // $('.save_details_error_sp').html("Please enter email in correct format");
        // $('.save_details_sucess_sp').html("");

        $('.account_details_error').css('display', 'block');
        $('.account_details_error').html("Please enter email in correct format");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/helperland/index.php?function=updatedetails_sp",
            data: {
                FirstName: fname,
                LastName: lname,
                Email: email,
                PhoneNo: phoneNo,
                date: birthdate,
                Nationality: nationality,
                Gender: gender,
                logo_name: avatar_name,
                streetName: StreetName,
                houseNo: HouseNo,
                postalcode: PostalCode,
                city: City
            },
            success: function (response) {
                // $('.save_details_error_sp').html("");
                // $('.save_details_sucess_sp').html("Updated Successfully");

                $('.account_details_error').css('display', 'none');
                $('.account_details_success_alert').css('display', 'block');
                $('.account_details_success_alert').html("Updated Successfully");
            }
        });
    }
    window.scrollTo(0, 10);
});

//New Service Request


function totalentries_NewService_SP(pets) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=TotalEntriesNewServiceRequest&parameter=" + pets,
        success: function (response) {
            $('#totalentries_accept').html("Total Record: " + response);
        }
    });
}

function totalentries_us() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=TotalEntriesUpcomingService",
        success: function (response) {
            $('#totalentries_us').html("Total Record: " + response);
        }
    });
}

function totalServiceHistory_Sp() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=TotalEntriesServiceHistory_Sp",
        success: function (response) {
            $('.totalentries_serhis').html("Total Record: " + response);
        }
    });
}


function loadNewServiceRequest_SP(offset, limit, pets) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadServiceRequest_SP&parameter=" + offset + "-" + limit + "-" + pets,
        success: function (response) {
            // console.log(response);
            $('#new_request_table_sp').html(response);
        }
    });
    totalentries_NewService_SP(pets);
}

function loadUpcomingService(offset, limit) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadUpcomingService_SP&parameter=" + offset + "-" + limit,
        success: function (response) {
            $('.right_service_list').html(response);
            // console.log(response);
        }
    });
    totalentries_us();
}

function loadServiceHistory_Sp(offset, limit) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=loadServiceHistory_SP&parameter=" + offset + "-" + limit,
        success: function (response) {
            $('.serviceHistory').html(response);
        }
    });
    totalServiceHistory_Sp();
}

$(document).ready(function () {
    loadUpcomingService(0, 2);
});


$('.new_service_request').click(function (e) {
    e.preventDefault();

    loadNewServiceRequest_SP(0, 2, 0);
});

function Accept_Service(serviceproviderid) {
    $.ajax({
        method: "POST",
        url: "http://localhost/helperland/index.php?function=setAcceptServiceModal",
        data: {
            id: serviceproviderid
        },
        success: function (response) {
            details = JSON.parse(response);
            // console.log(response);

            $('#accept_service_sp').html(details["date"] + " " + details["starttime"] + "-" + details["endtime"]);
            $('#duration_accept_sp').html("Duration: " + details["totalhr"]);
            $('#serviceid_accept_sp').html("Service Id: " + details["serviceid"]);
            $('#total_payment_accept_sp').html(details["payment"] + "€");
            $('#customer_name_accept').html("Customer Name: " + details["name"]);
            $('#customer_address_accept').html("Service Address: " + details["customer_address"]);

            extras = "";
            $.each(details["ExtraService"], function (indexInArray, service) {
                extras += service + " "
            });

            $('#extras_accept_sp').html("Extras: " + extras);
            $('#comment_accept_sp').html("Comments: " + details["comment"]);

            if (details["HasPets"] == 0) {
                $('#pets_accept_sp').html("<img  src='assets/images/not-included.png' style='width: 20px;height: 20px;'>  I don't have pets at home.");
            } else {
                $('#pets_accept_sp').html("<img  src='assets/images/included.png' style='width: 20px;height: 20px;'> I have pets at home.");
            }

            $('.accept_id').attr('id', serviceproviderid + "-accept_sp");
        }
    });
}

$('#entries_newService').change(function (e) {
    e.preventDefault();

    limit = $('#entries_newService').val();

    if ($("#pet_home").prop('checked') == true) {
        loadNewServiceRequest_SP(0, limit, 1);
    } else {
        loadNewServiceRequest_SP(0, limit, 0);
    }

    // loadNewServiceRequest_SP(0,limit,0);
    $('#pageno').html(1);
});

function paginationno_newService(textno) {
    limit = $('#entries_newService').val();

    totalentriestext = $('#totalentries_accept').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    currentpageno = parseInt($('#pageno').html());

    if ($("#pet_home").prop('checked') == true) {
        pets = 1;
    } else {
        pets = 0;
    }


    maxpageno = Math.ceil(totalentries / limit);
    if (textno == 'next') {
        currentpageno += 1;

        if (currentpageno <= maxpageno) {
            $('#pageno').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadNewServiceRequest_SP(offset, limit, pets);
        }
    } else if (textno == 'back') {
        currentpageno -= 1;

        if (currentpageno > 0) {
            $('#pageno').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadNewServiceRequest_SP(offset, limit, pets);
        }
    } else if (textno == 'max') {
        $('#pageno').html(maxpageno);

        offset = (currentpageno - 1) * limit;
        loadNewServiceRequest_SP(offset, limit, pets);

    } else if (textno == 'min') {
        $('#pageno').html(1);

        offset = (currentpageno - 1) * limit;
        loadNewServiceRequest_SP(offset, limit, pets);
    } else {
        console.log("Error in Pagination");
    }
}

$('#pet_home').change(function (e) {
    e.preventDefault();

    if ($("#pet_home").prop('checked') == true) {
        loadNewServiceRequest_SP(0, 2, 1);
    } else {
        loadNewServiceRequest_SP(0, 2, 0);
    }
    $('#entries_newService').val(2);
    $('#pageno').html(1);
});

$('.accept_id').click(function (e) {
    e.preventDefault();

    id = $('.accept_id').attr('id');
    id_arr = id.split("-");
    serviceid = parseInt(id_arr[0]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=IsServiceProviderAssigned",
        data: {
            id: serviceid
        },
        success: function (response) {
            console.log(response);
            if (parseInt(response) == 0) {

                $.ajax({
                    type: "POST",
                    url: "http://localhost/helperland/index.php?function=SetServiceProvider",
                    data: {
                        id: serviceid
                    },
                    success: function (response) {
                        loadNewServiceRequest_SP(0, 2, 0);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something Already Taken This Service! Or You have a service at this time slot'
                })
                loadNewServiceRequest_SP(0, 2, 0);
            }
        }
    });

    $('#entries_newService').val(2);
    $('#pageno').html(1);
});

//Set Upcoming Service Modal

function SetUpcomingServiceModal(servicerequestid) {

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=GetUpcomingServiceDetails",
        data: {
            id: servicerequestid
        },
        success: function (response) {
            var serviceDetails = JSON.parse(response);
            // console.log(response);
            console.log(serviceDetails);
            $('#date_upcoming_service').html(serviceDetails["date"] + " " + serviceDetails["starttime"] + "-" + serviceDetails["endtime"]);
            $('#duration_us').html("Duration: " + serviceDetails["totalhr"]);
            $('#serviceid_us').html("Service Id: " + serviceDetails["serviceid"]);
            $('#amount_us').html(serviceDetails["payment"] + "€");
            $('#name_us').html("Customer Name: " + serviceDetails["name"]);
            $('#address_us').html("Service Address: " + serviceDetails["customer_address"]);
            $('#comment_us').html("Comments: " + serviceDetails["comment"]);

            extraservice = "";
            $.each(serviceDetails["ExtraService"], function (indexInArray, value) {
                extraservice += value + ", ";
            });
            $('#extras_us').html("Extras: " + extraservice);

            if (serviceDetails["HasPets"] == 0) {
                $('#pets_us').html("<img  src='assets/images/not-included.png' style='width: 20px;height: 20px;'>  I don't have pets at home.");
            } else {
                $('#pets_us').html("<img  src='assets/images/included.png' style='width: 20px;height: 20px;'> I have pets at home.");
            }

            if (serviceDetails["Complete"] == 1) {
                $('.complete_us').css('display', 'inline');
                // $('.complete_us').html("<p> <i class='fas fa-check'></i> Complete</p>")
            } else {
                $('.complete_us').css('display', 'none');
            }

            $('.serviceRequestId_us').attr('id', serviceDetails["serviceRequestId"] + "_serviceRequestId-us");
        }
    });
}

$('#cancelService_us').click(function (e) {
    e.preventDefault();

    id = $('.serviceRequestId_us').attr('id');
    idarr = id.split('_');
    serviceRequestId = parseInt(idarr[0]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=cancelServiceRequest",
        data: {
            id: serviceRequestId
        },
        success: function (response) {
            loadUpcomingService(0, 2);
        }
    });

});

$('#completeService_us').click(function (e) {
    e.preventDefault();

    id = $('.serviceRequestId_us').attr('id');
    idarr = id.split('_');
    serviceRequestId = parseInt(idarr[0]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=completeServiceRequest",
        data: {
            id: serviceRequestId
        },
        success: function (response) {
            loadUpcomingService(0, 2);
            console.log(response);
        }
    });

});

$('#entries_us').change(function (e) {
    e.preventDefault();

    limit = $('#entries_us').val();

    loadUpcomingService(0, limit);
    $('#pageno_us').html("1");
});

// Upcoming Service Pagination 

function paginationno_us(textno) {
    limit = $('#entries_us').val();

    totalentriestext = $('#totalentries_us').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    currentpageno = parseInt($('#pageno_us').html());

    maxpageno = Math.ceil(totalentries / limit);
    if (textno == 'next') {
        currentpageno += 1;

        if (currentpageno <= maxpageno) {
            $('#pageno_us').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadUpcomingService(offset, limit);
        }
    } else if (textno == 'back') {
        currentpageno -= 1;

        if (currentpageno > 0) {
            $('#pageno_us').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadUpcomingService(offset, limit);
        }
    } else if (textno == 'max') {
        $('#pageno_us').html(maxpageno);

        offset = (currentpageno - 1) * limit;
        loadUpcomingService(offset, limit);

    } else if (textno == 'min') {
        $('#pageno_us').html(1);

        offset = (currentpageno - 1) * limit;
        loadUpcomingService(offset, limit);
    } else {
        console.log("Error in Pagination");
    }
}

$('.upcoming_service').click(function (e) {
    e.preventDefault();
    loadUpcomingService(0, 2);
    $('#pageno_us').html("1");
    $('#entries_us').val("2");

});

$('.service_history_tab').click(function (e) {
    e.preventDefault();

    loadServiceHistory_Sp(0, 2);
});

$('#entries_serhis').change(function (e) {
    e.preventDefault();

    limit = $('#entries_serhis').val();
    loadServiceHistory_Sp(0, limit);

});

//Set Service History Modal

function SetServiceHistoryModal_SP(servicerequestid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=GetUpcomingServiceDetails",
        data: {
            id: servicerequestid
        },
        success: function (response) {
            var serviceDetails = JSON.parse(response);
            // console.log(response);
            console.log(serviceDetails);
            $('#date_serhis').html(serviceDetails["date"] + " " + serviceDetails["starttime"] + "-" + serviceDetails["endtime"]);
            $('#duration_serhis').html("Duration: " + serviceDetails["totalhr"]);
            $('#serviceid_serhis').html("Service Id: " + serviceDetails["serviceid"]);
            $('#amount_serhis').html(serviceDetails["payment"] + "€");
            $('#name_serhis').html("Customer Name: " + serviceDetails["name"]);
            $('#address_serhis').html("Service Address: " + serviceDetails["customer_address"]);
            $('#comment_serhis').html("Comments: " + serviceDetails["comment"]);

            extraservice = "";
            $.each(serviceDetails["ExtraService"], function (indexInArray, value) {
                extraservice += value + ", ";
            });
            $('#extras_serhis').html("Extras: " + extraservice);

            if (serviceDetails["HasPets"] == 0) {
                $('#pets_serhis').html("<img  src='assets/images/not-included.png' style='width: 20px;height: 20px;'>  I don't have pets at home.");
            } else {
                $('#pets_serhis').html("<img  src='assets/images/included.png' style='width: 20px;height: 20px;'> I have pets at home.");
            }

        }
    });
}

//Service History Pagination

function ServiceHistoryPag_Sp(textno) {
    limit = $('#entries_serhis').val();

    totalentriestext = $('.totalentries_serhis').html();
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
        loadServiceHistory_Sp(offset, limit);
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
            loadServiceHistory_Sp(offset, limit);
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
            loadServiceHistory_Sp(offset, limit);
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
        loadServiceHistory_Sp(offset, limit);
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
        loadServiceHistory_Sp(offset, limit);
        $('#1-pagination').addClass('active');

    } else {
        console.log("Pagination Error");
    }
}

function totalentries_fb_Sp() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=GetBlockedCustomertotal",
        success: function (response) {
            $('#totalentries_fb_Sp').html("Total Record: " + response);
        }
    });
}

function loadBlockedCustomer_SP(offset, limit) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=GetBlockedCustomerlist&parameter=" + offset + "-" + limit,
        success: function (response) {
            // console.log(response);
            $('#favorite_blocked_cust').html(response);
        }
    });

    totalentries_fb_Sp();
}

function totalentries_favpros() {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=GetBlockedCustomerlisttotal",
        success: function (response) {
            $('#totalRecord_favoritepros').html("Total Record: " + response);
        }
    });
}

function loadBlockedCustomer(offset, limit) {
    $.ajax({
        url: "http://localhost/helperland/index.php?function=GetBlockedCustomerlist_C&parameter=" + offset + "-" + limit,
        success: function (response) {
            $('#blockfav_Sp').html(response);

            //Rating in Customer

            $('.rating_customer').rateYo({
                rating: 1,
                starWidth: "20px",
                readOnly: true
            });

            $('.rating_customer').each(function () {
                className = $(this).attr('class');
                className_arr = className.split(' ');
                rating_arr = className_arr[1].split('-');
                avgrating = parseFloat(rating_arr[0]);

                $(this).rateYo("option", "rating", avgrating);
            });
        }
    });

    totalentries_favpros();
}

function favouriteSp(id) {
    id_arr = id.split("-");

    favblockid = parseInt(id_arr[0]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=favouriteblocked_C",
        data: {
            favouriteId: favblockid
        },
        success: function (response) {
            loadBlockedCustomer(0, 2);
        }
    });
}

function BlockedSp(id) {
    id_arr = id.split("-");

    favblockid = parseInt(id_arr[0]);

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=favouriteblocked_C2",
        data: {
            favouriteId: favblockid
        },
        success: function (response) {
            loadBlockedCustomer(0, 2);
        }
    });
}


// Block Customer of Service Provider

$('.block_customer_tab').click(function (e) {
    e.preventDefault();

    loadBlockedCustomer_SP(0, 2);
    loadBlockedCustomer(0, 2);
});

$('#entries_favoritepros').change(function (e) {
    e.preventDefault();

    $('#pageno_favoritepros').html("1");
    limit = $('#entries_favoritepros').val();
    offset = parseInt($('#pageno_favoritepros').html());


    loadBlockedCustomer(offset - 1, limit);


});

function paginationno_favoritepros(textno) {
    limit = $('#entries_favoritepros').val();

    totalentriestext = $('#totalRecord_favoritepros').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    currentpageno = parseInt($('#pageno_favoritepros').html());

    maxpageno = Math.ceil(totalentries / limit);
    if (textno == 'next') {
        currentpageno += 1;

        if (currentpageno <= maxpageno) {
            $('#pageno_favoritepros').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadBlockedCustomer(offset, limit);
        }
    } else if (textno == 'back') {
        currentpageno -= 1;

        if (currentpageno > 0) {
            $('#pageno_favoritepros').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadBlockedCustomer(offset, limit);
        }
    } else if (textno == 'max') {
        $('#pageno_favoritepros').html(maxpageno);

        offset = (currentpageno - 1) * limit;
        loadBlockedCustomer(offset, limit);

    } else if (textno == 'min') {
        $('#pageno_favoritepros').html(1);

        offset = (currentpageno - 1) * limit;
        loadBlockedCustomer(offset, limit);
    } else {
        console.log("Error in Pagination");
    }
}


$(document).on("click", ".favblock", function (e) {

    id = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=SetFavBlockedCustomerlist",
        data: {
            favouriteId: id
        },
        success: function (response) {
            loadBlockedCustomer_SP(0, 2);
            console.log(response);
        }
    });
});

$('#entries_fb_Sp').change(function (e) {
    e.preventDefault();

    limit = $('#entries_fb_Sp').val();
    loadBlockedCustomer_SP(0, limit);
    $('#pageno_fp_Sp').html("1");
});



function paginationno_favblock_Sp(textno) {
    limit = $('#entries_fb_Sp').val();

    totalentriestext = $('#totalentries_fb_Sp').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    currentpageno = parseInt($('#pageno_fp_Sp').html());

    maxpageno = Math.ceil(totalentries / limit);
    if (textno == 'next') {
        currentpageno += 1;

        if (currentpageno <= maxpageno) {
            $('#pageno_fp_Sp').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadBlockedCustomer_SP(offset, limit);
        }
    } else if (textno == 'back') {
        currentpageno -= 1;

        if (currentpageno > 0) {
            $('#pageno_fp_Sp').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadBlockedCustomer_SP(offset, limit);
        }
    } else if (textno == 'max') {
        $('#pageno_fp_Sp').html(maxpageno);

        offset = (currentpageno - 1) * limit;
        loadBlockedCustomer_SP(offset, limit);

    } else if (textno == 'min') {
        $('#pageno_fp_Sp').html(1);

        offset = (currentpageno - 1) * limit;
        loadBlockedCustomer_SP(offset, limit);
    } else {
        console.log("Error in Pagination");
    }
}

// Rating in Service Provider 


function totalratings_SP() {

    order = $("input[type=radio][name=rating_Sp]:checked").val();
    rating_val = $('#star_value').val();

    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=TotalRatinglist_Sp",
        data: {
            orderby: order,
            rating: rating_val,
        },
        success: function (response) {
            $('#totalentries_rating_Sp').html("Total Record: " + response);

        }
    });
}


function loadratings_SP(order, rating_val, offset, limit) {
    $.ajax({
        type: "POST",
        url: "http://localhost/helperland/index.php?function=Ratinglist_Sp",
        data: {
            orderby: order,
            rating: rating_val,
            offset_val: offset,
            limit_val: limit
        },
        success: function (response) {
            // console.log(response);
            $('.rating_list').html(response);

            $('.starrating_Sp').rateYo({
                starWidth: "20px",
                readOnly: true
            });

            $('.rating_value_Sp').each(function () {

                id = $(this).attr('id');
                rating_val = parseFloat($(this).html());
                id_arr = id.split("-");
                serviceRequestId = parseInt(id_arr[0]);

                $('#' + serviceRequestId + '-ratingSp').rateYo("option", "rating", rating_val);
            });
        }
    });

    totalratings_SP()
}

$('.my_ratings_tab').click(function (e) {
    e.preventDefault();

    order = $("input[type=radio][name=rating_Sp]:checked").val();

    rating_val = $('#star_value').val();
    loadratings_SP(order, rating_val, 0, 2);

});

$("input[type=radio][name=rating_Sp]").change(function (e) {
    e.preventDefault();

    order = $(this).val();

    rating_val = $('#star_value').val();
    loadratings_SP(order, rating_val, 0, 2);

    $('#entries_rating_Sp').val("2");
    $('#pageno_rating_Sp').html("1");

    $('.sorting_option').css('display', 'none');
});

$('#star_value').change(function (e) {
    e.preventDefault();

    order = $("input[type=radio][name=rating_Sp]:checked").val();

    rating_val = $('#star_value').val();
    loadratings_SP(order, rating_val, 0, 2);
});

function paginationno_rating_Sp(textno) {
    limit = $('#entries_rating_Sp').val();

    totalentriestext = $('#totalentries_rating_Sp').html();
    totalentriesarr = totalentriestext.split(": ");
    totalentries = parseInt(totalentriesarr[1]);

    order = $("input[type=radio][name=rating_Sp]:checked").val();

    rating_val = $('#star_value').val();

    currentpageno = parseInt($('#pageno_rating_Sp').html());

    maxpageno = Math.ceil(totalentries / limit);
    if (textno == 'next') {
        currentpageno += 1;

        if (currentpageno <= maxpageno) {
            $('#pageno_rating_Sp').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadratings_SP(order, rating_val, offset, limit);
        }
    } else if (textno == 'back') {
        currentpageno -= 1;

        if (currentpageno > 0) {
            $('#pageno_rating_Sp').html(currentpageno);

            offset = (currentpageno - 1) * limit;
            loadratings_SP(order, rating_val, offset, limit);
        }
    } else if (textno == 'max') {
        $('#pageno_rating_Sp').html(maxpageno);

        offset = (currentpageno - 1) * limit;
        loadratings_SP(order, rating_val, offset, limit);

    } else if (textno == 'min') {
        $('#pageno_rating_Sp').html(1);

        offset = (currentpageno - 1) * limit;
        loadratings_SP(order, rating_val, offset, limit);
    } else {
        console.log("Error in Pagination");
    }
}

$('#entries_rating_Sp').change(function (e) {
    e.preventDefault();

    limit = $('#entries_rating_Sp').val();
    order = $("input[type=radio][name=rating_Sp]:checked").val();

    rating_val = $('#star_value').val();
    loadratings_SP(order, rating_val, 0, limit);

    $('#pageno_rating_Sp').html("1");

});


//Calendra View

// document.addEventListener('DOMContentLoaded', function () {

// });



$(document).ready(function () {
    // var calendarEl = document.getElementById('calendra_display');
    // var calendar = new FullCalendar.Calendar(calendarEl, {
    //     headerToolbar: {
    //         start: 'prev,next,today',
    //         center: 'title', // buttons for switching between views
    //         end: 'prevYear,nextYear'
    //     },
    //     themeSystem: 'bootstrap',
    //     initialView: 'dayGridMonth'
    // });
    // calendar.render();
});

$('.service_schedule_tab').click(function (e) {
    e.preventDefault();

    var calendarEl = document.getElementById('calendra_display');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            start: 'prev,next,today',
            center: 'title', // buttons for switching between views
            end: 'prevYear,nextYear'
        },
        themeSystem: 'bootstrap',
        initialView: 'dayGridMonth',
        // events: [
        //     {
        //       title  : 'event1',
        //       start  : '2022-03-04'
        //     },
        // ]
        events: {
            url: 'http://localhost/helperland/index.php?function=loadsevent',
        }, 
    });
    calendar.render();

});


// $(document).ready(function () {
//     var calendar = $('#calendar').fullCalendar({
// 		header: {
// 			left: 'prev,next today',
// 			center: 'title',
// 			right: 'month,basicWeek,basicDay'
// 		},
// 		navLinks: true, // can click day/week names to navigate views
// 		editable: true,
// 		eventLimit: true,
//         events: "all_events.php",
//         displayEventTime: false,
//         eventRender: function (event, element, view) {
//             if (event.allDay === 'true') {
//                 event.allDay = true;
//             } else {
//                 event.allDay = false;
//             }
//         }

//     });
// });