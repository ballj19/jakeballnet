function ReptileForm(_reptile)
{
        var reptile = _reptile.replace(" ","%");
        /*$('#reptile-form').load('manage.php?name=' + reptile, function () {
                $(this).unwrap();
        });*/

        $('#reptile-form').load('manage.php?name=' + reptile);
}

function AddForm()
{
        /*$('#reptile-form').load('blank-form.php', function () {
                
                $(this).unwrap();
        });*/

        $('#reptile-form').load('blank-form.php');
}

function IndividualCalendar(_reptile)
{
        var reptile = _reptile.replace(" ","%");
        $('#dropdown-date').load('../Calendar/dropdown-date.php?name=' + reptile);
}

function GenerateInfo(_reptile)
{
        ReptileForm(_reptile);
        IndividualCalendar(_reptile);
}