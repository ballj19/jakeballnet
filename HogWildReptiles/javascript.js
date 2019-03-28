$(document).ready(function(){
    $("#forsale-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#forsale-container").offset().top
        }, 1500);
    });
});

$(document).ready(function(){
    $("#tour-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#tour-container").offset().top
        }, 1500);
    });
});
