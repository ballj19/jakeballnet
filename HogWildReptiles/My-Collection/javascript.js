function ResizeBannerPics()
{
    var windowWidth = $(window).width();

    /*var picturesWidth = window.getComputedStyle(document.getElementById("banner-pictures"), null).getPropertyValue('width');

    picturesWidth = picturesWidth.substring(0, picturesWidth.length - 2);

    picturesWidth = parseInt(picturesWidth);

    var margin = (windowWidth - picturesWidth) / 2;*/

    numofchildren = document.getElementById("banner-pictures").childElementCount;

    if(numofchildren > 4)
    {
        numofchildren = 4;
    }

    var picturesWidth = numofchildren * 354;

    var margin = (windowWidth - picturesWidth) / 2;

    document.getElementById("banner-pictures").style.marginLeft = margin.toString() + "px";

    console.log(margin.toString() + "px");
    console.log(windowWidth);
    console.log(picturesWidth);
    console.log(margin);

}


$(window).resize(function(){
    ResizeBannerPics();
});

$(document).ready(function(){
    ResizeBannerPics();
});