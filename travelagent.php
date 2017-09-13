<?php
require_once 'class/classParseSettings.php';
require_once 'class/classValidation.php';
require_once 'class/classTravelAgent.php';
require_once 'class/classTestimonial.php';

$userTestimonial = new airportAssTestimonial\testimonial;
$validation = new airportAssValidation\inputValidation;
$airportTravelAgent = new airportAssTravelAgent\travelagent;
$signUpStatus = false;
$error = [];
if(isset($_POST['joinUs'])){
    $data = $_POST;
    
    $required = [   'agencyName'=>"Agency Name",
                    'firstName'=>"First Name",
                    'lastName'=>'Last Name',
                    'mobileCode'=>'Mobile Code',
                    'mobile'=>'Mobile Number',
                    'verifyStatus'=>'Verify Status',
                    'email'=>'Email',
                    'password'=>'Password',
                    'confPassword'=>'Confirmation Password'
                ];
    $error = $validation->checkRequiredValue($data, $required);
    if(count($error) == 0){
        $email = $data['email'];
        $emailStatus =  $validation->validateEmail($email); 
        if($emailStatus){
            $emailExcist = $validation->emailExcist($email);
            if($emailExcist){
                $mobileNumber = $_POST['mobile'];
                $mobileCode = str_replace("+", "00", $_POST['mobileCode']);
                $codeWithOutPlus = str_replace("+", "", $_POST['mobileCode']);
                $contactNumber = str_replace(' ', '', $mobileCode.$mobileNumber);;
                $mobileStatus = $validation->checkMobileNumber($contactNumber);
                if($mobileStatus){
                    $signUpStatus = $airportTravelAgent->travelAgentSignUp($data,$contactNumber,$codeWithOutPlus);
                    $fullName = $data['firstName']." ".$data['lastName'];
                    $userMailStatus = $airportTravelAgent->sendMailToUser($data['email'],$fullName);
                    $mailStatus = $airportTravelAgent->sendMailToTravelUser($data['email'], $fullName, $signUpStatus);
                    header("Location:agentthankyou");
                }
            }else{
                $error[] = "Email id already registered.";
            }
        }else{
            $error[] = "Not a valid email";
        }
    }
}
$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validation->isCityDomain($serverName);
$airportInfoUrl = "";
$formatName = $validation->FormatName($serverName);
if($formatName != false){
$domainName = $formatName['domainName'];
$titleValue = $formatName['titleName'];
}else{
   $domainName =  $_SERVER['SERVER_NAME'];
   $titleValue = $_SERVER['SERVER_NAME'];
}
$testimonial = $userTestimonial->fetchTestimonial();
include 'html/travelagent.php';
