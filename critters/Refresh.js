setInterval("refreshTable();", 15 * 1000);

function refreshTable() {
    $('#critter-table').load('update-table.php', function () {
        $(this).unwrap();
    });
}

function diglettChart() {
    $('#diglettModal').load('update-diglett.php', function () {
        $(this).unwrap();
    });
}