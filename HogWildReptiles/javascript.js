$(document).ready(function(){
    $("#explore-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#news-container").offset().top
        }, 1500);
    });
});