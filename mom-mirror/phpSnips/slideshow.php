<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
		}, 2000);
	});
</script>

<div id="slideshow">
	 <?php
		$used_ints = [];
		for($n=1;$n<16;$n++){
			while(in_array($i = rand(1,16),$used_ints));
			$used_ints[] = $i;
			
			echo '<div>';
			echo '<img src="http://localhost/mom-mirror/slideshow/img' . $i . '" class="img-responsive';
			list($width, $height) = getimagesize('http://localhost/mom-mirror/slideshow/img' . $i . '.jpg');
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