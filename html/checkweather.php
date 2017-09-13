<?php
$title = "Check Weather";
$source = "test";
$class = "flight-body-background";

require_once 'html/header_inner.php';
//----------------------------------------------------
?>
	<!-- html part starts -->
	<div class="weather-page-header">
		<h4 id="weatherHeading">Check Weather</h4>
	</div>
	<section class="weather-page-wrapper" id="weather-form">
		<form action="cityweather.php" method="post" id="weather">
			<div class="row form-group">
				<div class="col-md-9 col-xs-12">
					<label for="cityName">Enter City Name</label>
					<input type="text" name="cityName" class="form-control" id="cityName" required="true">
				</div>
				<div class="col-md-3 col-xs-6">
					<label for="getWeather">&nbsp;</label>
					<button class="btn btn-danger btn-block" type="submit" name="getWeather" id="getWeather">Check</button>
				</div>
			</div>
		</form>
	</section>
<?
//----------------------------------------------------
require_once 'html/footer-flight.php';
?>

<script type="text/javascript">
    $(document).ready(function(){
	
        $.validate();

	});

</script>