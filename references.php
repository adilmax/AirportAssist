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
$data = [];

$reftName = "";
$title2 = "";
$email = "";
$comName = "";
$mobNumber = "";
$reftName1 = "";
$title1 = "";
$email1 = "";
$comName1 = "";
$mobNumber1 = "";

if(isset($_POST['submit'])){
    $data = $_POST;
    
    $reftName = $data['reftName'];
    $title2 = $data['designation'];
    $email = $data['email'];
    $comName = $data['comName'];
    $mobNumber = $data['mobNumber'];
    $reftName1 = $data['reftName1'];
    $title1 = $data['designation1'];
    $email1 = $data['email1'];
    $comName1 = $data['comName1'];
    $mobNumber1 = $data['mobNumber1'];
        
    $required = [   'reftName'=>'Name Of The First Reference',
                    'email'=>'Email of First Reference',
                    'comName'=>'Name of the company / Institution of First Reference',
                    'mobNumber'=>'Mobile Number  of First Reference',
                    'reftName1'=>'Name Of The Secound Reference',
                    'email1'=>'Email of Secound Reference',
                    'comName1'=>'Name of the company / Institution of Secound Reference',
                    'mobNumber1'=>'Mobile Number of Secound Reference'             
                ];
    
    $error = $validation->checkRequiredValue($data, $required);
    
    if(count($error) == 0){       
        $emailStatus =  $validation->validateEmail($email); 
        $emailStatus1 =  $validation->validateEmail($email1); 
        
        if($emailStatus && $emailStatus1){            
            $status = $airportObject->addReference($data, $currentUser);   
            $message = "Your References Information has been saved successfully ";             
        }else{
            $error[] = "Not a valid email";
        }                   
    }    
}
if($currentUser->references != ""){
    $currentUser->references->fetch();    
    $reftName = $currentUser->references->refName;
    $title2 = $currentUser->references->title;
    $email = $currentUser->references->email;
    $comName = $currentUser->references->organization;
    $mobNumber = $currentUser->references->refPhone;
    $reftName1 = $currentUser->references->refName1;
    $title1 = $currentUser->references->title1;
    $email1 = $currentUser->references->email1;
    $comName1 = $currentUser->references->organization1;
    $mobNumber1 = $currentUser->references->refPhone1;
}


include 'html/references.php';
