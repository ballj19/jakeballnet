<?php

date_default_timezone_set("America/Los_Angeles");

	echo '<div class="col-sm-4 date-time">';
		echo '<div class="col-sm-12 date">'; 
			echo date('l, M d');
		echo '</div>';
		echo '<div class="col-sm-12 time">';
			echo date('h:i');
		echo '</div>';
	echo '</div>';

?>