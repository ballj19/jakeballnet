function ReptileForm(_reptile)
{
        var reptile = _reptile.replace(" ","%");
        $('#reptile-form').load('manage.php?name=' + reptile, function () {
                $(this).unwrap();
            });
}