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
}

$('.ok').click(function () {
    $('.privacy_policy').css('display', 'none');
});

$('.arrow_down_nav').click(function () {
    $('.arrow_down_section').toggle('display', 'block');
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
    $('.right_service_list').css('display', 'none');
    $('#new_service_request').css('display', 'none');
    $('#service_history').css('display', 'none');
    $('#block_customer').css('display', 'none');
    $('#my_ratings').css('display', 'none');
    $('#My_settings_service').css('display', 'none');
    $('#My_settings_customer').css('display', 'none');
    $('#Service_history').css('display', 'none');
    $('#dashboard').css('display', 'none');

    $('.active_left').removeClass('active_left');

    $(id).css('display', 'block');
}


$('#MySettings').click(function () {

    // display('#My_settings_customer');
    display('#My_settings_service');
    $('#My_settings_customer').css('display', 'block');

    $('.arrow_down_section').css('display', 'none');

});

function avatar_logo(event, className) {
    var class_selected = document.getElementById('avatar_selected').classList;
    class_selected.replace(class_selected[1], className);
}

$('.avatar').click(function () {
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


// Date time picker 

$(function () {
    $('#datetimepicker1').datepicker();
});


//Star rating

var count1;

function starmark(item) {
    count1 = item.id[0];
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



// Change Image on Click Selected 

function changeimg(img_src) {
    var element = document.getElementById(img_src);
    var no = img_src.split("-");

    var border_color = document.getElementById(no[0]);
    border_color.classList.toggle("extra_service_border_click");

    if (element.src.match(img_src)) {
        console.log("1");
        element.src = "assets/" + no[0] + ".png";
    } else {
        console.log("2");
        element.src = "assets/" + img_src + ".png";
    }
}

// Add Address

$('.add_address').click(function () {
    $('.add_new_address').css('display', 'block');
    $('.add_address').css('display', 'none');
});

$('#save_address_btn').click(function () {
    $('.add_new_address').css('display', 'none');
    $('.add_address').css('display', 'block');
});

$('.cancel_btn').click(function () {
    $('.add_new_address').css('display', 'none');
    $('.add_address').css('display', 'inline');
});


// Tabs Move to Next Tab 

$('#check_availability').click(function () {
    $('#setup_service').css('display', 'none');
    $('#schedule_plan').css('display', 'block');

    $('#tab2').addClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab2 div').addClass('arrow_rotate');

});

$('#continue_schedulePlan').click(function () {
    $('#schedule_plan').css('display', 'none');
    $('#your_details').css('display', 'block');

    $('#tab3').addClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab3 div').addClass('arrow_rotate');

});

$('#continue_details').click(function () {
    $('#your_details').css('display', 'none');
    $('#make_payment').css('display', 'block');

    $('#tab4').addClass('book_tab_click');
    $('.arrow_rotate').removeClass('arrow_rotate');
    $('#tab4 div').addClass('arrow_rotate');

});

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

        alert("Please enter the email in correct format");
        return false;
    }
    return true;
}

// Password Validation 
function passwordvalidation(password) {
    if (password.match(/^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/)) {
        return true;
    } else {
        alert("Password must be minimum eight characters, at least one letter, one number and one special character");
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

    if (fname == "" || lname == "" || email == "" || password1 == "") {
        alert("Please don't enter the blank value");
        return false;
    }

    if (emailvalidation(email)) {
        if (password1 != password2) {
            alert("\nPassword did not match: Please try again...")
            return false;
        }

        if (passwordvalidation(password1)) {
            alert("Register Successfull, Please now login")
            return true;
        }
    }

    return false;

}

// Login Validation 

function loginValidation(form) {
    email = form.login_email.value.trim().toLowerCase();
    password = form.login_password.value.trim();
    console.log("I am a validation");

    if (email == "" || password == "") {
        alert("Please don't enter the blank value");
        return false;
    }

    if (emailvalidation(email)) {
        return passwordvalidation(password);
    }

    return false;
}

//Change Password Validation  

function changepassword(form) {
    password1 = form.password.value.trim();
    password2 = form.cpassword.value.trim();

    if (password1 != password2) {
        alert("Enter same password in both fields");
        return false;
    } else {
        return passwordvalidation(password1);
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

    if (fname == "" || lname == "" || phone_no == "" || email == "" || subject == "" || message == "") {
        alert("Please enter all the values")
        return false;
    }

    return emailvalidation(email);
}

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