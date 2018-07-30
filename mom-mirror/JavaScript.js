$(document).ready(function () {
    setInterval("refreshList();", 300 * 1000);
    setInterval("refreshNote();",3 * 1000);
    setInterval("refreshMessage();", 3 * 1000);
    setInterval("refreshTime();", 1 * 1000);
    setInterval("refreshWeather();", 600 * 1000);
    setInterval("refreshForecast();", 6000 * 1000);
    //setTimeout(function(){
    //   window.location.reload(1);
    //}, 1200000);

    refreshTime();
    refreshWeather();
    refreshList();
    refreshForecast();
    refreshNote();
    refreshMessage();
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
