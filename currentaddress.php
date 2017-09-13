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
$airportObject = new airportAssResponder\responder;

$status = false;
$error = [];
$typeOfId = ['1'=>'Passport', '2'=>'Driving Licence','3'=>'National ID'];
$data = [];
$city = [];
$state = [];
$countryList = $airportObject->getActiveCountry();

$address = "";
$country = "";
$stateCode = "";
$cityCode = "";
$pinCode = "";
$idNo = "";
$idExpDate = "";
$idType = "";
$frontImageStatus = false;
$backImageStatus = false;
$frontImageUrl = "";
$backImageUrl = "";

if(isset($_POST['submit'])){    
    $data = $_POST;  
    
    $address = $data['address'];
    $country = $data['country'];
    $stateCode = $data['state'];
    $cityCode = $data['city'];
    $pinCode = $data['pinCode'];
    $idNo = $data['idNumber'];
    $idExpDate = $data['expDate'];
    $idType = $data['idtype'];

    $required = [   'address'=>'Address',
                    'country'=>'Country',
                    'state'=>'State',
                    'city'=>'City',
                    'pinCode'=>'Pin Code',
                    'idNumber'=>'Government Issued ID Number'                    
                ];
    $error = $validation->checkRequiredValue($data, $required);
    $frontImage = true;
    $validationError = true;
    $backImage = true;
    if(count($error) == 0){       
        if($_FILES['front_image']['name'] !=""){
            if(isset($_FILES['front_image']['type'])){
                $validateError = $validation->validateFile($_FILES['front_image']['type']);
                if(count($validateError)>0){
                    $error [count($error)] = "File type supported png, jpg and pdf.";
                    $frontImage = false;
                }else{
                    $size = number_format((int)$_FILES['front_image']['size']/1024,2);
                    if($size >500){
                         $error [count($error)] = "Your current image size is $size KB. Maximam size you can upload only 500KB.";
                        $frontImage = false;                        
                    }
                }
                         
            }
        }
        if($_FILES['back_image']['name'] !=""){
            if(isset($_FILES['back_image']['type'])){
                $validateError  = $validation->validateFile($_FILES['back_image']['type']);
                if(count($validateError)>0){
                    $error [count($error)] = "File type supported png, jpg and pdf.";
                    $backImage = false;
                }else{
                    $size = number_format((int)$_FILES['back_image']['size']/1024,2);
                    if($size >500){
                        $error [count($error)] = "Your current image size is $size KB. Maximam size you can upload only 500KB.";
                        $backImage = false;                        
                    }
                }
                         
            }
        }
    }else{
        $validationError = false;
    }
    if($frontImage == true && $backImage == true && $validationError == true )  {
        $status = $airportObject->addBackInfo($data, $currentUser);   
        $message = "Your address information has been saved successfully ";
    } 
}
if($currentUser->backgroundInfo != ""){
    $currentUser->backgroundInfo->fetch();
    $address = $currentUser->backgroundInfo->address1;
    $country = $currentUser->backgroundInfo->country;
    $stateCode = $currentUser->backgroundInfo->state;
    $cityCode = $currentUser->backgroundInfo->city;
    $pinCode = $currentUser->backgroundInfo->zipCode;
    $idNo = $currentUser->backgroundInfo->idNo;
    if($currentUser->backgroundInfo->idExpireDate != ""){
        $idExpDate = $currentUser->backgroundInfo->idExpireDate->format('d-M-Y');
    }    
    $idType = $currentUser->backgroundInfo->idDetails;
    if($currentUser->backgroundInfo->frontIdCopy !=""){
        $frontImageStatus = true;  
        $frontImageUrl = $currentUser->backgroundInfo->frontIdCopy->getURL();
    }
    if($currentUser->backgroundInfo->backIdCopy !=""){
        $backImageStatus = true;  
        $backImageUrl = $currentUser->backgroundInfo->backIdCopy->getURL();
    }
}

if($country != ""){
    $state = $airportObject->getPlaceTitle($country);
}
if($stateCode != ""){
    
    $city = $airportObject->getPlaceTitle($stateCode);
    
}


include 'html/currentaddress.php';