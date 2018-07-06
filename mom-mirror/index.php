<!DOCTYPE html>
<html>
<body>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="Javascript.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/weather-icons.css" rel="stylesheet">
<link href="css/weather-icons.min.css" rel="stylesheet">
<link href="css/weather-icons-wind.css" rel="stylesheet">
<link href="css/weather-icons-wind.min.css" rel="stylesheet">

<?php

date_default_timezone_set("America/Los_Angeles");
echo '<div id="date-time">';
	echo '<div class="col-sm-4 date-time">';
		echo '<div class="col-sm-12 date">'; 
			echo date('l, M d');
		echo '</div>';
		echo '<div class="col-sm-12 time">';
			echo date('h:i');
		echo '</div>';
	echo '</div>';
echo '</div>';
?>

<div id="weather">
<div class="col-sm-7 col-sm-offset-1 weather">
        <?php
                $conditions = file_get_contents('http://api.wunderground.com/api/fb693fc6ae4b8a40/conditions/q/CA/Roseville.json');
                $weather_conditions = json_decode($conditions,TRUE);

                $forecast = file_get_contents('http://api.wunderground.com/api/fb693fc6ae4b8a40/forecast/q/CA/Roseville.json');
                $weather_forecast = json_decode($forecast,TRUE);

                $weather_icon = $weather_forecast['forecast']['simpleforecast']['forecastday'][0]['icon'];
        ?>
        <div class="col-sm-4 col-sm-offset-3 weather-icon">
                <i class="wi
                <?php 
                        if(in_array($weather_icon, ['rain','chancerain'])){
                                echo ' wi-rain';
                        }
                        elseif(in_array($weather_icon, ['chanceflurries','chancesleet','flurries','sleet'])){
                                echo ' wi-sleet';
                        }
                        elseif(in_array($weather_icon, ['chancesnow','snow'])){
                                echo ' wi-snow';
                        }
                        elseif(in_array($weather_icon, ['chancetstorms','tstorms'])){
                                echo ' wi-thunderstorm';
                        }
                        elseif(in_array($weather_icon, ['clear','sunny'])){
                                echo ' wi-day-sunny';
                        }
                        elseif(in_array($weather_icon, ['cloudy'])){
                                echo ' wi-cloudy';
                        }
                        elseif(in_array($weather_icon, ['fog','hazy'])){
                                echo ' wi-fog';
                        }
                        elseif(in_array($weather_icon, ['mostlysunny','partlycloudy'])){
                                echo ' wi-day-sunny-overcast';
                        }
                        elseif(in_array($weather_icon, ['mostlycloudy','partlysunny'])){
                                echo ' wi-day-cloudy';
                        }
                ?>
                "></i> 			
        </div>
        <div class="col-sm-5 weather-info">
        <?php 
                        echo '<div class="col-sm-12 location">';
                                print_r($weather_conditions['current_observation']['display_location']['full']);
                        echo '</div>';
                
                        echo '<div class="col-sm-12 temp">';
                                if(strlen($weather_conditions['current_observation']['temp_f']) == 2){
                                        print_r($weather_conditions['current_observation']['temp_f']);
                                        echo '.0';
                                }
                                else {
                                        print_r($weather_conditions['current_observation']['temp_f']);
                                }
                                echo '&deg';
                        echo '</div>';

                        echo '<div class="col-sm-6 temphigh">';
                                echo '<span class="glyphicon glyphicon-triangle-top"></span>';
                                echo '<span> ';
                                        print_r($weather_forecast['forecast']['simpleforecast']['forecastday'][0]['high']['fahrenheit']);
                                echo '</span>';
                        echo '</div>';

                        echo '<div class="col-sm-6 templow">';
                                echo '<span class="glyphicon glyphicon-triangle-bottom"></span>';
                                echo '<span> ';
                                        print_r($weather_forecast['forecast']['simpleforecast']['forecastday'][0]['low']['fahrenheit']);
                                echo '</span>';
                        echo '</div>';  
        ?>
        </div>
</div>
</div>

<?php
	$home_origin = '1481+Grey+Owl+Circle,+Roseville,+CA';
	$maps_api = 'AIzaSyC-mBdgVIX1B2VYQgaPzLRbM1CJTdUvNv4';
	
	ini_set("allow_url_fopen", 1);
	$servername = "localhost";
	$username = "ballj19_root";
	$password = "sitkbm19";
	$dbname = "ballj19_message";
?>
<div id="list">
<div class="list col-sm-7">
	<?php 
		echo '<div class="col-sm-12 list-item">';
		echo '<div class="glyphicon glyphicon-time list-icon"></div> ';
		echo '<div class="col-sm-10">';
		$destination = '3005+Douglas+Blvd,+Roseville,+CA+95661';					
		$now = date('U');
		$directions = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/directions/json?mode=driving&departure_time=' . $now . '&origin=' . $home_origin .'&destination=' . $destination . '&key=' . $maps_api),TRUE);
		print_r($directions['routes'][0]['legs'][0]['duration_in_traffic']['text']);
		echo ' To Work';
		echo '</div>';
		echo '</div>';
	
		echo '<div class="col-sm-12 list-item">';
		echo '<div class="glyphicon glyphicon-time list-icon"></div> ';
		echo '<div class="col-sm-10">';
		$destination = '8448+Edgecliff+Ct,+Citrus+Heights,+CA+95610';
		$now = date('U');
		$directions = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/directions/json?mode=driving&departure_time=' . $now . '&origin=' . $home_origin .'&destination=' . $destination . '&key=' . $maps_api),TRUE);
		print_r($directions['routes'][0]['legs'][0]['duration_in_traffic']['text']);
		echo " To Michele's";
		echo '</div>';  
		echo '</div>';
	?>
