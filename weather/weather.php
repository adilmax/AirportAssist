<?php
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once("vendor/autoload.php");

if (isset($_POST['getWeather'])) {

    $cityName = $_POST['cityName'];

    $cli = false;
    if (php_sapi_name() === 'cli') {
        $lf = "\n";
        $cli = true;
    }

// Language of data (try your own language here!):
    $lang = 'us';

// Units (can be 'metric' or 'imperial' [default]):
    $units = 'metric';

//

// Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
    $myApiKey = "645a4d16ad2334e2b6de7921333bfa42";
    $owm = new OpenWeatherMap();
    $owm->setApiKey($myApiKey);
    $text = $owm->getWeather($cityName, $units, $lang);
    $cityNm = $text->city->name;
//    $cityGetTimeStamp = $text->sun->set->getTimestamp();
//    print_r($cityGetTimeStamp);
//    $citySetTimeStamp = $text->sun->set->setTimestamp($cityGetTimeStamp);
//    print_r($citySetTimeStamp);
    $temp = $text->temperature->now->getValue();
    $tempUnit = $text->temperature->now->getUnit();
    $tempDesc = $text->weather->description;
    $weatherIcon = $text->weather->getIconUrl();
//$press = $text->pressure->getValue()." ".$text->pressure->getUnit();
    $humidity = $text->humidity->getValue() . " " . $text->humidity->getUnit();
    $wind = $text->wind->speed->getValue() . " " . $text->wind->speed->getUnit();
    $precipitation = $text->precipitation->getValue() . " " . $text->humidity->getUnit();
    $countryName = $text->city->country;

//    -------------------------------------------------------
//    get five upcoming days weather info
//    -------------------------------------------------------

    $forecast = $owm->getWeatherForecast($cityName, $units, $lang, '', 16);
    $i = 0;
    foreach ($forecast as $moreText) {
        if ($i < 5) {
            ++$i;
            $hourlyTemp = $moreText->temperature->getDescription();
            $date = date('Y-m-d');
            $day = date('l', strtotime("+$i day", strtotime($date)));
            $forecastTemp = $moreText->temperature->now->getValue() . " " . $moreText->temperature->now->getUnit();
            $forecastWeatherIcon = $moreText->weather->getIconUrl();
//            $forecastPress = $moreText->pressure->getValue() . " " . $moreText->pressure->getUnit();
//            $forecastHumidity = $moreText->humidity->getValue() . " " . $moreText->humidity->getUnit();
//            $forecastWind = $moreText->wind->speed->getValue() . " " . $moreText->wind->speed->getUnit();
            $data[] = array("type" => "fiveDaysWeather", "day" => $day, "temp" => $forecastTemp, "forecastWeatherIcon" => $forecastWeatherIcon);

        } else {
            break;
        }
    }

    $fiveDaysWeatherInfo = http_build_query(array('aParam' => $data));

//    -------------------------------------------------------
//    get Hourly forecast data
//    -------------------------------------------------------

    $hourlyForecast = $owm->getRawHourlyForecastData($cityNm, $units, $lang, '', '');
    $hourlyForecast = json_decode($hourlyForecast);
    $hourData = $hourlyForecast->list;

    foreach ($hourData as $value) {
        $hourlyDateTime = $value->dt;
        $hourlyTemp = $value->main->temp;

        $hourlyDataInfo[] = array("type"=>"HourlyTempDataInfo","hourlyDateTime" => $hourlyDateTime, "hourlyTemp" => $hourlyTemp);
    }


    $hourlyDataInfo = http_build_query(array('bParam' => $hourlyDataInfo));

    header("Location:../cityweather.php?currentCityDay=$currentCityDay&cityNm=$cityNm&countryName=$countryName&temp=$temp&tempUnit=$tempUnit&tempDesc=$tempDesc&weatherIcon=$weatherIcon&precipitation=$precipitation&humidity=$humidity&wind=$wind&fiveDaysWeatherInfo=$fiveDaysWeatherInfo&hourlyDataInfo=$hourlyDataInfo");

}
?>