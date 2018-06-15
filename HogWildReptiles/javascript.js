$(document).ready(function(){
    $("#explore-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#explore-container").offset().top
        }, 1500);
    });
});