var selectField = document.getElementById("selectField");
var selectText = document.getElementById("selectText");
var options = document.getElementsByClassName("option");
var list = document.getElementById("list");

for (option of options) {
    option.onclick = function () {
        selectText.innerHTML = this.textContent;
        list.classList.toggle("hide");
    }
}

// selectField.onclick = function() {
//     list.classList.toggle("hide");
// };

$(window).on('load resize', function () {

    function screen_size() {

        var window_size = $(window).width();

        if (window_size < 770) {
            // console.log($(window).width());
            $('table.menu_table').hide();
            $('.select_option').show();
        } else {
            $('table.menu_table').show();
            $('.select_option').hide();
        }
    }

    screen_size();
});


function openSideMenu() {
    document.getElementById('side-nav').style.width = '250px';
    document.getElementById('background_body').classList.add('background_transparent');
}

function closeSideMenu() {
    document.getElementById('side-nav').style.width = '0px';
    document.getElementById('background_body').classList.remove('background_transparent');
    $('.arrow_down_section').css('display', 'none');
}

$('.ok').click(function () {
    $('.privacy_policy').css('display', 'none');
});

$('.arrow_down_nav').click(function () {

    //Toggle is not working properly and due to this it goes infinite error loop
    // $('.arrow_down_section').toggle('display', 'block');

    display1 = $('.arrow_down_section').css('display');
    if (display1 == 'none') {
        $('.arrow_down_section').css('display', 'block');
    } else {
        $('.arrow_down_section').css('display', 'none');
    }

});


//My Settings Customer Tabs

function mysettings(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active_settings", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active_settings";
}


// Display Tabs 

function display(id) {
    // $('.right_service_list').css('display', 'none');
    $('#new_service_request').css('display', 'none');
    $('#service_history').css('display', 'none');
    $('#block_customer').css('display', 'none');
    $('#my_ratings').css('display', 'none');
    $('#My_settings_service').css('display', 'none');
    $('#My_settings_customer').css('display', 'none');
    $('#Service_history').css('display', 'none');
    $('#dashboard').css('display', 'none');
    $('#upcoming_service_list').css('display', 'none');
    $('#service_schedule').css('display', 'none');

    $('.active_left').removeClass('active_left');

    $(id).css('display', 'block');
}

$('#MySettings').click(function () {

    // display('#My_settings_customer');
    display('#My_settings_service');
    $('#My_settings_customer').css('display', 'block');

    $('.arrow_down_section').css('display', 'none');

});

function change_avatar(src) {
    $('#avatar_selected').attr('src', src);
}

$('.avatar_img').click(function () {
    $('.select').removeClass('select');
    $(this).addClass('select');
});

$().click(function () {
    $('.active_left').removeClass('active_left');
    $(this).addClass('active_left');
});

$('.new_service_request').click(function () {
    display('#new_service_request');
    $('.new_service_request').addClass('active_left');
});

$('.service_history_tab').click(function () {
    display('#service_history');
    $('.service_history_tab').addClass('active_left');
});

$('.block_customer_tab').click(function () {
    display('#block_customer');
    $('.block_customer_tab').addClass('active_left');
})

$('.my_ratings_tab').click(function () {
    display('#my_ratings');
    $('.my_ratings_tab').addClass('active_left');
})

$('.service_schedule_tab').click(function (e) { 
    display('#service_schedule');
    $('.service_schedule_tab').addClass('active_left');
    
});

$('.dashboard_tab').click(function () {
    display('#dashboard');
    $('.dashboard_tab').addClass('active_left');
})

$('.service_history_tab').click(function () {
    display('#service_history');
    $('#Service_history').css('display', 'block');
    $('.service_history_tab').addClass('active_left');
    // $('.service_history_tab').addClass('active_left');
})

$('.upcoming_service').click(function () {
    display("#upcoming_service_list");
    $('#upcoming_service_list').css('display', 'block');
    $('.upcoming_service').addClass('active_left');
});


// Date time picker 

$(function () {
    $('#datetimepicker1').datepicker({
        format: "yyyy/mm/dd",
    });
});


//Star rating

var count1;

function starmark(item) {
    count1 = item.id[0];
    console.log(count1);
    // sessionStorage.starRating = count;
    var subid = item.id.substring(1);
    console.log(subid);
    for (var i = 0; i < 5; i++) {
        if (i < count1) {
            document.getElementById((i + 1) + subid).style.color = "orange";
        } else {
            document.getElementById((i + 1) + subid).style.color = "black";
        }
    }
}

// $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
//     var rating = data.rating;
//     $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
//     $(this).parent().find('.result').text('rating :'+ rating);
//     $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
// });

