$(document).ready(function(){
});

function GenerateCalendar(id)
{
        var month = document.getElementById('month');
        var monthValue = month.options[month.selectedIndex].value;
        var year = document.getElementById('year');
        var yearValue = year.options[year.selectedIndex].value;
        console.log('GenerateCalendar');
        if(id == '')
        {
                $('#calendar').load('../Calendar/calendar.php?month=' + monthValue + "&year=" + yearValue); 
        }
        else
        {
                $('#calendar').load('../Calendar/calendar.php?month=' + monthValue + "&year=" + yearValue + "&iid=" + id); 
                console.log(id)
        }       
}

function ResizeCalendar()
{
        var height = $(window).height() / 8;
        $('.day').css({ 'height': height + 'px'});
        $('.blank-day').css({ 'height': height + 'px'});
}

function DropdownDate()
{
        $('#dropdown-date').load('../Calendar/dropdown-date.php');
}

$(window).resize(function(){
        ResizeCalendar();
});