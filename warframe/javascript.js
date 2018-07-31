function PerLevelTable(_frame, level, sf, v, r, vazarin) {
    Console.load("made it");
    var frame = _frame.replace(" ","%");
    $('#perLevelTable').load('phpSnips/perLevelTable.php?frame=' + frame + '&level=' + level + '&sf=' + sf + '&v=' + v + '&r=' + r + '&vazarin=' + vazarin, function () {
            $(this).unwrap();
        });
        $('#base_stats').load('phpSnips/base_stats.php?frame=' + frame + '&level=' + level, function () {
            $(this).unwrap();
        });

    }