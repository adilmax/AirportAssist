<?php
require_once ("class/classWifiDetails.php");


$wifiModal = new \airportWifi\wifiDetails;



$error = false;
$status = false;
$wifiDetails = false;
if(isset($_POST['submitWifiDetails'])){
    $airportName  = $_POST['airportName'];
    if($airportName != ""){
        $wifiDetails = $wifiModal->getWifiDetails($airportName);
    }else{
        $error = true;
        $errorMessage = "Please enter the airport name";
    }
}
require_once ("html/viewwifidetails.php");