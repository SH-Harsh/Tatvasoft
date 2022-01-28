$(function () {
    $('#datetimepicker1').datepicker();
});

$(function () {
    $('#datetimepicker2').datepicker();
});

$(function () {
    $('#datetimepicker3').datepicker();
});

$('.edit_reschedule').click(function () { 
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



// Navbar Change 

function changeBg(){
    var scrollValue = window.scrollY;
    // console.log(scrollValue);

    var navbar = document.getElementById("header");
    $('#header').css('background-color','transparent');

    if(scrollValue > 80){
        navbar.classList.add('bgcolor');
        $('.logo img').css('height', '54px');
        $('.logo img').css('width', '73px');
        $('.nav_option ul li').css('margin', '10px 10px 0px');
        // $('#header').css('background-color','#525252');
        $('#header').css('background-color','rgba(82,82,82,0.9)');
    }else{
        navbar.classList.remove('bgcolor');
        $('.logo img').css('height', '102px');
        $('.logo img').css('width', '138px');
        $('.nav_option ul li').css('margin', '43px 10px 0px');
        $('#header').css('background-color','transparent');
    }
}

window.addEventListener('scroll',changeBg);










