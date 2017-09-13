<?php
require_once 'class/classValidation.php';
require_once 'class/classUser.php';
require_once 'class/classGroundHandling.php';

$validationObject = new airportAssValidation\inputValidation;
$groundHandlingObj = new airportAssGroundHandling\groundHandling;

$flightCategoryList = ['Private', 'Diplomatic', 'Cargo', 'Madevac', 'Commercial'];

$ghServices = ['Arrival', 'Departure', 'Both'];

$country = $groundHandlingObj->getCountryCode();
$aircraftType = $groundHandlingObj->getAircraftType();

$status=false;
$error =[];
$emailStatus = false;
$aircraftSubType =[];
$subType = [];

if(isset($_POST['submit'])){
    $data = $_POST;
    
     $required = [  'firstName'=>'First Name',
                    'lastName'=>'Last Name',
                    'company'=>'Company Name',
                    'country'=>'Country',
                    'phoneCode'=>'Phone Code',
                    'phone'=>'Phone',
                    'email'=>'Email',
                    'requiredService'=>'Airport Where Service Required',
                    'airRegistry'=>'Aircraft Registry',
                    'flightNumber'=>'Flight Number',
                    'orginAirport'=>'Orgin Airport',
                    'depAirport'=>'Destination Airport',
                    'operator'=>'Operator',
                    'aircraftType'=>'Aircraft Type',
                    'flightCategory'=>'Flight Category',
                    'arrivalTime'=>'Date of Arrival',
                    'arrivalTiming'=>'Arrival Time',
                    'departureTime'=>'Date of Departure',
                    'departureTiming'=>'Departure Time',
                    'captainName'=>'Captain\'s Name',
                    'crewArriving'=>'Number of Crew Arriving',
                    'arrivedPassengers'=>'Number of Passengers Arriving',
                    'mobileCode'=>'Mobile Code',
                    'captainMobile'=>'Captain\'s Mobile',
                    'crewDepart'=>'Number of Crew Departing',
                    'departPassengers'=>'Number of Passengers Deaprting'
                ];
     
    $error = $validationObject->checkRequiredValue($data, $required);
    if(count($error) == 0){
        $email = $data['email'];
        $emailStatus =  $validationObject->validateEmail($email); 
        if($emailStatus){
            $phoneNumber = strip_tags($data['phone']);
            $capMobNumber = strip_tags($data['captainMobile']);
            $crewArrNumber = strip_tags($data['crewArriving']);
            $arrivedPassNumber = strip_tags($data['arrivedPassengers']);
            $crewDepNumber = strip_tags($data['crewDepart']);
            $departPassNumber = strip_tags($data['departPassengers']);
             if(is_numeric($phoneNumber) && is_numeric($capMobNumber) && is_numeric($crewArrNumber) && is_numeric($arrivedPassNumber) && is_numeric($crewDepNumber) && is_numeric($departPassNumber) ){    
                 if((strlen($phoneNumber) > 7 && strlen($phoneNumber) < 16) && (strlen($capMobNumber) > 7 && strlen($capMobNumber) < 16)){
                     //function to add the request
                     $mobileCode = str_replace("+", "00", $_POST['phoneCode']);
                     $contactNumber = str_replace(' ', '', $mobileCode.$phoneNumber);
                     $capMobileCode = str_replace("+", "00", $_POST['mobileCode']);
                     $capContactNumber = str_replace(' ', '', $capMobileCode.$capMobNumber);
                     $requestStatus = $groundHandlingObj->addGroundHandlingRequest($data, $contactNumber,$capContactNumber);
                     if ($requestStatus != false) {
                         $mailSend = $groundHandlingObj->sendMailToAdmin($requestStatus,$data['email']);
                         $fullName = $data['firstName']." ".$data['lastName'];
                         $userMailStatus = $groundHandlingObj->sendMailToUser($data['email'],$fullName);
                         $status = true;
                         $data = [];
                         header("Location:welcom.php");
                     }
                 }

                 else{
                     $error[] = "Invalid Mobile Number.";   
                 }
             }else{
                  $error[] = "Invalid Data in Numbered Field";      
             }
        }else{
            $error[] = "Not a valid Email";           
        }
    }
}

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

include "html/groundhandling.php";

?>