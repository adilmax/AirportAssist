<?php

require_once 'class/classValidation.php';
require_once 'class/classUser.php';

$validation = new airportAssValidation\inputValidation;
$userModel = new airportAssUser\user;

$error = [];
$status = false;

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
    $data = $_POST;
    $userModel->helpContactMessage($data);
    $data['subject'] = "Message Sent";
    $userModel->sendContactMail($data);
    echo $status = true;
 }else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}