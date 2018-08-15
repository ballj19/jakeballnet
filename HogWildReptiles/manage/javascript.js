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
        IndividualPics(_reptile);
}

function IndividualPics(_reptile)
{
        var reptile = _reptile.replace(" ","%");
        $('#individual-pics').load('individual-pics.php?name=' + reptile);
}

function DeletePicture(file)
{
        if (confirm('Are you sure you want to delete this picture from the database?')) {
       
                $.ajax({
                        url: 'deletepic.php?file=' + file + '&reptile=' + reptile.value,
                        success: function() {
                                IndividualPics(reptile.value);
                                alert('File deleted.');
                        }
                    });
        
            } else {
                // Do nothing!
            }
}

function MakeCover(file)
{
        $.ajax({
                url: 'makecover.php?file=' + file + '&reptile=' + reptile.value,
                success: function() {
                        IndividualPics(reptile.value);
                        alert('This Picture is now the Cover Photo.');
                }
            });
}

function RotatePic(file, degrees)
{
        $.ajax({
                url: 'rotateImg.php?file=' + file + '&reptile=' + reptile.value + '&degrees=' + degrees,
                success: function() {
                        IndividualPics(reptile.value);
                }
            });

}