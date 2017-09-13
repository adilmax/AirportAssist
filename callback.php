<?php

require_once 'class/classValidation.php';
require_once 'class/classUser.php';

$validation = new airportAssValidation\inputValidation;
$userModel = new airportAssUser\user;

$status = false;
$mailStatus = false;
$error = [];
$data = [];


if(isset($_POST['name'])){
    $data = $_POST;
     $required = [  'name'=>'Your Name',
                    'email'=>'Your Email',
                    'phoneCode'=>'Country Code',
                    'phone'=>'Mobile Number'
                    
                ];           

     $error = $validation->checkRequiredValue($data, $required); 
    if(count($error) == 0){
       $email = $data['email'];
        $emailStatus = $validation->validateEmail($email);
        if ($emailStatus) {         
        $refNumber = $userModel->addCallRequest($data);
         $mailStatus = $userModel->sendMailToAdmin($refNumber,$data['email']);
        $fullName = $data['firstName']." ".$data['lastName'];
        $userMailStatus = $userModel->sendMailToUser($data['email'],$fullName);
        if($refNumber != false){
            echo $status = true;
            $data = [];
          }
        }
 
    }else {
        echo json_encode($error);
    }

}


?>