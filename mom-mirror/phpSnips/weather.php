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