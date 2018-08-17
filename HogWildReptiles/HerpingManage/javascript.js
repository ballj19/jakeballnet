function HerpingForm(_herping)
{
        var herping = _herping.replace(" ","%");

        $('#herping-form').load('manage.php?name=' + herping);
}

function AddForm()
{
        $('#herping-form').load('blank-form.php');
}

function GenerateInfo(_herping)
{
        HerpingForm(_herping);
        IndividualPics(_herping);
}

function IndividualPics(_herping)
{
        var herping = _herping.replace(" ","%");
        $('#individual-pics').load('individual-pics.php?name=' + herping);
}

function DeletePicture(file)
{
        if (confirm('Are you sure you want to delete this picture from the database?')) {
       
                $.ajax({
                        url: 'deletepic.php?file=' + file + '&herping=' + herping.value,
                        success: function() {
                                IndividualPics(herping.value);
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
                url: 'makecover.php?file=' + file + '&herping=' + herping.value,
                success: function() {
                        IndividualPics(herping.value);
                        alert('This Picture is now the Cover Photo.');
                }
            });
}

function RotatePic(file, degrees)
{
        $.ajax({
                url: 'rotateImg.php?file=' + file + '&herping=' + herping.value + '&degrees=' + degrees,
                success: function() {
                        IndividualPics(herping.value);
                }
            });

}