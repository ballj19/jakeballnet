<!DOCTYPE html>
<html>
<body>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="JavaScript.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/weather-icons.css" rel="stylesheet">
<link href="css/weather-icons.min.css" rel="stylesheet">
<link href="css/weather-icons-wind.css" rel="stylesheet">
<link href="css/weather-icons-wind.min.css" rel="stylesheet">

<div id="date-time"></div>

<div id="weather"></div>

<div id="list"></div>

<div id="weather-forecast"></div>

<div id="note-list"></div>

<div id="message"></div>


<script>
	$(document).ready(function () {
		$("#slideshow > div:gt(0)").hide();

		setInterval(function () {
			$('#slideshow > div:first')
			  .fadeOut(1500)
			  .next()
			  .fadeIn(1500)
			  .end()
			  .appendTo('#slideshow');
		}, 8000);
	});
</script>

<div class="col-sm-6 col-sm-offset-3">
<div id="slideshow">
	 <?php
		$used_ints = [];
		for($n=100;$n<=169;$n++){
			while(in_array($i = rand(100,169),$used_ints));
			$used_ints[] = $i;
			
			echo '<div>';
			echo '<img src="slideshow/IMG' . $i . '.JPG" class="img-responsive';
			list($width, $height) = getimagesize('slideshow/IMG' . $i . '.JPG');
			if($width>$height){
				echo ' img-landscape';
			}
			else{
				echo ' img-portrait';
			}
			echo '">';
			echo '</div>';
		}
	 ?>
</div>
</div>

</body>
</html>