function ReptileForm(id)
{
        $('#reptile-form').load('php/manage.php?id=' + id);
}

function AddForm()
{
        $('#reptile-form').load('php/blank-form.php');
}

function IndividualCalendar(id)
{
        $('#dropdown-date').load('../Calendar/dropdown-date.php?id=' + id);
}

function GenerateInfo(id)
{
        ReptileForm(id);
        IndividualCalendar(id);
        IndividualPics(id);
        IndividualVids(id);
}

function IndividualPics(id)
{
        $('#individual-pics').load('php/individual-pics.php?id=' + id);
}

function IndividualVids(id)
{
        $('#individual-vids').load('php/individual-vids.php?id=' + id);
}

function DeletePicture(file)
{
        if (confirm('Are you sure you want to delete this picture from the database?')) {
       
                $.ajax({
                        url: 'php/deletepic.php?file=' + file + '&id=' + reptile.value,
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
                url: 'php/makecover.php?file=' + file + '&id=' + reptile.value,
                success: function() {
                        IndividualPics(reptile.value);
                        alert('This Picture is now the Cover Photo.');
                }
            });
}

function RotatePic(file, degrees)
{
        $.ajax({
                url: 'php/rotateImg.php?file=' + file + '&id=' + reptile.value + '&degrees=' + degrees,
                success: function() {
                        IndividualPics(reptile.value);
                }
            });

}

function UploadVideo(video)
{
        $.ajax({
                url: 'php/upload_vid.php?video=' + video + '&id=' + reptile.value,
                success: function(response) {
                        console.log(response);
                        IndividualVids(reptile.value);
                },
                error: function(response){
                        alert(response);
                }
            });
}

function DeleteVideo(video)
{
        $.ajax({
                url: 'php/delete_vid.php?video=' + video + '&id=' + reptile.value,
                success: function(response) {
                        console.log(response);
                        IndividualVids(reptile.value);
                },
                error: function(response){
                        alert(response);
                }
            });
}