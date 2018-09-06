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