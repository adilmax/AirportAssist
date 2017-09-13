<?php
require_once 'class/classValidation.php';

$validation = new airportAssValidation\inputValidation;

$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validation->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validation->FormatName($serverName);
if($formatName != false){
$domainName = $formatName['domainName'];
$titleValue = $formatName['titleName'];
}else{
   $domainName =  $serverName;
   $titleValue = $serverName;
}
$senderName = "";
if(isset($_GET['s'])){
    $senderName = ucwords($_GET['s']);
}

include 'html/welcome.php';
