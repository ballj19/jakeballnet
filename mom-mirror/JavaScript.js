setInterval("refreshList();", 300 * 1000);
setInterval("refreshNote();",3 * 1000);
setInterval("refreshMessage();", 3 * 1000);
setInterval("refreshTime();", 1 * 1000);
setInterval("refreshWeather();", 600 * 1000);
setInterval("refreshForecast();", 6000 * 1000);
//setInterval("refreshSlideshow();", 16 * 2 * 1000); //Number of pictures * cycle rate of pictures  (Not working, supposed to re-randomize slideshow at completion)

$(document).ready(function () {
    $("#slideshow > div:gt(0)").hide();

    setInterval(function () {
        $('#slideshow > div:first')
          .fadeOut(2000)
          .next()
          .fadeIn(2000)
          .end()
          .appendTo('#slideshow');
    }, 12000);
});

function refreshMessage() {
    $('#message').load('phpSnips/message.php', function () {
        $(this).unwrap();
    });
}

function refreshWeather() {
    $('#weather').load('phpSnips/weather.php', function () {
        $(this).unwrap();
    });
}

function refreshForecast() {
    $('#weather-forecast').load('phpSnips/weather-forecast.php', function () {
        $(this).unwrap();
    });
}

function refreshTime() {
    $('#date-time').load('phpSnips/date-time.php', function () {
        $(this).unwrap();
    });
}

function refreshList() {
    $('#list').load('phpSnips/list.php', function () {
        $(this).unwrap();
    });
}


function refreshNote() {
    $('#note-list').load('phpSnips/note.php', function () {
        $(this).unwrap();
    });
}

function refreshSlideshow() {
    $('#slideshow-wrapper').load('phpSnips/slideshow.php', function () {
        $(this).unwrap();
    });
}
