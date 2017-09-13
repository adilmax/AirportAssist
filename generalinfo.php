<?php
require_once 'class/classValidation.php';
require_once 'class/classResponder.php';

$currentUser = Parse\ParseUser::getCurrentUser();

if(!is_object($currentUser)){
    header('Location:login');
}else{
   if($currentUser->username ==''){
        header('Location:login');
    } 
}

$validation = new airportAssValidation\inputValidation;
$responderModel = new airportAssResponder\responder;

$error =[];
$status = false;
$message = "";

$middleName = "";
$profileImageStatus = false;  
$profileImageUrl = "";
$gender = false;
$dateOfBirth = "";
$luggageIndex = "";
$countryListIndex = "";
$languagesArray = [];
$luggage = [1=>'Heavy',2=>'Medium',3=>'Light'];
$countryList = $responderModel->getActiveCountry();
$languages = $responderModel->getAllLanguages();
 
$currentUser->fetch();
$firstName = $currentUser->firstName;
$lastName = $currentUser->lastName;
$phone = $currentUser->contactNumber;    
$type = 0;
if(isset($_GET['t']) && $_GET['t'] == 1){
    $type = 1; 
    $status = true;
    $message = "You have been successfully registered and logged in. ";
}
if(isset($_POST['submit'])){
    $data = $_POST;
    
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $middleName = $data['middleName'];
    $phone = $data['phone'];
    $gender = (bool)$data['gender'];
    $dateOfBirth = $data['dateOfBirth'];
    $luggageIndex = $data['luggageLift'];
    $countryListIndex = $data['nationality'];
    $languagesArray = $data['language'];
    
    $required = [   'firstName'=>'First Name',
                    'lastName'=>'Last Name',
                    'language'=>'Languages',
                    'phone'=>'Mobile Number',
                    'gender'=>'Gender',
                    'dateOfBirth'=>'Date Of Birth',
                    'nationality'=>'Nationality'                    
                ];
    
    $error = $validation->checkRequiredValue($data, $required);
    if(count($error) == 0){
        if($_FILES['photo']['name']!=""){
            $error = $validation->validateFile($_FILES['photo']['type']);           
        }
        if(count($error) == 0){
            $status = $responderModel->addGeneralInfo($data, $currentUser);   
            $message = "Your Personal Information has been saved successfully.";   
        }
    }    
}
if($currentUser->responderInfo != ""){
    $middleName = $currentUser->middleName;
    if($currentUser->profileImage !=""){
        $profileImageStatus = true;  
        $profileImageUrl = $currentUser->profileImage->getURL();
    }
    $currentUser->responderInfo->fetch();
    
    $gender = $currentUser->responderInfo->gender;
    $dateOfBirth = $currentUser->responderInfo->dateOfBirth;
    $luggageIndex = $currentUser->responderInfo->luggage;
    $countryListIndex = $currentUser->responderInfo->nationality;
    $languagesArray = $currentUser->responderInfo->language;
}

include 'html/generalinfo.php';
