$(function () {
    $('#datetimepicker1').datepicker();
});

$(function () {
    $('#datetimepicker2').datepicker();
});

$(function () {
    $('#datetimepicker3').datepicker();
});

// $('.menu_option_dot').click(function () { 
//     $('.menu_option_dot').toggleClass('menu_option_click');  
// });

$('.edit_reschedule').click(function () { 
    $('.bg-modal').css('display', 'flex');
});

$('.modal_close').click(function () { 
    $('.bg-modal').css('display', 'none');
});



