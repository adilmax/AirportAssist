<?php
require_once 'class/classValidation.php';
require_once 'class/classArabHealthCampaign.php';

$validationObject = new airportAssValidation\inputValidation;
$arabHealthObj = new airportAssArabHealthCampaign\arabHealth;

$serverNameValue = $_SERVER['SERVER_NAME'];
$serverName = str_replace("www.", "", $serverNameValue);
$isCity = $validationObject->isCityDomain($serverName);
$airportInfoUrl = "";

$status = false;
$emailStatus=false;
$erro =[];
$data = [];
$campaignName = "";
if(isset($_GET['ad'])){
     	switch($_GET['ad']){
        case "9":
	        $campaignName = "Google ppc for Arab health care";
	        break;
	}	        
}
if(isset($_POST['submit'])){
    $data = $_POST;
    $required = ['firstName'=>'First Name',
                 'email'=>'Email',
                  'mobile'=>'Mobile'
                ];
    $error = $validationObject->checkRequiredValue($data, $required);
    if(count($error) == 0){
        $email = $data['email'];
        $emailStatus =  $validationObject->validateEmail($email); 
        if($emailStatus){

        	$results = $arabHealthObj->arabHealthCampaign($data, $campaignName);
        	if ($results != false) {
             	$status = true;
                 $data = [];
                 header("Location:arabwelcome.php");
                 
            }
        }else{
           	$error[] = "Not a valid Email"; 	
		}		
	}
}


include_once 'html/arabhealthcampaign.php';