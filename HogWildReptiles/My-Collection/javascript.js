function ResizeBannerPics()
{
    var windowWidth = $(window).width();

    numofchildren = document.getElementById("banner-pictures").childElementCount;

    console.log("windowWidth: " + windowWidth);

    while(numofchildren * 354 >= windowWidth || numofchildren * 354 > 1416)
    {
        numofchildren--;
        console.log(numofchildren);
        console.log(numofchildren * 354);
    }

    var picturesWidth = numofchildren * 354;

    console.log("picwidth: " + picturesWidth);

    var margin = (windowWidth - picturesWidth) / 2;

    document.getElementById("banner-pictures").style.marginLeft = margin.toString() + "px";
}


$(window).resize(function(){
    ResizeBannerPics();
});

$(document).ready(function(){
    ResizeBannerPics();
});