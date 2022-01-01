function changeBg(){
    var scrollValue = window.scrollY;
    // console.log(scrollValue);

    var navbar = document.getElementById("navbar");

    if(scrollValue < 150){
        navbar.classList.remove('bgcolor');
    }else{
        navbar.classList.add('bgcolor');
    }
}

window.addEventListener('scroll',changeBg);



