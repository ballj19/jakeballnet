<?php
	$home_origin = '1481+Grey+Owl+Circle,+Roseville,+CA';
	$maps_api = 'AIzaSyC-mBdgVIX1B2VYQgaPzLRbM1CJTdUvNv4';
	
	ini_set("allow_url_fopen", 1);
	$servername = "localhost";
	$username = "ballj19_root";
	$password = "sitkbm19";
	$dbname = "ballj19_message";
?>
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