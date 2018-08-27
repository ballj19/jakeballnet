function IndividualForm(id, table)
{
        $('#enter-form').load('php/manage.php?id=' + id + '&table=' + table);
}

function AddForm(table)
{
        $('#enter-form').load('php/blank-form.php?table=' + table);
}

function IndividualCalendar(id, table)
{
        $('#dropdown-date').load('../Calendar/dropdown-date.php?id=' + id + '&table=' + table);
}

function GenerateInfo(id, table)
{
        IndividualForm(id, table);
        IndividualCalendar(id, table);
        IndividualPics(id, table);
        IndividualVids(id, table);
}

function IndividualPics(id, table)
{
        console.log("ip" + table);
        $('#individual-pics').load('php/individual-pics.php?id=' + id + '&table=' + table);
}

function IndividualVids(id, table)
{
        $('#individual-vids').load('php/individual-vids.php?id=' + id + '&table=' + table);
}

function DeletePicture(file, table)
{
        if (confirm('Are you sure you want to delete this picture from the database?')) {
       
                $.ajax({
                        url: 'php/deletepic.php?file=' + file + '&id=' + dropdownselect.value + '&table=' + table,
                        success: function() {
                                IndividualPics(dropdownselect.value, table);
                                alert('File deleted.');
                        }
                    });
        
            } else {
                // Do nothing!
            }
}

function MakeCover(file, table)
{
        $.ajax({
                url: 'php/makecover.php?file=' + file + '&id=' + dropdownselect.value + '&table=' + table,
                success: function() {
                        IndividualPics(dropdownselect.value, table);
                        console.log("mc" + table);
                        alert('This Picture is now the Cover Photo.');
                }
            });
}

function RotatePic(file, table, degrees)
{
        $.ajax({
                url: 'php/rotateImg.php?file=' + file + '&id=' + dropdownselect.value + '&degrees=' + degrees + '&table=' + table,
                success: function() {
                        IndividualPics(dropdownselect.value, table);
                }
            });

}

function UploadVideo(video)
{
        $.ajax({
                url: 'php/upload_vid.php?video=' + video + '&id=' + dropdownselect.value + '&table=' + table,
                success: function(response) {
                        console.log(response);
                        IndividualVids(dropdownselect.value, table);
                },
                error: function(response){
                        alert(response);
                }
            });
}

function DeleteVideo(video)
{
        $.ajax({
                url: 'php/delete_vid.php?video=' + video + '&id=' + dropdownselect.value + '&table=' + table,
                success: function(response) {
                        console.log(response);
                        IndividualVids(dropdownselect.value, table);
                },
                error: function(response){
                        alert(response);
                }
            });
}