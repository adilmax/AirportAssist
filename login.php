<?php
require_once 'class/classValidation.php';
require_once 'class/classResponder.php';

$currentUser = Parse\ParseUser::getCurrentUser();
// check the current user already set or not..

if(is_object($currentUser)){
    
    if($currentUser->username!=''){      
        header('Location:generalinfo');       
    }
}
$error = [];
$airportObject = new airportAssResponder\responder;
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username != "" && $password != ""){
        $status = $airportObject->signUP($username,$password);   
        if($status){
            header("Location:generalinfo");
        }else{
            $error[] = "Username and passowrd not matched";
        }
    }else{
        $error[] = "Please enter both username and password";
    }
}


include 'html/login.php';