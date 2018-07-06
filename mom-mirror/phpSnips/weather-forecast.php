<?php
	$forecast = file_get_contents('http://api.wunderground.com/api/fb693fc6ae4b8a40/forecast/q/CA/Roseville.json');
	$weather_forecast = json_decode($forecast,TRUE);
?>

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