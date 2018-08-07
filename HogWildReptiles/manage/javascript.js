function ReptileForm(_reptile)
{
        var reptile = _reptile.replace(" ","%");
        $('#reptile-form').load('manage.php?name=' + reptile, function () {
                $(this).unwrap();
        });
}

function AddForm()
{
        $('#reptile-form').load('blank-form.php', function () {
                $(this).unwrap();
        });
}