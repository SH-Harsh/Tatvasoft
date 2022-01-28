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


// Accordian

// function faqpara(para, arrow){
//     console.log("Enter the function")
//     var element = document.getElementById(para);
//     element.classList.toggle("height_toggle");

//     var arrow_img = document.getElementById(arrow);
//     arrow_img.classList.toggle("arrow_rotate");
// }



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


// Tab function 

// function openService(evt, cityName) {
//     console.log("Enter fuction");
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     console.log(tabcontent.length);
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablinks");
//     console.log(tablinks);
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace("active", "");
//     }
//     document.getElementById(cityName).style.display = "block";
//     console.log(evt);
//     evt.currentTarget.className += " active";
// }

// Custom File Chosen 

var readFile = document.getElementById("attachment");
var custText = document.getElementById("file_name");

readFile.addEventListener("change", function(){
    if(readFile.value){
        custText.innerHTML = readFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    }else{
        custText.innerHTML = "No file chosen,yet";
    }
});


