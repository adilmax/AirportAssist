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
$education = [1=>'Below High School',2=>'High School',3=>'Under Graduate',4=>'Graduate',5=>'Others'];

$educationLevel = "";
$otherEdu = "";
$educationField = "";
$addQualification = "";
$occupation = "";
$airWorkExp = false;
$expAirName = "";
$designation = "";
$yearExp = "";
$joinDate = "";
$crptrained = false;
$clearance = false;
$airportName = "";
$eduCertificateStatus = false;
$eduCertificateUrl = "";
$expCertificateStatus = false;
$expCertificateUrl = "";
$airportIDFrontStatus = false; 
$airportIDFrontUrl = "";
$airportIDBackStatus = false;  
$airportIDBackUrl = "";

if(isset($_POST['submit'])){
    if($currentUser->airportWorkEducation!=""){
        if($currentUser->airportWorkEducation->airportIDFront !=""){
            $airportIDFrontStatus = true;  
        }
        if($currentUser->airportWorkEducation->airportIDBack !=""){
            $airportIDBackStatus = true;  
        }
    }
    $data = $_POST;
    
    $educationLevel = $data['educationLevel'];
    $otherEdu = $data['otherEdu'];
    $educationField = $data['educationField'];
    $addQualification = $data['addQualification'];
    $occupation = $data['occupation'];
    $airWorkExp = (bool)$data['conditionExp'];
    $expAirName = $data['expAirName'];
    $designation = $data['designation'];
    $yearExp = $data['yearExp'];
    if(isset($data['joinDate'])){
        if($data['joinDate'] != ""){
            $joinDate = $data['joinDate'];           
        }
    }
    $crptrained = (bool)$data['crptrained'];
    $clearance = (bool)$data['condition'];
    $airportName = $data['airportName'];
    
    $required = [   'educationLevel',
                    'educationField',                    
                    'occupation'             
                ];
    //Array for customise required
    $label = ['educationLevel'=>'Level of Education',
                    'educationField'=>'Education Field',                    
                    'occupation'=>'Occupation',
                    'otherEdu'=>'Other Education',
                    'expAirName'=>'Airport Name of work expirence',
                    'designation'=>'Designation',
                    'yearExp'=>'Year of Expirence',
                    'airportName'=>'Clearance to work at Airport Name'
            ];
    //other
    if($data['educationLevel'] == 5){
        array_push($required, 'otherEdu');
    }else{
        $data['otherEdu'] = "";
    }
    
    //if person is expirence
    if($data['conditionExp']){
        array_push($required, 'expAirName');
        array_push($required, 'designation');
        array_push($required, 'yearExp');
    }else{
        $data['expAirName'] = "";
    }
    //if user choose the clearence
    if($data['condition']){
        array_push($required, 'airportName');
    }else{
        $data['airportName'] = "";
    }
    //check the required field
    $error = $validation->checkRequiredValueWithoutLabel($data, $required, $label);
    $frontImage = true;
    $validationError = true;
    $backImage = true;
    $eduCertificate = true;
    $expCertificate = true;
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
                         $error [count($error)] = "Your airport id front side image size is $size KB. Maximam size you can upload only 500KB.";
                        $frontImage = false;                        
                    }
                }
                         
            }
        }else{
            if($data['conditionExp'] && $airportIDFrontStatus == false){
                $error [count($error)] = "You must upload the Airport Id";
                $frontImage = false; 
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
                        $error [count($error)] = "Your airport id back side image size is $size KB. Maximam size you can upload only 500KB.";
                        $backImage = false;                        
                    }
                }
                         
            }
        }else{
            if($data['conditionExp'] && $airportIDBackStatus == false){
                $error [count($error)] = "You must upload the Airport Id";
                $backImage = false;   
            }
        }
        if($_FILES['eduCertificate']["name"]!=""){
            $validateError  = $validation->validateFile($_FILES['eduCertificate']['type']);
            if(count($validateError)>0){
                $error [count($error)] = "File type supported png, jpg and pdf.";
                $eduCertificate = false;
            }else{
                $size = number_format((int)$_FILES['eduCertificate']['size']/1024,2);
                if($size >500){
                    $error [count($error)] = "Your education certificate size is $size KB. Maximam size you can upload only 500KB.";
                    $eduCertificate = false;                        
                }
            }                            
        }
        if($_FILES['expCertificate']["name"]!=""){
            $validateError  = $validation->validateFile($_FILES['expCertificate']['type']);
            if(count($validateError)>0){
                $error [count($error)] = "File type supported png, jpg and pdf.";
                $expCertificate = false;
            }else{
                $size = number_format((int)$_FILES['expCertificate']['size']/1024,2);
                if($size >500){
                    $error [count($error)] = "Your experience certificate size is $size KB. Maximam size you can upload only 500KB.";
                    $expCertificate = false;                        
                }
            } 
        }
    }else{
        $validationError = false;
    }
    if($backImage == true && $frontImage == true && $validationError == true && $expCertificate == true && $eduCertificate == true){
        $status = $airportObject->addWorkEducation($data, $currentUser);   
        $message = "Your Work And Education Information has been saved successfully.";   
    }
}
if($currentUser->airportWorkEducation != "" && count($error) == 0){
    $currentUser->airportWorkEducation->fetch();
    $educationLevel = $currentUser->airportWorkEducation->educationLevel;
    $otherEdu = $currentUser->airportWorkEducation->otherEdu;
    $educationField = $currentUser->airportWorkEducation->educationField;
    $addQualification = $currentUser->airportWorkEducation->addQualification;
    $occupation = $currentUser->airportWorkEducation->occupation;
    $airWorkExp = $currentUser->airportWorkEducation->airWorkExp;
    $expAirName = $currentUser->airportWorkEducation->expAirName;
    $designation = $currentUser->airportWorkEducation->designation;
    $yearExp = $currentUser->airportWorkEducation->yearExp;
    if($currentUser->airportWorkEducation->joinDate != ""){
       $joinDate = $currentUser->airportWorkEducation->joinDate->format('d-M-Y'); 
    }
    $crptrained = $currentUser->airportWorkEducation->crptrained;
    $clearance = $currentUser->airportWorkEducation->clearance;
    $airportName = $currentUser->airportWorkEducation->airportName;
    
    if($currentUser->airportWorkEducation->airportIDFront !=""){
        $airportIDFrontStatus = true;  
        $airportIDFrontUrl = $currentUser->airportWorkEducation->airportIDFront->getURL();
    }
    if($currentUser->airportWorkEducation->airportIDBack !=""){
        $airportIDBackStatus = true;  
        $airportIDBackUrl = $currentUser->airportWorkEducation->airportIDFront->getURL();
    }
    if($currentUser->airportWorkEducation->eduCertificate !=""){
        $eduCertificateStatus = true;  
        $eduCertificateUrl = $currentUser->airportWorkEducation->eduCertificate->getURL();
    }
    if($currentUser->airportWorkEducation->expCertificate !=""){
        $expCertificateStatus = true;  
        $expCertificateUrl = $currentUser->airportWorkEducation->expCertificate->getURL();
    }
}

include 'html/workexperience.php';
