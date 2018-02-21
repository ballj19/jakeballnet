setInterval("refreshTable();", 15 * 1000);

function refreshTable() {
    $('#critter-table').load('update-table.php', function () {
        $(this).unwrap();
    });
}

function diglettChart() {
    $('#critter-table').load('update-table.php', function () {
        $(this).unwrap();
    });
}