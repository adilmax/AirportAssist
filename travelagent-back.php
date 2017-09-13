<?php
require_once 'class/classParseSettings.php';
require_once 'class/classValidation.php';
require_once 'class/classTravelAgent.php';


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
                   
                }
            }else{
                $error[] = "Email id already registered.";
            }
        }else{
            $error[] = "Not a valid email";
        }
    }
}

include 'html/travelagent.php';
