<?php
if ( !isset($_REQUEST['term']) )
    exit;

require_once 'class/classParseSettings.php';
require 'class/classAirportDetails.php';

$airportObject = new airportAssAirport\airport;

$data = $airportObject->getAirportDetails($_REQUEST['term']);

echo json_encode($data);







