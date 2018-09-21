$(window).load(function(){
        RealignText("education");
        RealignText("mce");
        RealignText("glumac");
        RealignText("hiking");
        RealignText("boating");
    });

$(window).resize(function(){
        RealignText("education");
        RealignText("mce");
        RealignText("glumac");
        RealignText("hiking");
        RealignText("boating");
});

function RealignText(section)
{
        var pic = document.getElementById(section + "-pic");
        var text = document.getElementById(section + "-text");

        var sectionHeight = pic.clientHeight;
        var textHeight = text.clientHeight;

        var marginTop = (sectionHeight - textHeight) / 2;

        text.style.marginTop = marginTop + "px";
}

