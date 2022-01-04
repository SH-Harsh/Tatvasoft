function changeBg(){
    var scrollValue = window.scrollY;
    // console.log(scrollValue);

    var navbar = document.getElementById("navbar");
    $('#navbar').css('background-color','transparent');

    if(scrollValue > 80){
        navbar.classList.add('bgcolor');
        $('.company_logo').css('height', '54px');
        $('.company_logo').css('width', '73px');
        $('#navbar').css('background-color','#525252');
    }else{
        navbar.classList.remove('bgcolor');
        $('.company_logo').css('height', '102px');
        $('.company_logo').css('width', '138px');
        $('#navbar').css('background-color','transparent');
    }
}

window.addEventListener('scroll',changeBg);



