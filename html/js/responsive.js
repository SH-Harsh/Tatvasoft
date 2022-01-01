var selectField = document.getElementById("selectField");
var selectText = document.getElementById("selectText");
var options = document.getElementsByClassName("option");
var list = document.getElementById("list");

for(option of options){
    option.onclick = function() {
        selectText.innerHTML = this.textContent;
        list.classList.toggle("hide");
    }
}

selectField.onclick = function() {
    list.classList.toggle("hide");
};

$(window).on('load resize', function () {

    function screen_size() {

        var window_size = $(window).width();

        if (window_size < 770) {
            console.log($(window).width());
            $('table.menu_table').hide();
            $('.select_option').show();
        } else {
            $('table.menu_table').show();
            $('.select_option').hide(); 
        }
    }

    screen_size();
});


