<?php
if ( !isset($_REQUEST['term']) )
    exit;

//require_once 'class/classParseSettings.php';
require 'class/classFlightDetails.php';

$flightObject = new flightAssAirport\flight;

$data = $flightObject->getFlightDetails(strtolower($_REQUEST['term']));

echo json_encode($data);