function avgrating() {
    val1 = parseInt($('.rating_value').html());
    val2 = parseInt($('.rating_value1').html());
    val3 = parseInt($('.rating_value2').html());

    average = (val1 + val2 + val3) / 3;
    
    $('#average_rating_value').html(average.toFixed(1));

    $("#average_rating").rateYo("option", "rating", average.toFixed(1)); //returns a jQuery Element
}






// Change Image on Click Selected 

function changeimg(img_src) {
    var element = document.getElementById(img_src);
    var no = img_src.split("-");

    var border_color = document.getElementById(no[0]);
    border_color.classList.toggle("extra_service_border_click");

    if (element.src.match(img_src)) {
        element.src = "assets/images/" + no[0] + ".png";
    } else {
        element.src = "assets/images/" + img_src + ".png";
    }
}

function change_avatar(src) {
    $('#avatar_selected').attr('src', src);
}

// Add Address

$('.add_address').click(function () {
    $('.add_new_address').css('display', 'block');
    $('.add_address').css('display', 'none');
});

// Its commented because we used in js for that

// $('#save_address_btn').click(function () {
//     $('.add_new_address').css('display', 'none');
//     $('.add_address').css('display', 'block');
// });

$('.cancel_btn').click(function () {
    $('.add_new_address').css('display', 'none');
    $('.add_address').css('display', 'inline');
});


// Tabs Move to Next Tab 

// $('#check_availability').click(function () {
//     $('#setup_service').css('display', 'none');
//     $('#schedule_plan').css('display', 'block');

//     $('#tab2').addClass('book_tab_click');
//     $('.arrow_rotate').removeClass('arrow_rotate');
//     $('#tab2 div').addClass('arrow_rotate');

// });

// $('#continue_schedulePlan').click(function () {
//     $('#schedule_plan').css('display', 'none');
//     $('#your_details').css('display', 'block');

//     $('#tab3').addClass('book_tab_click');
//     $('.arrow_rotate').removeClass('arrow_rotate');
//     $('#tab3 div').addClass('arrow_rotate');

// });

// $('#continue_details').click(function () {
//     $('#your_details').css('display', 'none');
//     $('#make_payment').css('display', 'block');

//     $('#tab4').addClass('book_tab_click');
//     $('.arrow_rotate').removeClass('arrow_rotate');
//     $('#tab4 div').addClass('arrow_rotate');

// });

// Custom File Chosen 

var readFile = document.getElementById("attachment");
var custText = document.getElementById("file_name");

// readFile.addEventListener('change', function () {
//     if (readFile.value) {
//         custText.innerHTML = readFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
//     } else {
//         custText.innerHTML = "No file chosen,yet";
//     }
// });


$(readFile).change(function () {
    if (readFile.value) {
        custText.innerHTML = readFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } else {
        custText.innerHTML = "No file chosen,yet";
    }
});

// Email Validation 

