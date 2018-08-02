$(document).ready(function(){

        GenerateCalendar();
});

function GenerateCalendar()
{
        var month = document.getElementById('month');
        var monthValue = month.options[month.selectedIndex].value;
        var year = document.getElementById('year');
        var yearValue = year.options[year.selectedIndex].value;

        $('#calendar').load('calendar.php?month=' + monthValue + "&year=" + yearValue, function () {
                $(this).unwrap();
        });        
}

function ResizeCalendar()
{
        console.log('we tried');
        var height = $(window).height() / 8;
        console.log(height);
        $('.day').css({ 'height': height + 'px'});
        $('.blank-day').css({ 'height': height + 'px'});
}

$(window).resize(function(){
        ResizeCalendar();
});