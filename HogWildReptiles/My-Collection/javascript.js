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

function showName(id)
{
    var nameBlock = document.getElementById(id);
    var picBlock = document.getElementById(id + "-pic");
    nameBlock.style.display = "block";
    picBlock.style.filter = "brightness(40%)";
}

function hideName(id)
{
    var nameBlock = document.getElementById(id);
    var picBlock = document.getElementById(id + "-pic");
    nameBlock.style.display = "none";
    picBlock.style.filter = "brightness(100%)";
}

function ResizeYoutube()
{
    var width = $(window).width() * 5 / 12 - 30;
    var height = width * 9 / 16 ;

    console.log(width);

    $(".youtube").css('height', height + "px");
}

function DisplayModal(imagesrc)
{
    // Get the modal
    var modal = document.getElementById('modal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("modal-content");
    modal.style.display = "block";
    modalImg.src = imagesrc;
}

function CloseModal()
{
    // Get the modal
    var modal = document.getElementById('modal');
    modal.style.display = "none";
}