function emailvalidation(email) {
    if (!String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {

        // alert("Please enter the email in correct format");
        return false;
    }
    return true;
}

// Password Validation 
function passwordvalidation(password) {
    if (password.match(/^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/)) {
        return true;
    } else {
        // alert("Password must be minimum eight characters, at least one letter, one number and one special character");
        return false;
    }
}

// Create Account Validation 

function checkPassword(form) {
    console.log(form);
    password1 = form.password1.value.trim();
    password2 = form.password2.value.trim();
    email = form.email.value.trim().toLowerCase();
    fname = form.fname.value.trim();
    lname = form.lname.value.trim();

    $('.login_error').css('display', 'none');

    if (fname == "" || lname == "" || email == "" || password1 == "") {
        alert("Please don't enter the blank value");
        return false;
    }

    if (emailvalidation(email)) {
        if (password1 != password2) {
            // alert("\nPassword did not match: Please try again...")
            $('.login_error').css('display', 'block');
            $('.login_error').html('\nPassword did not match: Please try again...');
            return false;
        }

        if (passwordvalidation(password1)) {
            // alert("Register Successfull, Please now login");
            Swal.fire({
                icon: 'success',
                title: 'Register Successfull. Please Now login'
            })
            return true;
        } else {
            $('.login_error').css('display', 'block');
            $('.login_error').html('Password must be minimum eight characters, at least one letter, one number and one special character');
        }
    } else {
        $('.login_error').css('display', 'block');
        $('.login_error').html('Enter the email in correct format');
    }

    return false;

}

// Login Validation 

function loginValidation(form) {
    email = form.login_email.value.trim().toLowerCase();
    password = form.login_password.value.trim();
    $('.login_error').css('display', 'none');

    if (email == "" || password == "") {
        // alert("Please don't enter the blank value");
        return false;
    }

    if (emailvalidation(email)) {
        if (passwordvalidation(password)) {
            return true;
        } else {
            $('.login_error').css('display', 'block');
            $('.login_error').html('Password must be minimum eight characters, at least one letter, one number and one special character');
            
        }
    } else {
        $('.login_error').css('display', 'block');
        $('.login_error').html('Enter the email in correct format');
    }

    return false;
}

//Change Password Validation  

function changepassword(form) {
    password1 = form.password.value.trim();
    password2 = form.cpassword.value.trim();

    $('.login_error').css('display', 'none');

    if (password1 != password2) {
        // alert("Enter same password in both fields");
        $('.login_error').css('display', 'block');
        $('.login_error').html('Enter same password in both fields');
        return false;
    } else {
        if (passwordvalidation(password1)) {
            return true;
        } else {
            $('.login_error').css('display', 'block');
            $('.login_error').html('Password must be minimum eight characters, at least one letter, one number and one special character');
            return false;
        }
    }
}

// Contact Us Validation 

function contactvalidation(form) {
    fname = form.first_name.value.trim();
    lname = form.last_name.value.trim();
    phone_no = form.phone_no.value.trim();
    email = form.email.value.trim().toLowerCase();
    subject = form.subject.value;
    message = form.message.value.trim();
    $('.login_error').css('display', 'none');

    if (fname == "" || lname == "" || phone_no == "" || email == "" || subject == "" || message == "") {
        alert("Please enter all the values")
        return false;
    }

    if (emailvalidation(email)) {
        return true;
    } else {
        $('.login_error').css('display', 'block');
        $('.login_error').html('Enter the email in correct format');
        return false;
    }
}

//Contact Us Submitted Successfully

function contactus_successfully() {
    Swal.fire({
        icon: 'success',
        title: 'We will contact you ASAP'
    })
}

// Postal Code Validation

function postalvalidation() {

    $('#setup_service').css('display', 'none');
    $('#schedule_plan').css('display', 'block');
    $('#your_details').css('display', 'none');
    $('#make_payment').css('display', 'none');

    $('#tab2').addClass('book_tab_click');
    $('#tab3').removeClass('book_tab_click');
    $('#tab4').removeClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab2 div').addClass('arrow_rotate');

}

function schedulePlan() {

    $('#setup_service').css('display', 'none');
    $('#schedule_plan').css('display', 'none');
    $('#your_details').css('display', 'block');
    $('#make_payment').css('display', 'none');

    $('#tab3').addClass('book_tab_click');
    $('#tab4').removeClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab3 div').addClass('arrow_rotate');

}

function yoursdetails() {

    $('#setup_service').css('display', 'none');
    $('#schedule_plan').css('display', 'none');
    $('#your_details').css('display', 'none');
    $('#make_payment').css('display', 'block');

    $('#tab4').addClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab4 div').addClass('arrow_rotate');

}

$('#tab1').click(function () {

    $('#setup_service').css('display', 'block');
    $('#schedule_plan').css('display', 'none');
    $('#your_details').css('display', 'none');
    $('#make_payment').css('display', 'none');

    $('#tab2').removeClass('book_tab_click');
    $('#tab3').removeClass('book_tab_click');
    $('#tab4').removeClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab1 div').addClass('arrow_rotate');
});


$('#tab2').click(function () {
    if ($('#tab2').is('.book_tab_click')) {
        postalvalidation();
    }
});
$('#tab3').click(function () {
    if ($('#tab3').is('.book_tab_click')) {
        schedulePlan();
    }
});


// if($('#tab2').is('.book_tab_click')){   
//     $('#tab2').click(function () { 
//         postalvalidation();
//     });
// }

//Login Error Function display

function login_error() {
    $(window).on('load', function () {
        $('.bg-modal').css('display', 'flex');
    });
}

//Forgot Passward Error function display

function fpass_error() {
    $(window).on('load', function () {
        $('.bg-modal-fp').css('display', 'flex');
    });
}

//Side Navbar login click

$('#side_nav_login').click(function () {
    $('.bg-modal').css('display', 'flex');
    closeSideMenu();
});

//Continue Without login

$('#continue_withoutlogin').click(function () {
    login_error();
    console.log("I am here");
    $('.bg-modal').css('display', 'flex');
});

// Book Extra Service Click 

var service1 = document.getElementById("1_service");
var service2 = document.getElementById("2_service");
var service3 = document.getElementById("3_service");
var service4 = document.getElementById("4_service");
var service5 = document.getElementById("5_service");

var totalpayment = 300;
var totalhrs = 3;

function addtimehrs() {
    totalhrs = totalhrs + 0.5;
    totalpayment = totalpayment + 50;
    $('#totalpayment p span').html(totalpayment.toString().concat(" €"));
    $('#totalservicetime p span').html(totalhrs.toString().concat(" Hrs"));
}

function subtracttimehrs() {
    totalhrs = totalhrs - 0.5;
    totalpayment = totalpayment - 50;
    $('#totalpayment p span').html(totalpayment.toString().concat(" €"));
    $('#totalservicetime p span').html(totalhrs.toString().concat(" Hrs"));
}

$('#service_duration').on('change', function () {

    duration = this.value;
    time_str = duration.split(" ");
    time = parseFloat(time_str[0]);
    totalpayment = time * 100;
    totalhrs = time;
    $('#totalpayment p span').html(totalpayment.toString().concat(" €"));
    $('#totalservicetime p span').html(totalhrs.toString().concat(" Hrs"));
    $('#basic_hr p span').html(totalhrs.toString().concat(" Hrs"));


    if (service1.checked) {
        $('.inside_cabinet').css("display", "block");
        addtimehrs();
    }

    if (service2.checked) {
        $('.inside_fridge').css("display", "block");
        addtimehrs();
    }

    if (service3.checked) {
        $('.inside_oven').css("display", "block");
        addtimehrs();
    }

    if (service4.checked) {
        $('.laundry_wash').css("display", "block");
        addtimehrs();
    }

    if (service5.checked) {
        $('.inferior_window').css("display", "block");
        addtimehrs();
    }
});


$('#1_service').click(function () {

    if (service1.checked) {
        $('.inside_cabinet').css("display", "block");
        addtimehrs();
    } else {
        $('.inside_cabinet').css("display", "none");
        subtracttimehrs();
    }
});
$('#2_service').click(function () {

    if (service2.checked) {
        $('.inside_fridge').css("display", "block");
        addtimehrs();
    } else {
        $('.inside_fridge').css("display", "none");
        subtracttimehrs();
    }
});
$('#3_service').click(function () {

    if (service3.checked) {
        $('.inside_oven').css("display", "block");
        addtimehrs();
    } else {
        $('.inside_oven').css("display", "none");
        subtracttimehrs();
    }
});
$('#4_service').click(function () {

    if (service4.checked) {
        $('.laundry_wash').css("display", "block");
        addtimehrs();
    } else {
        $('.laundry_wash').css("display", "none");
        subtracttimehrs();
    }
});
$('#5_service').click(function () {

    if (service5.checked) {
        $('.inferior_window').css("display", "block");
        addtimehrs();
    } else {
        $('.inferior_window').css("display", "none");
        subtracttimehrs();
    }
});

$('#service_time').change(function () {
    time = $('#service_time').val();
    $('#servicetime_ps').html(time);
});

$('#date_sr').change(function () {
    date = $('#date_sr').val();
    $('#date_ps').html(date);
});

// Logout Alert 

function logoutalert() {
    Swal.fire({
        icon: 'success',
        title: 'Logout Successfully'
    })
}

//Spinner

$(document).ready(function () {
    $('.docreadyspinner').removeClass('spinner-border');
});

// Rating 

$("#rateYo").rateYo({
    rating: 1,
    starWidth: "20px",
    ratedFill: "#FFA500",

    onSet: function (rating, rateYoInstance) {
        $('.rating_value').html(rating);
        avgrating();
    },
});
$("#rateYo1").rateYo({
    rating: 1,
    starWidth: "20px",
    ratedFill: "#FFA500",

    onSet: function (rating, rateYoInstance) {
        $('.rating_value1').html(rating);
        avgrating();
    },
});
$("#rateYo2").rateYo({
    rating: 1,
    starWidth: "20px",
    ratedFill: "#FFA500",

    onSet: function (rating, rateYoInstance) {
        $('.rating_value2').html(rating);
        avgrating();
    },
});

$("#average_rating").rateYo({
    rating: 1,
    starWidth: "20px",
    ratedFill: "#FFA500",
});

//Sorting Option

$('.sorting_click').click(function (e) {
    e.preventDefault();

    // $('.sorting_option').toggle('display','block');

    property = $('.sorting_option').css('display');
    if (property == 'none') {
        $('.sorting_option').css('display', 'block');
    } else {
        $('.sorting_option').css('display', 'none');
    }
});

//Create Account Error

function accounterror(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email Already Exists'
    })
}

