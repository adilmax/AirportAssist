<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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


require_once 'html/ourservices.php';


