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

function showName(name)
{
    var nameBlock = document.getElementById(name);
    var picBlock = document.getElementById(name + "-pic");
    nameBlock.style.display = "block";
    picBlock.style.filter = "brightness(40%)";
}

function hideName(name)
{
    var nameBlock = document.getElementById(name);
    var picBlock = document.getElementById(name + "-pic");
    nameBlock.style.display = "none";
    picBlock.style.filter = "brightness(100%)";
}