<?php


use airportAssSearch\ClassAirportSearch;

if ( !isset($_REQUEST['term']) )
    exit;

require_once 'class/classParseSettings.php';
require 'class/ClassAirportSearch.php';

$airportObject = new ClassAirportSearch();

$data = $airportObject->getAirportSearchDetails($_REQUEST['term']);

echo json_encode($data);







