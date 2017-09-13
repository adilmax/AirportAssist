<?php

require_once ("class/classWifiDetails.php");


$wifiModal = new \airportWifi\wifiDetails;



$error = false;
$status = false;

if (isset($_POST["submitWifiDetails"])) {

    $data = $_POST;

    if (isset($data['airportName'])) {
        if ($data['airportName'] != "") {

            $status = $wifiModal->addWifiDetails($data);



        }else{
            $error = true;
            $errorMessage = "Please Enter The Airport Name";
        }
    }else{
        $error = true;
        $errorMessage = "Please Enter The Airport Name";
    }

}


require_once("html/addwifidetails.php");
