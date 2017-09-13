<?php


require_once 'class/classValidation.php';

$validationObject = new airportAssValidation\inputValidation;

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
$_SESSION['title'] = $titleValue;


require_once 'html/groundhandlingservices.php';


