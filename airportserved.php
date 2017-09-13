<?
require_once 'class/classValidation.php';
require_once 'class/classAirportServed.php';

$validationObject = new airportAssValidation\inputValidation;
$airportServed = new airportServed\airportServed;
$glossary = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

$countryName = "";
if(isset($_POST['detailsAirportServed'])){
$countryName = $_POST['nameAirport'];
}

if($countryName==""){
    $country = $airportServed->getAirportCountry();
}else{
    $country[0] = $countryName;
}

 
$airportDetails = $airportServed->getAirportServed($countryName);
$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validationObject->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validationObject->FormatName($serverName);
if($formatName != false){
$domainName = $formatName['domainName'];
$titleValue = $formatName['titleName'];
}else{
   $domainName =  $serverName;
   $titleValue = $serverName;
}

$countryArray = $airportServed->countryList();


include"html/airportserved.php";