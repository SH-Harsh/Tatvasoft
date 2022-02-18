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
    console.log("Save Address Enter the function");
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
    } else if(creditcardno.length != 16 || creditcardexpiry.length != 4 || 
                creditcardcvc.length != 3){
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