setInterval("refreshInfo();", 3 * 1000);

function refreshInfo() {
    $('#info').load('update-results.php', function () {
        $(this).unwrap();
    });
}