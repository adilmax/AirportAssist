<?php
require_once 'class/classParseSettings.php';
require_once 'class/classValidation.php';
require_once 'class/classCorporateRegistration.php';

$validation = new airportAssValidation\inputValidation;
$airportCorporate = new airportAssCorporateRegistration\corporateRegistration;

$error = [];
$signUpStatus = false;
if(isset($_POST['join'])){
    $data = $_POST;
    
    $required = [   'companyName'=>"Company Name",
                    'contactPerson'=>'Contact Person',                    
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
                   $signUpStatus = $airportCorporate->corporateSignUp($data,$contactNumber,$codeWithOutPlus);                    
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
include 'html/corporateregistration.php';
