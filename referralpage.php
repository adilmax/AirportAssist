<?php


require_once ("class/classValidation.php");
require_once ("class/classAirportsubscription.php");

$validation = new airportAssValidation\inputValidation;

$subscriptionModal = new airportSubscribe\subscribe;



if (isset($_POST['email'])) {

    $result = $subscriptionModal->addSubscribe($_POST['email']);
}



include_once ("html/referralpage.php");