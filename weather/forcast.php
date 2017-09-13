<?php
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once("vendor/autoload.php");

if (isset($_POST['cityName'])) {

    $cityName = $_POST['cityName'];
}
$cli = false;
if (php_sapi_name() === 'cli') {
    $lf = "\n";
    $cli = true;
}

// Language of data (try your own language here!):
$lang = 'us';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'metric';

$mode ='json';

// Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
$myApiKey = "645a4d16ad2334e2b6de7921333bfa42";
$owm = new OpenWeatherMap();
$owm->setApiKey($myApiKey);





$forecast = $owm->getWeatherForecast($cityName, $units, $lang, '', 16);
$i = 0;

foreach ($forecast as $text) {
    if ($i < 5) {
        ++$i;
        $date = date('Y-m-d');
        $day = date('l', strtotime("+$i day", strtotime($date)));
        $temp = $text->temperature->now->getValue()." ".$text->temperature->now->getUnit();
        $press = $text->pressure->getValue()." ".$text->pressure->getUnit();
        $humidity = $text->humidity->getValue()." ".$text->humidity->getUnit();
        $wind = $text->wind->speed->getValue()." ".$text->wind->speed->getUnit();
        $data[] = array("day"=>$day,"temp" => $temp, "press" => $press, "humidity" => $humidity, "wind" => $wind);

    } else {
        break;
    }
}
echo json_encode($data);


?>