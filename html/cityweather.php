<?php

$title = "Weather";
$source = "cityWeather";

require_once 'header_inner.php';

?>
<section class="weather-wrapper">
    <div class="main-weather-wrapper">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 p-r-0 p-l-0">
                <h1 class="weather-grey-color"><?php echo isset($cityNm) ? $cityNm : "";
                    echo isset($countryName) ? ", " . $countryName : ""; ?></h1>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 p-r-0 p-l-0">
                <form role="form" method="post" class="form-inline" style="margin-top: 1.4rem;float: right;">
                    <div class="form-group">
                        <input type="text" name="cityName" placeholder="Enter City Name" class="form-control" autocomplete="off" required>
                    </div>
                    <button type="submit" name="getWeather" class="btn btn-danger">Submit</button>
                </form>
            </div>
        </div>
        <p class="weather-grey-color"><?php echo isset($currentCityDateTime) ? $currentCityDateTime : ""; ?></p>
        <p class="weather-grey-color"><?php echo isset($tempDesc) ? $tempDesc : ""; ?></p>
        <div class="row">
            <div class="col-md-9 p-l-0 p-r-0">
                <div class="col-md-1 col-xs-2 p-l-0 p-r-0">
                    <img src="<?php echo isset($weatherIcon) ? $weatherIcon : ""; ?>" alt="">
                </div>
                <div class="col-md-8 col-xs-10">
                    <p class="weather-value" style="float: left;"><?php echo isset($temp) ? $temp : ""; ?>
                        &#176;<?php echo isset($tempUnit) ? $tempUnit : ""; ?></span></p>
                </div>
                <div class="col-md-3">
                    <!--                    <div class="btn-group">-->
                    <!--                        <button type="button" class="btn btn-default" aria-label="Left Align">C</button>-->
                    <!--                        <button type="button" class="btn btn-default" aria-label="Center Align">F</span></button>-->
                    <!--                    </div>-->
                </div>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>
                        <p>precipitation : <?php echo isset($precipitation) ? $precipitation : ""; ?></p>
                    </li>
                    <li>
                        <p>Humidity : <?php echo isset($humidity) ? $humidity : ""; ?></p>
                    </li>
                    <li>
                        <p>Wind : <?php echo isset($wind) ? $wind : ""; ?></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="container" style="min-width: 100%; height: 200px; margin: 0 auto"></div>
            <div class="col-md-12">
                <?php if (isset($hourlyDataInfo)) {

                    $hourlyDataInfo = array_slice($hourlyDataInfo,0,8,true);

                    $tempArray = "";
                    $dayArray = "";
                    foreach ($hourlyDataInfo as $value) {
                        $hourlyTimeStamp = $value['hourlyDateTime'];
                        $hourlyTimeStampDay = date('l', $hourlyTimeStamp);
                        $hourlyTimeStampTime = date('h:i A', $hourlyTimeStamp);

                        $tempArray = $tempArray . $value['hourlyTemp'] . ",";
                        $dayArray = $dayArray . "'" . $hourlyTimeStampTime . "'" . ",";

                    }
                } ?>
            </div>
        </div>
    </div>
    <div class="below-weather-wrapper">
        <ul class="five-days-weather-card">
            <?php if (isset($FiveDaysForecastData)) {
                foreach ($FiveDaysForecastData as $value) { ?>
                    <li>
                        <h4 class="text-center"><?php echo $value['day']; ?></h4>
                        <img src="<?php echo $value['forecastWeatherIcon']; ?>" class="img-responsive center-block"
                             alt="weather-icon">
                        <p class="text-center"><?php echo $value['temp'] ?></p>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</section>


<?php
require_once 'footer_inner_registration.php';
?>

<script>


    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: '',
                x: -20 //center
            },

            xAxis: {
                categories: [<?= rtrim($dayArray, ", ") ?>],
//                plotBands: [{ // visualize the weekend
//                    from: 4.5,
//                    to: 6.5,
//                    color: 'rgba(68, 170, 213, .2)'
//                }]
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },

            },
            credits: {
                enabled: false
            },
            tooltip: {
            crosshairs: true,
            shared: true
            },
            plotOptions: {
                 spline: {
                        marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                name: 'Temperature',
                data: [<?= rtrim($tempArray, ", ") ?>]
            }]
        });
    });

</script>
