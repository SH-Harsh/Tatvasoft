// Tab function 

function openService(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    console.log(tabcontent.length);
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    console.log(tablinks);
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(cityName).style.display = "block";
    console.log(evt);
    evt.currentTarget.className += " active";
}

// Accordian

function faqpara(para, arrow) {
    console.log("Enter the function")
    var element = document.getElementById(para);
    console.log(element);
    element.classList.toggle("height_toggle");

    var arrow_img = document.getElementById(arrow);
    arrow_img.classList.toggle("arrow_rotate_faq");
}