</div>
</div>

<?php
	$forecast = file_get_contents('http://api.wunderground.com/api/fb693fc6ae4b8a40/forecast/q/CA/Roseville.json');
	$weather_forecast = json_decode($forecast,TRUE);
?>

<div id="weather-forecast">
<div class="col-sm-4 col-sm-offset-1 weather-forecast">
<?php
        for($i=1;$i<=3;$i++){	
                
                echo '<div class="forecast-row col-sm-12">';
                $weather_high = $weather_forecast['forecast']['simpleforecast']['forecastday'][$i]['high']['fahrenheit'];
                $weather_low = $weather_forecast['forecast']['simpleforecast']['forecastday'][$i]['low']['fahrenheit'];
                $weather_icon = $weather_forecast['forecast']['simpleforecast']['forecastday'][$i]['icon'];
                $weather_day = $weather_forecast['forecast']['simpleforecast']['forecastday'][$i]['date']['weekday_short'];  
                echo '<div class="col-sm-3  col-sm-offset-1 forecast-day">';
                        echo $weather_day;
                echo '</div>';

                echo '<div class="col-sm-2 forecast-icon">';
                echo '<i class="wi';
                if(in_array($weather_icon, ['rain','chancerain'])){
                        echo ' wi-rain';
                }
                elseif(in_array($weather_icon, ['chanceflurries','chancesleet','flurries','sleet'])){
                        echo ' wi-sleet';
                }
                elseif(in_array($weather_icon, ['chancesnow','snow'])){
                        echo ' wi-snow';
                }
                elseif(in_array($weather_icon, ['chancetstorms','tstorms'])){
                        echo ' wi-thunderstorm';
                }
                elseif(in_array($weather_icon, ['clear','sunny'])){
                        echo ' wi-day-sunny';
                }
                elseif(in_array($weather_icon, ['cloudy'])){
                        echo ' wi-cloudy';
                }
                elseif(in_array($weather_icon, ['fog','hazy'])){
                        echo ' wi-fog';
                }
                elseif(in_array($weather_icon, ['mostlysunny','partlycloudy'])){
                        echo ' wi-day-sunny-overcast';
                }
                elseif(in_array($weather_icon, ['mostlycloudy','partlysunny'])){
                        echo ' wi-day-cloudy';
                }
                echo '"></i>'; 			
                echo '</div>';

                echo '<div class="col-sm-6">';
                        echo '(' . $weather_high . ' / ';
                        echo $weather_low . ')';
                echo '</div>'; 
                echo '</div>'; 
        }
?>
</div>
</div>

<div id="note-list">
<div class="note col-sm-7">
	<?
		$servername = "localhost";
		$username = "ballj19_root";
		$password = "sitkbm19";
		$dbname = "ballj19_message";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		} 
		
		$select_sql = "SELECT note FROM notes";
		$result = $conn->query($select_sql);
		while($row = $result->fetch_assoc()){
		$current_note = str_replace("~~","'",$row['note']);
		echo '<div id="note">';
			echo '<div class="col-sm-12 list-item">';
				echo '<div class="glyphicon glyphicon-list list-icon"></div> ';
				echo '<div class="col-sm-10">';
					echo $current_note;
				echo '</div>';  
			echo '</div>';
		echo '</div>';
		}
		$conn->close();
	?>
</div>
</div>

<div id="message">
<?php
        ini_set("allow_url_fopen", 1);
        $servername = "localhost";
        $username = "ballj19_root";
        $password = "sitkbm19";
        $dbname = "ballj19_message";
?>
<div class="col-sm-8 col-sm-offset-2 message">
	<?php 
		  // Create connection
		  $conn = new mysqli($servername, $username, $password, $dbname);
		  // Check connection
		  if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
		  } 

		  $select_sql = "SELECT message FROM messages";
		  $result = $conn->query($select_sql);
		  $row = $result->fetch_assoc();
		  $current_message = str_replace("~~","'",$row['message']);
		  echo $current_message;
		  $conn->close();
	?>
</div>
</div>


<script>
	$(document).ready(function () {
		$("#slideshow > div:gt(0)").hide();

		setInterval(function () {
			$('#slideshow > div:first')
			  .fadeOut(1000)
			  .next()
			  .fadeIn(1000)
			  .end()
			  .appendTo('#slideshow');
		}, 5000);
	});
</script>

<div class="col-sm-6 col-sm-offset-3">
<div id="slideshow">
	 <?php
		$used_ints = [];
		for($n=100;$n<169;$n++){
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