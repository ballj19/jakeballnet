function HerpingForm(id)
{
                $('#herping-form').load('php/manage.php?id=' + id);
}

function AddForm()
{
        $('#herping-form').load('php/blank-form.php');
}

function GenerateInfo(id)
{
        HerpingForm(id);
        IndividualPics(id);
}

function IndividualPics(id)
{
        $('#individual-pics').load('php/individual-pics.php?id=' + id);
}

function DeletePicture(file)
{
        if (confirm('Are you sure you want to delete this picture from the database?')) {
       
                $.ajax({
                        url: 'php/deletepic.php?file=' + file + '&herping=' + herping.value,
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
                url: 'php/makecover.php?file=' + file + '&id=' + herping.value,
                success: function() {
                        IndividualPics(herping.value);
                        alert('This Picture is now the Cover Photo.');
                }
            });
}

function RotatePic(file, degrees)
{
        $.ajax({
                url: 'php/rotateImg.php?file=' + file + '&id=' + herping.value + '&degrees=' + degrees,
                success: function() {
                        IndividualPics(herping.value);
                }
            });

}