<?php

require_once 'class/classValidation.php';
require_once 'class/classGroundHandling.php';

$validationObject = new airportAssValidation\inputValidation;
$groundHandlingObj = new airportAssGroundHandling\groundHandling;


$status = false;
$error = [];
$emailStatus = false;

if (isset($_POST['submit'])) {
    $data = $_POST;
    $required = ['fullName' => 'Your Name',
        'email' => 'Your Email',
        'aircraftOrginAirport' => 'Your Aircraft Service',
        'countryCodes' => 'Country Code',
        'phone' => 'Mobile Number'

    ];

    $error = $validationObject->checkRequiredValue($data, $required);
    if (count($error) == 0) {
        $email = $data['email'];
        $emailStatus = $validationObject->validateEmail($email);
        if ($emailStatus) {
            $phoneNumber = strip_tags($data['phone']);
            if (is_numeric($phoneNumber)) {
                $mobileCode = str_replace("+", "00", $_POST['countryCodes']);
                $contactNumber = str_replace(' ', '', $mobileCode . $phoneNumber);
                $result = $groundHandlingObj->addCampaignRequest($data, $contactNumber);
                if ($result != false) {
                    $mailSend = $groundHandlingObj->sendMailToAdmin($result, $data['email']);
                    $fullName = $data['fullName'];
                    $userMailStatus = $groundHandlingObj->sendMailToUser($data['email'], $fullName);
                    $status = true;
                    $data = [];
                    header("Location:welcom.php");
                }
            } else {
                $error[] = "Invalid Data in Numbere Field";
            }
        } else {
            $error[] = "Not a valid Email";
        }

    }
}


require_once('html/ghcampaignsform.php');