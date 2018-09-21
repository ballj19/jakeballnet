

setInterval(refreshLCD,200);
setInterval(refreshOutputs,200);

$(document).ready(function () {
  $('#N').on('touchstart', function(){
    ButtonPress("N");
  });
  $('#N').on('touchend', function(){
    ButtonRelease("N");
  });
  $('#S').on('touchstart', function(){
    ButtonPress("S");
  });
  $('#S').on('touchend', function(){
    ButtonRelease("S");
  });

  refreshLCD();
  refreshOutputs();
});

function ButtonPress(button)
{
  $.ajax({
    url: 'ButtonPress.php?button=' + button,
    success: function() {
    }
  });
}

function ButtonRelease(button)
{
  $.ajax({
    url: 'ButtonRelease.php?button=' + button,
    success: function() {
    }
  });
}

function refreshLCD()
{
  $('#LCD').load('RefreshLCD.php');
}

function refreshOutputs()
{
  $('#outputs-wrapper').load('RefreshOutputs.php');
}