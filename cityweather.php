<?php


use airportAssWeather\Weather;
use Cmfcmf\OpenWeatherMap;

require_once("vendor/autoload.php");
require_once("class/classweather.php");


if (isset($_POST['getWeather'])) {

    $weatherModal = new Weather();

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
    $cityLat = $text->city->lat;
    $cityLon = $text->city->lon;
    $cityTimestamp = $text->sun->set->getTimestamp();
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
        if ($i < 8) {
            ++$i;
            $hourlyTemp = $moreText->temperature->getDescription();
            $date = date('Y-m-d');
            $day = date('l', strtotime("+$i day", strtotime($date)));
            $forecastTemp = $moreText->temperature->now->getValue() . " " . $moreText->temperature->now->getUnit();
            $forecastWeatherIcon = $moreText->weather->getIconUrl();
//            $forecastPress = $moreText->pressure->getValue() . " " . $moreText->pressure->getUnit();
//            $forecastHumidity = $moreText->humidity->getValue() . " " . $moreText->humidity->getUnit();
//            $forecastWind = $moreText->wind->speed->getValue() . " " . $moreText->wind->speed->getUnit();
            $FiveDaysForecastData[] = array("type" => "fiveDaysWeather", "day" => $day, "temp" => $forecastTemp, "forecastWeatherIcon" => $forecastWeatherIcon);

        } else {
            break;
        }
    }



//    -------------------------------------------------------
//    get Hourly forecast data
//    -------------------------------------------------------

    $hourlyForecast = $owm->getRawHourlyForecastData($cityNm, $units, $lang, '', '');
    $hourlyForecast = json_decode($hourlyForecast);
    $hourData = $hourlyForecast->list;
    

    foreach ($hourData as $value) {
        $hourlyDateTime = $value->dt;
        $hourlyTemp = $value->main->temp;
        $hourlyDataInfo[] = array("type" => "HourlyTempDataInfo", "hourlyDateTime" => $hourlyDateTime, "hourlyTemp" => $hourlyTemp);
    }

//    ---------------------------------------------------------------------------------------
//      get timezone by city using lat , long and timestamp - google timezone api call
//    ---------------------------------------------------------------------------------------
    $result = $weatherModal->loadWeather($cityLat,$cityLon,$cityTimestamp);
    $cityTimeStamp = json_decode($result);
    $cityTimestamp = $cityTimeStamp->timeZoneId;

    date_default_timezone_set($cityTimestamp);
    $currentCityDateTime = date('l h:i A');
    $currentCityDay = date('l');


}




require_once("html/cityweather.php");











